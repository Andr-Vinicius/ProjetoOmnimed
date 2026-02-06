<?php

    namespace App\Models;

    use CodeIgniter\Model;
    
    class ValoresDependentesModel extends Model {
        // Define a tabela e a chave primária
        protected $table = 'valores_dependentes';
        protected $primaryKey = 'VPD_ID';
    
        // Define a utilização de AutoIncrement na chave primária
        protected $useAutoIncrement = true;
    
        // Garante que as querries no banco feitas pelo model 
        // retornarão instâncias da Entidade associada
        protected $returnType = \App\Entities\ValoresDependentes::class;
    
        // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
        protected $allowedFields = ['VPD_IDADE_MAXIMA', 'VPD_IDADE_MINIMA', 'VPD_VALOR', 'FK_PLANOS_PLN_ID'];
    
        // Regras de validação de campos
        protected $validationRules = [
            'VPD_IDADE_MAXIMA' => 'required|integer|min_length[0]|max_length[3]',
            'VPD_IDADE_MINIMA' => 'required|integer|min_length[0]|max_length[3]',
            'VPD_VALOR' => 'required|decimal|min_length[0]|max_length[6.2]',
            'FK_PLANOS_PLN_ID' => 'required|integer|min_length[0]|max_length[11]',
        ];
    
        // Mensagens de erro baseado na validação
        protected $validationMessages = [
    
            'VPD_IDADE_MAXIMA' => [
                'required' => 'O campo idade maxima é obrigatório.',
                'min_length' => 'O campo idade maxima requer no mínimo tamanho 0.',
                'max_length' => 'O campo idade maxima aceita no máximo tamanho 3.',
            ],
            'VPD_IDADE_MINIMA' => [
                'required' => 'O campo idade minima é obrigatória.',
                'min_length' => 'O campo idade minima requer no mínimo tamanho 0.',
                'max_length' => 'O campo idade minima aceita no máximo tamanho 3.',
            ],
            'VPD_VALOR' => [
                'required' => 'O campo valor é obrigatória.',
                'min_length' => 'O campo valor requer no mínimo tamanho 0.',
                'max_length' => 'O campo valor aceita no máximo tamanho 6,2.',
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
    }
?>