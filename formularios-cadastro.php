<?php
    if (!isset($_GET['id'])){
        echo "Erro!";
    }

    $formType = $_GET['id'];

    if ($formType == "supervisor"){
        echo "Succes!";
    }
?>