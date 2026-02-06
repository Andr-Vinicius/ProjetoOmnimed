<?php

class Triagem{

    private $trg_id;
    private $trg_sintomas;
    private $trg_tabela_dor;
    private $trg_pressao_sistolica;
    private $trg_pressao_diastolica;
    private $trg_temperatura;
    private $trg_agendamentos_agd_id;

    function getTrgId(){
        return $this->trg_id;
    }

    function setTrgId($id){
        $this->id = $id;
    }

    function getTrgSintomas(){
        return $this->trg_sintomas;
    }

    function setTrgSintomas($sintomas){
        $this->trg_sintomas = $sintomas;
    }

    function getTrgTabelaDor(){
        return $this->trg_tabela_dor;
    }

    function setTrgTabelaDor($tabelaDor){
        $this->trg_tabela_dor = $tabelaDor;
    }

    function getTrgPressaoSistolica(){
        return $this->trg_pressao_sistolica;
    }

    function setTrgPressaoSistolica($pressaoSistolica){
        $this->trg_pressao_sistolica = $pressaoSistolica;
    }

    function getTrgPressaoDiastolica(){
        return $this->trg_pressao_diastolica;
    }

    function setTrgPressaoDiastolica($pressaoDiastolica){
        $this->trg_pressao_diastolica = $pressaoDiastolica;
    }

    function getTrgTemperatura(){
        return $this->trg_temperatura;
    }

    function setTrgTemperatura($temperatura){
        $this->trg_temperatura = $temperatura;
    }

    function getTrgAgendamentosAgdId(){
        return $this->trg_agendamentos_agd_id;
    }

    function setTrgAgendamentosAgdId($agendamentoId){
        $this->trg_agendamentos_agd_id = $agendamentoId;
    }
    
}

?>