<?php
    $erros_email="";
    $erros_senha="";


    /*******Validações referentes ao campo de email(login)******** */
    if(!isset($_POST["campo_email"]) || $_POST["campo_email"] ==""){
        $erros_email .= "<br> * Este campo deve ser preenchido";
    }

    if(strlen($_POST["campo_email"]) < 5){
        $erros_email .= "<br> * O email deve conter, pelo menos, 5 caracteres";
    }

    $var_email = $_POST["campo_email"];
    $var_email = filter_var($var_email, FILTER_SANITIZE_EMAIL);

    if(!filter_var($_POST["campo_email"], FILTER_VALIDATE_EMAIL)){
        $erros_email .= "<br> * O email não está no padrão correto. Confirme se ele possui '@' e '.'";
    }


    /*******Validações referentes ao campo de senha******** */
    if(!isset($_POST["campo_senha"]) || $_POST["campo_senha"] ==""){
        $erros_senha .= "<br> * Este campo deve ser preenchido!";
    }

    if(strlen($_POST["campo_senha"]) != 6){
        $erros_senha .= "<br> * A senha deve conter 6 caracteres";
    }

    if(!is_numeric($_POST["campo_senha"])){
        $erros_senha .= "<br> * A senha deve conter apenas números";
    }
    


    if(strlen($erros_email)==0 and strlen($erros_senha)==0){
        header("refresh:0;url=../visao_diretor.php");
    }else{
        $valor = $_POST["campo_email"];
        header("Location: ../login.php?erros_email=$erros_email&erros_senha=$erros_senha&valor_email=$valor");
    }
?>