<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class FinalidadesModel extends Model {
        
        // Define a tabela e a chave primária
        protected $table = 'finalidade_remedios';
        protected $primaryKey = 'FIN_ID';

        // Define a utilização de AutoIncrement na chave primária
        protected $useAutoIncrement = true;

        // Garante que as querries no banco feitas pelo model 
        // retornarão instâncias da Entidade associada
        protected $returnType = \App\Entities\Finalidades::class;

        // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
        protected $allowedFields = ['FIN_DESCRICAO'];

        // Regras de validação de campos
        protected $validationRules = [

            'FIN_DESCRICAO' => 'required|string|min_length[3]|max_length[100]|is_unique[finalidade_remedios.FIN_DESCRICAO,FIN_ID,{FIN_ID}]',

        ];

        // Mensagens de erro baseado na validação
        protected $validationMessages = [

            'FIN_DESCRICAO' => [
                
                'is_unique' => 'O campo descrição deve ser único (valor duplicado).',
                'required' => 'O campo descrição é obrigatório.',
                'min_length' => 'O campo descrição requer no mínimo 3 caracteres.',
                'max_length' => 'O campo descrição aceita no máximo 100 caracteres.',

            ],

        ];

    }

?>