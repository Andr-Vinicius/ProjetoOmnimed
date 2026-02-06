<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class TriagensModel extends Model {
        
        // Define a tabela e a chave primária
        protected $table = 'triagens';
        protected $primaryKey = 'TRG_ID';

        // Define a utilização de AutoIncrement na chave primária
        protected $useAutoIncrement = true;

        // Garante que as querries no banco feitas pelo model 
        // retornarão instâncias da Entidade associada
        protected $returnType = \App\Entities\Triagens::class;

        // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
        protected $allowedFields = ['TRG_SINTOMAS','TRG_TABELA_DOR','TRG_PRESSAO_SISTOLICA','TRG_TEMPERATURA','TRG_PRESSAO_DIASTOLICA','TRG_DOENCAS_CRONICAS','TRG_QUAIS_DOENCAS_CRONICAS','TRG_TRATAMENTO_MEDICO','TRG_QUAIS_TRAT_MED','TRG_UTILIZA_MEDICACAO','TRG_QUAL_MEDICACAO','TRG_TEM_ALERGIA_MEDICA','TRG_QUAIS_ALERGIAS','FK_AGENDAMENTOS_AGD_ID'];

        // Regras de validação de campos
        protected $validationRules = [

            'TRG_SINTOMAS' => 'required|string|min_length[4]|max_length[255]|',
            'TRG_TABELA_DOR' => 'required|numeric|less_than[11]|greater_than[-1]',
            'TRG_PRESSAO_SISTOLICA' => 'numeric|permit_empty',
            'TRG_TEMPERATURA' => 'numeric|permit_empty',
            'TRG_PRESSAO_DIASTOLICA' => 'numeric|permit_empty',
            'TRG_DOENCAS_CRONICAS' => 'required|integer|greater_than[-1]|less_than[2]',
            'TRG_QUAIS_DOENCAS_CRONICAS' => 'string',
            'TRG_TRATAMENTO_MEDICO' => 'required|integer|greater_than[-1]|less_than[2]',
            'TRG_QUAIS_TRAT_MED' => 'string',
            'TRG_UTILIZA_MEDICACAO' => 'required|integer|greater_than[-1]|less_than[2]',
            'TRG_QUAL_MEDICACAO' => 'string',
            'TRG_TEM_ALERGIA_MEDICA' => 'required|integer|greater_than[-1]|less_than[2]',
            'TRG_QUAIS_ALERGIAS' => 'string',
            'FK_AGENDAMENTOS_AGD_ID' => 'required|numeric',

        ];

        // Mensagens de erro baseado na validação
        protected $validationMessages = [

            'TRG_SINTOMAS' => [
                
                'required' => 'O campo sintomas é obrigatório.',
                'min_length' => 'O campo sintomas requer no mínimo 4 caracteres.',
                'max_length' => 'O campo sintomas aceita no máximo 255 caracteres.',

            ],

            'TRG_TABELA_DOR' => [
                
                'required' => 'O campo tabela de dor é obrigatório.',
                'greater_than' => 'O campo tabela de dor requer que o número seja maior que -1.',
                'less_than' => 'O campo tabela de dor requer que o número seja menor que 11.',

            ],

            'TRG_DOENCAS_CRONICAS' => [
                
                'integer' => 'O atributo encaminhamento só permite os valores 0 e 1.',
                'required' => 'O campo encaminhamento é obrigatório.',
                'greater_than' => 'O atributo encaminhamento só permite os valores 0 e 1.',
                'less_than' => 'O atributo encaminhamento só permite os valores 0 e 1.',

            ],
            
            'TRG_TRATAMENTO_MEDICO' => [
                
                'integer' => 'O atributo encaminhamento só permite os valores 0 e 1.',
                'required' => 'O campo encaminhamento é obrigatório.',
                'greater_than' => 'O atributo encaminhamento só permite os valores 0 e 1.',
                'less_than' => 'O atributo encaminhamento só permite os valores 0 e 1.',

            ],
            
            'TRG_UTILIZA_MEDICACAO' => [
                
                'integer' => 'O atributo encaminhamento só permite os valores 0 e 1.',
                'required' => 'O campo encaminhamento é obrigatório.',
                'greater_than' => 'O atributo encaminhamento só permite os valores 0 e 1.',
                'less_than' => 'O atributo encaminhamento só permite os valores 0 e 1.',

            ],
            
            'TRG_TEM_ALERGIA_MEDICA' => [
                
                'integer' => 'O atributo encaminhamento só permite os valores 0 e 1.',
                'required' => 'O campo encaminhamento é obrigatório.',
                'greater_than' => 'O atributo encaminhamento só permite os valores 0 e 1.',
                'less_than' => 'O atributo encaminhamento só permite os valores 0 e 1.',

            ],

            'FK_AGENDAMENTOS_AGD_ID' => [
                
                'required' => 'O id do agendamento é necessário.',

            ],


        ];

        public function alterarStatusTriagemAgd($idAgendamento) {
            $sql = "UPDATE AGENDAMENTOS SET agd_triagem_realizada = true WHERE AGD_ID = $idAgendamento;";
    
            $query = $this->db->query($sql);
        }

        public function obterTriagemPorIdAgd(int $fkAgd ){
            $sql = "select * from TRIAGENS where FK_AGENDAMENTOS_AGD_ID = $fkAgd;";
    
            $query = $this->db->query($sql);
            $resultado = $query->getResult();
    
            return $resultado;
        }

    }

?>