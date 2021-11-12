<?php

    # Verificar sobre caracteres especiais.
    # ctype_alpha() não aceita acentos, então não serve.
    function isJustLetter($string){
        $tamanho = strlen($string);
        for ($i=0; $i < $tamanho; $i++) { 
            if (is_numeric($string[$i])) {
                return false;
            }
        }
        return true;
    }

    function criptografia_sdn($num){
        $aleatorio1 = rand(1000, 9999);
        $aleatorio2 = rand(1000, 9000);
        $aleatorio3 = rand(1000, 9999);
        $num_chave = $numero + $aleatorio2;
        $tamanho_num_chave = strlen($num_chave);
        $num_criptografado = $aleatorio1 . $numero . $aleatorio3;
        
        $criptografia = array(
            'crpt'          => $num_criptografado,
            'chave'         => $aleatorio2,
            'tamanho_chave' => $tamanho_num_chave
        );

        return $criptografia;
    }

    function descriptografia_sdn($num_criptografado, $chave_aleatoria, $tamanho_chave){
        $num_descriptografado = substr($num_criptografado, 3, $tamanho_chave);
        $num_descriptografado = $num_descriptografado - $chave_aleatoria;
        return $num_descriptografado;
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
        for($i=$minutosTotais; $i>=60; $i-=60){
            $horas++;
        }
        $minutos = $i;
        if($minutos==0)
            $minutos = '00';
        $tempoTotal = $horas . ":" . $minutos;
        return $tempoTotal;
    }

?>