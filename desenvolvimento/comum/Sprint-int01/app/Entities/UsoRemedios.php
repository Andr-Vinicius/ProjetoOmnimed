<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class UsoRemedios extends Entity
{

    protected $attributes = [
        'URM_ID' => null,
        'FK_FINALIDADE_REMEDIOS_FIN_ID' => null,
        'FK_REMEDIOS_RMD_ID' => null,
    ];
}
