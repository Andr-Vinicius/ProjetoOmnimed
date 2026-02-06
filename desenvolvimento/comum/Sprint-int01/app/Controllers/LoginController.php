<?php

namespace App\Controllers;

use App\Entities\Login;
use App\Models\FuncionariosModel;
use App\Models\LoginModel;
use App\Models\PacientesModel;
use Exception;

class LoginController extends BaseController {

    // Views
    public function novo() {
        return view('/logar/login.php');
    }

    // Funções
    public function logar() {

        $data = $this->request->getPost();
        
        $senha = $data['senha'];
        $emPront = $data['emPront'];

        if( $emPront == "" || $senha == "" || trim($emPront) == "" || trim($senha) == "" ){
            echo "Informações Incorretas - OPS! Algumas informações foram informadas de forma incorreta";
            die();
        }

        try{
            $funcionarioModel = new FuncionariosModel();
            $pacienteModel = new PacientesModel();

            switch($emPront){
                case substr( $emPront, 0, 2 ) === "AD":
                case substr( $emPront, 0, 2 ) === "ME":
                case substr( $emPront, 0, 2 ) === "EN":
                case substr( $emPront, 0, 2 ) === "CO":
                    if( strlen($emPront) > 8 || strlen($emPront) < 8 ){
                        echo "Informações Incorretas - OPS! Algumas informações foram informadas de forma incorreta";
                        die();
                    }

                    $resultado = $funcionarioModel->logarFuncionario($emPront, $senha);
                    $nome = $funcionarioModel->getNomeFuncionario($emPront);
                    
                    if($resultado != false){
                        session_start();
                        $_SESSION["usuario"] = array(
                            "prontuario" => $emPront,
                            "nome" => $nome
                        );
                    }
                    break;
                default:
                    if( strlen($emPront) > 200 ){
                        echo "Informações Incorretas - OPS! Algumas informações foram informadas de forma incorreta";
                        die();
                    }

                    $resultado = $pacienteModel->logarPaciente($emPront, $senha);
                    $nome = $pacienteModel->getNomePaciente($emPront);
                    $pacienteId = $pacienteModel->verificarEmail($emPront);

                    if($resultado != false){
                        session_start();
                        $_SESSION["usuario"] = array(
                            "email" => $emPront,
                            "nome" => $nome,
                            "id" => $pacienteId[0]['PAC_ID']
                        );
                    }
                    break;
            }

            if( $resultado == false ){
                /*foreach($resultado->errors() as $key => $error){
                    echo $error . "<br/>";
                }*/
                echo "Informações Incorretas - OPS! Algumas informações foram informadas de forma incorreta";
                die();
            }else{
                $url = '';

                switch($emPront){
                    case substr($emPront, 0, 2) === "AD":
                        //$url = '/administrativo/logado';
                        return 'AD';
                        break;
                    case substr($emPront, 0, 2) === "ME":
                        //$url = '/medicos/logado';
                        return 'ME';
                        break;
                    case substr($emPront, 0, 2) === "EN":
                        //$url = '/enfermagem/logado';
                        return 'EN';
                        break;
                    case substr($emPront, 0, 2) === "CO":
                        //$url = '/contabilidade/logado';
                        return 'CO';
                        break;
                    default:
                        //$url = '/pacientes/logado';
                        return 'PAC';
                        break;
                }

                //return redirect()->to(base_url().$url);
                //echo 'OK';
            }
        }catch(Exception $e){
            echo "Algo deu errado!!!";
            //echo $e;
        }
    }


}
