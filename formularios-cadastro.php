<?php

if (!isset($_GET['id']) || empty($_GET['id']) || !isset($_GET['tfm']) || empty($_GET['tfm'])) {
    echo "Erro!";
}

date_default_timezone_set('America/Sao_Paulo');
include("BancoDados/conexao_mysql.php");
include("modulos/funcoes.php");
date_default_timezone_set('America/Sao_Paulo');
$data_atual = date('d/m/Y');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link rel="stylesheet" type="text/css" href="CSS/modulos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script>
        function toggleSubject(id) {
            var buttons = document.querySelectorAll('button.att_disciplina');

            for (let i = 0; i < buttons.length; i++) {
                let div = document.querySelectorAll('div.sh')[i];
                if (buttons[i].id == id) {
                    if (div.style.display == "none")
                        div.style.display = "table-row";
                    else
                        div.style.display = "none";
                }
            }
        }

        function reloadModal(registerType) {
            var path = `formularios-cadastro.php?id=${registerType}&tfm=cadastrar`;
            window.location = path;
        }

        function mascara(telefone) {
            if (telefone.value.length == 0)
                telefone.value = '(' + telefone.value; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
            if (telefone.value.length == 3)
                telefone.value = telefone.value + ') '; //quando o campo já tiver 3 caracteres (um parênteses e 2 números) o script irá inserir mais um parênteses, fechando assim o código de área.

            if (telefone.value.length == 10)
                telefone.value = telefone.value + '-'; //quando o campo já tiver 8 caracteres, o script irá inserir um tracinho, para melhor visualização do telefone.
        }
    </script>
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
        case "validadoOK":
            validacaoOk();
            break;
        case "erro":
            alertaErro();
            break;
        default:
            def();
            break;
    }

    /******************************
     *           Funções           *
     ******************************/
    function def()
    {
        echo "<div style='width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;'>";
        echo "<h1 style='font-family: Arial, Helvetica, Calibri; font-size: 55px; font-weight: bold; color: gray;'>SIEGE</h1>";
        echo "</div>";
    }

    function diretor()
    {
        echo "<h1 align='center' class='titulo_medio' id='titulo_formulario'>Cadastrar</h1>";
        echo "<form method='POST' action='Validacoes/cadastrar/usuarios.php";
        if ($_GET['tfm'] == "atualizar") {
            echo "?att=on&idtf=" . $_GET['idtf'];
        }
        echo "'>";
        echo "<input type='text' style='display: none;' id='cargo' name='cargo' value='diretor'>";

        campos_funcionarios();

        echo "<br><br>";
        echo "<center>";
        echo "<input class='btn btn-primary' style='margin-bottom: 10px;' type='submit' name='botao' value='Confirmar'>";
        echo "</center>";
        echo "</form>";
    }

    function supervisor()
    {
        echo "<h1 align='center' class='titulo_medio' id='titulo_formulario'>Cadastrar</h1>";
        echo "<form method='POST' action='Validacoes/cadastrar/usuarios.php";
        if ($_GET['tfm'] == "atualizar") {
            echo "?att=on&idtf=" . $_GET['idtf'];
        }
        echo "'>";
        echo "<input type='text' style='display: none;' id='cargo' name='cargo' value='supervisor'>";

        campos_funcionarios();

        echo "<br><br>";
        echo "<center>";
        echo "<input class='btn btn-primary' style='margin-bottom: 10px;' type='submit' name='botao' value='Confirmar'>";
        echo "</center>";
        echo "</form>";
    }

    function professor()
    {
        echo "<h1 align='center' class='titulo_medio' id='titulo_formulario'>Cadastrar</h1>";
        echo "<form method='POST' action='Validacoes/cadastrar/usuarios.php";
        if ($_GET['tfm'] == "atualizar") {
            echo "?att=on&idtf=" . $_GET['idtf'];
        }
        echo "'>";
        echo "<input type='text' style='display: none;' id='cargo' name='cargo' value='professor'>";

        campos_funcionarios();

        echo "<br><br>";
        echo "<center>";
        echo "<input class='btn btn-primary' style='margin-bottom: 10px;' type='submit' name='botao' value='Confirmar'>";
        echo "</center>";
        echo "</form>";
    }

    function secretario()
    {
        echo "<h1 align='center' class='titulo_medio' id='titulo_formulario'>Cadastrar</h1>";
        echo "<form method='POST' action='Validacoes/cadastrar/usuarios.php";
        if ($_GET['tfm'] == "atualizar") {
            echo "?att=on&idtf=" . $_GET['idtf'];
        }
        echo "'>";
        echo "<input type='text' style='display: none;' id='cargo' name='cargo' value='secretario'>";

        campos_funcionarios();

        echo "<br><br>";
        echo "<center>";
        echo "<input class='btn btn-primary' style='margin-bottom: 10px;' type='submit' name='botao' value='Confirmar'>";
        echo "</center>";
        echo "</form>";
    }

    function aluno()
    {
        global $conexao;
        $valor_salvo = "";

        echo "<h1 align='center' class='titulo_medio' id='titulo_formulario'>Cadastrar</h1>";
        echo "<form method='POST' action='Validacoes/cadastrar/usuarios.php";
        if ($_GET['tfm'] == "atualizar") {
            echo "?att=on&idtf=" . $_GET['idtf'];
        }
        echo "'>";
        echo "<input type='text' style='display: none;' id='cargo' name='cargo' value='aluno'>";

        echo "<br><label for='nome_completo' style='margin-left: 10px;' class='form-label'><strong>Nome completo: </strong></label>";
        if (isset($_GET["nm"]) && !empty($_GET["nm"]))
            $valor_salvo = $_GET["nm"];
        echo "<input type='text' style='margin-left: 10px;width: 370px;' placeholder='Nome completo' pattern='^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$' required class='form-control' id='nome_completo' name='nome_completo' value='$valor_salvo'>";
        if (isset($_GET["enm"]) && !empty($_GET["enm"]))
            echo "<br><p class=\"msg_erro\">" . $_GET["enm"] . "</p>";

        echo "<br><label for='data_nascimento' style='margin-left: 10px;' class='form-label'><strong>Data de Nascimento: </strong></label>";
        if (isset($_GET["dt"]) && !empty($_GET["dt"]))
            $valor_salvo = $_GET["dt"];
        echo "<input type='date' style='margin-left: 10px;width: 370px;' required class='form-control' id='data_nascimento' name='data_nascimento' value='$valor_salvo'>";
        if (isset($_GET["edt"]) && !empty($_GET["edt"]))
            echo "<br><p class=\"msg_erro\">" . $_GET["edt"] . "</p>";

        echo "<br><label for='matricula' style='margin-left: 10px;' class='form-label'><strong>Número da matrícula: </strong></label>";
        if (isset($_GET["mt"]) && !empty($_GET["mt"]))
            $valor_salvo = $_GET["mt"];
        echo "<input type='text' style='margin-left: 10px;width: 370px;' placeholder='12345678' required class='form-control' id='matricula' name='matricula' value='$valor_salvo'>";
        if (isset($_GET["emt"]) && !empty($_GET["emt"]))
            echo "<br><p class=\"msg_erro\">" . $_GET["emt"] . "</p>";

        echo "<br><label for='responsavel' style='margin-left: 10px;' class='form-label'><strong>Nome do responsável: </strong></label>";
        if (isset($_GET["rsp"]) && !empty($_GET["rsp"]))
            $valor_salvo = $_GET["rsp"];
        echo "<input type='text' style='margin-left: 10px;width: 370px;' placeholder='Nome Completo' pattern='^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$' required class='form-control' id='responsavel' name='responsavel' value='$valor_salvo'>";
        if (isset($_GET["ersp"]) && !empty($_GET["ersp"]))
            echo "<br><p class=\"msg_erro\">" . $_GET["ersp"] . "</p>";

        echo "<br><label for='email' style='margin-left: 10px;' class='form-label'><strong>Email: </strong></label>";
        if (isset($_GET["eml"]) && !empty($_GET["eml"]))
            $valor_salvo = $_GET["eml"];
        echo "<input type='email' style='margin-left: 10px;width: 370px;' placeholder='exemplo@exemplo.ex' class='form-control' minlength = '5' required pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' title='O email deve conter @ e . ao final.' id='email' name='email' value='$valor_salvo'>";
        if (isset($_GET["eeml"]) && !empty($_GET["eeml"]))
            echo "<br><p class=\"msg_erro\">" . $_GET["eeml"] . "</p>";

        echo "<br><label for='telefone' style='margin-left: 10px;' class='form-label'><strong>Telefone do responsável: </strong></label>";
        if (isset($_GET["tlf"]) && !empty($_GET["tlf"]))
            $valor_salvo = $_GET["tlf"];
        echo "<input type='tel' style='margin-left: 10px;width: 370px;' placeholder='(00) 00000-0000' required pattern='\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}' maxlength = '15' onkeypress='mascara(this)' title='Insira seu telefone com o DDD e o número precedido de 9.' class='form-control' id='telefone' name='telefone' value='$valor_salvo'>";
        if (isset($_GET["etlf"]) && !empty($_GET["etlf"]))
            echo "<br><p class=\"msg_erro\">" . $_GET["etlf"] . "</p>";

        echo "<br><label for='campo_zona' style='margin-left: 10px;'><strong>Local de moradia: </strong></label><br>";
        if (isset($_GET["czn"]) && !empty($_GET["czn"]))
            $valor_salvo = $_GET["czn"];
        echo "<input type='radio' style='margin-left: 10px;' name='campo_zona' id='campo_zR' value='R'";
        if ($valor_salvo == "R") {
            echo " checked";
        }
        echo ">";
        echo "<label for='campo_zR' style='margin-left: 10px;'>Zona rural</label>";
        echo "&emsp;";
        echo "<input type='radio' name='campo_zona' id='campo_zU' value='U'";
        if ($valor_salvo == "U") {
            echo " checked";
        }
        echo ">";
        echo "<label for='campo_zU' style='margin-left: 10px;'>Zona urbana</label> <br><br>";
        if (isset($_GET["eczn"]) && !empty($_GET["eczn"]))
            echo "<br><p class=\"msg_erro\">" . $_GET["eczn"] . "</p>";

        echo "<br><label for='campo_s' style='margin-left: 10px;'><strong>Sexo: </strong></label><br>";
        if (isset($_GET["cms"]) && !empty($_GET["cms"]))
            $valor_salvo = $_GET["cms"];
        echo "<input type='radio' style='margin-left: 10px;' name='campo_s' id='campo_sM' value='M'";
        if ($valor_salvo == "M") {
            echo " checked";
        }
        echo ">";
        echo "<label for='campo_sM' style='margin-left: 10px;'>Masculino</label>";
        echo "&emsp;";
        echo "<input type='radio' name='campo_s' id='campo_sF' value='F'";
        if ($valor_salvo == "F") {
            echo " checked";
        }
        echo ">";
        echo "<label for='campo_sF' style='margin-left: 10px;'>Feminino</label> <br><br>";
        if (isset($_GET["ecms"]) && !empty($_GET["ecms"]))
            echo "<br><p class=\"msg_erro\">" . $_GET["ecms"] . "</p>";

        echo "<br><label for='turma' style='margin-left: 10px;' class='form-label'><strong>Turma do aluno:</strong></label>";
        if (isset($_GET["tur"]) && $_GET["tur"] != "none")
            $valor_salvo = $_GET["tur"];
        echo "<br><select name='turma' style='margin-left: 10px;width: 370px;' class='form-select'>";
        echo "<option value='none' selected>--</option>";
        $sql = "
                    SELECT * FROM turma WHERE id != 1 ORDER BY serie ASC, nome ASC
                    ";
        $resultado = $conexao->query($sql);
        if ($resultado->num_rows > 0) {
            while ($dados = $resultado->fetch_assoc()) {
                echo "<option value='" . $dados["id"] . "' ";
                if ($valor_salvo == $dados["id"]) {
                    echo "selected";
                }
                echo ">" . $dados["serie"] . "&ordm; ano " . $dados["nome"] . "</option>";
            }
        }
        echo "</select>";
        if (isset($_GET["etur"]) && !empty($_GET["etur"]))
            echo "<br><p class=\"msg_erro\">" . $_GET["etur"] . "</p>";

        echo "<br><label for='senha' style='margin-left: 10px;' class='form-label'><strong>Senha: </strong></label>";
        echo "<input type='password' style='margin-left: 10px;width: 370px;' class='form-control' maxlength = '6' id='senha' required name='senha' value=''>";
        if (isset($_GET["epss"]) && !empty($_GET["epss"]))
            echo "<br><p class=\"msg_erro\">" . $_GET["epss"] . "</p>";

        echo "<br><label for='confirm_senha' style='margin-left: 10px;' class='form-label'><strong>Confirme a senha: </strong></label>";
        echo "<input type='password' style='margin-left: 10px;width: 370px;' class='form-control' maxlength = '6' id='confirm_senha' required name='confirm_senha' value=''>";
        if (isset($_GET["ecps"]) && !empty($_GET["ecps"]))
            echo "<br><p class=\"msg_erro\">" . $_GET["ecps"] . "</p>";

        echo "<br><br>";
        echo "<center>";
        echo "<input class='btn btn-primary' style='margin-bottom: 10px;' type='submit' name='botao' value='Confirmar'>";
        echo "</center>";
        echo "</form>";
    }

    function turma()
    {
        global $cad_att, $conexao;
        $valor_salvo = "";

        echo "<h1 align='center' class='titulo_medio' id='titulo_formulario'>Cadastrar</h1>";
        echo "<form method='POST' action='Validacoes/cadastrar/outros.php";
        if ($_GET['tfm'] == "atualizar") {
            echo "?att=on&idtf=" . $_GET['idtf'];
        }
        echo "'>";
        echo "<input type='text' style='display: none;' id='tipo' name='tipo' value='turma'>";

        if (isset($_GET['nm']) && !empty($_GET['nm']))
            $valor_salvo = $_GET['nm'];
        echo "<label for='nome_turma' style='margin-left: 10px;' class='form-label'><strong>Nome da turma:</strong></label>";
        echo "<input type='text' style='margin-left: 10px;width: 370px;' placeholder='A' class='form-control' required title='Insira o nome da turma.' name='nome_turma' value='$valor_salvo'>";
        if (isset($_GET['enm']) && !empty($_GET['enm']))
            echo "<br><p class=\"msg_erro\">" . $_GET["enm"] . "</p>";

        if (isset($_GET['sr']) && !empty($_GET['sr']))
            $valor_salvo = $_GET['sr'];
        echo "<br><label for='serie' style='margin-left: 10px;' class='form-label'><strong>Série:</strong></label>";
        echo "<br><select name='serie' style='margin-left: 10px;width: 370px;' class='form-select' required>";
        echo "<option value='none' selected>--</option>";
        echo "<option value='2' ";
        if ($valor_salvo == 2) {
            echo "selected";
        }
        echo ">2&ordm;</option>";
        echo "<option value='3' ";
        if ($valor_salvo == 3) {
            echo "selected";
        }
        echo ">3&ordm;</option>";
        echo "<option value='4' ";
        if ($valor_salvo == 4) {
            echo "selected";
        }
        echo ">4&ordm;</option>";
        echo "<option value='5' ";
        if ($valor_salvo == 5) {
            echo "selected";
        }
        echo ">5&ordm;</option>";
        echo "<option value='6' ";
        if ($valor_salvo == 6) {
            echo "selected";
        }
        echo ">6&ordm;</option>";
        echo "<option value='7' ";
        if ($valor_salvo == 7) {
            echo "selected";
        }
        echo ">7&ordm;</option>";
        echo "<option value='8' ";
        if ($valor_salvo == 8) {
            echo "selected";
        }
        echo ">8&ordm;</option>";
        echo "<option value='9' ";
        if ($valor_salvo == 9) {
            echo "selected";
        }
        echo ">9&ordm;</option>";
        echo "</select>";
        if (isset($_GET['esr']) && !empty($_GET['esr']))
            echo "<br><p class=\"msg_erro\">" . $_GET["esr"] . "</p>";

        if ($cad_att == "atualizar") {
            $sql = "SELECT d.id AS 'id_disciplina', d.nome AS 'nome_disciplina', d.id_professor AS 'id_professor', 
                        d.id_turma AS 'id_turma', u.id AS 'id_usuario', u.nome AS 'nome_professor' 
                        FROM disciplina d, usuario u WHERE id_turma =" . $_GET['idtf'] . " AND d.id_professor = u.id
                        ORDER BY d.nome ASC";
            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
                echo "<br><label class='form-label' style='margin-left: 10px;'><strong>Disciplinas:</strong></label>";
                echo "<ul>";
                $i = 0;
                while ($linha = $resultado->fetch_assoc()) {
                    echo "<li><button id='$i' onclick='toggleSubject(this.id)' class='att_disciplina' type='button'>" . $linha['nome_disciplina'] . "</button></li>";
                    echo "<div class='sh' style='display: none;'>";
                    echo "&emsp;<label for='disciplina_$i' style='margin-left: 10px;' class='form-label'><u>Nome</u>:</label>";
                    $getName = "dsc$i";
                    if (isset($_GET[$getName]) && !empty($_GET[$getName]))
                        $valor_salvo = $_GET[$getName];
                    echo "&nbsp;<input type='text' style='margin-left: 10px;width: 370px;' id='disciplina_$i' name='disciplina_$i' required title='Preencha o nome da disciplina' value='";
                    if (isset($_GET[$getName]) && !empty($_GET[$getName])) {
                        echo $valor_salvo;
                    } else {
                        echo $linha['nome_disciplina'];
                    }
                    echo "'><br>";
                    echo "&emsp;<label for='professor_$i' style='margin-left: 10px;' class='form-label'><u>Professor</u>:</label>";

                    $getName = "prf$i";
                    if (isset($_GET[$getName]) && !empty($_GET[$getName]))
                        $valor_salvo = $_GET[$getName];
                    echo "&nbsp;<select name='professor_$i' style='margin-left: 10px;width: 370px;' title='Selecione o nome do professor da disciplina' required>";

                    if ($linha['nome_professor'] == 'Default')
                        $linha['nome_professor'] = "--";
                    echo "<option value='";
                    if (isset($_GET[$getName]) && !empty($_GET[$getName])) {
                        echo $valor_salvo;
                    } else {
                        echo $linha['id_professor'];
                    }
                    echo "' selected>" . $linha['nome_professor'] . "</option>";
                    $sql2 = "SELECT id, nome FROM usuario WHERE tipo_usuario = 2 AND id != 1 AND id != ";
                    if (isset($_GET[$getName]) && !empty($_GET[$getName])) {
                        $sql2 .= $valor_salvo;
                    } else {
                        $sql2 .= $linha['id_professor'];
                    }
                    $sql2 .= " ORDER BY nome ASC";
                    $resultado2 = $conexao->query($sql2);
                    if ($resultado2->num_rows > 0) {
                        while ($dados = $resultado2->fetch_assoc()) {
                            echo "<option value='" . $dados["id"] . "' ";
                            if ($valor_salvo == $dados['id']) {
                                echo "selected";
                            }
                            echo ">" . $dados["nome"] . "</option>";
                        }
                    }
                    echo "</select>";


                    echo "<input type='text' name='didtf_$i' style='display: none;' value='" . $linha['id_disciplina'] . "'>";
                    echo "</div><br><br>";
                    $i++;
                }
                echo "</ul>";
                echo "<input type='text' name='quant_disciplina' style='display: none;' value='$i'>";
            } else
                echo "<br>&emsp; Não foram encontradas disciplinas!";
        }

        echo "<center>";
        echo "<br><input class='btn btn-primary' style='margin-bottom: 10px;' type='submit' name='botao' value='Confirmar'>";
        echo "</center>";
        echo "</form>";
    }

    function disciplina()
    {
        global $conexao, $cad_att;
        $valor_salvo = "";

        echo "<h1 align='center' class='titulo_medio' id='titulo_formulario'>Cadastrar</h1>";
        echo "<form method='POST' action='Validacoes/cadastrar/outros.php";
        if ($_GET['tfm'] == "atualizar") {
            echo "?att=on&idtf=" . $_GET['idtf'];
        }
        echo "'>";

        echo "<input type='text' style='display: none;' id='tipo' name='tipo' value='disciplina'>";

        if (isset($_GET['nm']) && !empty($_GET['nm']))
            $valor_salvo = $_GET['nm'];
        echo "<label for='nome_disciplina' style='margin-left: 10px;' class='form-label'><strong>Nome da disciplina:</strong></label>";
        echo "<input type='text' placeholder='Matemática' style='margin-left: 10px;width: 370px;' class='form-control' title='Insira o nome da turma.' required name='nome_disciplina' value='$valor_salvo'>";
        if (isset($_GET['enm']) && !empty($_GET['enm']))
            echo "<br><p class=\"msg_erro\">" . $_GET["enm"] . "</p>";

        if ($cad_att != "atualizar") {
            if (isset($_GET['ano']) && !empty($_GET['ano']))
                $valor_salvo = $_GET['ano'];
            echo "<br><label for='ano' style='margin-left: 10px;' class='form-label'><strong>Ano em que será lecionada:</strong></label>";
            echo "<br><select name='ano' style='margin-left: 10px;width: 370px;' class='form-select' required>";
            $anoAtual = date("Y");
            for ($i = $anoAtual - 80; $i <= $anoAtual + 1; $i++) {
                echo "<option value='$i' ";
                if ($valor_salvo == $i) {
                    echo "selected";
                    $valor_salvo = "";
                } elseif ($i == $anoAtual) {
                    echo "selected";
                    $valor_salvo = "";
                }
                echo ">$i</option>";
            }
            echo "</select>";
            if (isset($_GET['eano']) && !empty($_GET['eano']))
                echo "<br><p class=\"msg_erro\">" . $_GET["eano"] . "</p>";
        }

        if (isset($_GET['prf']) && !empty($_GET['prf']))
            $valor_salvo = $_GET['prf'];
        echo "<br><label for='professor' style='margin-left: 10px;' class='form-label'><strong>Professor da disciplina:</strong></label>";
        echo "<br><select name='professor' style='margin-left: 10px;width: 370px;' class='form-select' required>";
        $opcaoSelecionada_id = 0;
        echo "<option value='";
        if ($cad_att == "atualizar") {
            $sql = "SELECT u.id FROM usuario u INNER JOIN disciplina d ON d.id_professor=u.id WHERE d.id=" . $_GET['idtf'];
            $resultado = $conexao->query($sql);
            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {
                    echo $linha['id'];
                    $opcaoSelecionada_id = $linha['id'];
                }
            }
        } else {
            echo "none";
        }
        echo "' selected>";
        if ($cad_att == "atualizar") {
            $sql = "SELECT u.nome FROM usuario u INNER JOIN disciplina d ON d.id_professor=u.id WHERE d.id=" . $_GET['idtf'];
            $resultado = $conexao->query($sql);
            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {
                    if ($linha['nome'] == 'Default')
                        $linha['nome'] = "--";
                    echo $linha['nome'];
                }
            }
        } else {
            echo "--";
        }
        echo "</option>";
        $sql = "SELECT id, nome FROM usuario WHERE tipo_usuario = 2 AND id != 1 AND id != $opcaoSelecionada_id ORDER BY nome ASC";
        $resultado = $conexao->query($sql);
        if ($resultado->num_rows > 0) {
            while ($dados = $resultado->fetch_assoc()) {
                echo "<option value='" . $dados["id"] . "' ";
                if ($valor_salvo == $dados['id']) {
                    echo "selected";
                }
                echo ">" . $dados["nome"] . "</option>";
            }
        }
        echo "</select>";
        if (isset($_GET['eprf']) && !empty($_GET['eprf']))
            echo "<br><p class=\"msg_erro\">" . $_GET["eprf"] . "</p>";

        if ($cad_att != "atualizar") {
            if (isset($_GET['tur']) && !empty($_GET['tur']))
                $turmas = $_GET['tur'];
            echo "<br><label style='margin-left: 10px;' class='form-label'><strong>Turmas em que haverá esta disciplina:</strong></label>";
            $sql = "
                    SELECT * FROM turma WHERE id != 1 ORDER BY serie ASC, nome ASC
                    ";
            $resultado = $conexao->query($sql);
            if ($resultado->num_rows > 0) {
                $i = 1;
                while ($dados = $resultado->fetch_assoc()) {
                    echo "<br><input type='checkbox' style='margin-left: 10px;' name='turma[$i]' id='" . $dados["id"] . "' value='" . $dados["id"] . "' ";
                    if (isset($_GET['tur']) && !empty($_GET['tur'])) {
                        foreach ($turmas as $turma) {
                            if ($turma == $dados["id"]) {
                                echo "checked";
                            }
                        }
                    }
                    echo ">";
                    echo "<label for='" . $dados["id"] . "' class='form-label' style='margin-left: 10px;'>&nbsp;" . $dados["serie"] . "&ordm; ano " . $dados["nome"] . "</label>";
                    $i++;
                }
            }
            if (isset($_GET['etur']) && !empty($_GET['etur']))
                echo "<br><p class=\"msg_erro\">" . $_GET["etur"] . "</p>";
        }

        echo "<br><br>";
        echo "<center>";
        echo "<br><input class='btn btn-primary' style='margin-bottom: 10px;' type='submit' name='botao' value='Confirmar'>";
        echo "</center>";
        echo "</form>";
    }

    function campos_funcionarios()
    {
        $valor_salvo = "";
        echo "<br><label for='nome_completo' style='margin-left: 10px;' class='form-label'><strong>Nome completo: </strong></label>";
        if (isset($_GET["nm"]) && !empty($_GET["nm"]))
            $valor_salvo = $_GET["nm"];
        echo "<input type='text' style='margin-left: 10px;width: 370px;' placeholder='Nome Completo' pattern='^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$' required class='form-control' id='nome_completo' name='nome_completo' value='$valor_salvo'>";
        if (isset($_GET["enm"]) && !empty($_GET["enm"]))
            echo "<br><p class=\"msg_erro\">" . $_GET["enm"] . "</p>";

        echo "<br><label for='masp' style='margin-left: 10px;' class='form-label'><strong>MASP: </strong></label>";
        if (isset($_GET["mp"]) && !empty($_GET["mp"]))
            $valor_salvo = $_GET["mp"];
        echo "<input type='text' style='margin-left: 10px;width: 370px;' placeholder='12345678' minlength='7' maxlength='8' required class='form-control' id='masp' name='masp' value='$valor_salvo'>";
        if (isset($_GET["emp"]) && !empty($_GET["emp"]))
            echo "<br><p class=\"msg_erro\">" . $_GET["emp"] . "</p>";

        echo "<br><label for='email' style='margin-left: 10px;' class='form-label'><strong>Email: </strong></label>";
        if (isset($_GET["eml"]) && !empty($_GET["eml"]))
            $valor_salvo = $_GET["eml"];
        echo "<input type='email' style='margin-left: 10px;width: 370px;' placeholder='exemplo@exemplo.ex' class='form-control' minlength = '5' required pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' required title='O email deve conter @ e . ao final.' id='email' name='email' value='$valor_salvo'>";
        if (isset($_GET["eeml"]) && !empty($_GET["eeml"]))
            echo "<br><p class=\"msg_erro\">" . $_GET["eeml"] . "</p>";

        echo "<br><label for='campo_zona' style='margin-left: 10px;'><strong>Local de moradia: </strong></label><br>";
        if (isset($_GET["czn"]) && !empty($_GET["czn"]))
            $valor_salvo = $_GET["czn"];
        echo "<input type='radio' style='margin-left: 10px;' name='campo_zona' id='campo_zR' value='R'";
        if ($valor_salvo == "R") {
            echo " checked";
        }
        echo ">";
        echo "<label for='campo_zR' style='margin-left: 10px;'>Zona rural</label>";
        echo "&emsp;";
        echo "<input type='radio' name='campo_zona' id='campo_zU' value='U'";
        if ($valor_salvo == "U") {
            echo " checked";
        }
        echo ">";
        echo "<label for='campo_zU' style='margin-left: 10px;'>Zona urbana</label> <br><br>";
        if (isset($_GET["eczn"]) && !empty($_GET["eczn"]))
            echo "<p class=\"msg_erro\">" . $_GET["eczn"] . "</p>";

        echo "<br><label for='tipo_empregado' style='margin-left: 10px;'><strong>Tipo de empregado: </strong></label><br>";
        if (isset($_GET["tep"]) && !empty($_GET["tep"]))
            $valor_salvo = $_GET["tep"];
        echo "<input type='radio' style='margin-left: 10px;' name='tipo_empregado' id='designado' value='D'";
        if ($valor_salvo == "D") {
            echo " checked";
        }
        echo ">";
        echo "<label for='designado' style='margin-left: 10px;'>Designado</label>";
        echo "&emsp;";
        echo "<input type='radio' name='tipo_empregado' id='efetivo' value='E'";
        if ($valor_salvo == "E") {
            echo " checked";
        }
        echo ">";
        echo "<label for='efetivo' style='margin-left: 10px;'>Efetivo</label> <br><br>";
        if (isset($_GET["etep"]) && !empty($_GET["etep"]))
            echo "<p class=\"msg_erro\">" . $_GET["etep"] . "</p>";

        echo "<br><label for='campo_s' style='margin-left: 10px;'><strong>Sexo: </strong></label><br>";
        if (isset($_GET["cms"]) && !empty($_GET["cms"]))
            $valor_salvo = $_GET["cms"];
        echo "<input type='radio' style='margin-left: 10px;' name='campo_s' id='campo_sM' value='M'";
        if ($valor_salvo == "M") {
            echo " checked";
        }
        echo ">";
        echo "<label for='campo_sM' style='margin-left: 10px;'>Masculino</label>";
        echo "&emsp;";
        echo "<input type='radio' name='campo_s' id='campo_sF' value='F'";
        if ($valor_salvo == "F") {
            echo " checked";
        }
        echo ">";
        echo "<label for='campo_sF' style='margin-left: 10px;'>Feminino</label> <br><br>";
        if (isset($_GET["ecms"]) && !empty($_GET["ecms"]))
            echo "<p class=\"msg_erro\">" . $_GET["ecms"] . "</p>";

        echo "<br><label for='funcao' style='margin-left: 10px;' class='form-label'><strong>Função: </strong></label>";
        if (isset($_GET["fnc"]) && !empty($_GET["fnc"]))
            $valor_salvo = $_GET["fnc"];
        echo "<input type='text' style='margin-left: 10px;width: 370px;' placeholder='Função' required class='form-control' id='funcao' name='funcao' value='$valor_salvo'>";
        if (isset($_GET["efnc"]) && !empty($_GET["efnc"]))
            echo "<br><p class=\"msg_erro\">" . $_GET["efnc"] . "</p>";

        echo "<br><label for='senha' style='margin-left: 10px;' class='form-label'><strong>Senha: </strong></label>";
        echo "<input type='password' style='margin-left: 10px;width: 370px;' class='form-control' maxlength = '6' id='senha' required name='senha' value=''>";
        if (isset($_GET["epss"]) && !empty($_GET["epss"]))
            echo "<br><p class=\"msg_erro\">" . $_GET["epss"] . "</p>";

        echo "<br><label for='confirm_senha' style='margin-left: 10px;' class='form-label'><strong>Confirme a senha: </strong></label>";
        echo "<input type='password' style='margin-left: 10px;width: 370px;' class='form-control' maxlength = '6' id='confirm_senha' required name='confirm_senha' value=''>";
        if (isset($_GET["ecps"]) && !empty($_GET["ecps"]))
            echo "<br><p class=\"msg_erro\">" . $_GET["ecps"] . "</p>";
    }

    function validacaoOk()
    {
        global $cad_att;
        echo "<h1 align='center'>";
        if ($cad_att == "cadastrar") {
            echo "Cadastro realizado ";
        } else {
            echo "Atualização realizada ";
        }
        echo "com sucesso!</h1>";
        echo "<br>";
        echo "<center>";
        if ($cad_att == "cadastrar")
            echo "<img draggable='false' src='img/sucesso.gif' height='250px' width='250px' style='margin-bottom: 10px'>";
        else
            echo "<img draggable='false' src='img/correct.gif' height='300px' width='400px' style='margin-bottom: 10px'>";
        if (isset($_GET['rcd']) && !empty($_GET['rcd'])) {
            echo "<br><br>";
            echo "<button id='recadastrar' onclick='reloadModal(\"" . $_GET['rcd'] . "\")'>Cadastrar novamente<br><img src='img/again.png'></button>";
        }
        echo "</center>";
    }

    function alertaErro()
    {
        echo "<h1 align='center'>Ocorreu um erro inesperado!</h1>";
        echo "<br>";
        echo "<center>";
        echo "<img src='img/erro.gif' style='margin-bottom: 10px; width: 350px; height: auto;'>";
        echo "<br><br>";
        echo "<div id='mostra erro' style='width:100%; display: flex; justify-content: center; align-items: center;'>";
        echo "<img src='img/atencao.png' style='height: 20px; width: auto;'>";
        echo "<font style='font-size: 20px;'>" . $_GET['info'] . "</font>";
        echo "</div>";
    }
    ?>

    <script type="module">
        import componentes from './modulos/componentes.js';

        const title = document.getElementById('titulo_formulario');

        if (title) {
            <?php
            if ($formType == "secretario") {
                $formType = "secretário";
            }

            if ($formType != "default") {
                if ($cad_att == "cadastrar") {
                    echo "title.innerText = 'Cadastrar $formType'";
                } else {
                    echo "title.innerText = 'Atualizar $formType'";
                }
            }
            ?>
        }

        <?php
        if (isset($_GET['jcd']) && !empty($_GET['jcd'])) {
            $mensagem = $_GET['jcd'];
            echo "componentes.displayAlert('Cadastro repetido!', '$mensagem');";
        } elseif (isset($_GET['dtinv']) && !empty($_GET['dtinv'])) {
            $mensagem = $_GET['dtinv'];
            echo "componentes.displayAlert('Datas invertidas!', '$mensagem');";
        } elseif (isset($_GET['dtic']) && !empty($_GET['dtic'])) {
            $mensagem = $_GET['dtic'];
            echo "componentes.displayAlert('Datas cruzadas!', '$mensagem');";
        } elseif (isset($_GET['dtfc']) && !empty($_GET['dtfc'])) {
            $mensagem = $_GET['dtfc'];
            echo "componentes.displayAlert('Datas cruzadas!', '$mensagem');";
        }

        if ($_GET['id'] == "validadoOK" && $_GET['tfm'] == "atualizar") {
            echo "sessionStorage.setItem('reloadReadPage', true);";
        } else {
            echo "sessionStorage.setItem('reloadReadPage', false);";
        }
        ?>
    </script>

</body>

</html>