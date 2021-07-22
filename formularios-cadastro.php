<?php

if (!isset($_GET['id']) || empty($_GET['id']) || !isset($_GET['tfm']) || empty($_GET['tfm'])){
    echo "Erro!";
}

date_default_timezone_set('America/Sao_Paulo');
include ("BancoDados/conexao_mysql.php");
include ("modulos/funcoes.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link rel="stylesheet" type="text/css" href="modulos/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>

<?php
    $formType = $_GET['id'];
    $cad_att = $_GET['tfm'];

    switch ($formType) {
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
        case "turma":
            turma();
            break;
        case "disciplina":
            disciplina();
            break;
        case "bimestre":
            bimestre();
            break;
        case "validadoOK":
            validacaoOk();
            break;
        default:
            def();
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
        echo "<h1 align='center' class='titulo_medio' id='titulo_formulario'>Cadastrar</h1>";
        echo "<form method='POST' action='Validacoes/cadastrar/usuarios.php'>";
            echo "<input type='text' style='display: none;' id='cargo' name='cargo' value='diretor'>";

            campos_funcionarios();

            echo "<input class='btn btn-primary' type='submit' name='botao' value='Confirmar'>";
        echo "</form>";
    }

    function supervisor() {
        echo "<h1 align='center' class='titulo_medio' id='titulo_formulario'>Cadastrar</h1>";
        echo "<form method='POST' action='Validacoes/cadastrar/usuarios.php'>";
            echo "<input type='text' style='display: none;' id='cargo' name='cargo' value='supervisor'>";

            campos_funcionarios();

            echo "<input class='btn btn-primary' type='submit' name='botao' value='Confirmar'>";
        echo "</form>";
    }

    function professor() {
        echo "<h1 align='center' class='titulo_medio' id='titulo_formulario'>Cadastrar</h1>";
        echo "<form method='POST' action='Validacoes/cadastrar/usuarios.php'>";
            echo "<input type='text' style='display: none;' id='cargo' name='cargo' value='professor'>";

            campos_funcionarios();

            echo "<input class='btn btn-primary' type='submit' name='botao' value='Confirmar'>";
        echo "</form>";
    }

    function secretario() {
        echo "<h1 align='center' class='titulo_medio' id='titulo_formulario'>Cadastrar</h1>";
        echo "<form method='POST' action='Validacoes/cadastrar/usuarios.php'>";
            echo "<input type='text' style='display: none;' id='cargo' name='cargo' value='secretario'>";

            campos_funcionarios();

            echo "<input class='btn btn-primary' type='submit' name='botao' value='Confirmar'>";
        echo "</form>";
    }

    function aluno() {
        global $conexao;
        $valor_salvo = "";

        echo "<h1 align='center' class='titulo_medio' id='titulo_formulario'>Cadastrar</h1>";
        echo "<form method='POST' action='Validacoes/cadastrar/usuarios.php'>";
            echo "<input type='text' style='display: none;' id='cargo' name='cargo' value='aluno'>";

            echo "<br><label for='nome_completo' class='form-label'><strong>Nome completo: </strong></label>";
                if(isset($_GET["nm"]) && !empty($_GET["nm"]))
                    $valor_salvo = $_GET["nm"];
                echo "<input type='text' placeholder='Nome completo' pattern='^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$' required class='form-control' id='nome_completo' name='nome_completo' value='$valor_salvo'>";
                if (isset($_GET["enm"]) && !empty($_GET["enm"]))
                    echo "<br><p class=\"msg_erro\">" . $_GET["enm"] . "</p>";

            echo "<br><label for='data_nascimento' class='form-label'><strong>Data de Nascimento: </strong></label>";
                if(isset($_GET["dt"]) && !empty($_GET["dt"]))
                    $valor_salvo = $_GET["dt"];
                echo "<input type='date' required class='form-control' id='data_nascimento' name='data_nascimento' value='$valor_salvo'>";
                if (isset($_GET["edt"]) && !empty($_GET["edt"]))
                    echo "<br><p class=\"msg_erro\">" . $_GET["edt"] . "</p>";

            echo "<br><label for='matricula' class='form-label'><strong>Número da matrícula: </strong></label>";
                if(isset($_GET["mt"]) && !empty($_GET["mt"]))
                    $valor_salvo = $_GET["mt"];
                echo "<input type='text' placeholder='12345678' required class='form-control' id='matricula' name='matricula' value='$valor_salvo'>";
                if (isset($_GET["emt"]) && !empty($_GET["emt"]))
                    echo "<br><p class=\"msg_erro\">" . $_GET["emt"] . "</p>";

            echo "<br><label for='responsavel' class='form-label'><strong>Nome do responsável: </strong></label>";
                if(isset($_GET["rsp"]) && !empty($_GET["rsp"]))
                    $valor_salvo = $_GET["rsp"];
                echo "<input type='text' placeholder='Nome Completo' pattern='^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$' required class='form-control' id='responsavel' name='responsavel' value='$valor_salvo'>";
                if (isset($_GET["ersp"]) && !empty($_GET["ersp"]))
                    echo "<br><p class=\"msg_erro\">" . $_GET["ersp"] . "</p>";

            echo "<br><label for='email' class='form-label'><strong>Email: </strong></label>";
                if(isset($_GET["eml"]) && !empty($_GET["eml"]))
                    $valor_salvo = $_GET["eml"];
                echo "<input type='email' placeholder='exemplo@exemplo.ex' class='form-control' minlength = '5' required pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' title='O email deve conter @ e . ao final.' id='email' name='email' value='$valor_salvo'>";
                if (isset($_GET["eeml"]) && !empty($_GET["eeml"]))
                    echo "<br><p class=\"msg_erro\">" . $_GET["eeml"] . "</p>";

            echo "<br><label for='telefone' class='form-label'><strong>Telefone do responsável: </strong></label>";
                if(isset($_GET["tlf"]) && !empty($_GET["tlf"]))
                    $valor_salvo = $_GET["tlf"];
                echo "<input type='tel' placeholder='(00) 00000-0000' required pattern='\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}' maxlength = '15' title='Insira seu telefone com o DDD e o número. Não se esqueça que, após digitar os 5 primeiros dígitos, colocar um hífen para digitar os 4 dígitos restantes.' class='form-control' id='telefone' name='telefone' value='$valor_salvo'>";
                if (isset($_GET["etlf"]) && !empty($_GET["etlf"]))
                    echo "<br><p class=\"msg_erro\">" . $_GET["etlf"] . "</p>";

            echo "<br><label for='campo_zona'><strong>Local de moradia: </strong></label><br>";
                if(isset($_GET["czn"]) && !empty($_GET["czn"]))
                    $valor_salvo = $_GET["czn"];
                echo "<input type='radio' name='campo_zona' id='campo_zR' value='R'"; if($valor_salvo=="R"){echo " checked";} echo">";
                echo "<label for='campo_zR'>Zona rural</label>";
                echo "<input type='radio' name='campo_zona' id='campo_zU' value='U'"; if($valor_salvo=="U"){echo " checked";} echo">";
                echo "<label for='campo_zU'>Zona urbana</label> <br><br>";
                if (isset($_GET["eczn"]) && !empty($_GET["eczn"]))
                    echo "<br><p class=\"msg_erro\">" . $_GET["eczn"] . "</p>";

            echo "<br><label for='campo_s'><strong>Sexo: </strong></label><br>";
                if(isset($_GET["cms"]) && !empty($_GET["cms"]))
                    $valor_salvo = $_GET["cms"];
                echo "<input type='radio' name='campo_s' id='campo_sM' value='M'"; if($valor_salvo=="M"){echo " checked";} echo">";
                echo "<label for='campo_sM'>Masculino</label>";
                echo "<input type='radio' name='campo_s' id='campo_sF' value='F'"; if($valor_salvo=="F"){echo " checked";} echo">";
                echo "<label for='campo_sF'>Feminino</label> <br><br>";
                if (isset($_GET["ecms"]) && !empty($_GET["ecms"]))
                    echo "<br><p class=\"msg_erro\">" . $_GET["ecms"] . "</p>";

            echo "<br><label for='turma' class='form-label'><strong>Turma do aluno:</strong></label>";
                if(isset($_GET["tur"]) && $_GET["tur"] != "none")
                    $valor_salvo = $_GET["tur"];
                echo "<br><select name='turma' class='form-select'>";
                    echo "<option value='none' selected>--</option>";
                    $sql = "
                    SELECT * FROM turma
                    ";
                    $resultado = $conexao->query($sql);
                    if ($resultado->num_rows > 0) {
                        while ($dados = $resultado->fetch_assoc()){
                            echo "<option value='".$dados["id"]."' "; if($valor_salvo==$dados["id"]){echo "selected";} echo ">".$dados["serie"]."&ordm; ano ".$dados["nome"]."</option>";
                        }
                    }
                echo "</select>";
                if (isset($_GET["etur"]) && !empty($_GET["etur"]))
                    echo "<br><p class=\"msg_erro\">" . $_GET["etur"] . "</p>";

            echo "<br><label for='senha' class='form-label'><strong>Senha: </strong></label>";
                echo "<input type='password' class='form-control' maxlength = '6' id='senha' required name='senha' value=''>";
                if (isset($_GET["epss"]) && !empty($_GET["epss"]))
                    echo "<br><p class=\"msg_erro\">" . $_GET["epss"] . "</p>";

            echo "<br><label for='confirm_senha' class='form-label'><strong>Confirme a senha: </strong></label>";
                echo "<input type='password' class='form-control' maxlength = '6' id='confirm_senha' required name='confirm_senha' value=''>";
                if (isset($_GET["ecps"]) && !empty($_GET["ecps"]))
                    echo "<br><p class=\"msg_erro\">" . $_GET["ecps"] . "</p>";

            echo "<input class='btn btn-primary' type='submit' name='botao' value='Confirmar'>";
        echo "</form>";
    }

    function turma() {
        $valor_salvo = "";

        echo "<h1 align='center' class='titulo_medio' id='titulo_formulario'>Cadastrar</h1>";
        echo "<form method='POST' action='Validacoes/cadastrar/outros.php'>";
            echo "<input type='text' style='display: none;' id='tipo' name='tipo' value='turma'>";
            
            if(isset($_GET['nm']) && !empty($_GET['nm']))
                $valor_salvo = $_GET['nm'];
            echo "<label for='nome_turma' class='form-label'><strong>Nome da turma:</strong></label>";
                echo "<input type='text' placeholder='A' class='form-control' required title='Insira o nome da turma.' name='nome_turma' value='$valor_salvo'>";
            if (isset($_GET['enm']) && !empty($_GET['enm']))
                echo "<br><p class=\"msg_erro\">" . $_GET["enm"] . "</p>";
            
            if(isset($_GET['sr']) && !empty($_GET['sr']))
                $valor_salvo = $_GET['sr'];
            echo "<br><label for='serie' class='form-label'><strong>Série</strong></label>";
                echo "<br><select name='serie' class='form-select' required>";
                    echo "<option value='none' selected>--</option>";
                    echo "<option value='2' "; if($valor_salvo==2){echo "selected";} echo ">2&ordm;</option>";
                    echo "<option value='3' "; if($valor_salvo==3){echo "selected";} echo ">3&ordm;</option>";
                    echo "<option value='4' "; if($valor_salvo==4){echo "selected";} echo ">4&ordm;</option>";
                    echo "<option value='5' "; if($valor_salvo==5){echo "selected";} echo ">5&ordm;</option>";
                    echo "<option value='6' "; if($valor_salvo==6){echo "selected";} echo ">6&ordm;</option>";
                    echo "<option value='7' "; if($valor_salvo==7){echo "selected";} echo ">7&ordm;</option>";
                    echo "<option value='8' "; if($valor_salvo==8){echo "selected";} echo ">8&ordm;</option>";
                    echo "<option value='9' "; if($valor_salvo==9){echo "selected";} echo ">9&ordm;</option>";
                echo "</select>";
            if (isset($_GET['esr']) && !empty($_GET['esr']))
                echo "<br><p class=\"msg_erro\">" . $_GET["esr"] . "</p>";

            echo "<br><input class='btn btn-primary' type='submit' name='botao' value='Confirmar'>";
        echo "</form>";
    }

    function disciplina() {
        global $conexao;
        $valor_salvo = "";

        echo "<h1 align='center' class='titulo_medio' id='titulo_formulario'>Cadastrar</h1>";
        echo "<form method='POST' action='Validacoes/cadastrar/outros.php'>";

            echo "<input type='text' style='display: none;' id='tipo' name='tipo' value='disciplina'>";
            
            if (isset($_GET['nm']) && !empty($_GET['nm']))
                $valor_salvo = $_GET['nm'];
            echo "<label for='nome_disciplina' class='form-label'><strong>Nome da disciplina:</strong></label>";
                echo "<input type='text' placeholder='Matemática' class='form-control' title='Insira o nome da turma.' required name='nome_disciplina' value='$valor_salvo'>";
            if (isset($_GET['enm']) && !empty($_GET['enm']))
                echo "<br><p class=\"msg_erro\">" . $_GET["enm"] . "</p>";

            if (isset($_GET['ano']) && !empty($_GET['ano']))
                $valor_salvo = $_GET['ano'];
            echo "<br><label for='ano' class='form-label'><strong>Ano em que será lecionada:</strong></label>";
                echo "<br><select name='ano' class='form-select' required>";
                $anoAtual = date("Y");
                for ($i=$anoAtual-80; $i <= $anoAtual+1; $i++) {
                    echo "<option value='$i' "; if($valor_salvo==$i){echo "selected";$valor_salvo="";}elseif($i==$anoAtual){echo "selected";$valor_salvo="";} echo">$i</option>";
                }
                echo "</select>";
            if (isset($_GET['eano']) && !empty($_GET['eano']))
                echo "<br><p class=\"msg_erro\">" . $_GET["eano"] . "</p>";

            if (isset($_GET['prf']) && !empty($_GET['prf']))
                $valor_salvo = $_GET['prf'];
            echo "<br><label for='professor' class='form-label'><strong>Professor da disciplina:</strong></label>";
                echo "<br><select name='professor' class='form-select' required>";
                    echo "<option value='none' selected>--</option>";
                    $sql = "
                    SELECT id, nome FROM usuario 
                    WHERE tipo_usuario = 2
                    ";
                    $resultado = $conexao->query($sql);
                    if ($resultado->num_rows > 0){
                        while ($dados = $resultado->fetch_assoc()) {
                            echo "<option value='".$dados["id"]."' ";if($valor_salvo==$dados['id']){echo "selected";} echo ">".$dados["nome"]."</option>";
                        }
                    }
                echo "</select>";
            if (isset($_GET['eprf']) && !empty($_GET['eprf']))
                echo "<br><p class=\"msg_erro\">" . $_GET["eprf"] . "</p>";

            if (isset($_GET['tur']) && !empty($_GET['tur']))
                $turmas = $_GET['tur'];
            echo "<br><label class='form-label'><strong>Turmas em que haverá esta disciplina:</strong></label>";
                $sql = "
                SELECT * FROM turma ORDER BY serie ASC, nome ASC
                ";
                $resultado = $conexao->query($sql);
                if ($resultado->num_rows > 0) {
                    $i = 1;
                    while ($dados = $resultado->fetch_assoc()) {
                        echo "<br><input type='checkbox' name='turma[$i]' id='".$dados["id"]."' value='".$dados["id"]."' "; if (isset($_GET['tur']) && !empty($_GET['tur'])){foreach($turmas as $turma){if($turma==$dados["id"]){echo "checked";}}} echo ">";
                        echo "<label for='".$dados["id"]."' class='form-label'>&nbsp;".$dados["serie"]."&ordm; ano ".$dados["nome"]."</label>";
                        $i++;
                    }
                }
            if (isset($_GET['etur']) && !empty($_GET['etur']))
                echo "<br><p class=\"msg_erro\">" . $_GET["etur"] . "</p>";

            echo "<br><input class='btn btn-primary' type='submit' name='botao' value='Confirmar'>";
        echo "</form>";
    }

    function bimestre() {
        $valor_salvo = "";
        echo "<h1 align='center' class='titulo_medio' id='titulo_formulario'>Cadastrar</h1>";
        echo "<form method='POST' action='Validacoes/cadastrar/outros.php'>";

            echo "<input type='text' style='display: none;' id='tipo' name='tipo' value='bimestre'>";
            
            if (isset($_GET['nmr']) && !empty($_GET['nmr']))
                $valor_salvo = $_GET['nmr'];
            echo "<label for='numero' class='form-label'><strong>Bimestre:</strong></label>";
                echo "<br><select name='numero' class='form-select' required>";
                    echo "<option value='none' selected>--</option>";
                    echo "<option value='1' "; if($valor_salvo==1){echo "selected";} echo ">1&ordm;</option>";
                    echo "<option value='2' "; if($valor_salvo==2){echo "selected";} echo ">2&ordm;</option>";
                    echo "<option value='3' "; if($valor_salvo==3){echo "selected";} echo ">3&ordm;</option>";
                    echo "<option value='4' "; if($valor_salvo==4){echo "selected";} echo ">4&ordm;</option>";
                echo "</select>";
                if (isset($_GET["enmr"]) && !empty($_GET["enmr"]))
                    echo "<br><p class=\"msg_erro\">" . $_GET["enmr"] . "</p>";
            
            if (isset($_GET['dti']) && !empty($_GET['dti']))
                $valor_salvo = $_GET['dti'];
            echo "<br><label for='data_inicial' class='form-label'><strong>Início do bimestre:</strong></label>";
                echo "<input type='date' required class='form-control' id='data_inicial' name='data_inicial' value='$valor_salvo'>";
            if (isset($_GET['edti']) && !empty($_GET['edti']))
                echo "<br><p class=\"msg_erro\">" . $_GET["edti"] . "</p>";

            if (isset($_GET['dtf']) && !empty($_GET['dtf']))
                $valor_salvo = $_GET['dtf'];
            echo "<br><label for='data_final' class='form-label'><strong>Encerramento do bimestre:</strong></label>";
                echo "<input type='date' required class='form-control' id='data_final' name='data_final' value='$valor_salvo'>";
            if (isset($_GET['edtf']) && !empty($_GET['edtf']))
                echo "<br><p class=\"msg_erro\">" . $_GET["edtf"] . "</p>";

            echo "<br><input class='btn btn-primary' type='submit' name='botao' value='Confirmar'>";
        echo "</form>";
    }

    function campos_funcionarios () {
        $valor_salvo = "";
        echo "<br><label for='nome_completo' class='form-label'><strong>Nome completo: </strong></label>";
            if(isset($_GET["nm"]) && !empty($_GET["nm"]))
                $valor_salvo = $_GET["nm"];
            echo "<input type='text' placeholder='Nome Completo' pattern='^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$' required class='form-control' id='nome_completo' name='nome_completo' value='$valor_salvo'>";
            if (isset($_GET["enm"]) && !empty($_GET["enm"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["enm"] . "</p>";

        echo "<br><label for='masp' class='form-label'><strong>MASP: </strong></label>";
            if(isset($_GET["mp"]) && !empty($_GET["mp"]))
                $valor_salvo = $_GET["mp"];
            echo "<input type='text' placeholder='12345678' minlength='7' maxlength='8' required class='form-control' id='masp' name='masp' value='$valor_salvo'>";
            if (isset($_GET["emp"]) && !empty($_GET["emp"]))
                 "<br><p class=\"msg_erro\">" . $_GET["emp"] . "</p>";

        echo "<br><label for='email' class='form-label'><strong>Email: </strong></label>";
            if(isset($_GET["eml"]) && !empty($_GET["eml"]))
                $valor_salvo = $_GET["eml"];
            echo "<input type='email' placeholder='exemplo@exemplo.ex' class='form-control' minlength = '5' required pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' required title='O email deve conter @ e . ao final.' id='email' name='email' value='$valor_salvo'>";
            if (isset($_GET["eeml"]) && !empty($_GET["eeml"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["eeml"] . "</p>";

        echo "<br><label for='campo_zona'><strong>Local de moradia: </strong></label><br>";
            if (isset($_GET["czn"]) && !empty($_GET["czn"]))
                $valor_salvo = $_GET["czn"];
            echo "<input type='radio' name='campo_zona' id='campo_zR' value='R'"; if($valor_salvo=="R"){echo " checked";} echo">";
            echo "<label for='campo_zR'>Zona rural</label>";
            echo "<input type='radio' name='campo_zona' id='campo_zU' value='U'"; if($valor_salvo=="U"){echo " checked";} echo">";
            echo "<label for='campo_zU'>Zona urbana</label> <br><br>";
            if (isset($_GET["eczn"]) && !empty($_GET["eczn"]))
                echo "<p class=\"msg_erro\">" . $_GET["eczn"] . "</p>";

        echo "<br><label for='tipo_empregado'><strong>Tipo de empregado: </strong></label><br>";
            if (isset($_GET["tep"]) && !empty($_GET["tep"]))
                $valor_salvo = $_GET["tep"];
            echo "<input type='radio' name='tipo_empregado' id='designado' value='D'"; if($valor_salvo=="D"){echo " checked";} echo">";
            echo "<label for='designado'>Designado</label>";
            echo "<input type='radio' name='tipo_empregado' id='efetivo' value='E'"; if($valor_salvo=="E"){echo " checked";} echo">";
            echo "<label for='efetivo'>Efetivo</label> <br><br>";
            if (isset($_GET["etep"]) && !empty($_GET["etep"]))
                echo "<p class=\"msg_erro\">" . $_GET["etep"] . "</p>";

        echo "<br><label for='campo_s'><strong>Sexo: </strong></label><br>";
            if (isset($_GET["cms"]) &&!empty($_GET["cms"]))
                $valor_salvo = $_GET["cms"];
            echo "<input type='radio' name='campo_s' id='campo_sM' value='M'"; if($valor_salvo=="M"){echo " checked";} echo">";
            echo "<label for='campo_sM'>Masculino</label>";
            echo "<input type='radio' name='campo_s' id='campo_sF' value='F'"; if($valor_salvo=="F"){echo " checked";} echo">";
            echo "<label for='campo_sF'>Feminino</label> <br><br>";
            if (isset($_GET["ecms"]) && !empty($_GET["ecms"]))
                echo "<p class=\"msg_erro\">" . $_GET["ecms"] . "</p>";
            
            echo "<br><label for='funcao' class='form-label'><strong>Função: </strong></label>";
                if(isset($_GET["fnc"]) && !empty($_GET["fnc"]))
                    $valor_salvo = $_GET["fnc"];
                echo "<input type='text' placeholder='Função' required class='form-control' id='funcao' name='funcao' value='$valor_salvo'>";
                if (isset($_GET["efnc"]) && !empty($_GET["efnc"]))
                    echo "<br><p class=\"msg_erro\">" . $_GET["efnc"] . "</p>";

        echo "<br><label for='senha' class='form-label'><strong>Senha: </strong></label>";
            echo "<input type='password' class='form-control' maxlength = '6' id='senha' required name='senha' value=''>";
            if (isset($_GET["epss"]) && !empty($_GET["epss"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["epss"] . "</p>";

        echo "<br><label for='confirm_senha' class='form-label'><strong>Confirme a senha: </strong></label>";
            echo "<input type='password' class='form-control' maxlength = '6' id='confirm_senha' required name='confirm_senha' value=''>";
            if (isset($_GET["ecps"]) && !empty($_GET["ecps"]))
                echo "<br><p class=\"msg_erro\">" . $_GET["ecps"] . "</p>";
    }

    function validacaoOk () {
        echo "<h1 align='center'>Cadastro realizado com sucesso!</h1>";
        echo "<br>";
        echo "<center>";
        echo "<img src='img/sucesso.gif' height='250px' width='300px' style='margin-bottom: 10px'>";
        echo "</center>";
    }
?>

<script type="module">

    import componentes from './modulos/componentes.js';

    const title = document.getElementById('titulo_formulario');

    <?php
    if($formType != "default"){
        if($cad_att == "cadastrar"){
            echo "title.innerText = 'Cadastrar $formType'";
        } else {
            echo "title.innerText = 'Atualizar $formType'";
        }
    }
    ?>

    <?php
    if(isset($_GET['jcd']) && !empty($_GET['jcd'])) {
        $mensagem = $_GET['jcd'];
        echo "componentes.displayAlert('Cadastro repetido!', '$mensagem');";
    }elseif(isset($_GET['dtinv']) && !empty($_GET['dtinv'])){
        $mensagem = $_GET['dtinv'];
        echo "componentes.displayAlert('Datas invertidas!', '$mensagem');";
    }elseif(isset($_GET['dtic']) && !empty($_GET['dtic'])){
        $mensagem = $_GET['dtic'];
        echo "componentes.displayAlert('Datas cruzadas!', '$mensagem');";
    }elseif(isset($_GET['dtfc']) && !empty($_GET['dtfc'])){
        $mensagem = $_GET['dtfc'];
        echo "componentes.displayAlert('Datas cruzadas!', '$mensagem');";
    }
    ?>

</script>

</body>
</html>