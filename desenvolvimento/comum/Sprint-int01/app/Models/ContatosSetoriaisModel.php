<?php

namespace App\Models;

use CodeIgniter\Model;

class ContatosSetoriaisModel extends Model{

    // Tabela que será utilizada e sua chave primária
    protected $table = 'contatos_setoriais';
    protected $primaryKey = 'CSE_ID';

    // AutoIncrement na chave primária
    protected $useAutoIncrement = true;

    // Para garantir que será retornado instâncias da Entidade correta, pelas queries
    protected $returnType = \App\Entities\ContatosSetoriais::class;

    // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
    protected $allowedFields = ['CSE_SETOR', 'CSE_EMAIL', 'CSE_TELEFONE_CELULAR', 'CSE_TELEFONE_FIXO'];

    // Regras de validação de campos
    protected $validationRules = [
        
        'CSE_SETOR' => 'required|max_length[194]|string|is_unique[contatos_setoriais.CSE_SETOR]',
        'CSE_EMAIL' => 'required|trim|string|max_length[200]|is_unique[contatos_setoriais.CSE_EMAIL, CSE_ID, {CSE_ID}]|emailValidation[contatos_setoriais.CSE_EMAIL]',
        'CSE_TELEFONE_CELULAR' => 'required|string|min_length[9]|max_length[11]|is_unique[contatos_setoriais.CSE_TELEFONE_CELULAR, CSE_ID, {CSE_ID}]|mobileValidation[contatos_setoriais.CSE_TELEFONE_CELULAR]',
        'CSE_TELEFONE_FIXO' => 'string|max_length[10]|is_unique[contatos_setoriais.CSE_TELEFONE_FIXO, CSE_ID, {CSE_ID}]|telFixoValidation[contatos_setoriais.CSE_TELEFONE_FIXO]',

    ];

    // Mensagens de erro baseado na validação
    protected $validationMessages = [
        // Finalizar as mensagens
        'CSE_SETOR' => [
            'is_unique' => ' O campo setor deve ser único (valor duplicado).',
            'required' => ' O campo setor é obrigatório.',
            'max_length' => ' O campo setor aceita no máximo 194 caracteres.',
        ],
        'CSE_EMAIL' => [
            'is_unique' => ' O campo e-mail deve ser único (valor duplicado).',
            'required' => ' O campo e-mail é obrigatório.',
            'max_length' => ' O campo e-mail aceita no máximo 200 caracteres.',
            'emailValidation' => ' Formato de e-mail inválido',
        ],
        'CSE_TELEFONE_CELULAR' => [
            'is_unique' => ' O campo telefone celular deve ser único (valor duplicado).',
            'required' => ' O campo telefone celular é obrigatório.',
            'min_length' => ' O campo telefone celular aceita no mínimo 9 caracteres.',
            'max_length' => ' O campo telefone celular aceita no máximo 11 caracteres.',
            'mobileValidation' => ' O campo telefone celular é inválido.',
        ],
        'CSE_TELEFONE_FIXO' => [
            'is_unique' => ' O campo telefone fixo deve ser único (valor duplicado).',
            'max_length' => ' O campo telefone fixo aceita no máximo 10 caracteres.',
            'telFixoValidation' => ' O campo telefone fixo é inválido',
        ],

    ];

}

?>