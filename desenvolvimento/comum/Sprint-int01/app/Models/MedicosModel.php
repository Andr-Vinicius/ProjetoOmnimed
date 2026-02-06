<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class MedicosModel extends Model {
        
        // Define a tabela e a chave primária
        protected $table = 'medicos';
        protected $primaryKey = 'MED_ID';

        // Define a utilização de AutoIncrement na chave primária
        protected $useAutoIncrement = true;

        // Garante que as querries no banco feitas pelo model 
        // retornarão instâncias da Entidade associada
        protected $returnType = \App\Entities\Medicos::class;

        // Campos presentes na tabela. O campo de chave primária NÃO deve ser listada aqui
        protected $allowedFields = ['FK_FUNCIONARIOS_FUN_ID', 'FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID'];

        // Regras de validação de campos
        protected $validationRules = [

            'FK_FUNCIONARIOS_FUN_ID' => 'required',
            'FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID' => 'required',


        ];

        // Mensagens de erro baseado na validação
        protected $validationMessages = [

            'FK_FUNCIONARIOS_FUN_ID' => [
                
                'required' => 'O campo FK_FUNCIONARIOS_FUN_ID é obrigatório.',

            ],

            'FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID' => [
                
                'required' => 'O campo FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID é obrigatório.',

            ],
        ];

        public function getNomeMedicoPorId($idMedico){
            $retornoMedico = $this->verificaridMedico($idMedico);
            
            $idFuncionarioMedico = $retornoMedico[0]['FK_FUNCIONARIOS_FUN_ID'];
            $retornoFuncionarioMedico = $this->verificarIdFuncionarioMedico($idFuncionarioMedico);

            $idUsuarioComumFuncionarioMedico = $retornoFuncionarioMedico[0]['FK_USUARIO_COMUM_USC_ID'];
            //$retornoUsuarioComumFuncionarioMedico = $this->verificarIdUsuarioComumFuncionarioMedico($idUsuarioComumFuncionarioMedico);

            $sql = 'SELECT USC_NOME FROM usuario_comum WHERE USC_ID = "'.$idUsuarioComumFuncionarioMedico.'"';
            $select = $this->db->query($sql);

            $user = $select->getResultArray();
            return $user[0]['USC_NOME'];
        }

        public function verificarIdMedico($idMedico){
            $sql = 'SELECT * FROM medicos WHERE MED_ID = "'.$idMedico.'"';
            $select = $this->db->query($sql);

            return $select->getResultArray();
        }

        public function verificarIdFuncionarioMedico($idFuncionarioMedico){
            $sql = 'SELECT * FROM funcionarios WHERE FUN_ID = "'.$idFuncionarioMedico.'"';
            $select = $this->db->query($sql);

            return $select->getResultArray();
        }

        public function verificarIdUsuarioComumFuncionarioMedico($idUsuarioComumFuncionarioMedico){
            $sql = 'SELECT * FROM usuario_comum WHERE USC_ID = "'.$idUsuarioComumFuncionarioMedico.'"';
            $select = $this->db->query($sql);

            return $select->getResultArray();
        }

        public function dadosDeTodosMedicos()
        {
            $query = $this->db->query("SELECT 
            uc.USC_ID, uc.USC_NOME, uc.USC_DATA_NASCIMENTO, uc.USC_CPF, 
            $this->table.MED_ID, $this->table.FK_FUNCIONARIOS_FUN_ID,
            fun.FUN_PRONTUARIO, fun.FUN_CATEGORIA
            FROM usuario_comum AS uc, $this->table, funcionarios AS fun
            WHERE $this->table.FK_FUNCIONARIOS_FUN_ID = fun.FUN_ID
            AND fun.FK_USUARIO_COMUM_USC_ID = uc.USC_ID");
            
            return $query->getResult();
        }

        public function obterMedico($idMedico){
            $sql = "SELECT 
            DISTINCT
            MED_ID,
            USC_NOME
            FROM
            medicos as med,
            usuario_comum as uc,
            funcionarios as fun
            WHERE
            med.MED_ID = $idMedico AND
            fun.FUN_ID = med.FK_FUNCIONARIOS_FUN_ID AND
            uc.USC_ID = fun.FK_USUARIO_COMUM_USC_ID;";
    
            $query = $this->db->query($sql);
            $resultado = $query->getResult();
    
            return $resultado;
        }

        public function obterMedicoIdPorProntuario($prontuario){
            $sql = "SELECT med.MED_ID FROM medicos AS med, funcionarios as fun WHERE fun.FUN_PRONTUARIO = '$prontuario' AND med.FK_FUNCIONARIOS_FUN_ID = fun.FUN_ID; ";
    
            $query = $this->db->query($sql);
            $resultado = $query->getResult();
    
            return $resultado[0]->MED_ID;
        }

    }

?>