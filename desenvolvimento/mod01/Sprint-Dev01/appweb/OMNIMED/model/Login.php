<?php

class Usuario{
	private $user;
	private $password;
	
	public function __get($name){
		return $this->$name;
	}
	
	public function __set($name, $value){
		$this->$name = $value;
	}
}

?>