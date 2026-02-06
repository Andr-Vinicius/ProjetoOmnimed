<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class EspecialistasModel extends Model {
        
        // Define a tabela e a chave primária
        protected $table = 'especialistas';
        protected $primaryKey = 'ESP_ID';

        // Define a utilização de AutoIncrement na chave primária
        protected $useAutoIncrement = true;

        // Garante que as querries no banco feitas pelo model 
        // retornarão instâncias da Entidade associada
        protected $returnType = \App\Entities\Especialistas::class;

        // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
        protected $allowedFields = ['FK_MEDICOS_MED_ID', 'FK_MEDICOS_FK_FUNCIONARIOS_FUN_ID', 'FK_MEDICOS_FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID', 'FK_ESPECIALIDADES_MEDICAS_ESM_ID',];

        // Regras de validação de campos
        protected $validationRules = [

        ];

        // Mensagens de erro baseado na validação
        protected $validationMessages = [

        ];

        public function obterEspecialistaPorIdEspecialidade($idEspecialidade){
            return $this->builder()->where('especialistas' . '.' . 'FK_ESPECIALIDADES_MEDICAS_ESM_ID', $idEspecialidade)->get()->getResult(\App\Entities\Especialistas::class);
        }

    }
