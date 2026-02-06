<?php

namespace App\Validation;

use DateTime;

class DateRules
{
    // Validacao da data do usuario
    public function validationDate(string $date)
    {
        $date = $this->validationFormatDate($date);
        
        $dateExplode = explode("/", $date);
        $currentDateExplode = explode("/", date('d/m/Y', time()));

        // Verificando se o ano, mês e dia são maiores do que a data atual
        if($dateExplode[2] < $currentDateExplode[2]){
            return true;
        }else if($dateExplode[2] == $currentDateExplode[2]){
            if ($dateExplode[1] < $currentDateExplode[1]){
                return true;
            }else if($dateExplode[1] == $currentDateExplode[1]){
                if ($dateExplode[0] <= $currentDateExplode[0]) { // Dia
                    return true;
                }
            }
        }

        return false;
    }

    // Verificando se estão no formato correto - 10/09/2022
    private function validationFormatDate($date, $format = 'd/m/Y')
    {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        $d = $d->format($format);

        return $d;
    }
}
