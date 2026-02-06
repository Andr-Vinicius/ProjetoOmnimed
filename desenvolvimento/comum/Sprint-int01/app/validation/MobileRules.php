<?php

namespace App\Validation;

class MobileRules{

    // Validacao dos numeros do telefone celular
    public function mobileValidation(string $mobile){
        // Numero comeca entre 1-9
        if(preg_match('/^[1-9]{1}[0-9]+/', $mobile)){
            // Telefone celular deve ter 11 digitos - DDD + Numero
            $bool = preg_match('/^[0-9]{11}+$/', $mobile);
            
            return $bool == 0 ? false : true;
        }
        
        return false;
    }

    // Validacao dos numeros do telefone fixo
    public function telFixoValidation(string $mobile){
        if(preg_match('/^[1-9]{1}[0-9]+/', $mobile)){
            // Telefone fixo deve ter 10 digitos - DDD + Numero
            $bool = preg_match('/^[0-9]{10}+$/', $mobile);

            return $bool == 0 ? false : true;
        }
        
        return false;
    }

    // Validacao para o email
    public function emailValidation(string $email){
        if( !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) ){
            return true;
        }

        return false;
    }

}

?>