<?php

class Remedios{
  private $rmd_id;
  private $rmd_nome;
  private $rmd_tipo;
  private $rmd_dosagem;
  private $rmd_via_dosagem;
  private $rmd_indicacao;
  private $rmd_contra_indicacao;

  function __get($atributo){
    return $this->$atributo;
  }

  function __set($atributo, $valor){
    $this->$atributo = $valor;
  }
}

?>