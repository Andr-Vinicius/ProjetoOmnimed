<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class AgendamentosModel extends Model {
        
        // Define a tabela e a chave primária
        protected $table = 'agendamentos';
        protected $primaryKey = 'AGD_ID';

        // Define a utilização de AutoIncrement na chave primária
        protected $useAutoIncrement = true;

        // Garante que as querries no banco feitas pelo model 
        // retornarão instâncias da Entidade associada
        protected $returnType = \App\Entities\Agendamentos::class;

        // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
        protected $allowedFields = ['AGD_STATUS', 'AGD_ENCAMINHAMENTOS', 'AGD_DATA', 'AGD_HORARIO', 'AGD_MEET_LINK', 'AGD_ENCAMINHAMENTO_PRESENCIAL', 
        'AGD_RETORNO', 'AGD_MOTIVO_ENCAMINHAMENTO', 'AGD_TRIAGEM_REALIZADA', 'FK_MEDICOS_MED_ID', 'FK_ESPECIALIDADES_MEDICAS_ESM_ID', 'FK_PACIENTES_PAC_ID'];

        // Regras de validação de campos
        protected $validationRules = [

            'AGD_STATUS' => 'required|integer|greater_than[-1]|less_than[3]',
            'AGD_ENCAMINHAMENTOS' => 'required|integer|greater_than[-1]|less_than[2]', //verificar o uso de bool
            'AGD_DATA' => 'required|valid_date',
            'FK_PACIENTES_PAC_ID' => 'required|integer',
            'FK_ESPECIALIDADES_MEDICAS_ESM_ID' => 'required|integer',
            'AGD_RETORNO' => 'required|integer|greater_than[-1]|less_than[2]',

        ];

        // Mensagens de erro baseado na validação
        protected $validationMessages = [

            'AGD_STATUS' => [
                
                'integer' => 'O atributo status só permite os valores 0, 1 e 2.',
                'required' => 'O atributo status é obrigatório.',
                'greater_than' => 'O atributo status só permite os valores 0, 1 e 2.',
                'less_than' => 'O atributo status só permite os valores 0, 1 e 2.',

            ],

            'AGD_ENCAMINHAMENTOS' => [
                
                'integer' => 'O atributo encaminhamento só permite os valores 0 e 1.',
                'required' => 'O campo encaminhamento é obrigatório.',
                'greater_than' => 'O atributo encaminhamento só permite os valores 0 e 1.',
                'less_than' => 'O atributo encaminhamento só permite os valores 0 e 1.',

            ],

            'AGD_DATA' => [
                
                'required' => 'O campo data é obrigatório.',
                'valid_date' => 'Insira uma data válida.',

            ],

            'FK_ESPECIALIDADES_MEDICAS_ESM_ID' => [
                
                'required' => 'O campo de especialidade médica é obrigatório.',

            ],

            'AGD_RETORNO' => [
                
                'integer' => 'O atributo retorno só permite os valores 0 e 1.',
                'required' => 'O campo retorno é obrigatório.',
                'greater_than' => 'O atributo retorno só permite os valores 0 e 1.',
                'less_than' => 'O atributo retorno só permite os valores 0 e 1.',

            ],

        ];

        public function findAllDia($dat= null) {
            $medico = 1;
            $sql = "SELECT AGD.AGD_ID, AGD.AGD_STATUS, AGD.AGD_ENCAMINHAMENTOS, AGD.AGD_DATA, AGD.AGD_HORARIO, AGD.AGD_MEET_LINK, AGD.AGD_TRIAGEM_REALIZADA, AGD.AGD_RETORNO,
                    PAC.PAC_EMAIL, USC.USC_NOME AS PAC_NOME, RES.RES_TEL_CELULAR1, RES.RES_TEL_CELULAR2, MEDUSC.USC_NOME AS MED_NOME
                    FROM AGENDAMENTOS AS AGD
                    JOIN pacientes AS PAC ON (AGD.FK_PACIENTES_PAC_ID = PAC.PAC_ID)
                    JOIN usuario_comum AS USC ON (PAC.FK_USUARIO_COMUM_USC_ID = USC.USC_ID)
                    JOIN responsaveis AS RES ON (PAC.PAC_ID = RES.RES_ID)
                    JOIN medicos AS MED ON (MED.MED_ID = AGD.FK_MEDICOS_MED_ID)
                    JOIN usuario_comum AS MEDUSC ON (MEDUSC.USC_ID = MED.MED_ID)
                    WHERE AGD.AGD_STATUS IN (2)
                    AND AGD.FK_MEDICOS_MED_ID = " . $medico . "";

            if ($dat == null || empty($dat)) {
                $sql = $sql . " AND DATE_FORMAT(AGD.AGD_DATA, '%Y-%m-%d') = CURDATE()";
            } else if ($dat != null || !empty($dat)) {
                $sql = $sql . " AND AGD.AGD_DATA = '$dat'";
            }
          /* if ($nome != null || !empty($nome)) {
                $sql = $sql . " AND USC.USC_NOME LIKE '%" . $nome . "%'";
            }*/
            $sql = $sql . " ORDER BY AGD.AGD_HORARIO";

            $query = $this->db->query($sql);
            $results = $query->getResult();
            
            return $results;
            
        }

        public function listarAgendamentosDoUsuario($idUsuario){
            $sql = "select * from AGENDAMENTOS where FK_PACIENTES_PAC_ID = $idUsuario;";
    
            $query = $this->db->query($sql);
            $resultado = $query->getResult();
    
            return $resultado;
        }

        public function triagemSolicitada( int $id ) {
            $db = db_connect();
            $query = $db->query( 'SELECT COUNT(*) AS total_registros FROM triagens WHERE FK_AGENDAMENTOS_AGD_ID = ' . $id );
            $result = $query->getRow();
            $db->close();

            return $result->total_registros > 0 ? true : false;
        }

        public function obterAgendamentosPorIdPaciente(int $idPaciente ){
            return $this->builder()->where('agendamentos' . '.' . 'FK_PACIENTES_PAC_ID', $idPaciente)->get()->getResult(\App\Entities\Agendamentos::class);
        }

        public function obterAgendamentosPorIdAgd(int $idAgd ){
            $sql = "select * from AGENDAMENTOS where AGD_ID = $idAgd;";
    
            $query = $this->db->query($sql);
            $resultado = $query->getResult();
    
            return $resultado;
        }

        public function obterAgendamentosSolicitados(){
            return $this->builder()->where('agendamentos' . '.' . 'AGD_STATUS', 1)->get()->getResult(\App\Entities\Agendamentos::class);
        }

        public function obterEmailporIddoAgendamento($idAgd){
            $sql = "select pacientes.PAC_EMAIL from pacientes, agendamentos where agendamentos.AGD_ID=$idAgd and agendamentos.FK_PACIENTES_PAC_ID=pacientes.PAC_ID";
            $query = $this->db->query($sql);
            $resultado = $query->getResult();
    
            return $resultado;
        }

    }
