<?php

    namespace App\Models;

    use CodeIgniter\Model;
    use Exception;
    use App\Models\UsuarioComumModel;

    class PacientesModel extends Model {
        
        // Define a tabela e a chave primária
        protected $table = 'pacientes';
        protected $primaryKey = 'PAC_ID';

        // Define a utilização de AutoIncrement na chave primária
        protected $useAutoIncrement = true;

        // Garante que as querries no banco feitas pelo model 
        // retornarão instâncias da Entidade associada
        protected $returnType = \App\Entities\Pacientes::class;

        // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
        protected $allowedFields = ['PAC_EMAIL', 'PAC_STATUS', 'FK_USUARIO_COMUM_USC_ID', 'FK_PLANOS_PLN_ID'];

        // Regras de validação de campos
        protected $validationRules = [

            'PAC_EMAIL' => 'required',
            #'PAC_STATUS' => 'required',
            'FK_USUARIO_COMUM_USC_ID' => 'required',
            #'FK_PLANOS_PLN_ID' => 'required',


        ];

        // Mensagens de erro baseado na validação
        protected $validationMessages = [

            'PAC_EMAIL' => [
                
                'required' => 'O campo e-mail é obrigatório.',

            ],

            'PAC_STATUS' => [
                
                'required' => 'O campo status é obrigatório.',

            ],

            'FK_USUARIO_COMUM_USC_ID' => [
                
                'required' => 'O campo FK_USUARIO_COMUM_USC_ID é obrigatório.',

            ],

            'FK_PLANOS_PLN_ID' => [
                
                'required' => 'O campo FK_PLANOS_PLN_ID é obrigatório.',

            ],
        ];

        public function obterFKPorId(int $id){
            $query = $this->db->query("SELECT $this->table.FK_USUARIO_COMUM_USC_ID FROM $this->table WHERE $this->table.PAC_ID = $id");

            $results = $query->getResult();
 
           
            return $results[0]->FK_USUARIO_COMUM_USC_ID;
  
        }

        public function obterPacientePorFKUsuarioComum (int $idUsuarioComum){
            $query = $this->db->query("SELECT * FROM $this->table WHERE $this->table.FK_USUARIO_COMUM_USC_ID = $idUsuarioComum");

            $results = $query->getResult();
 
           
            return $results[0];
        }

        public function logarPaciente($email, $senha){
            $retorno = $this->verificarEmail($email);

            if( count($retorno) == 0 ){
                throw new Exception('Email ou Senha incorreto');
            }

            $id = $retorno[0]['FK_USUARIO_COMUM_USC_ID'];

            $sql = 'SELECT * FROM usuario_comum WHERE USC_ID = "'.$id.'"';
            $select = $this->db->query($sql);

            $user = $select->getResultArray();

            // Verificacao da senha
            return password_verify($senha, $user[0]['USC_SENHA']);

            //return $user[0]['USC_SENHA'] === $senha;
        }

        public function getNomePaciente($email){
            $retorno = $this->verificarEmail($email);
            $id = $retorno[0]['FK_USUARIO_COMUM_USC_ID'];

            $sql = 'SELECT USC_NOME FROM usuario_comum WHERE USC_ID = "'.$id.'"';
            $select = $this->db->query($sql);

            $user = $select->getResultArray();
            return $user[0]['USC_NOME'];
        }

        public function verificarEmail($email){
            $sql = 'SELECT * FROM pacientes WHERE PAC_EMAIL = "'.$email.'"';
            $select = $this->db->query($sql);

            return $select->getResultArray();
        }

        public function dadosDeTodosPacientes()
        {
            $query = $this->db->query("SELECT 
            uc.USC_ID, uc.USC_NOME, uc.USC_DATA_NASCIMENTO, uc.USC_CPF, 
            $this->table.PAC_EMAIL, $this->table.PAC_STATUS, 
            pln.PLN_NOME, pln.PLN_INSTITUICAO
            FROM usuario_comum AS uc, $this->table, planos AS pln
            WHERE $this->table.FK_USUARIO_COMUM_USC_ID = uc.USC_ID
            AND $this->table.FK_PLANOS_PLN_ID = pln.PLN_ID");
            
            return $query->getResult();
        }

        public function podeTerDependentes($id){
            $query = $this->db->query("SELECT COUNT(*) 
            FROM valores_dependentes AS vd, planos AS pl, pacientes AS pac
            WHERE pac.FK_PLANOS_PLN_ID = pl.PLN_ID
                AND pl.PLN_ID = vd.FK_PLANOS_PLN_ID
                AND pac.PAC_ID = $id");

            return $query->getResult();
        }

    }

?>