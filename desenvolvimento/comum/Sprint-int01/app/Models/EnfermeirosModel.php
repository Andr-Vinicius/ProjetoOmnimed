<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class EnfermeirosModel extends Model {
        
        // Define a tabela e a chave primária
        protected $table = 'enfermeiros';
        protected $primaryKey = 'ENF_ID';

        // Define a utilização de AutoIncrement na chave primária
        protected $useAutoIncrement = true;

        // Garante que as querries no banco feitas pelo model 
        // retornarão instâncias da Entidade associada
        protected $returnType = \App\Entities\Enfermeiros::class;

        // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
        protected $allowedFields = ['FK_FUNCIONARIOS_FUN_ID', 'FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID'];

        // Regras de validação de campos
        protected $validationRules = [

            'FK_FUNCIONARIOS_FUN_ID' => 'required',
            'FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID' => 'required',


        ];

        // Mensagens de erro baseado na validação
        protected $validationMessages = [

            'FK_FUNCIONARIOS_FUN_ID' => [
                
                'required' => 'O campo FK_FUNCIONARIOS_FUN_ID é obrigatório.',

            ],

            'FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID' => [
                
                'required' => 'O campo FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID é obrigatório.',

            ],
        ];

    }

?>