<?php 

class RemedioPrescricao{
  
  private $prm_esquema_posologico;
  private $fk_remedios_rmd_id;
  private $fk_prescricoes_prc_id;

  function &__get($atributo){
    return $this->$atributo;
  }

  function &__set($atributo, $valor){
    $this->$atributo = $valor;
  }

}

?>