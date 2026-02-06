<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class BeneficiosModel extends Model {
        // Define a tabela e a chave primária
        protected $table = 'beneficios';
        protected $primaryKey = 'BNF_ID';
    
        // Define a utilização de AutoIncrement na chave primária
        protected $useAutoIncrement = true;
    
        // Garante que as querries no banco feitas pelo model 
        // retornarão instâncias da Entidade associada
        protected $returnType = \App\Entities\Beneficios::class;
    
        // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
        protected $allowedFields = ['BNF_DESCRICAO'];
    
        // Regras de validação de campos
        protected $validationRules = [
            'BNF_DESCRICAO' => 'required|string|min_length[0]|max_length[100]',
        ];
    
        // Mensagens de erro baseado na validação
        protected $validationMessages = [
    
            'BNF_DESCRICAO' => [
                'required' => 'O campo benefício é obrigatório.',
                'min_length' => 'O campo benefício requer no mínimo tamanho 0.',
                'max_length' => 'O campo benefício aceita no máximo tamanho 100.',
            ],
        ];
    }
?>