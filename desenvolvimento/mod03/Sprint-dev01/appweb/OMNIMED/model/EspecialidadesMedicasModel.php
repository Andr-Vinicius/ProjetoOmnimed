<?php

class EspecialidadesMedicas
{

    private $id;
    private $descricao;

    public function __construct() {
        $this->id = null;
        $this->descricao = null;
    }

    public function &__get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}
