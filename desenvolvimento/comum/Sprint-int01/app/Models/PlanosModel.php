<?php

namespace App\Models;

use CodeIgniter\Model;

class PlanosModel extends Model{
    // Define a tabela e a chave primária
    protected $table = 'planos';
    protected $primaryKey = 'PLN_ID';

    // Define a utilização de AutoIncrement na chave primária
    protected $useAutoIncrement = true;

    // Garante que as querries no banco feitas pelo model 
    // retornarão instâncias da Entidade associada
    protected $returnType = \App\Entities\Planos::class;

    // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
    protected $allowedFields = ['PLN_INSTITUICAO', 'PLN_NOME', 'PLN_PRECO'];

    // Regras de validação de campos

    // Regex para bloquear caracteres especiais e permitir alfa numerico latino (Link: https://regex101.com/r/GN5dYF/1)

    protected $validationRules = [
        'PLN_INSTITUICAO' => 'required|string|min_length[3]|max_length[100]|regex_match[^([0-9\p{Latin}]+[\ -]?)+[a-zA-Z0-9]+$]',
        'PLN_NOME' => 'required|string|min_length[3]|max_length[100]|regex_match[^([0-9\p{Latin}]+[\ -]?)+[a-zA-Z0-9]+$]|is_unique[planos.PLN_NOME,PLN_ID,{PLN_ID}]',
        'PLN_PRECO' => 'required|decimal|min_length[1]|max_length[9]|greater_than[0]',
    ];

    // Mensagens de erro baseado na validação
    protected $validationMessages = [

        'PLN_INSTITUICAO' => [
            'required' => 'O campo instituição é obrigatório.',
            'min_length' => 'O campo instituição requer no mínimo 3 caracteres.',
            'max_length' => 'O campo instituição aceita no máximo 100 caracteres.',
            'regex_match' => 'O campo instituição possui caracteres especiais inválidos',
        ],
        'PLN_NOME' => [
            'is_unique' => 'O campo nome deve ser único (valor duplicado).',
            'required' => 'O campo nome é obrigatório.',
            'min_length' => 'O campo nome requer no mínimo 3 caracteres.',
            'max_length' => 'O campo nome aceita no máximo 100 caracteres.',
            'regex_match' => 'O campo nome possui caracteres especiais inválidos',
        ],
        'PLN_PRECO' => [
            'required' => 'O campo preço é obrigatório.',
            'min_length' => 'O campo preço requer no mínimo o valor R$1,00.',
            'max_length' => 'O campo preço aceita no máximo o valor R$999.999,99.',
            'greater_than' => 'O campo preço precisa ser maior que 0.',
        ],
    ];
}
