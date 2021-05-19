<?php
    $erros_email="";
    $erros_senha="";

    if(!isset($_POST["campo_email"]) || $_POST["campo_email"] ==""){
        $erros_email .= "<br> O campo de email deve ser preenchido!";
    }

    if(!isset($_POST["campo_senha"]) || $_POST["campo_senha"] ==""){
        $erros_senha .= "<br> O campo de senha deve ser preenchido!";
    }
    echo $erros_email . $erros_senha;



    if(strlen($erros_email)==0 and strlen($erros_senha)==0){
        header("refresh:2;url=visao_diretor.php");
    }else{
        header("Location: ../login.php?erros_email=$erros_email&erros_senha=$erros_senha");
    }
?>