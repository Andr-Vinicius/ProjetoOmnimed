<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class ResponsaveisModel extends Model {
        
        // Define a tabela e a chave primária
        protected $table = 'responsaveis';
        protected $primaryKey = 'RES_ID';

        // Define a utilização de AutoIncrement na chave primária
        protected $useAutoIncrement = true;

        // Garante que as querries no banco feitas pelo model 
        // retornarão instâncias da Entidade associada
        protected $returnType = \App\Entities\Responsaveis::class;

        // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
        protected $allowedFields = ['RES_TEL_CELULAR1', 'FK_PACIENTES_PAC_ID'];

        // Regras de validação de campos
        protected $validationRules = [

            'RES_TEL_CELULAR1' => 'required',
            'FK_PACIENTES_PAC_ID' => 'required',

        ];

        // Mensagens de erro baseado na validação
        /*protected $validationMessages = [

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
        ];*/

        public function obterFKPorId(int $id){
            $query = $this->db->query("SELECT $this->table.RES_ID FROM $this->table WHERE 'FK_PACIENTES_PAC_ID' = $id");

            $results = $query->getResult();
 
           
            return $results[0]->RES_ID;
  
        }

        public function obterDadosPorIdPaciente(int $id){
            $query = $this->db->query(
                "SELECT $this->table.RES_TEL_CELULAR1, /*$this->table.RES_TEL_CELULAR2, 
                $this->table.RES_QTD_FILHOS, $this->table.RES_QUAIS_DOENCAS_CRONICAS, 
                $this->table.RES_QUAIS_TRAT_MED, $this->table.RES_QUAL_MEDICACAO, 
                $this->table.RES_QUAIS_ALERGIAS,*/ pacientes.PAC_EMAIL 
                FROM $this->table, pacientes 
                WHERE $this->table.FK_PACIENTES_PAC_ID = 
                (SELECT PAC_ID FROM pacientes WHERE FK_USUARIO_COMUM_USC_ID = $id);");
            
            return $query->getRowArray();
        }

    }