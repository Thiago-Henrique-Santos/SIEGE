<?php

    # Verificar sobre caracteres especiais.
    # ctype_alpha() não aceita acentos, então não serve.
    function isJustLetter($string) {
        $size = strlen($string);
        for ($i=0; $i < $size; $i++) { 
            if (is_numeric($string[$i])) {
                return false;
            }
        }
        return true;
    }

    //Em manutenção
    function protectNumericData ($number) {
        $randomNumber = rand(1000, 9000);
        $newNumber    = $number + $randomNumber;
        $firstNum     = rand(1000, 9999);
        $lastNum      = rand(1000, 9999);
        $pass         = $firstNum.$newNumber.$lastNum;

        $keys = array(
            "pass"   => $pass,
            "random" => $randomNumber
        );

        return $keys;
    }


    //Formatar data
    function formata_data($data){
        return date("d/m/Y", strtotime($data));
    }

    //Transforma faltas de aulas para tempo (horas e minutos)
    function converte_falta($aulas){
        $minutosTotais = $aulas * 50;
        $horas = 0;
        $minutos = 0;
        $subtracao = 0;
        for($i=$minutosTotais; $i>=60; $i-=60){
            $horas++;
        }
        $minutos = $i;
        $tempoTotal = $horas . ":" . $minutos;
        return $tempoTotal;
    }

?>