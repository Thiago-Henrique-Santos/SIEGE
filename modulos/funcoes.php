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

?>