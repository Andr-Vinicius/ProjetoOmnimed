<?php

namespace App\Controllers;

// Importando o phpmailer e o smtp como forma de envio do email
require __DIR__ . '../../PHPMailer-6.6.4/src/PHPMailer.php';
require __DIR__ . '../../PHPMailer-6.6.4/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Controllers\BaseController;
use App\Models\RecuperarSenhaModel;
use App\Models\UsuarioComumModel;

class EmailController extends BaseController{
    
    // View
    public function recuperar(){
        return view('/recuperar_senha/recuperarSenha.php');
    }

    public function novaSenhaView($hash){
        $usuarioModel = new UsuarioComumModel();
        $dadosUsuario = $usuarioModel->verificarHash($hash);
        
        if( $this->checkExpiryDate($dadosUsuario['USC_UPDATE_AT']) ){
            $expired = 'true';
        }else{
            $expired = 'false';
        }

        return view('/recuperar_senha/novaSenha.php', ['hash' => $hash, 'expired' => $expired,]);
    }

    public function novaSenha($hash=null){
        $data = [];
        $usuarioModel = new UsuarioComumModel();

        if( !empty($hash) ){
            $dadosUsuario = $usuarioModel->verificarHash($hash);
            if( !empty($dadosUsuario) ){
                if( $this->checkExpiryDate($dadosUsuario['USC_UPDATE_AT']) ){
                    if( $this->request->getMethod() == 'post' ){
                        $rules = [
                            'pwd' => [
                                'label' => 'Senha',
                                'rules' => 'required|min_length[6]|max_length[16]',
                            ],
                            'cpwd' => [
                                'label' => 'Confirmar nova senha',
                                'rules' => 'required|matches[pwd]',
                            ],
                        ];
    
                        if( $this->validate($rules) ){
                            $senha = password_hash($this->request->getVar('pwd'), PASSWORD_DEFAULT);
                            if($usuarioModel->atualizarSenha($hash, $senha)){
                                return 'upd_pass';
                            }else{
                                echo 'Desculpe! Não foi possível atualizar sua senha.';
                            }
                        }else{
                            $data['validation'] = $this->validator;
                            echo $data['validation'];
                        }
                    }
                }else{
                    echo 'Link para recuperação não está mais disponível!';
                }
            }else{
                //$data['error'] = 'Não foi possível encontrar a conta do usuário';
                echo 'Não foi possível encontrar a conta do usuário';
            }
        }else{
            //$data['error'] = 'Desculpe! Acesso não autorizado.';
            echo 'Desculpe! Acesso não autorizado.';
        }

        //return view('/recuperar_senha/novaSenha.php', $data);
    }

    // Funcao utilizada para enviar o email de contato
    public function enviar(){
        try{
            if( isset($_POST['name']) && !empty($_POST['name']) ){
                if( strlen($_POST['name']) > 180 ){
                    echo "Tamanho do nome excedido, máximo de 180 caracteres.";
                    die();
                }
                $nameUser = $_POST['name'];
            }else{
                echo "Nome não inserido.";
                die();
            }

            if( isset($_POST['email']) && !empty($_POST['email']) 
                && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
                $emailUser = $_POST['email'];
            }else{
                echo "Email não reconhecido.";
                die();
            }

            if( isset($_POST['subject']) && !empty($_POST['subject']) ){
                if( strlen($_POST['subject']) > 100 ){
                    echo "Tamanho do assunto excedido, máximo de 100 caracteres.";
                    die();
                }
                $subject = $_POST['subject'];
            }else{
                echo "Assunto não inserido.";
                die();
            }

            if( isset($_POST['message']) && !empty($_POST['message']) ){
                if( strlen($_POST['message']) > 300 ){
                    echo "Tamanho da mensagem excedida, máximo de 300 caracteres.";
                    die();
                }
                $message = $_POST['message'];
            }else{
                echo "Mensagem não inserido.";
                die();
            }

            // Utilizando o servico de e-mail oferecido pelo CodeIgniter
            $email = \Config\Services::email();

            /* Setando os dados para o envio do contato, que sera feito para a omnimed,
               quando a mesma responder, o e-mail do usuario ja estara automaticamente
               preenchido para receber a resposta
             */
            $email->setFrom('omnimedtelemedicina@gmail.com', 'Omnimed - Telemedicina');
            $email->setTo('omnimedtelemedicina@gmail.com');
            $email->setReplyTo($emailUser, $nameUser);

            // Assunto e mensagem do e-mail
            $email->setSubject($subject);
            $email->setMessage($message);

            // Verificando se foram enviados
            if(!$email->send()){
                echo 'Não foi possível enviar';
                // print_r( $email->printDebugger() ); // descomentar essa linha para erros
                //echo 'Erro: ' . $mail->ErrorInfo;
            }else{
                echo 'OK';
            }

        }catch(Exception $e){
            //echo 'Exception ' . $e;
        }
    }

    // Funcao utilizada para enviar o email de recuperacao de senha
    public function envioRecuperar(){
        $data = [];

        if($this->request->getMethod() == 'post'){
            $recuperarSenhaModel = new RecuperarSenhaModel();
            
            $emPront = $this->request->getVar('emPront', FILTER_SANITIZE_EMAIL);
            
            if( str_starts_with($emPront, 'ME') || str_starts_with($emPront, 'AD') ||
                str_starts_with($emPront, 'EN') || str_starts_with($emPront, 'CO') ){
                $dadosUsuario = $recuperarSenhaModel->verificarProntuario($emPront);
                $controle = 0;
            }else{
                $dadosUsuario = $recuperarSenhaModel->verificarEmail($emPront);
                $controle = 1;
            }
            
            if( !empty($dadosUsuario) && $controle == 1 ){
                if( $recuperarSenhaModel->updatedAt($dadosUsuario['USC_HASH_REC']) ){
                    $subject = 'Link para recuperação de senha';
                    $token = $dadosUsuario['USC_HASH_REC'];
                    $message = 'Olá '.$dadosUsuario['USC_NOME'].'<br><br>'
                        . 'Sua recuperação de senha foi aceita. Por favor, '
                        . 'clique no link abaixo para recuperar a sua senha.<br><br>'
                        . '<a href="http://localhost:8080/recuperar_senha/recuperar/'.$token.'">'
                        . 'Clique aqui</a><br><br>Obrigado! Equipe Omnimed.';

                    $email = \Config\Services::email();

                    $email->setFrom('omnimedtelemedicina@gmail.com', 'Omnimed - Telemedicina');
                    $email->setTo($emPront);

                    // Assunto e mensagem do e-mail
                    $email->setSubject($subject);
                    $email->setMessage($message);


                    if( $email->send() ){
                        echo 'OK';
                    }else{
                        echo 'Não foi possível enviar o link de recuperação';
                    }
                }else{
                    echo 'Desculpe! Serviço indisponível, tente novamente mais tarde';
                }
                
            }else if( $controle == 0 ){
                echo 'Entre em contato com a equipe de administração';
            }else{
                echo 'Email/Prontuário não encontrado';
            }
        }

        //return view('', $data);
    }

    // Funcao responsavel por verificar se o link ainda esta ativo - 8h
    public function checkExpiryDate($time){
        $timeDiff = strtotime(date("Y-m-d h:i:s")) - strtotime($time);

        if($timeDiff < 900){
            return true;
        }

        return false;
    }

}

?>