<?php

namespace App\Models;

use CodeIgniter\Model;

class UsoRemediosModel extends Model {

    protected $table = 'uso_remedio';

    protected $primaryKey = 'URM_ID';

    protected $useAutoIncrement = true;

    protected $returnType = \App\Entities\UsoRemedios::class;

    protected $allowedFields = [
        'FK_FINALIDADE_REMEDIOS_FIN_ID',
        'FK_REMEDIOS_RMD_ID'
    ];

    protected $validationrules = [
        'FK_FINALIDADE_REMEDIOS_FIN_ID' => 'required|integer',
        'FK_REMEDIOS_RMD_ID' => 'required|integer',
    ];

    protected $validationMessages = [

        'FK_FINALIDADE_REMEDIOS_FIN_ID' => [

            'required' => 'Algo deu errado. Recarregue a página e tente novamente.',
            'integer' => 'Algo deu errado. Recarregue a página e tente novamente.',

        ],

        'FK_REMEDIOS_RMD_ID' => [

            'required' => 'Algo deu errado. Recarregue a página e tente novamente.',
            'integer' => 'Algo deu errado. Recarregue a página e tente novamente.',

        ],

    ];

    public function findAllById( int $id ) {
        $db = db_connect();
        $query = $db->query( 'SELECT * FROM '. $this->table.' WHERE FK_REMEDIOS_RMD_ID = ' . $id );
        $results = $query->getResult();
        $db->close();

        return $results;
        
    }
}
?>