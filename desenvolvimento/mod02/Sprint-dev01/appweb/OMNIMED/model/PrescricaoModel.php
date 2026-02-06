<?php

class Prescricao{

    private $prc_id;
    private $prc_data_emissao;
    private $prc_observacoes;
    private $prc_duracao_tratamento;
    private $prc_assinatura_medico;
    private $prc_consultas_online_cns_id;
    private $prc_medicos_med_id;
    private $prc_pacientes_pac_id;

    function &__get($atributo){
        return $this->$atributo;
    }

    function &__set($atributo, $valor){
        $this->$atributo = $valor;
    }
}

?>