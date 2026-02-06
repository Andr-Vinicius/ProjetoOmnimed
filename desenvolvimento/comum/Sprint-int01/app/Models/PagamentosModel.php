<?php

namespace App\Models;

use CodeIgniter\Model;

class PagamentosModel extends Model
{

    // Define a tabela e a chave primária
    protected $table = 'pagamentos';
    protected $primaryKey = 'PGD_ID';

    // Define a utilização de AutoIncrement na chave primária
    protected $useAutoIncrement = true;

    // Garante que as querries no banco feitas pelo model 
    // retornarão instâncias da Entidade associada
    protected $returnType = \App\Entities\Pagamentos::class;

    // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
    protected $allowedFields = ['PGD_VENCIMENTO', 'PGD_DATA_PAGAMENTO', 'PGD_VALOR_TOTAL', 'PGD_QUANTIDADE_DEPENDENTES', 'PGD_VALOR_PLANO', 'FK_PACIENTES_PAC_ID'];

    // Regras de validação de campos
    protected $validationRules = [

        'PGD_VENCIMENTO' => 'required|valid_date',
        'PGD_DATA_PAGAMENTO' => 'valid_date|permit_empty',
        'PGD_VALOR_TOTAL' => 'required|decimal|greater_than[0]',
        'PGD_QUANTIDADE_DEPENDENTES' => 'required|integer',
        'PGD_VALOR_PLANO' => 'required|decimal|greater_than[0]',
        'FK_PACIENTES_PAC_ID' => 'required|integer',

    ];

    // Mensagens de erro baseado na validação
    protected $validationMessages = [

        'PGD_VENCIMENTO' => [

            'required' => 'O campo vencimento é obrigatório.',
            'valid_date' => 'O campo vencimento deve ser uma data.',

        ],

        'PGD_DATA_PAGAMENTO' => [

            'valid_date' => 'O campo data de pagamento deve ser uma data ou nulo.',

        ],

        'PGD_VALOR_TOTAL' => [

            'required' => 'O campo valor total é obrigatório.',
            'decimal' => 'O campo valor total deve ser um número decimal.',
            'greater_than' => 'O campo valor total deve ser maior que 0.',

        ],

        'PGD_VALOR_PLANO' => [

            'required' => 'O campo valor do plano é obrigatório.',
            'decimal' => 'O campo valor do plano deve ser um número decimal.',
            'greater_than' => 'O campo valor do plano deve ser maior que 0.',

        ],

        'PGD_QUANTIDADE_DEPENDENTES' => [

            'required' => 'O campo quantidade de dependentes é obrigatório.',
            'integer' => 'O campo quantidade de dependentes deve ser um número inteiro.',

        ],

    ];

    public function historicoPaciente(int $id)
    {

        $db = db_connect();
        $query = $db->query('SELECT pp.* FROM pagamentos AS pp, pacientes AS p, usuario_comum AS uc WHERE pp.FK_PACIENTES_PAC_ID = p.PAC_ID AND p.FK_USUARIO_COMUM_USC_ID = uc.USC_ID AND uc.USC_ID = ' . $id . ';');
        $results = $query->getResult();
        $db->close();

        return $results;
    }

    public function pacientesInadimplentes()
    {

        $db = db_connect();
        $query = $db->query('SELECT pp.*, uc.USC_NOME, uc.USC_CPF, pl.PLN_NOME, uc.USC_ID FROM pagamentos AS pp, pacientes AS p, usuario_comum AS uc, planos AS pl  WHERE pp.FK_PACIENTES_PAC_ID = p.PAC_ID AND p.FK_USUARIO_COMUM_USC_ID = uc.USC_ID AND p.PAC_STATUS = 2 AND pl.PLN_ID = p.FK_PLANOS_PLN_ID');
        $results = $query->getResult();
        $db->close();

        return $results;
    }
}
