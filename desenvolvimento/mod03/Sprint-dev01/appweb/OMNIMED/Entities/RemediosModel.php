<?php

class Remedios {

    private $id;
    private $nome;
    private $via_dosagem;
    private $forma_farmaceutica;
    private $indicacao;
    private $contraindicacao;
    private $dosagem;

    // function getRMD_Id() {
    //     return $this->RMD_ID;
    // }

    // function setRMD_Id($rmd_id) {
    //     $this->RMD_ID = $rmd_id; 
    // }

    // function getRMD_Nome() {
    //     return $this->RMD_NOME;
    // }

    // function setRMD_Nome($rmd_nome) {
    //     $this->RMD_NOME = $rmd_nome; 
    // }

    // function getRMD_Via_Dosagem() {
    //     return $this->RMD_VIA_DOSAGEM;
    // }

    // function setRMD_Via_Dosagem($rmd_via_dosagem) {
    //     $this->RMD_VIA_DOSAGEM = $rmd_via_dosagem; 
    // }

    // function getRMD_Tipo() {
    //     return $this->RMD_TIPO;
    // }

    // function setRMD_Tipo($rmd_tipo) {
    //     $this->RMD_TIPO = $rmd_tipo; 
    // }

    // function getRMD_Indicacao() {
    //     return $this->RMD_INDICACAO;
    // }

    // function setRMD_Indicacao($rmd_indicacao) {
    //     $this->RMD_INDICACAO = $rmd_indicacao; 
    // }

    // function getRMD_ContraIndicacao() {
    //     return $this->RMD_CONTRAINDICACAO;
    // }

    // function setRMD_ContraIndicacao($rmd_contraindicacao) {
    //     $this->RMD_CONTRAINDICACAO = $rmd_contraindicacao; 
    // }

    // function getRMD_Dosagem() {
    //     return $this->RMD_DOSAGEM;
    // }

    // function setRMD_Dosagem($rmd_dosagem) {
    //     $this->RMD_DOSAGEM = $rmd_dosagem;
    // }

    /*function __get($name) {
        return $this->name;
    }

    function __set($name, $value) {
        $this->name = $value;
    }*/

    public function __construct() {
        $this->id = null;
        $this->nome = null;
        $this->via_dosagem = null;
        $this->tipo = null;
        $this->indicacao = null;
        $this->contraindicacao = null;
        $this->dosagem = null;
    }

    // Método mágico, utiliza-se como $dado = $classe->atributoDaClasse; por exemplo
    public function &__get( $name ) {
        return $this->$name;
    }

    // Método mágico, utiliza-se como $classe->atributoDaClasse = $valor; por exemplo
    public function __set( $name, $value ) {
        $this->$name = $value;
    }
}
?>