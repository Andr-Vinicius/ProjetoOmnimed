<?php

class ContatosSetoriais{
    private $cse_id;
    private $cse_setor;
    private $cse_telefone_fixo;
    private $cse_email;
    private $cse_telefone_celular;

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}

?>