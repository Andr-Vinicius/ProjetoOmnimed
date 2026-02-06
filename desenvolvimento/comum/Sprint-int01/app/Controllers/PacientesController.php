<?php

namespace App\Controllers;

use App\Entities\Pacientes;
use App\Models\PacientesModel;
use App\Entities\UsuarioComum;
use App\Models\UsuarioComumModel;
use App\Entities\Responsaveis;
use App\Models\ResponsaveisModel;


class PacientesController extends BaseController {

    //Views
    public function novo() {
        return view('/pacientes/create.php');
    }

    public function listagem() {
        return view('/pacientes/list.php');
    }

    public function logado(){
        return view('/pacientes/view_pacienteLogado.php');
    }

    public function editar( $id ) {
        return view('/pacientes/edit.php', ['id' => $id,]);
    }

    //Funções
    public function salvar() {

        function mensagemErro(){
            echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta";
            die();           
        }

        function validaSenha($senha) {
            if(preg_match('/[a-z]/', $senha) && 
            preg_match('/[A-Z]/', $senha) && 
            preg_match('/[0-9]/', $senha)){
                return true;
            }
        }        

        $data = $this->request->getPost();

        try{

            // Validação da Senha
            if( !isset($data['USC_SENHA']) ){
                mensagemErro();
            }else{
                if( (strlen($data['USC_SENHA'])  < 8 || strlen($data['USC_SENHA']) > 200 )  ||
                validaSenha($data['USC_SENHA']) == false){
                    mensagemErro();
                }
            }
        
            $usuario = new UsuarioComum();
            $senha = $data['USC_SENHA'];

            $usuario->fill($data);
            
            $usuario->USC_HASH_REC = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'.time()));
            $usuario->USC_SENHA = password_hash($senha, PASSWORD_DEFAULT);
            $usuarioModel = new UsuarioComumModel();
    
            if($usuarioModel->save( $usuario ) === false ) {
                foreach ( $usuarioModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }
    
                return;
            } 
    
            $paciente = new Pacientes();
            $paciente->fill($data);
    
            $paciente->PAC_EMAIL = $data['PAC_EMAIL'];
            // Status na hora da criação, para indicar que ele está inativo e não atrelado a nenhum plano
            $paciente->PAC_STATUS = 3;
            $paciente->FK_PLANOS_PLN_ID = 1;
    
            $idUsuario = (string) $usuarioModel->getInsertID();
            $paciente->FK_USUARIO_COMUM_USC_ID = $idUsuario;
    
            $pacienteModel = new PacientesModel();
            
            if($pacienteModel->save( $paciente ) === false ) {
                foreach ( $pacienteModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }
    
                return;
            } 
    
            $responsavel = new Responsaveis();
            $responsavel->fill($data);
            
            $idPaciente = (string) $pacienteModel->getInsertID();
    
            $responsavel->FK_PACIENTES_PAC_ID = $idPaciente;

            $responsavel->RES_TEL_CELULAR1 = $data['RES_TEL_CELULAR1'];
           
            $responsavelModel = new ResponsaveisModel();
    
            if($responsavelModel->save( $responsavel ) === false ) {
                foreach ( $responsavelModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }
    
               return;
            }else{
                echo "OK";
            } 
        }catch(\Exception $e){
            echo $e;
        } 

    }

    public function atualizar($id){

        $data = $this->request->getPost();
        
        try{
            $usuario = new UsuarioComum();

            $senha = $data['USC_SENHA'];

            $usuario->fill($data);

            $usuario->USC_SENHA = password_hash($senha, PASSWORD_DEFAULT);

            $pacienteModel = new PacientesModel();

            $idUsuario = (string) $pacienteModel->obterFKPorId($id);

            $usuario->USC_ID = $idUsuario;
     
            $usuarioModel = new UsuarioComumModel();
    
            if($usuarioModel->update( $usuario->USC_ID, $usuario ) === false ) {
                foreach ( $usuarioModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }
                return;
            } 

            $paciente = new Pacientes();
            $paciente->fill($data);
    
            $paciente->PAC_EMAIL = $data['PAC_EMAIL'];
            $paciente->FK_USUARIO_COMUM_USC_ID = $idUsuario;

            $pacienteModel = new PacientesModel();
            
            if($pacienteModel->update( $paciente->PAC_ID, $paciente ) === false ) {
                foreach ( $pacienteModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }
                return;
            }   

            $responsavel = new Responsaveis();
            $responsavel->fill($data);

            $responsavelModel = new ResponsaveisModel();
      
            $idResponsaveis = (string) $responsavelModel->obterFKPorId($id);
    
            $responsavel->RES_TEM_FILHOS = $data['RES_TEM_FILHOS'];

            if($responsavel->RES_TEM_FILHOS == 1){
                $responsavel->RES_QTD_FILHOS = $data['RES_QTD_FILHOS'];
            }else{
                $responsavel->RES_QTD_FILHOS = 0;
            }

            $responsavel->RES_TRATAMENTO_MEDICO = $data['RES_TRATAMENTO_MEDICO'];   

            if($responsavel->RES_TRATAMENTO_MEDICO == 1){
                $responsavel->RES_QUAIS_TRAT_MED = $data['RES_QUAIS_TRAT_MED'];
            }else{
                $responsavel->RES_QUAIS_TRAT_MED = 0;
            }

            $responsavel->RES_TEM_ALERGIA_MEDICA = $data['RES_TEM_ALERGIA_MEDICA'];

            if($responsavel->RES_TEM_ALERGIA_MEDICA == 1){
                $responsavel->RES_QUAIS_ALERGIAS = $data['RES_QUAIS_ALERGIAS'];
            }else{
                $responsavel->RES_QUAIS_ALERGIAS = 0;
            }
   
            
            $responsavel->RES_UTILIZA_MEDICACAO = $data['RES_UTILIZA_MEDICACAO'];

            if($responsavel->RES_UTILIZA_MEDICACAO == 1){
                $responsavel->RES_QUAL_MEDICACAO = $data['RES_QUAL_MEDICACAO'];
            }else{
                $responsavel->RES_QUAL_MEDICACAO = 0;
            }


            $responsavel->RES_DOENCAS_CRONICAS = $data['RES_DOENCAS_CRONICAS'];

            if($responsavel->RES_DOENCAS_CRONICAS == 1){
                $responsavel->RES_QUAIS_DOENCAS_CRONICAS = $data['RES_QUAIS_DOENCAS_CRONICAS'];
            }else{
                $responsavel->RES_QUAIS_DOENCAS_CRONICAS = 0;
            }


            $responsavel->RES_TEL_CELULAR1 = $data['RES_TEL_CELULAR1S'];
            $responsavel->RES_TEL_CELULAR2 = $data['RES_TEL_CELULAR2'];
            $responsavel->FK_PACIENTES_PAC_ID = $id;
            $responsavel->FK_PACIENTES_FK_USUARIO_COMUM_USC_ID = $idUsuario;    

    
            if($responsavelModel->update( $responsavel->RES_ID, $responsavel ) === false ) {
                foreach ( $responsavelModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }
    
                return;
            }else{
                echo "OK";
            } 



        }catch (\Exception $e) {

            echo $e;
        }


    }

    /*public function excluir( $id ) {

        $finalidadeModel = new FinalidadesModel();

        if( $finalidadeModel->delete( $id ) === false ) {
            foreach ( $finalidadeModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }
        } else {
            return view('/finalidades/list.php');
        }
        
    }*/

}
