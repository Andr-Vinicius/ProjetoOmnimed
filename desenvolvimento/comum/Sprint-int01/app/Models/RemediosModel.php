<?php

namespace App\Models;

use CodeIgniter\Model;

class RemediosModel extends Model {

    protected $table = 'remedios';

    protected $primaryKey = 'RMD_ID';

    protected $useAutoIncrement = true;

    protected $returnType = \App\Entities\Remedios::class;

    protected $allowedFields = [
        'RMD_NOME',
        'RMD_VIA_DOSAGEM',
        'RMD_INDICACAO',
        'RMD_CONTRAINDICACAO',
        'RMD_DOSAGEM',
        'RMD_QUANTIDADE',
        'RMD_DISPONIVEL',
        'FK_FORMAS_FARMACEUTICAS_FRM_ID'];

    protected $validationRules = [
        'RMD_NOME' => 'required|string|min_length[4]|max_length[100]|is_unique[remedios.RMD_NOME,RMD_ID,{RMD_ID}]',
        'RMD_VIA_DOSAGEM' => 'required|integer|min_length[1]|max_length[11]',
        'RMD_INDICACAO' => 'required|string|max_length[500]|',
        'RMD_CONTRAINDICACAO' => 'required|string|max_length[500]',
        'RMD_DOSAGEM' => 'required|integer|min_length[1]|max_length[4]|greater_than[0]',
        'RMD_QUANTIDADE' => 'integer',
        'RMD_DISPONIVEL' => 'integer',
        'FK_FORMAS_FARMACEUTICAS_FRM_ID' => 'required|integer',
    ];

    protected $validationMessages = [

        'RMD_NOME' => [

            'is_unique' => 'O campo nome deve ser único (valor duplicado).',
            'required' => 'O campo nome é obrigatório.',
            'min_length' => 'O campo nome requer no mínimo 4 caracteres.',
            'max_length' => 'O campo nome aceita no máximo 100 caracteres.',
        ],

        'RMD_VIA_DOSAGEM' => [

            'required' => 'O campo via de dosagem é obrigatório.',
            'integer' => 'O campo via de dosagem só aceita números.',
        ],

        'RMD_INDICACAO' => [

            'required' => 'O campo indicação é obrigatório.',
            'max_length' => 'O campo indicação aceita no máximo 500 caracteres.',
        ],

        'RMD_CONTRAINDICACAO' => [

            'required' => 'O campo contraindicação é obrigatório.',
            'max_length' => 'O campo contraindicação aceita no máximo 500 caracteres.',
        ],

        'RMD_DOSAGEM' => [

            'required' => 'O campo dosagem é obrigatório.',
            'min_length' => 'O campo dosagem requer no mínimo 1 caracteres.',
            'max_length' => 'O campo dosagem aceita no máximo 4 caracteres.',
            'greater_than' => 'O campo dosagem precisa ser maior que 0.',
        ],

        'RMD_QUANTIDADE' => [

            'integer' => 'O campo quantidade só aceita números.',
        ],

        'RMD_DISPONIVEL' => [

            'integer' => 'O campo disponível só aceita números.',
        ],

    ];

    //Função para a página de visualziação de remédios disponíveis
    public function listagemRemediosDisponiveis(){
        $sql = "SELECT rp.RMP_ESQUEMA_POSOLOGICO, r.RMD_ID, r.RMD_NOME, r.RMD_QUANTIDADE, r.RMD_DISPONIVEL, r.RMD_INDICACAO, r.RMD_CONTRAINDICACAO FROM remedios_prescricoes AS rp, remedios AS r WHERE rp.FK_REMEDIOS_RMD_ID = r.RMD_ID;";
        $db = db_connect();
        $query = $db->query($sql);
        $results = $query->getResult();
        $db->close();
        return $results;
    }

}
?>