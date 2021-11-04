<?php
    $erros_email="";
    $erros_senha="";
    include ("../BancoDados/conexao_mysql.php");
    session_start();


    /*******Validações referentes ao campo de email(login)******** */
    if(!isset($_POST["campo_email"]) || empty($_POST["campo_email"])){
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
    if(!isset($_POST["campo_senha"]) || empty($_POST["campo_senha"])){
        $erros_senha .= "<br> * Este campo deve ser preenchido!";
    }

    if(strlen($_POST["campo_senha"]) != 6){
        $erros_senha .= "<br> * A senha deve conter 6 caracteres";
    }

    if(!is_numeric($_POST["campo_senha"])){
        $erros_senha .= "<br> * A senha deve conter apenas números";
    }

    if(strlen($erros_email)==0 and strlen($erros_senha)==0){
        $jaLogado = validaLoginNaSessao();
        $sql = "SELECT u.email, u.senha, u.sexo, u.tipo_usuario FROM usuario u WHERE u.email='" . $_POST['campo_email'] . "' AND u.senha='" . $_POST['campo_senha'] . "'";
        $resultado = $conexao->query($sql);
        
        if ($resultado->num_rows > 0)
        {
            if ($jaLogado) {
                header("Location: ../login.php?jlg=true");
            } else {
                $linha = $resultado->fetch_assoc();
                $_SESSION['campo_email'] = $linha['email'];
                $_SESSION['campo_senha'] = $linha['senha'];
                $_SESSION['tip_usu'] = $linha['tipo_usuario'];
                $_SESSION['sx'] = $linha['sexo'];
            }
        }
        else
            header("Location: ../login.php?erros_email=<br> * Email e/ou senha inválidos!&valor_email=$valor");
        $conexao->close();
    }else{
        $valor = $_POST["campo_email"];
        header("Location: ../login.php?erros_email=$erros_email&erros_senha=$erros_senha&valor_email=$valor");
    }

    function validaLoginNaSessao(){
        $validado = 1;

        $validado = (isset($_SESSION['campo_email']) && !empty($_SESSION['campo_email'])) ? $validado*1 : $validado*0;
        $validado = (isset($_SESSION['campo_senha']) && !empty($_SESSION['campo_senha'])) ? $validado*1 : $validado*0;
        $validado = (isset($_SESSION['tip_usu']) && !empty($_SESSION['tip_usu'])) ? $validado*1 : $validado*0;
        $validado = (isset($_SESSION['sx']) && !empty($_SESSION['sx'])) ? $validado*1 : $validado*0;

        $validado = (bool)$validado;
        return $validado;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <script>
            <?php
            echo "
            sessionStorage.setItem('tip_usu', ". $_SESSION['tip_usu'] . "); 
            sessionStorage.setItem('sx', '" . $_SESSION['sx'] . "');
            window.location = '../pagina_inicial.php';
            ";
            ?>
        </script>
    </head>
</html>
