<?php

namespace App\Controllers;

use App\Entities\Funcionarios;
use App\Entities\UsuarioComum;
use App\Models\FuncionariosModel;
use App\Models\UsuarioComumModel;
use App\Entities\Administrativo;
use App\Models\AdministrativoModel;

class FuncionariosController extends BaseController
{

    //Views
    public function novo()
    {
        return view('/funcionarios/create.php');
    }

    public function listagem()
    {
        return view('/funcionarios/list.php');
    }

    public function listar($id)
    {
        return view('/funcionarios/view_funcionario.php', ['id' => $id]);
    }

    public function editar($id)
    {
        return view('/funcionarios/edit.php', ['id' => $id,]);
    }

    //Funções
    public function salvar()
    {

        function mensagemErro(){
            echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta";
            die();           
        }

        function encontrouNums($string){
            if( preg_match('/\d+/', $string) > 0 ){
                return true;
             }
        }

        function formatoCPF($string){
            if(preg_match("/^[0-9]{3}.?[0-9]{3}.?[0-9]{3}-?[0-9]{2}/", $string)){
                return true;
            }
        }

            function formatoRG($string){
            if(preg_match("/^[0-9]{2}.?[0-9]{3}.?[0-9]{3}-?[0-9]{1}/", $string)){
                return true;
            }
        }

        function validaData($dataNascimento){
            if(preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]/", $dataNascimento)){
                $array = explode("-", $dataNascimento);
                $dia = $array[2];
                $mes = $array[1];
                $ano = $array[0];
        
                if($dia < 1 || $dia > 31){
                    mensagemErro();
                }
        
                if($mes < 1 || $mes > 12){
                    mensagemErro();
                }
        
                if($ano < 1910 || $ano > 2022){
                    mensagemErro();
                }
            }
        }

        function validaSenha($senha) {
            if(preg_match('/[a-z]/', $senha) && 
            preg_match('/[A-Z]/', $senha) && 
            preg_match('/[0-9]/', $senha)){
                return true;
            }
        }        

        
    try {   

        $data = $this->request->getPost();
        
        // Validação Nome
        if(!isset($data['USC_NOME'])){
            mensagemErro();          
        }else{
            if(encontrouNums($data['USC_NOME']) == true ||
            (strlen($data['USC_NOME']) <= 4 || strlen($data['USC_NOME']) >= 180)){
                mensagemErro(); 

            }
        }

        // Validação do Sexo
        if(!isset($data['USC_SEXO'])){
            mensagemErro();
        }else{
            if(encontrouNums($data['USC_SEXO'])  == false ||
            ($data['USC_SEXO'] < 1 || $data['USC_SEXO'] > 3)){
                mensagemErro();
            }
        }       

        // Validação da Data de Nascimento
        if(!isset($data['USC_DATA_NASCIMENTO'])){
            mensagemErro();
        }else{
            validaData($data['USC_DATA_NASCIMENTO']);
        }

        // Validação CPF
        if(!isset($data['USC_CPF'])){
            mensagemErro();  
        }else{
            if(encontrouNums($data['USC_CPF']) == false
            || formatoCPF($data['USC_CPF']) == false){
                mensagemErro();
            }
        }

        // Validação RG
        if(!isset($data['USC_RG'])){
            mensagemErro();             
        }else{
            if(encontrouNums($data['USC_RG']) == false 
            || formatoRG($data['USC_RG']) == false){
                mensagemErro();
            }
        }

        // Validação do Orgão Emissor
        if(!isset($data['USC_ORGAO_EMISSOR'])){
            mensagemErro();
        }else{
            if(encontrouNums($data['USC_ORGAO_EMISSOR']) == true
            || strlen($data['USC_ORGAO_EMISSOR']) != 3){
                mensagemErro();
            }
        }

        // Validação do Logradouro
        if(!isset($data['USC_LOGRADOURO'])){
            mensagemErro();
        }else{
            if(strlen($data['USC_LOGRADOURO']) < 3 || strlen($data['USC_LOGRADOURO']) > 200){
                mensagemErro();
            }
        }

        // Validação do Número
        if(!isset($data['USC_NUMERO'])){
            mensagemErro();
        }else{
            if(encontrouNums($data['USC_NUMERO']) == false ||
            (strlen($data['USC_NUMERO']) > 10)){
                mensagemErro();
            }          
        }

        // Validação do Bairro
        if(!isset($data['USC_BAIRRO'])){
            mensagemErro();
        }else{
            if(strlen($data['USC_BAIRRO']) < 3 || strlen($data['USC_BAIRRO']) > 100){
                mensagemErro();
            }
        }

        // Validação da Cidade
        if(!isset($data['USC_CIDADE'])){
            mensagemErro();
        }else{
            if(encontrouNums($data['USC_CIDADE']) == true ||
            (strlen($data['USC_CIDADE']) < 5 || strlen($data['USC_CIDADE']) > 100)){
                mensagemErro();
            }
        }

        // Validação do Estado
        if(!isset($data['USC_ESTADO'])){
            mensagemErro();
        }else{
            if(encontrouNums($data['USC_ESTADO']) == false ||
            ($data['USC_ESTADO'] < 1 || $data['USC_ESTADO'] > 26)){
                echo "Oi";
                mensagemErro();
            }
        }

        // Validação da Senha
        if(!isset($data['USC_SENHA'])){
            mensagemErro();
        }else{
            if((strlen($data['USC_SENHA'])  < 8 || strlen($data['USC_SENHA']) > 200)  ||
            validaSenha($data['USC_SENHA']) == false){
                mensagemErro();
            }
        }

        // Validação do Prontuário
        if(!isset($data['ADM_FUNCAO'])){
            echo "Função";
            mensagemErro();
        }
        
        // Validação da Função
        if(!isset($data['ADM_FUNCAO'])){
            echo "Função";
            mensagemErro();       
        }else{
            if(encontrouNums($data['ADM_FUNCAO']) == false ||
            ($data['ADM_FUNCAO'] < 1 || $data['ADM_FUNCAO'] > 4)){
                echo "Função";
                mensagemErro();            
            }
        }

        $funcao = $data['ADM_FUNCAO'];
        $prontuario = "";
        $sigla = "";

        switch ($funcao) {
            case 1:
                $sigla = 'ME';
                break;
            case 2:
                $sigla = 'EN';
                break;
            case 3:
                $sigla = 'CO';
                break;
            case 4:
                $sigla = 'AD';
                break;
            default:
            echo "Função";
            mensagemErro();
        }

        $funcionarioModel = new FuncionariosModel();

        // Criação do Prontuário, a partir da sigla da Função
        do {
            $prontuario = $sigla . random_int(111111, 999999);
        } while ($funcionarioModel->verificarProntuario($prontuario) != null);


        $usuario = new UsuarioComum();

        $senha = $data['USC_SENHA'];

        $usuario->fill($data);

        // Criação do Hash da Senha
        $usuario->USC_HASH_REC = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'.time()));
        $usuario->USC_SENHA = password_hash($senha, PASSWORD_DEFAULT);

        $usuarioComumModel = new UsuarioComumModel();

        if ($usuarioComumModel->save($usuario) === false) {
            foreach ($usuarioComumModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }
            return;
        }


        $funcionario = new Funcionarios();
        $funcionario->fill($data);


        $funcionario->FUN_PRONTUARIO = $prontuario;  
        $funcionario->FUN_CATEGORIA = $funcao;

        $idUsuario = (string) $usuarioComumModel->getInsertID();
        $funcionario->FK_USUARIO_COMUM_USC_ID = $idUsuario;


        if ($funcionarioModel->save($funcionario) === false) {
            foreach ($funcionarioModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }
            return;
        }

        // Validação da Data de Admissão
        if(!isset($data['ADM_DATA_ADMISSAO'])){
            mensagemErro();
        }else{
            validaData($data['ADM_DATA_ADMISSAO']);
        }

        // Validação da Data de Demissão
        if(isset($data['ADM_DATA_DEMISSAO'])){
            validaData($data['ADM_DATA_DEMISSAO']);
        }

        // Validação do CRM
        if($funcao == 1){
            if(!isset($data['ADM_CRM'])){
                echo "CRM";
                mensagemErro();
            }else{
                if((strlen($data['ADM_CRM']) < 4 || strlen($data['ADM_CRM']) > 20)){
                    echo "CRM";
                    mensagemErro();
                }
            }
        }else{
            if(isset($data['ADM_CRM'])){
                echo "CRM";
                mensagemErro();     
            }
        }

        // Validação do Celular
        if(!isset($data['ADM_TELEFONE_CELULAR'])){
            mensagemErro();
        }else{
            if(encontrouNums($data['ADM_TELEFONE_CELULAR']) == false ||
            (strlen($data['ADM_TELEFONE_CELULAR']) < 10 || strlen($data['ADM_TELEFONE_CELULAR']) > 15)){
                mensagemErro();
            }
        }

        // Validação do Salário
        if(!isset($data['ADM_SALARIO'])){
            mensagemErro();    
        }else{
            if((strlen($data['ADM_SALARIO']) < 3)){
                mensagemErro();
            }     
        }

        // Validação da Clinica ?


        $administrativo = new Administrativo();
        $administrativo->fill($data);

        $idFuncionarios = (string) $funcionarioModel->getInsertID();
        $administrativo->FK_FUNCIONARIOS_FUN_ID = $idFuncionarios;
        $administrativo->FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID = $idUsuario;
        $administrativo->ADM_DATA_ADMISSAO = $data['ADM_DATA_ADMISSAO'];
        $administrativo->ADM_DATA_DEMISSAO = $data['ADM_DATA_DEMISSAO'];
        $administrativo->ADM_FUNCAO = $funcao;
        $administrativo->ADM_SALARIO = $data['ADM_SALARIO'];
        $administrativo->ADM_CLINICA = "OMNIMED";
        $administrativo->ADM_TELEFONE_CELULAR = $data['ADM_TELEFONE_CELULAR'];
        $administrativo->ADM_CRM = $data['ADM_CRM'];

        $administrativoModel = new AdministrativoModel();

        if ($administrativoModel->insert($administrativo) === false) {
            foreach ($administrativoModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }
            return;
        }else {
            // Mensagem de que deu tudo certo
            echo 'OK';
        }
            
        } catch (\Exception $e) {

            echo $e;
        }

    }
    

    public function atualizar($id){

        // Pegando os novos dados
        $data = $this->request->getPost();

        
        // Criação do novo prontuário
        $funcao = $data['ADM_FUNCAO'];
        try {
            $prontuario = "";
            $sigla = "";

            switch ($funcao) {
                case 1:
                    $sigla = 'ME';
                    break;
                case 2:
                    $sigla = 'EN';
                    break;
                case 3:
                    $sigla = 'CO';
                    break;
                case 4:
                    $sigla = 'AD';
                    break;
            }


            $funcionarioModel = new FuncionariosModel();

            do {
                $prontuario = $sigla . random_int(111111, 999999);
            } while ($funcionarioModel->verificarProntuario($prontuario) != null); 


            // Edição do Usuário Comum
            $idUsuario = (string) $funcionarioModel->obterFKPorId($id);
            

            $usuario = new UsuarioComum();
            $usuario->fill($data);
            $usuario->USC_ID = $idUsuario;
  
            $usuarioComumModel = new UsuarioComumModel();

            if ($usuarioComumModel->update($usuario->USC_ID, $usuario) === false) {
                foreach ($usuarioComumModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }

                return;
            }


            // Edição de Funcionário
            $funcionario = new Funcionarios();
            $funcionario->fill($data);

            //$funcionario->FUN_PRONTUARIO = $prontuario;
            //$funcionario->FUN_CATEGORIA = $funcao;

            
            $funcionario->FK_USUARIO_COMUM_USC_ID = $idUsuario;

            if ($funcionarioModel->update($funcionario->FUN_ID, $funcionario) === false) {
                foreach ($funcionarioModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }
                return;
            }


            // Edição do Administrativos
            $administrativo = new Administrativo();
            $administrativo->fill($data);

            $administrativoModel = new AdministrativoModel();
            $administrativo->ADM_ID = (string) $administrativoModel->obterADMPorId($id);

            $administrativo->FK_FUNCIONARIOS_FUN_ID = $id;
            $administrativo->FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID = $idUsuario;
            $administrativo->ADM_DATA_ADMISSAO = $data['ADM_DATA_ADMISSAO'];
            $administrativo->ADM_DATA_DEMISSAO= $data['ADM_DATA_DEMISSAO'];
            $administrativo->ADM_FUNCAO = $funcao;
            $administrativo->ADM_SALARIO = $data['ADM_SALARIO'];
            $administrativo->ADM_CLINICA = "OMNIMED";
            $administrativo->ADM_TELEFONE_CELULAR = $data['ADM_TELEFONE_CELULAR'];
            $administrativo->ADM_CRM = $data['ADM_CRM'];

            

            if ($administrativoModel->update($administrativo->ADM_ID, $administrativo) === false) {
                foreach ($administrativoModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }
               
            }else {
                // Mensagem de que deu tudo certo
                echo 'OK';
            }


        } catch (\Exception $e) {

            echo "<br>".$e;
        }

    }


    public function excluir($id)
    {

        $funcionarioModel = new FuncionariosModel();

        if ($funcionarioModel->deleteFuncionarios($id) === false) {
            foreach ($funcionarioModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }
        } else {
            return view('/funcionarios/list.php');
        }
    }

}
