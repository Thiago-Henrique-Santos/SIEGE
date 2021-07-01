<?php

    if (!isset($_POST['tipo']) || empty($_POST['tipo'])) {
        header("Location: ../formularios-cadastro.php?id=weird");
        echo "Ocorreu um erro inesperado! Por favor, tente cadastrar novamente.";
    }

    include ('../../modulos/funcoes.php');

    $cadastroCorreto = true;
    $msgErro = array(
        1 => "",
        2 => "",
        3 => "",
        4 => ""
    );

    switch ($_POST['tipo']) {
        case "turma":
            if (!isset($_POST['nome_turma']) || empty($_POST['nome_turma'])) {
                $msgErro[1] = "<br> * Você não inseriu o nome da turma.";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['serie']) || $_POST['serie']=="none") {
                $msgErro[2] = "<br> * Você não escolheu a série.";
                $cadastroCorreto = false;
            }
            break;
        case "disciplina":
            if (!isset($_POST['nome_disciplina']) || empty($_POST['nome_disciplina'])) {
                $msgErro[1] = "<br> * Você não inseriu o nome da disciplina.";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['ano'])) {
                $msgErro[2] = "<br> * Você não inseriu o ano em que será lessionada esta disiciplina.";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['professor']) || $_POST['professor']=="none"){
                $msgErro[3] = "<br> * Você não inseriu o professor desta disciplina.";
                $cadastroCorreto = false;
            }

            $turmas = $_POST['turma'];
            if(!isset($_POST['turma']) || empty($turmas)){
                $msgErro[4] = "<br> * Você não escolheu nenhuma disciplina para essa matéria.";
                $cadastroCorreto = false; 
            }
            break;
        case "bimestre":
            if (!isset($_POST['numero']) || $_POST['numero']=="none") {
                $msgErro[1] = "<br> * Você não identificou qual bimestre está cadastrando.";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['data_inicial'])) {
                $msgErro[2] = "<br> * Você não esepcificou o início do bimestre.";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['data_final'])) {
                $msgErro[3] = "<br> * Você não esepcificou o fim do bimestre.";
                $cadastroCorreto = false;
            }
            break;
    }

    if ($cadastroCorreto) {
        switch ($_POST['tipo']) {
            case "turma":
                $nm = $_POST['nome_turma'];
                $sr = $_POST['serie'];
                header ("Location: ../../CRUD/Turma/create.php?nm=$nm&sr=$sr");
                break;
            case "disciplina":
                $nm         = $_POST['nome_disciplina'];
                $ano        = $_POST['ano'];
                $prof       = $_POST['professor'];
                $linkTurmas = "";
                $i = 1;
                foreach ($turmas as $turma) {
                    $linkTurmas .= "&tur[$i]=$turma";
                    $i++;
                }
                header ("Location: ../../CRUD/Disciplina/create.php?nm=$nm&ano=$ano&prf=$prof$linkTurmas");
                break;
            case "bimestre":
                $nmr = $_POST['numero'];
                $dti = $_POST['data_inicial'];
                $dtf = $_POST['data_final'];
                header ("Location: ../../CRUD/Bimestre/create.php?nmr=$nmr&dti=$dti&dtf=$dtf");
                break;
        }
    } else {
        switch ($_POST['tipo']) {
            case "turma":
                $nm = $_POST['nome_turma'];
                $sr = $_POST['serie'];
                header ("Location: ../../formularios-cadastro.php?id=turma&nm=$nm&sr=$sr&enm=$msgErro[1]&esr=$msgErro[2]");
                break;
            case "disciplina":
                $nm    = $_POST['nome_disciplina'];
                $ano   = $_POST['ano'];
                $prof  = $_POST['professor'];
                $linkTurmas = "";
                $i = 1;
                foreach ($turmas as $turma) {
                    $linkTurmas .= "&tur[$i]=$turma";
                    $i++;
                }
                header ("Location: ../../formularios-cadastro.php?id=disciplina&nm=$nm&ano=$ano&prf=$prof$linkTurmas&enm=$msgErro[1]&eano=$msgErro[2]&eprf=$msgErro[3]&etur=$msgErro[4]");
                break;
            case "bimestre":
                $nmr = $_POST['numero'];
                $dti = $_POST['data_inicial'];
                $dtf = $_POST['data_final'];
                header ("Location: ../../formularios-cadastro.php?id=bimestre&nmr=$nmr&dti=$dti&dtf=$dtf&enmr=$msgErro[1]&edti=$msgErro[2]&edtf=$msgErro[3]");
                break;
        }
    }
?>