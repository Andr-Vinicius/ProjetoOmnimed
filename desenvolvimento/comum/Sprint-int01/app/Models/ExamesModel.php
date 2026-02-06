<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class ExamesModel extends Model {
        
        // Define a tabela e a chave primária
        protected $table = 'exames';
        protected $primaryKey = 'EXM_ID';

        // Define a utilização de AutoIncrement na chave primária
        protected $useAutoIncrement = true;

        // Garante que as querries no banco feitas pelo model 
        // retornarão instâncias da Entidade associada
        protected $returnType = \App\Entities\Exames::class;

        // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
        protected $allowedFields = ['EXM_NOME', 'EXM_ANEXO_GUIA', 'EXM_OBS_SECRETARIO', 'EXM_AGENDAMENTO', 'EXM_AUTORIZADO', 
        'EXM_ANEXO_RESULTADO', 'EXM_OBS_PACIENTE', 'FK_PACIENTES_PAC_ID', 'FK_MEDICOS_MED_ID'];

        // Regras de validação de campos
        protected $validationRules = [

            'EXM_NOME' => 'required|string|max_length[100]',
            'EXM_ANEXO_GUIA' => 'required',
            'EXM_OBS_SECRETARIO' => 'permit_empty|string|max_length[200]',
            'EXM_AGENDAMENTO' => 'required|string|max_length[50]',
            'EXM_OBS_PACIENTE' => 'permit_empty|string|max_length[200]',
            'FK_PACIENTES_PAC_ID' => 'integer',
            'FK_MEDICOS_MED_ID' => 'integer',
        ];

        // Mensagens de erro baseado na validação
        protected $validationMessages = [   
            
            'EXM_NOME' => [
                'required' => 'O campo nome é obrigatório.',
                'max_length' => 'O campo nome aceita no máximo 100 caracteres.',
            ],
            
            'EXM_ANEXO_GUIA' => [
                'required' => 'O campo anexo guia é obrigatório.',
            ],

            'EXM_OBS_SECRETARIO' => [
                'max_length' => 'O campo observação aceita no máximo 200 caracteres.',
            ],

            'EXM_OBS_PACIENTE' => [
                'max_length' => 'O campo observação aceita no máximo 200 caracteres.',
            ],

            'EXM_AGENDAMENTO' => [
                'required' => 'O campo agendamento é obrigatório.',
                'max_length' => 'O campo agendamento aceita no máximo 50 caracteres.',
            ],

            'FK_PACIENTES_PAC_ID' => [
                'integer' => 'Erro ao receber o indentificador do paciente.'
            ],

            'FK_MEDICOS_MED_ID' => [
                'integer' => 'Nenhum médico selecionado.'
            ],

        ];

        public function obterExamePorId(int $id){

            $db = db_connect();
            $query = $this->db->query("SELECT ex.*, usc.USC_NOME AS PAC_NOME, usc2.USC_NOME AS MED_NOME FROM exames AS ex, pacientes AS pac, usuario_comum AS usc, medicos AS med, funcionarios AS fun, usuario_comum AS usc2 WHERE ex.EXM_ID = " . $id . " AND ex.FK_PACIENTES_PAC_ID = pac.PAC_ID AND pac.FK_USUARIO_COMUM_USC_ID = usc.USC_ID AND ex.FK_MEDICOS_MED_ID = med.MED_ID AND med.FK_FUNCIONARIOS_FUN_ID = fun.FUN_ID AND fun.FK_USUARIO_COMUM_USC_ID = usc2.USC_ID;");
            $results = $query->getRow();
            $db->close();

            return $results;
        }

        public function obterExamesPorIdPaciente(int $idPaciente ){
            $db = db_connect();
            $query = $this->db->query("SELECT * FROM exames WHERE FK_PACIENTES_PAC_ID = " . $idPaciente . ";");
            $results = $query->getResult();
            $db->close();

            return $results;
        }

    }

?>