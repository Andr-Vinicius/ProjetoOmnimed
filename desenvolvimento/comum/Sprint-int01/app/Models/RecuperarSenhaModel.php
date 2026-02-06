<?php

namespace App\Models;

use CodeIgniter\Model;

class RecuperarSenhaModel extends Model{

    // Verificar prontuario do funcionario
    public function verificarProntuario($prontuario){
        $builder = $this->db->table('funcionarios');
        $builder->select("FUN_PRONTUARIO");
        $builder->where('FUN_PRONTUARIO', $prontuario);

        $result = $builder->get();
        if( count($result->getResultArray()) == 1 ){
            return $result->getRowArray();
        }else{
            return false;
        }
    }

    // Verificar prontuario do paciente
    public function verificarEmail($email){
        $builder = $this->db->table('pacientes');
        $builder->select("PAC_EMAIL, USC_HASH_REC, USC_NOME");
        $builder->where('PAC_EMAIL', $email);
        $builder->join('usuario_comum', 'USC_ID = FK_USUARIO_COMUM_USC_ID');

        $result = $builder->get();
        if( count($result->getResultArray()) == 1 ){
            return $result->getRowArray();
        }else{
            return false;
        }
    }

    // Atualizacao do campo de recuperacao de senha
    public function updatedAt($hash)
    {
        $builder = $this->db->table('usuario_comum');
        $builder->where('USC_HASH_REC', $hash);
        $builder->update(['USC_UPDATE_AT' => date('Y-m-d h:i:s')]);

        if( $this->db->affectedRows() == 1 ){
            return true;
        }else{
            return false;
        }
    }

}

?>