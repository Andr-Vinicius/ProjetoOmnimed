<?php
class Administrativo {
    private $adm_id;
	private $adm_funcao;
	private $adm_data_admissao;
	private $adm_data_demissao;
	private $adm_clinica;
	private $adm_salario;
	private $adm_crm;
	private $adm_telefone_celular;
	private $adm_fk_funcionario_id;
	
        
    
    public function __get($name){
        return $this->$name;
    }
    
    public function __set($name, $value){
        $this->$name = $value;
    }
    
}
?>