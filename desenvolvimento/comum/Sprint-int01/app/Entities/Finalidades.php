<?php

    namespace App\Entities;

    use CodeIgniter\Entity\Entity;

    class Finalidades extends Entity {

        // Define os atributos desta entidade. Nomes igual ao do banco
        protected $attributes = [

            'FIN_ID' => null,
            'FIN_DESCRICAO' => null,

        ];

    }

?>