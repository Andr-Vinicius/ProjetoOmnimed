<?php

    namespace App\Models;

    use CodeIgniter\Model;
use Exception;

    class FuncionariosModel extends Model {
        
        // Define a tabela e a chave primária
        protected $table = 'funcionarios';
        protected $primaryKey = 'FUN_ID';

        // Define a utilização de AutoIncrement na chave primária
        protected $useAutoIncrement = true;

        // Garante que as querries no banco feitas pelo model 
        // retornarão instâncias da Entidade associada
        protected $returnType = \App\Entities\Funcionarios::class;

        // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
        protected $allowedFields = ['FUN_PRONTUARIO', 'FUN_CATEGORIA', 'FK_USUARIO_COMUM_USC_ID'];

        // Regras de validação de campos
        protected $validationRules = [

            'FUN_PRONTUARIO' => 'is_unique[funcionarios.FUN_PRONTUARIO]',
            'FUN_CATEGORIA' => 'required',
            'FK_USUARIO_COMUM_USC_ID' => 'required'


        ];

        // Mensagens de erro baseado na validação
        protected $validationMessages = [

            'FUN_PRONTUARIO' => [
                
                'is_unique' => 'O campo prontuário deve ser único (valor duplicado).',

            ],

            'FUN_CATEGORIA' => [
                
                'required' => 'O campo categoria é obrigatório.',

            ],
            

        ];


        public function verificarProntuario($prontuario){

            $sql = 'SELECT * FROM funcionarios WHERE FUN_PRONTUARIO = "'.$prontuario.'"';
            $select = $this->db->query($sql);
            return $select->getResultArray();

            //$select->execute();
            /*$igual = $select->db->get();
            return $igual;

            /*$query = "SELECT `FUN_PRONTUARIO` FROM `funcionarios` WHERE `FUN_PRONTUARIO` = $prontuario";
            $prontuario_existe = $this->db->query($query)->resultArray();
            return $prontuario_existe;*/

        }

        public function findAllFuncionarios() {
            $query = $this->db->query("SELECT *
                    FROM 
                    $this->table,
                    usuario_comum,
                    administrativo
                    WHERE
                    ($this->table.FK_USUARIO_COMUM_USC_ID = usuario_comum.USC_ID) 
                    AND ($this->table.FUN_ID = administrativo.FK_FUNCIONARIOS_FUN_ID)");
    
            $results = $query->getResult();

            return $results;
        }

        public function findAllById( int $id ) {

            $query = $this->db->query("SELECT * FROM $this->table, usuario_comum, administrativo 
            WHERE($this->table.FK_USUARIO_COMUM_USC_ID = usuario_comum.USC_ID) 
            AND ($this->table.FUN_ID = administrativo.FK_FUNCIONARIOS_FUN_ID)
            AND ($this->table.FUN_ID = $id)");
   
            $results = $query->getResult();
    
            return $results;
        }

        public function obterFKPorId(int $id){
            $query = $this->db->query("SELECT $this->table.FK_USUARIO_COMUM_USC_ID FROM $this->table WHERE $this->table.FUN_ID = $id");

            $results = $query->getResult();
 
           
            return $results[0]->FK_USUARIO_COMUM_USC_ID;
  
        }


        public function deleteFuncionarios(int $id){


             $query = $this->db->query("DELETE FROM $this->table, usuario_comum
                         USING $this->table
                         INNER JOIN usuario_comum 
                         WHERE ($this->table.FK_USUARIO_COMUM_USC_ID = $id) 
                         AND (usuario_comum.USC_ID = $id)");

         }

         public function logarFuncionario($prontuario, $senha){
            $retorno = $this->verificarProntuario($prontuario);

            if( count($retorno) == 0 ){
                throw new Exception('Prontuário ou Senha incorreto');
            }

            $id = $retorno[0]['FK_USUARIO_COMUM_USC_ID'];

            $sql = 'SELECT * FROM usuario_comum WHERE USC_ID = "'.$id.'"';
            $select = $this->db->query($sql);

            $user = $select->getResultArray();

            // Verificacao da senha
            return password_verify($senha, $user[0]['USC_SENHA']);

            //return $user[0]['USC_SENHA'] === $senha;
         }

         public function getNomeFuncionario($prontuario){
            $retorno = $this->verificarProntuario($prontuario);
            $id = $retorno[0]['FK_USUARIO_COMUM_USC_ID'];

            $sql = 'SELECT USC_NOME FROM usuario_comum WHERE USC_ID = "'.$id.'"';
            $select = $this->db->query($sql);

            $user = $select->getResultArray();
            return $user[0]['USC_NOME'];
         }

    }

?>