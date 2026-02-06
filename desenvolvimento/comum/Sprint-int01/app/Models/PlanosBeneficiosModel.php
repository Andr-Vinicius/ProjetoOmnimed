<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class PlanosBeneficiosModel extends Model {
        // Define a tabela e a chave primária
        protected $table = 'planos_beneficios';
        protected $primaryKey = 'PBN_ID';
    
        // Define a utilização de AutoIncrement na chave primária
        protected $useAutoIncrement = true;
    
        // Garante que as querries no banco feitas pelo model 
        // retornarão instâncias da Entidade associada
        protected $returnType = \App\Entities\PlanosBeneficios::class;
    
        // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
        protected $allowedFields = ['PBN_VALOR_BENEFICIO', 'FK_BENEFICIOS_BNF_ID', 'FK_PLANOS_PLN_ID'];
    
        // Regras de validação de campos
        protected $validationRules = [
            'PBN_VALOR_BENEFICIO' => 'required|integer|min_length[0]|max_length[4]|greater_than[0]',
            'FK_BENEFICIOS_BNF_ID' => 'required|integer|min_length[0]|max_length[11]',
            'FK_PLANOS_PLN_ID' => 'required|integer|min_length[0]|max_length[11]',
        ];
    
        // Mensagens de erro baseado na validação
        protected $validationMessages = [
    
            'PBN_VALOR_BENEFICIO' => [
                'required' => 'O campo valor benefício é obrigatório.',
                'min_length' => 'O campo valor benefício requer no mínimo tamanho 0.',
                'max_length' => 'O campo valor benefício aceita no máximo tamanho 4.',
                'greater_than' => 'O campo valor benefício precisa ser maior que 0.',
            ],
            'FK_BENEFICIOS_BNF_ID' => [
                'required' => 'A chave estrangeira benefícios id é obrigatória.',
                'min_length' => 'A chave estrangeira benefícios id requer no mínimo tamanho 0.',
                'max_length' => 'A chave estrangeira benefícios id aceita no máximo tamanho 11.',
            ],
            'FK_PLANOS_PLN_ID' => [
                'required' => 'A chave estrangeira planos id é obrigatória.',
                'min_length' => 'A chave estrangeira planos id requer no mínimo tamanho 0.',
                'max_length' => 'A chave estrangeira planos id aceita no máximo tamanho 11.',
            ],
        ];

        public function findAllById( int $id ) {
            $db = db_connect();
            $query = $db->query( 'SELECT * FROM '. $this->table.' WHERE FK_PLANOS_PLN_ID = ' . $id );
            $results = $query->getResult();
            $db->close();
    
            return $results;
            
        }

        public function contarListagem( int $id ) {
            $db = db_connect();
            $query = $db->query( 'SELECT COUNT(*) AS total_registros FROM '. $this->table .' WHERE FK_PLANOS_PLN_ID = ' . $id );
            $result = $query->getRow();
            $db->close();

            return $result->total_registros;
        }
    }
?>