<?php

class Consulta{
    private $id = null;
    private $data = null;
    private $anotacoes = null;
    private $sintomas = null;
    private $diagnostico = null;
    private $fkAgendamento = null;
    private $fkmedicosmedid = null;
    private $fkpacientepacid = null;

    public function &__get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}

?>