
<?php

if (!isset($_GET['id'])){
    echo "Erro!";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>

<?php

    /**********
    * Funções *
    **********/
    function def() {
        echo "<div style='width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;'>";
            echo "<h1 style='font-family: Arial, Helvetica, Calibri; font-size: 55px; font-weight: bold; color: gray;'>SIEGE</h1>";
        echo "</div>";
    }

    function diretor() {
        echo "<h1 class='titulo_medio'>Cadastro de Diretor</h1>";
        echo "<form method='POST' action='Validacoes/validacao_cadastrar.php'>";
            echo "<input type='text' style='display: none;' id='cargo' name='cargo' value='diretor'>";

            echo "<br><label for='nome_completo' class='form-label'>Nome completo: </label>";
                echo "<input type='text' required class='form-control' id='nome_completo' name='nome_completo' value=''>";

            echo "<br><label for='masp' class='form-label'>MASP: </label>";
                echo "<input type='text' maxlength = '8' required class='form-control' id='masp' name='masp' value=''>";

            echo "<br><label for='email' class='form-label'>Email: </label>";
                echo "<input type='email' class='form-control' minlength = '5' required pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' title='O email deve conter @ e . ao final.' id='senha' name='senha' value=''>";

            echo "<br><label for='campo_zona'>Local de moradia: </label><br>";
                echo "<input type='radio' name='campo_zona' id='campo_zR' value=''>";
            echo "<label for='campo_zR'>Zona rural</label>";
                echo "<input type='radio' name='campo_zona' id='campo_zU' value=''>";
            echo "<label for='campo_zU'>Zona urbana</label> <br><br>";

            echo "<br><label for='tipo_empregado'>Tipo de empregado: </label><br>";
                echo "<input type='radio' name='tipo_empregado' id='designado' value=''>";
            echo "<label for='designado'>Designado</label>";
                echo "<input type='radio' name='tipo_empregado' id='efetivo' value=''>";
            echo "<label for='efetivo'>Efetivo</label> <br><br>";

            echo "<br><label for='campo_s'>Sexo: </label><br>";
                echo "<input type='radio' name='campo_s' id='campo_sM' value=''>";
            echo "<label for='campo_sM'>Masculino</label>";
                echo "<input type='radio' name='campo_s' id='campo_sF' value=''>";
            echo "<label for='campo_sF'>Feminino</label> <br><br>";

            echo "<br><label for='funcao' class='form-label'>Função: </label>";
                echo "<input type='text' required class='form-control' id='funcao' name='funcao' value=''>";

            echo "<br><label for='senha' class='form-label'>Senha: </label>";
                echo "<input type='password' class='form-control' maxlength = '6' required name='senha' value=''>";

            echo "<br><label for='confirm_senha' class='form-label'>Confirme a senha: </label>";
                echo "<input type='password' class='form-control' maxlength = '6' required name='confirm_senha' value=''>";

            echo "<input class='btn btn-primary' type='submit' name='botao' value='Confirmar'>";
        echo "</form>";
    }

    function supervisor() {
        echo "<h1 class='titulo_medio'>Cadastro de Supervisores</h1>";
        echo "<form method='POST' action='Validacoes/validacao_cadastrar.php'>";
            echo "<input type='text' style='display: none;' id='cargo' name='cargo' value='supervisor'>";

            echo "<br><label for='nome_completo' class='form-label'>Nome completo: </label>";
                echo "<input type='text' required class='form-control' id='nome_completo' name='nome_completo' value=''>";

            echo "<br><label for='masp' class='form-label'>MASP: </label>";
                echo "<input type='text' maxlength = '8' required class='form-control' id='masp' name='masp' value=''>";

            echo "<br><label for='email' class='form-label'>Email: </label>";
                echo "<input type='email' class='form-control' minlength = '5' required pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' title='O email deve conter @ e . ao final.' id='senha' name='senha' value=''>";

            echo "<br><label for='campo_zona'>Local de moradia: </label><br>";
                echo "<input type='radio' name='campo_zona' id='campo_zR' value=''>";
            echo "<label for='campo_zR'>Zona rural</label>";
                echo "<input type='radio' name='campo_zona' id='campo_zU' value=''>";
            echo "<label for='campo_zU'>Zona urbana</label> <br><br>";

            echo "<br><label for='tipo_empregado'>Tipo de empregado: </label><br>";
                echo "<input type='radio' name='tipo_empregado' id='designado' value=''>";
            echo "<label for='designado'>Designado</label>";
                echo "<input type='radio' name='tipo_empregado' id='efetivo' value=''>";
            echo "<label for='efetivo'>Efetivo</label> <br><br>";

            echo "<br><label for='campo_s'>Sexo: </label><br>";
                echo "<input type='radio' name='campo_s' id='campo_sM' value=''>";
            echo "<label for='campo_sM'>Masculino</label>";
                echo "<input type='radio' name='campo_s' id='campo_sF' value=''>";
            echo "<label for='campo_sF'>Feminino</label> <br><br>";

            echo "<br><label for='funcao' class='form-label'>Função: </label>";
                echo "<input type='text' required class='form-control' id='funcao' name='funcao' value=''>";

            echo "<br><label for='senha' class='form-label'>Senha: </label>";
                echo "<input type='password' class='form-control' maxlength = '6' required name='senha' value=''>";

            echo "<br><label for='confirm_senha' class='form-label'>Confirme a senha: </label>";
                echo "<input type='password' class='form-control' maxlength = '6' required name='confirm_senha' value=''>";
            
            echo "<input class='btn btn-primary' type='submit' name='botao' value='Confirmar'>";
        echo "</form>";
    }

    function professor() {
        echo "<h1 class='titulo_medio'>Cadastro de Professores</h1>";
        echo "<form method='POST' action='Validacoes/validacao_cadastrar.php'>";
            echo "<input type='text' style='display: none;' id='cargo' name='cargo' value='professor'>";

            echo "<br><label for='nome_completo' class='form-label'>Nome completo: </label>";
                echo "<input type='text' required class='form-control' id='nome_completo' name='nome_completo' value=''>";

            echo "<br><label for='masp' class='form-label'>MASP: </label>";
                echo "<input type='text' maxlength = '8' required class='form-control' id='masp' name='masp' value=''>";

            echo "<br><label for='email' class='form-label'>Email: </label>";
                echo "<input type='email' class='form-control' minlength = '5' required pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' title='O email deve conter @ e . ao final.' id='senha' name='senha' value=''>";

            echo "<br><label for='campo_zona'>Local de moradia: </label><br>";
                echo "<input type='radio' name='campo_zona' id='campo_zR' value=''>";
            echo "<label for='campo_zR'>Zona rural</label>";
                echo "<input type='radio' name='campo_zona' id='campo_zU' value=''>";
            echo "<label for='campo_zU'>Zona urbana</label> <br><br>";

            echo "<br><label for='tipo_empregado'>Tipo de empregado: </label><br>";
                echo "<input type='radio' name='tipo_empregado' id='designado' value=''>";
            echo "<label for='designado'>Designado</label>";
                echo "<input type='radio' name='tipo_empregado' id='efetivo' value=''>";
            echo "<label for='efetivo'>Efetivo</label> <br><br>";

            echo "<br><label for='campo_s'>Sexo: </label><br>";
                echo "<input type='radio' name='campo_s' id='campo_sM' value=''>";
            echo "<label for='campo_sM'>Masculino</label>";
                echo "<input type='radio' name='campo_s' id='campo_sF' value=''>";
            echo "<label for='campo_sF'>Feminino</label> <br><br>";

            echo "<br><label for='funcao' class='form-label'>Função: </label>";
                echo "<input type='text' required class='form-control' id='funcao' name='funcao' value=''>";

            echo "<br><label for='senha' class='form-label'>Senha: </label>";
                echo "<input type='password' class='form-control' maxlength = '6' required name='senha' value=''>";

            echo "<br><label for='confirm_senha' class='form-label'>Confirme a senha: </label>";
                echo "<input type='password' class='form-control' maxlength = '6' required name='confirm_senha' value=''>";

            echo "<input class='btn btn-primary' type='submit' name='botao' value='Confirmar'>";
        echo "</form>";
    }

    function secretario() {
        echo "<h1 class='titulo_medio'>Cadastro de Secretários</h1>";
        echo "<form method='POST' action='Validacoes/validacao_cadastrar.php'>";
            echo "<input type='text' style='display: none;' id='cargo' name='cargo' value='secretario'>";

            echo "<br><label for='nome_completo' class='form-label'>Nome completo: </label>";
                echo "<input type='text' required class='form-control' id='nome_completo' name='nome_completo' value=''>";

            echo "<br><label for='masp' class='form-label'>MASP: </label>";
                echo "<input type='text' maxlength = '8' required class='form-control' id='masp' name='masp' value=''>";

            echo "<br><label for='email' class='form-label'>Email: </label>";
                echo "<input type='email' class='form-control' minlength = '5' required pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' title='O email deve conter @ e . ao final.' id='senha' name='senha' value=''>";

            echo "<br><label for='campo_zona'>Local de moradia: </label><br>";
                echo "<input type='radio' name='campo_zona' id='campo_zR' value=''>";
            echo "<label for='campo_zR'>Zona rural</label>";
                echo "<input type='radio' name='campo_zona' id='campo_zU' value=''>";
            echo "<label for='campo_zU'>Zona urbana</label> <br><br>";

            echo "<br><label for='tipo_empregado'>Tipo de empregado: </label><br>";
                echo "<input type='radio' name='tipo_empregado' id='designado' value=''>";
            echo "<label for='designado'>Designado</label>";
                echo "<input type='radio' name='tipo_empregado' id='efetivo' value=''>";
            echo "<label for='efetivo'>Efetivo</label> <br><br>";

            echo "<br><label for='campo_s'>Sexo: </label><br>";
                echo "<input type='radio' name='campo_s' id='campo_sM' value=''>";
            echo "<label for='campo_sM'>Masculino</label>";
                echo "<input type='radio' name='campo_s' id='campo_sF' value=''>";
            echo "<label for='campo_sF'>Feminino</label> <br><br>";

            echo "<br><label for='funcao' class='form-label'>Função: </label>";
                echo "<input type='text' required class='form-control' id='funcao' name='funcao' value=''>";

            echo "<br><label for='senha' class='form-label'>Senha: </label>";
                echo "<input type='password' class='form-control' maxlength = '6' required name='senha' value=''>";

            echo "<br><label for='confirm_senha' class='form-label'>Confirme a senha: </label>";
                echo "<input type='password' class='form-control' maxlength = '6' required name='confirm_senha' value=''>";
            
            echo "<input class='btn btn-primary' type='submit' name='botao' value='Confirmar'>";
        echo "</form>";
    }

    $formType = $_GET['id'];

    switch ($formType) {
        case "default":
            def();
            break;
        case "supervisor":
            supervisor();
            break;
        case "secretario":
            secretario();
            break;
        case "diretor":
            diretor();
            break;
        case "professor":
            professor();
            break;
        case "aluno":
            break;
    }
?>

</body>
</html>