<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class PagamentosMedicosModel extends Model {
        
        // Define a tabela e a chave primária
        protected $table = 'pagamentos_medicos';
        protected $primaryKey = 'PGM_ID';

        // Define a utilização de AutoIncrement na chave primária
        protected $useAutoIncrement = true;

        // Garante que as querries no banco feitas pelo model 
        // retornarão instâncias da Entidade associada
        protected $returnType = \App\Entities\Pagamentos::class;

        // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
        protected $allowedFields = [ 'PGM_DATA_PAGAMENTO', 'PGM_SALARIO', 'PGM_VALOR_COMISSAO', 'PGM_VALOR_TOTAL', 'PGM_DATA_PAGAMENTO_REALIZADO', 'PGM_CONSULTAS_MES', 'FK_MEDICOS_MED_ID' ];

        // Regras de validação de campos
        protected $validationRules = [

            'PGM_DATA_PAGAMENTO' => 'required|valid_date',
            'PGM_SALARIO' => 'required|decimal|greater_than[0]',
            'PGM_VALOR_COMISSAO' => 'required|decimal',
            'PGM_VALOR_TOTAL' => 'required|decimal|greater_than[0]',
            'PGM_DATA_PAGAMENTO_REALIZADO' => 'valid_date',
            'PGM_CONSULTAS_MES' => 'required|integer',
            'FK_MEDICOS_MED_ID' => 'required|integer',

        ];

        // Mensagens de erro baseado na validação
        protected $validationMessages = [

            'PGM_DATA_PAGAMENTO' => [
                
                'required' => 'O campo data de pagamento é obrigatório.',
                'valid_date' => 'O campo data de pagamento deve ser uma data.',

            ],

            'PGM_SALARIO' => [
                
                'required' => 'O campo salário é obrigatório.',
                'decimal' => 'O campo salário deve ser um número decimal.',
                'greater_than' => 'O campo salário deve ser maior que 0.',

            ],

            'PGM_VALOR_COMISSAO' => [
                
                'required' => 'O campo valor de comissão é obrigatório.',
                'decimal' => 'O campo valor de comissão deve ser um número decimal.',

            ],

            'PGM_VALOR_TOTAL' => [
                
                'required' => 'O campo valor total é obrigatório.',
                'decimal' => 'O campo valor total deve ser um número decimal.',
                'greater_than' => 'O campo valor total deve ser maior que 0.',

            ],

            'PGM_DATA_PAGAMENTO_REALIZADO' => [
                
                'valid_date' => 'O campo data de pagamento deve ser uma data ou nulo.',

            ],

            'PGM_CONSULTAS_MES' => [
                
                'required' => 'O campo consultas no mês é obrigatório.',
                'integer' => 'O campo consultas no mês deve ser um número inteiro.',

            ],

        ];

        public function historicoMedico(int $id){

            $db = db_connect();
            $query = $db->query( 'SELECT ppM.* FROM pagamentos_medicos AS ppM, medicos AS m, funcionarios AS fun WHERE ppM.FK_MEDICOS_MED_ID = m.MED_ID AND m.FK_FUNCIONARIOS_FUN_ID = fun.FUN_ID AND fun.FUN_ID = ' . $id . ';' );
            $results = $query->getResult();
            $db->close();
    
            return $results;
            
        }

        public function medicosInadimplentes() {

            $db = db_connect();
            $query = $db->query( 'SELECT ppM.*, uc.USC_NOME, uc.USC_CPF, m.FK_FUNCIONARIOS_FUN_ID, fun.FUN_PRONTUARIO FROM pagamentos_medicos AS ppM, medicos AS m, funcionarios AS fun, usuario_comum AS uc WHERE ppM.PGM_DATA_PAGAMENTO_REALIZADO IS NULL AND ppM.FK_MEDICOS_MED_ID = m.MED_ID AND fun.FK_USUARIO_COMUM_USC_ID = uc.USC_ID AND m.FK_FUNCIONARIOS_FUN_ID = fun.FUN_ID');
            $results = $query->getResult();
            $db->close();
    
            return $results;

        }
    }

?>