<?php
    namespace App\Models;

    use CodeIgniter\Model;

    class EspecialidadesMedicasModel extends Model {

        protected $table = 'especialidades_medicas';
        protected $primaryKey = 'ESM_ID';

        protected $useAutoIncrement = true;

        protected $returnType = \App\Entities\EspecialidadesMedicas::class;

        protected $allowedFields = ['ESM_DESCRICAO'];

        protected $validationRules = [
            'ESM_DESCRICAO' => 'required|string|min_length[3]|max_length[200]|is_unique[especialidades_medicas.ESM_DESCRICAO]',
        ];

        protected $validationMessages = [
            'ESM_DESCRICAO' => [
                'required' => 'O campo descrição deve ser único (valor duplicado).',
                'is_unique' => 'O campo descrição é obrigatório.',
                'min_length' => 'O campo descrição requer no mínimo 3 caracteres.',
                'max_length' => 'O campo descrição aceita no máximo 200 caracteres.',
            ],
        ];
    }
?>