<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class PrescricoesModel extends Model {
        
        // Define a tabela e a chave primária
        protected $table = 'prescricoes';
        protected $primaryKey = 'PRC_ID';

        // Define a utilização de AutoIncrement na chave primária
        protected $useAutoIncrement = true;

        // Garante que as querries no banco feitas pelo model 
        // retornarão instâncias da Entidade associada
        protected $returnType = \App\Entities\Prescricoes::class;

        // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
        protected $allowedFields = ['PRC_ID','PRC_DURACAO_TRATAMENTO','PRC_OBSERVACOES','PRC_ASSINATURA_MEDICO','PRC_DATA_EMISSAO','FK_CONSULTAS_ONLINE_CNS_ID','FK_MEDICOS_MED_ID','FK_MEDICOS_FK_FUNCIONARIOS_FUN_ID','FK_MEDICOS_FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID'];

        // Regras de validação de campos
        protected $validationRules = [

            'PRC_DURACAO_TRATAMENTO' => 'required',
            'PRC_OBSERVACOES' => 'required|string',
            'PRC_ASSINATURA_MEDICO' => 'required',
            'PRC_DATA_EMISSAO' => 'required|valid_date',
            'FK_CONSULTAS_ONLINE_CNS_ID' => 'required|integer',
            'FK_MEDICOS_MED_ID' => 'required|integer'

        ];

        // Mensagens de erro baseado na validação
        protected $validationMessages = [


            'PRC_DURACAO_TRATAMENTO' => [
                
                'required' => 'O campo duração do tratamento é obrigatório.',

            ],

            'PRC_OBSERVACOES' => [
                
                'required' => 'O campo observações é obrigatório.',

            ],

            'PRC_ASSINATURA_MEDICO' => [
                
                'required' => 'O campo de assinatura do médico é obrigatório.',

            ],

            'PRC_DATA_EMISSAO' => [
                
                'required' => 'O campo data de emissão é obrigatório.',

            ],

            'FK_CONSULTAS_ONLINE_CNS_ID' => [
                
                'required' => 'O id de consultas online cns é necessário.',

            ],

            'FK_MEDICOS_MED_ID' => [
                
                'required' => 'O id medicos_med é necessário.',

            ]


        ]
        ;
        
        public function obterPrescricaoPorIdCns(int $fkCns ){
            $sql = "select * from PRESCRICOES where FK_CONSULTAS_ONLINE_CNS_ID = $fkCns;";
    
            $query = $this->db->query($sql);
            $resultado = $query->getResult();
    
            return $resultado;
        }

        public function obterDadosPrescricoes($idConsulta){
            $sql = "SELECT 
            DISTINCT 
            PRC_ID,
            PRC_DURACAO_TRATAMENTO,
            PRC_OBSERVACOES,
            PRC_ASSINATURA_MEDICO,
            PRC_DATA_EMISSAO,
            prescricoes.FK_MEDICOS_MED_ID,
            USC_NOME,
            USC_LOGRADOURO,
            USC_NUMERO,
            USC_BAIRRO,
            USC_CIDADE
            FROM
            prescricoes,
            consultas_online,
            agendamentos,
            pacientes,
            usuario_comum
            WHERE
            prescricoes.FK_CONSULTAS_ONLINE_CNS_ID = $idConsulta AND
           	consultas_online.CNS_ID = prescricoes.FK_CONSULTAS_ONLINE_CNS_ID AND
            agendamentos.AGD_ID = consultas_online.FK_AGENDAMENTOS_AGD_ID AND
            pacientes.PAC_ID = agendamentos.FK_PACIENTES_PAC_ID AND
            usuario_comum.USC_ID = pacientes.FK_USUARIO_COMUM_USC_ID;";

            $query = $this->db->query($sql);
            $resultado = $query->getResult();
    
            return $resultado;

            return $query;
        }
    }

?>