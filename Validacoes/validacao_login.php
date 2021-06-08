<!DOCTYPE html>
<html lang="pt-br">

<head>
<META charset="utf-8">
</head>
<link rel="stylesheet" type="text/css" href="CSS/animacao_sucesso_login.css">
<link rel="stylesheet" href="all.min.css">
<body>

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
        echo "<div class='success hide'>";
            echo "<span class='check'><i class='fa fa-check-circle'></i></span>";
            echo "<span class='msg'>Você foi logado com sucesso!></span>";
            echo "<span class='crose'><i class='fa fa-times'></i></span>";
        echo "</div>";

        header("refresh:3;url=../visao_diretor.php");
    }else{
        $valor = $_POST["campo_email"];
        header("Location: ../login.php?erros_email=$erros_email&erros_senha=$erros_senha&valor_email=$valor");
    }
?>

<script>
    $('button').click(function(){
        $('.success').addClass("show");
        $('.success').addClass("alert");
        $('.success').removeClass("hide");
        setTimeout(function(){
            $('.success').removeClass("show");
            $('.success').addClass("hide");
        },3000);
    });

    $('.crose').click(function(){
        $('.success').removeClass("show");
        $('.success').addClass("hide");
    });
</script>

</body>
</html>
