<?php
class Usuario {
    private $usuario_id;
	private $usc_orgao_emissor;
	private $usc_rg;
	private $usc_cpf;
	private $usc_data_nascimento;
	private $usc_senha;
	private $usc_sexo;
	private $usc_nome;
	private $usc_estado;
	private $usc_cidade;
	private $usc_bairro;
	private $usc_numero;
	private $usc_logradouro;
        
    
    public function __get($name){
        return $this->$name;
    }
    
    public function __set($name, $value){
        $this->$name = $value;
    }
    
}
?>
