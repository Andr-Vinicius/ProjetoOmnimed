<?php

    namespace App\Entities;

    use CodeIgniter\Entity\Entity;

    class ContatosSetoriais extends Entity{
        protected $attributes = [
            'CSE_ID' => null,
            'CSE_TELEFONE_CELULAR' => null,
            'CSE_TELEFONE_FIXO' => null,
            'CSE_SETOR' => null,
            'CSE_EMAIL' => null,
        ];
    }

?>