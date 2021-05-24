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
            aluno();
            break;
        case "validadoOK":
            validacaoOk();
            break;
    }

    /******************************
    *           Funções           *
    ******************************/
    function def() {
        echo "<div style='width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;'>";
            echo "<h1 style='font-family: Arial, Helvetica, Calibri; font-size: 55px; font-weight: bold; color: gray;'>SIEGE</h1>";
        echo "</div>";
    }

    function diretor() {
        echo "<h1 class='titulo_medio'>Cadastro de Diretores</h1>";
        echo "<form method='POST' action='Validacoes/validacao_cadastrar.php'>";
            echo "<input type='text' style='display: none;' id='cargo' name='cargo' value='diretor'>";

            echo "<br><label for='nome_completo' class='form-label'>Nome completo: </label>";
                echo "<input type='text' pattern='^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$' required class='form-control' id='nome_completo' name='nome_completo' value=''>";

                if (isset($_GET["enm"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["enm"] . "</p>";

            echo "<br><label for='masp' class='form-label'>MASP: </label>";
                echo "<input type='text' maxlength = '8' required class='form-control' id='masp' name='masp' value=''>";

                if (isset($_GET["emp"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["emp"] . "</p>";

            echo "<br><label for='email' class='form-label'>Email: </label>";
                echo "<input type='email' class='form-control' minlength = '5' required pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' title='O email deve conter @ e . ao final.' id='email' name='email' value=''>";

                if (isset($_GET["eeml"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["eeml"] . "</p>";

            echo "<br><label for='campo_zona'>Local de moradia: </label><br>";
                echo "<input type='radio' name='campo_zona' id='campo_zR' value=''>";
                echo "<label for='campo_zR'>Zona rural</label>";
                echo "<input type='radio' name='campo_zona' id='campo_zU' value=''>";
                echo "<label for='campo_zU'>Zona urbana</label> <br><br>";

                if (isset($_GET["eczn"]))
                echo "<p class=\"msg_erro\">" . $_GET["eczn"] . "</p>";

            echo "<br><label for='tipo_empregado'>Tipo de empregado: </label><br>";
                echo "<input type='radio' name='tipo_empregado' id='designado' value=''>";
            echo "<label for='designado'>Designado</label>";
                echo "<input type='radio' name='tipo_empregado' id='efetivo' value=''>";
            echo "<label for='efetivo'>Efetivo</label> <br><br>";

                if (isset($_GET["etep"]))
                echo "<p class=\"msg_erro\">" . $_GET["etep"] . "</p>";

            echo "<br><label for='campo_s'>Sexo: </label><br>";
                echo "<input type='radio' name='campo_s' id='campo_sM' value=''>";
            echo "<label for='campo_sM'>Masculino</label>";
                echo "<input type='radio' name='campo_s' id='campo_sF' value=''>";
            echo "<label for='campo_sF'>Feminino</label> <br><br>";

                if (isset($_GET["ecms"]))
                echo "<p class=\"msg_erro\">" . $_GET["ecms"] . "</p>";
            
                echo "<br><label for='funcao' class='form-label'>Função: </label>";
                echo "<input type='text' required class='form-control' id='funcao' name='funcao' value=''>";

                if (isset($_GET["efnc"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["efnc"] . "</p>";

            echo "<br><label for='senha' class='form-label'>Senha: </label>";
                echo "<input type='password' class='form-control' maxlength = '6' id='senha' required name='senha' value=''>";

                if (isset($_GET["epss"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["epss"] . "</p>";

            echo "<br><label for='confirm_senha' class='form-label'>Confirme a senha: </label>";
                echo "<input type='password' class='form-control' maxlength = '6' id='confirm_senha' required name='confirm_senha' value=''>";
            
                if (isset($_GET["ecps"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["ecps"] . "</p>";

            echo "<input class='btn btn-primary' type='submit' name='botao' value='Confirmar'>";
        echo "</form>";
    }

    function supervisor() {
        echo "<h1 class='titulo_medio'>Cadastro de Supervisores</h1>";
        echo "<form method='POST' action='Validacoes/validacao_cadastrar.php'>";
            echo "<input type='text' style='display: none;' id='cargo' name='cargo' value='supervisor'>";

            echo "<br><label for='nome_completo' class='form-label'>Nome completo: </label>";
                echo "<input type='text' pattern='^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$' required class='form-control' id='nome_completo' name='nome_completo' value=''>";

                if (isset($_GET["enm"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["enm"] . "</p>";

            echo "<br><label for='masp' class='form-label'>MASP: </label>";
                echo "<input type='text' maxlength = '8' required class='form-control' id='masp' name='masp' value=''>";

                if (isset($_GET["emp"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["emp"] . "</p>";

            echo "<br><label for='email' class='form-label'>Email: </label>";
                echo "<input type='email' class='form-control' minlength = '5' required pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' title='O email deve conter @ e . ao final.' id='email' name='email' value=''>";

                if (isset($_GET["eeml"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["eeml"] . "</p>";

            echo "<br><label for='campo_zona'>Local de moradia: </label><br>";
                echo "<input type='radio' name='campo_zona' id='campo_zR' value=''>";
                echo "<label for='campo_zR'>Zona rural</label>";
                echo "<input type='radio' name='campo_zona' id='campo_zU' value=''>";
                echo "<label for='campo_zU'>Zona urbana</label> <br><br>";

                if (isset($_GET["eczn"]))
                echo "<p class=\"msg_erro\">" . $_GET["eczn"] . "</p>";

            echo "<br><label for='tipo_empregado'>Tipo de empregado: </label><br>";
                echo "<input type='radio' name='tipo_empregado' id='designado' value=''>";
            echo "<label for='designado'>Designado</label>";
                echo "<input type='radio' name='tipo_empregado' id='efetivo' value=''>";
            echo "<label for='efetivo'>Efetivo</label> <br><br>";

                if (isset($_GET["etep"]))
                echo "<p class=\"msg_erro\">" . $_GET["etep"] . "</p>";

            echo "<br><label for='campo_s'>Sexo: </label><br>";
                echo "<input type='radio' name='campo_s' id='campo_sM' value=''>";
            echo "<label for='campo_sM'>Masculino</label>";
                echo "<input type='radio' name='campo_s' id='campo_sF' value=''>";
            echo "<label for='campo_sF'>Feminino</label> <br><br>";

                if (isset($_GET["ecms"]))
                echo "<p class=\"msg_erro\">" . $_GET["ecms"] . "</p>";
            
                echo "<br><label for='funcao' class='form-label'>Função: </label>";
                echo "<input type='text' required class='form-control' id='funcao' name='funcao' value=''>";

                if (isset($_GET["efnc"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["efnc"] . "</p>";

            echo "<br><label for='senha' class='form-label'>Senha: </label>";
                echo "<input type='password' class='form-control' maxlength = '6' id='senha' required name='senha' value=''>";

                if (isset($_GET["epss"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["epss"] . "</p>";

            echo "<br><label for='confirm_senha' class='form-label'>Confirme a senha: </label>";
                echo "<input type='password' class='form-control' maxlength = '6' id='confirm_senha' required name='confirm_senha' value=''>";
            
                if (isset($_GET["ecps"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["ecps"] . "</p>";

            echo "<input class='btn btn-primary' type='submit' name='botao' value='Confirmar'>";
        echo "</form>";
    }

    function professor() {
        echo "<h1 class='titulo_medio'>Cadastro de Professores</h1>";
        echo "<form method='POST' action='Validacoes/validacao_cadastrar.php'>";
            echo "<input type='text' style='display: none;' id='cargo' name='cargo' value='professor'>";

            echo "<br><label for='nome_completo' class='form-label'>Nome completo: </label>";
                echo "<input type='text' pattern='^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$' required class='form-control' id='nome_completo' name='nome_completo' value=''>";

                if (isset($_GET["enm"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["enm"] . "</p>";

            echo "<br><label for='masp' class='form-label'>MASP: </label>";
                echo "<input type='text' maxlength = '8' required class='form-control' id='masp' name='masp' value=''>";

                if (isset($_GET["emp"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["emp"] . "</p>";

            echo "<br><label for='email' class='form-label'>Email: </label>";
                echo "<input type='email' class='form-control' minlength = '5' required pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' title='O email deve conter @ e . ao final.' id='email' name='email' value=''>";

                if (isset($_GET["eeml"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["eeml"] . "</p>";

            echo "<br><label for='campo_zona'>Local de moradia: </label><br>";
                echo "<input type='radio' name='campo_zona' id='campo_zR' value=''>";
                echo "<label for='campo_zR'>Zona rural</label>";
                echo "<input type='radio' name='campo_zona' id='campo_zU' value=''>";
                echo "<label for='campo_zU'>Zona urbana</label> <br><br>";

                if (isset($_GET["eczn"]))
                echo "<p class=\"msg_erro\">" . $_GET["eczn"] . "</p>";

            echo "<br><label for='tipo_empregado'>Tipo de empregado: </label><br>";
                echo "<input type='radio' name='tipo_empregado' id='designado' value=''>";
            echo "<label for='designado'>Designado</label>";
                echo "<input type='radio' name='tipo_empregado' id='efetivo' value=''>";
            echo "<label for='efetivo'>Efetivo</label> <br><br>";

                if (isset($_GET["etep"]))
                echo "<p class=\"msg_erro\">" . $_GET["etep"] . "</p>";

            echo "<br><label for='campo_s'>Sexo: </label><br>";
                echo "<input type='radio' name='campo_s' id='campo_sM' value=''>";
            echo "<label for='campo_sM'>Masculino</label>";
                echo "<input type='radio' name='campo_s' id='campo_sF' value=''>";
            echo "<label for='campo_sF'>Feminino</label> <br><br>";

                if (isset($_GET["ecms"]))
                echo "<p class=\"msg_erro\">" . $_GET["ecms"] . "</p>";
            
                echo "<br><label for='funcao' class='form-label'>Função: </label>";
                echo "<input type='text' required class='form-control' id='funcao' name='funcao' value=''>";

                if (isset($_GET["efnc"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["efnc"] . "</p>";

            echo "<br><label for='senha' class='form-label'>Senha: </label>";
                echo "<input type='password' class='form-control' maxlength = '6' id='senha' required name='senha' value=''>";

                if (isset($_GET["epss"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["epss"] . "</p>";

            echo "<br><label for='confirm_senha' class='form-label'>Confirme a senha: </label>";
                echo "<input type='password' class='form-control' maxlength = '6' id='confirm_senha' required name='confirm_senha' value=''>";
            
                if (isset($_GET["ecps"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["ecps"] . "</p>";

            echo "<input class='btn btn-primary' type='submit' name='botao' value='Confirmar'>";
        echo "</form>";
    }

    function secretario() {
        echo "<h1 class='titulo_medio'>Cadastro de Secretários</h1>";
        echo "<form method='POST' action='Validacoes/validacao_cadastrar.php'>";
            echo "<input type='text' style='display: none;' id='cargo' name='cargo' value='secretario'>";

            echo "<br><label for='nome_completo' class='form-label'>Nome completo: </label>";
                echo "<input type='text' pattern='^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$' required class='form-control' id='nome_completo' name='nome_completo' value=''>";

                if (isset($_GET["enm"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["enm"] . "</p>";

            echo "<br><label for='masp' class='form-label'>MASP: </label>";
                echo "<input type='text' maxlength = '8' required class='form-control' id='masp' name='masp' value=''>";

                if (isset($_GET["emp"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["emp"] . "</p>";

            echo "<br><label for='email' class='form-label'>Email: </label>";
                echo "<input type='email' class='form-control' minlength = '5' required pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' title='O email deve conter @ e . ao final.' id='email' name='email' value=''>";

                if (isset($_GET["eeml"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["eeml"] . "</p>";

            echo "<br><label for='campo_zona'>Local de moradia: </label><br>";
                echo "<input type='radio' name='campo_zona' id='campo_zR' value=''>";
                echo "<label for='campo_zR'>Zona rural</label>";
                echo "<input type='radio' name='campo_zona' id='campo_zU' value=''>";
                echo "<label for='campo_zU'>Zona urbana</label> <br><br>";

                if (isset($_GET["eczn"]))
                echo "<p class=\"msg_erro\">" . $_GET["eczn"] . "</p>";

            echo "<br><label for='tipo_empregado'>Tipo de empregado: </label><br>";
                echo "<input type='radio' name='tipo_empregado' id='designado' value=''>";
            echo "<label for='designado'>Designado</label>";
                echo "<input type='radio' name='tipo_empregado' id='efetivo' value=''>";
            echo "<label for='efetivo'>Efetivo</label> <br><br>";

                if (isset($_GET["etep"]))
                echo "<p class=\"msg_erro\">" . $_GET["etep"] . "</p>";

            echo "<br><label for='campo_s'>Sexo: </label><br>";
                echo "<input type='radio' name='campo_s' id='campo_sM' value=''>";
            echo "<label for='campo_sM'>Masculino</label>";
                echo "<input type='radio' name='campo_s' id='campo_sF' value=''>";
            echo "<label for='campo_sF'>Feminino</label> <br><br>";

                if (isset($_GET["ecms"]))
                echo "<p class=\"msg_erro\">" . $_GET["ecms"] . "</p>";
            
                echo "<br><label for='funcao' class='form-label'>Função: </label>";
                echo "<input type='text' required class='form-control' id='funcao' name='funcao' value=''>";

                if (isset($_GET["efnc"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["efnc"] . "</p>";

            echo "<br><label for='senha' class='form-label'>Senha: </label>";
                echo "<input type='password' class='form-control' maxlength = '6' id='senha' required name='senha' value=''>";

                if (isset($_GET["epss"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["epss"] . "</p>";

            echo "<br><label for='confirm_senha' class='form-label'>Confirme a senha: </label>";
                echo "<input type='password' class='form-control' maxlength = '6' id='confirm_senha' required name='confirm_senha' value=''>";
            
                if (isset($_GET["ecps"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["ecps"] . "</p>";

            echo "<input class='btn btn-primary' type='submit' name='botao' value='Confirmar'>";
        echo "</form>";
    }

    function aluno() {
        echo "<h1 class='titulo_medio'>Cadastro de Alunos</h1>";
        echo "<form method='POST' action='Validacoes/validacao_cadastrar.php'>";
            echo "<input type='text' style='display: none;' id='cargo' name='cargo' value='aluno'>";

            echo "<br><label for='nome_completo' class='form-label'>Nome completo: </label>";
                echo "<input type='text' placeholder='Nome completo' pattern='^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$' required class='form-control' id='nome_completo' name='nome_completo' value=''>";
                
                if (isset($_GET["enm"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["enm"] . "</p>";


            echo "<br><label for='data_nascimento' class='form-label'>Data de Nascimento: </label>";
                echo "<input type='date' required class='form-control' id='data_nascimento' name='data_nascimento' value=''>";

                if (isset($_GET["edt"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["edt"] . "</p>";



            echo "<br><label for='matricula' class='form-label'>Número da matrícula: </label>";
                echo "<input type='text' required class='form-control' id='matricula' name='matricula' value=''>";

                if (isset($_GET["emt"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["emt"] . "</p>";


            echo "<br><label for='responsavel' class='form-label'>Nome do responsável: </label>";
                echo "<input type='text' pattern='^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$' required class='form-control' id='responsavel' name='responsavel' value=''>";

                if (isset($_GET["ersp"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["ersp"] . "</p>";

            echo "<br><label for='email' class='form-label'>Email: </label>";
                echo "<input type='email' class='form-control' minlength = '5' required pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' title='O email deve conter @ e . ao final.' id='email' name='email' value=''>";

                if (isset($_GET["eeml"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["eeml"] . "</p>";

            echo "<br><label for='telefone' class='form-label'>Telefone do responsável: </label>";
                echo "<input type='tel' placeholder='(00) 00000-0000' required pattern='\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}' maxlength = '15' title='Insira seu telefone com o DDD e o número. Não se esqueça que, após digitar os 5 primeiros dígitos, colocar um hífen para digitar os 4 dígitos restantes.' class='form-control' id='telefone' name='telefone' value=''>";

                if (isset($_GET["etlf"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["etlf"] . "</p>";

            echo "<br><label for='campo_zona'>Local de moradia: </label><br>";
                echo "<input type='radio' name='campo_zona' id='campo_zR' value=''>";
            echo "<label for='campo_zR'>Zona rural</label>";
                echo "<input type='radio' name='campo_zona' id='campo_zU' value=''>";
            echo "<label for='campo_zU'>Zona urbana</label> <br><br>";

                if (isset($_GET["eczn"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["eczn"] . "</p>";

            echo "<br><label for='campo_s'>Sexo: </label><br>";
                echo "<input type='radio' name='campo_s' id='campo_sM' value=''>";
            echo "<label for='campo_sM'>Masculino</label>";
                echo "<input type='radio' name='campo_s' id='campo_sF' value=''>";
            echo "<label for='campo_sF'>Feminino</label> <br><br>";

                if (isset($_GET["ecms"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["ecms"] . "</p>";

            echo "<br><label for='senha' class='form-label'>Senha: </label>";
                echo "<input type='password' class='form-control' maxlength = '6' id='senha' required name='senha' value=''>";

                if (isset($_GET["epss"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["epss"] . "</p>";

            echo "<br><label for='confirm_senha' class='form-label'>Confirme a senha: </label>";
                echo "<input type='password' class='form-control' maxlength = '6' id='confirm_senha' required name='confirm_senha' value=''>";
            
                if (isset($_GET["ecps"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["ecps"] . "</p>";

            echo "<input class='btn btn-primary' type='submit' name='botao' value='Confirmar'>";
        echo "</form>";
    }

    function validacaoOk () {
        echo "<h1>Cadastrado com sucesso!</h1>";
    }
?>

</body>
</html>