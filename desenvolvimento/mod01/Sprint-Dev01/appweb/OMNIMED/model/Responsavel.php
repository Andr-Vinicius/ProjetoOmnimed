<?php

    class Responsavel{
        private $res_id;
        private $res_tem_alergia;
        private $res_quais_alergias;
        private $res_tem_filhos;
        private $res_qt_filhos;
        private $res_tem_doecas_cronicas;
        private $res_quais_doencas;
        private $res_usa_medicacao;
        private $res_qual_medicacao;
        private $res_realiza_trat_med;
        private $res_quais_trat_med;
        private $res_celular1;
        private $res_celular2;
        private $res_fk_paciente;



        public function __get($name){
            return $this->$name;
        }

        public function __set($name, $value){
            $this->$name = $value;
        }


    }



?>