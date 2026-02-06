<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class DependentesModel extends Model {
        
        // Define a tabela e a chave primária
        protected $table = 'dependentes';
        protected $primaryKey = 'DEP_ID';

        // Define a utilização de AutoIncrement na chave primária
        protected $useAutoIncrement = true;

        // Garante que as querries no banco feitas pelo model 
        // retornarão instâncias da Entidade associada
        protected $returnType = \App\Entities\Dependentes::class;

        // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
        /*protected $allowedFields = ['DEP_NV_PARENTESCO', 'DEP_NOME', 'DEP_DATA_NASCIMENTO', 'FK_PACIENTES_PAC_ID',
        'FK_PACIENTES_FK_USUARIO_COMUM_USC_ID', 'FK_RESPONSAVEIS_RES_ID', 'FK_RESPONSAVEIS_FK_PACIENTES_PAC_ID', 
        'FK_RESPONSAVEIS_FK_PACIENTES_FK_USUARIO_COMUM_USC_ID'];
        */
        protected $allowedFields = ['DEP_NV_PARENTESCO', 'FK_PACIENTES_PAC_ID', 'FK_RESPONSAVEIS_RES_ID'];

        // Regras de validação de campos
        protected $validationRules = [

            'DEP_NV_PARENTESCO' => 'required',
            //'DEP_NOME' => 'required',
            //'DEP_DATA_NASCIMENTO' => 'required',
            'FK_PACIENTES_PAC_ID' => 'required',
            //'FK_PACIENTES_FK_USUARIO_COMUM_USC_ID' => 'required',
            'FK_RESPONSAVEIS_RES_ID' => 'required',
            //'FK_RESPONSAVEIS_FK_PACIENTES_PAC_ID' => 'required',
            //'FK_RESPONSAVEIS_FK_PACIENTES_FK_USUARIO_COMUM_USC_ID' => 'required',

        ];

        // Mensagens de erro baseado na validação
        protected $validationMessages = [

            'DEP_NV_PARENTESCO' => [
                
                'required' => 'O campo nível parentesco é obrigatório.',

            ],

            /*'DEP_NOME' => [
                
                'required' => 'O campo nome é obrigatório.',

            ],

            'DEP_DATA_NASCIMENTO' => [
                
                'required' => 'O campo data de nascimento é obrigatório.',

            ],*/

            'FK_PACIENTES_PAC_ID' => [
                
                'required' => 'O campo FK_PACIENTES_PAC_ID é obrigatório.',

            ],

            /*'FK_PACIENTES_FK_USUARIO_COMUM_USC_ID' => [
                
                'required' => 'O campo FK_PACIENTES_FK_USUARIO_COMUM_USC_ID é obrigatório.',

            ],*/

            'FK_RESPONSAVEIS_RES_ID' => [
                
                'required' => 'O campo FK_RESPONSAVEIS_RES_ID é obrigatório.',

            ],

            /*'FK_RESPONSAVEIS_FK_PACIENTES_PAC_ID' => [
                
                'required' => 'O campo FK_RESPONSAVEIS_FK_PACIENTES_PAC_ID é obrigatório.',

            ],

            'FK_RESPONSAVEIS_FK_PACIENTES_FK_USUARIO_COMUM_USC_ID' => [
                
                'required' => 'O campo FK_RESPONSAVEIS_FK_PACIENTES_FK_USUARIO_COMUM_USC_ID é obrigatório.',

            ],*/


        ];

        public function findAllDependentes(int $id) {

            $query = $this->db->query("SELECT *
            FROM $this->table, usuario_comum, pacientes
            WHERE $this->table.FK_RESPONSAVEIS_RES_ID = $id 
            AND $this->table.FK_PACIENTES_PAC_ID = pacientes.PAC_ID 
            AND usuario_comum.USC_ID = pacientes.FK_USUARIO_COMUM_USC_ID;");
  

            $results = $query->getResult();

            return $results;
        }

        public function findAllById( int $id ) {

            $query = $this->db->query("SELECT * FROM $this->table, usuario_comum, pacientes
            WHERE $this->table.DEP_ID = $id 
            AND $this->table.FK_PACIENTES_PAC_ID = pacientes.PAC_ID
            AND usuario_comum.USC_ID = pacientes.FK_USUARIO_COMUM_USC_ID;");
           
           $results = $query->getResult();
    
           print_r($results);
           //print_r($results);
        }

    }

?>