<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class RemediosPrescricoesModel extends Model {
        
        // Define a tabela e a chave primária
        protected $table = 'remedios_prescricoes';
        protected $primaryKey = 'RMD_ID';

        // Define a utilização de AutoIncrement na chave primária
        protected $useAutoIncrement = true;

        // Garante que as querries no banco feitas pelo model 
        // retornarão instâncias da Entidade associada
        protected $returnType = \App\Entities\RemediosPrescricoes::class;

        // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
        protected $allowedFields = ['RMD_ESQUEMA_POSOLOGICO','FK_PRESCRICOES_PRC_ID', 'FK_REMEDIOS_RMD_ID'];

        // Regras de validação de campos
        protected $validationRules = [

          'RMD_ESQUEMA_POSOLOGICO' => 'required|string|min_length[2]|max_length[60]',
          'FK_PRESCRICOES_PRC_ID' => 'numeric|required',
          'FK_REMEDIOS_RMD_ID' => 'numeric|required',

        ];

        // Mensagens de erro baseado na validação
        protected $validationMessages = [

            'RMD_ESQUEMA_POSOLOGICO' => [
                
                'required' => 'O campo "esquema posológico"  é obrigatório.',
                'min_length' => 'O campo "esquema posológico" requer no mínimo 2 caracteres.',
                'max_length' => 'O campo "esquema posológico" aceita no máximo 60 caracteres.',

            ],

            'FK_PRESCRICOES_PRC_ID' => [
                
              'required' => 'O id da "prescrição" é necessário.',

            ],

            'FK_REMEDIOS_RMD_ID' => [
                
                'required' => 'O id do "remédio" é necessário.',

            ],


        ];
        
        public function obterRemediosDaPrc($idPrc) {
            $sql = "SELECT DISTINCT 
            RMD_NOME,
            RMP_ESQUEMA_POSOLOGICO
        FROM remedios_prescricoes,
            remedios
        WHERE 
        FK_PRESCRICOES_PRC_ID = 1 AND
        remedios.RMD_ID = FK_REMEDIOS_RMD_ID;";
            $query = $this->db->query($sql);
            $resultado = $query->getResult();
    
            return $resultado;
        }
        
    }

?>