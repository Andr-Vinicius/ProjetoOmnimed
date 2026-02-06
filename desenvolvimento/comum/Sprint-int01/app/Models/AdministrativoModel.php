<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class AdministrativoModel extends Model {
        
        // Define a tabela e a chave primária
        protected $table = 'administrativo';
        protected $primaryKey = 'ADM_ID';

        // Define a utilização de AutoIncrement na chave primária
        protected $useAutoIncrement = true;

        // Garante que as querries no banco feitas pelo model 
        // retornarão instâncias da Entidade associada
        protected $returnType = \App\Entities\Administrativo::class;

        // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
        protected $allowedFields = ['ADM_FUNCAO', 'ADM_DATA_DEMISSAO', 'ADM_DATA_ADMISSAO', 'ADM_CLINICA', 'ADM_SALARIO', 'ADM_CRM', 'ADM_TELEFONE_CELULAR',
        'FK_FUNCIONARIOS_FUN_ID',];

        // Regras de validação de campos is_unique[administrativo.ADM_TELEFONE_CELULAR,ADM_ID{ADM_ID}]
        protected $validationRules = [

            'ADM_DATA_ADMISSAO' => 'required',
            'ADM_SALARIO' => 'required|numeric|min_length[3]',
            'ADM_CRM' => 'numeric|max_length[20]|is_unique[administrativo.ADM_CRM,ADM_ID,{ADM_ID}]',
            'ADM_TELEFONE_CELULAR' => 'required|numeric|min_length[10]|max_length[11]|is_unique[administrativo.ADM_TELEFONE_CELULAR,ADM_ID,{ADM_ID}]',
            'FK_FUNCIONARIOS_FUN_ID' => 'required|integer',
            'FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID' => 'required|integer',

        ];

        // Mensagens de erro baseado na validação
        protected $validationMessages = [

            'ADM_DATA_ADMISSAO' => [
                
                'required' => 'O campo data de admissão é obrigatório.',
                'valid_date' => 'O campo data de admissão deve estar no formato adequado.',

            ],

            'ADM_SALARIO' => [
                
                'numeric' => 'O campo salário deve ser númerico.',
                'required' => 'O campo salário é obrigatório.',
                'min_length' => 'O campo salário requer no mínimo 3 caracteres.',

            ],

            'ADM_CRM' => [
                
                'is_unique' => 'O campo CRM deve ser único (valor duplicado).',
                'numeric' => 'O campo CRM deve ser númerico.',
                'min_length' => 'O campo CRM requer no mínimo 4 caracteres.',
                'max_length' => 'O campo CRM aceita no máximo 20 caracteres.',

            ],

            'ADM_TELEFONE_CELULAR' => [
                
                'is_unique' => 'O campo telefone celular deve ser único (valor duplicado).',
                'required' => 'O campo telefone celular é obrigatório.',
                'numeric' => 'O campo telefone celular deve ser númerico.',
                'min_length' => 'O campo telefone celular requer no mínimo 10 caracteres.',
                'max_length' => 'O campo telefone celular aceita no máximo 15 caracteres.',

            ],


        ];

        
        public function obterADMPorId(int $id){
            $query = $this->db->query("SELECT $this->table.ADM_ID FROM $this->table WHERE $this->table.FK_FUNCIONARIOS_FUN_ID = $id");

            $results = $query->getResult();
 
           
            return $results[0]->ADM_ID;
  
        }

    }

?>