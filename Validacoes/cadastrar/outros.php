<?php

    if (!isset($_POST['tipo'])) {
        header("Location: ../formularios-cadastro.php?id=weird");
        echo "Ocorreu um erro inesperado! Por favor, tente cadastrar novamente.";
    }

    include ('../../modulos/funcoes.php');

    $tipo = $_POST['tipo'];
    $cadastroCorreto = true;
    $msgErro = array(
        1 => "",
        2 => "",
        3 => "",
        4 => ""
    );

    switch ($tipo) {
        case "turma":
            if (!isset($_POST['nome_turma']) || $_POST['nome_turma']=="") {
                $msgErro[1] = "<br> * Você não inseriu o nome da turma.";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['serie']) || $_POST['serie']=="none") {
                $msgErro[2] = "<br> * Você não escolheu a série.";
                $cadastroCorreto = false;
            }
            break;
        case "disciplina":
            if (!isset($_POST['nome_disciplina']) || $_POST['nome_disciplina']=="") {
                $msgErro[1] = "<br> * Você não inseiriu o nome da disciplina.";
            }

            if (!isset($_POST['ano'])) {
                $msgErro[2] = "<br> * Você não inseriu o ano em que será lessionada esta disiciplina.";
            }

            
            break;
        case "bimestre":
            break;
    }

?>