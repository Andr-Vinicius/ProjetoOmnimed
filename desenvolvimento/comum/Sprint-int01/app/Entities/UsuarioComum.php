<?php

    namespace App\Entities;

    use CodeIgniter\Entity\Entity;

    class UsuarioComum extends Entity{
        protected $attributes = [
            'USC_ID' => null,
            'USC_NOME' => null,
            'USC_RG' => null,
            'USC_LOGRADOURO' => null,
            'USC_NUMERO' => null,
            'USC_CPF' => null,
            'USC_ORGAO_EMISSOR' => null,
            'USC_SEXO' => null,
            'USC_SENHA' => null,
            'USC_CIDADE' => null,
            'USC_BAIRRO' => null,
            'USC_DATA_NASCIMENTO' => null,
            'USC_ESTADO' => null,
            'USC_HASH_REC' => null,
            'USC_UPDATE_AT' => null,
        ];
    }

?>