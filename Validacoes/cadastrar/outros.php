<?php

    if (!isset($_POST['tipo']) || empty($_POST['tipo'])) {
        header("Location: ../formularios-cadastro.php?id=weird");
        echo "Ocorreu um erro inesperado! Por favor, tente cadastrar novamente.";
    }

    include ('../../modulos/funcoes.php');
    include ('../../BancoDados/conexao_mysql.php');

    $cadastroCorreto = true;
    $msgErro = array(
        1 => "",
        2 => "",
        3 => "",
        4 => "",
        5 => ""
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

            $sql = "SELECT id, nome, serie FROM turma";
            $resultado = $conexao->query($sql);
            if ($resultado->num_rows > 0) {
                while ($dados = $resultado->fetch_assoc()) {
                    if (!isset($_GET['att'])) {
                        if ($_POST['nome_turma']==$dados['nome'] && $_POST['serie']==$dados['serie']) {
                            $msgErro[3] = "Esta turma já está cadastrada.";
                            $cadastroCorreto = false;
                        }
                    } else {
                        $sql2 = "SELECT nome, serie FROM turma WHERE id = ".$_GET['idtf'];
                        $resultado2 = $conexao->query($sql2);
                        if ($resultado2->num_rows > 0) {
                            while ($info = $resultado2->fetch_assoc()) {
                                if (($_POST['nome_turma']==$dados['nome'] && $_POST['serie']==$dados['serie']) && ($_POST['nome_turma']!=$info['nome'] || $_POST['serie']!=$info['serie'])) {
                                    $msgErro[3] = "Esta turma já está cadastrada.";
                                    $cadastroCorreto = false;
                                }
                            }
                        }
                    }
                }
            }
            break;
        case "disciplina":
            if (!isset($_POST['nome_disciplina']) || empty($_POST['nome_disciplina'])) {
                $msgErro[1] = "<br> * Você não inseriu o nome da disciplina.";
                $cadastroCorreto = false;
            }

            if (!isset($_GET['att'])) {
                if (!isset($_POST['ano'])) {
                    $msgErro[2] = "<br> * Você não inseriu o ano em que será lessionada esta disiciplina.";
                    $cadastroCorreto = false;
                }
            }

            if (!isset($_POST['professor']) || $_POST['professor']=="none"){
                $msgErro[3] = "<br> * Você não inseriu o professor desta disciplina.";
                $cadastroCorreto = false;
            }

            if (!isset($_GET['att'])) {
                $turmas = $_POST['turma'];
                if(!isset($_POST['turma']) || empty($turmas)){
                    $msgErro[4] = "<br> * Você não escolheu nenhuma disciplina para essa matéria.";
                    $cadastroCorreto = false; 
                }

                $sql = "SELECT nome, ano, id_professor, id_turma FROM disciplina";
                $resultado = $conexao->query($sql);
                if ($resultado->num_rows > 0) {
                    while ($dados = $resultado->fetch_assoc()) {
                        if ($_POST['nome_disciplina']==$dados['nome'] && $_POST['ano']==$dados['ano']) {
                            foreach ($turmas as $turma) {
                                if ($turma == $dados['id_turma']) {
                                    $msgErro[5] = "Já existe um cadastro de disciplina igual ao que você inseriu.";
                                    $cadastroCorreto = false; 
                                }
                            }
                        }
                    }
                }
            }
            break;
        case "bimestre":
            if (!isset($_POST['numero']) || $_POST['numero']=="none") {
                $msgErro[1] = "<br> * Você não identificou qual bimestre está cadastrando.";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['data_inicial'])) {
                $msgErro[2] = "<br> * Você não especificou o início do bimestre.";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['data_final'])) {
                $msgErro[3] = "<br> * Você não especificou o fim do bimestre.";
                $cadastroCorreto = false;
            }

            if($_POST['data_inicial'] >= $_POST['data_final']){
                $msgErro[4] = "A data final do bimestre está antes ou no mesmo dia da data inicial.";
                $cadastroCorreto = false;
            }

            $sql = "SELECT numero, dataTermino FROM bimestre";
            $resultado = $conexao->query($sql);
            if ($resultado->num_rows > 0) {
                while($dados = $resultado->fetch_assoc()) {
                    if ($dados['numero'] < $_POST['numero']){
                        if ($_POST['data_inicial'] <= $dados['dataTermino']) {
                            $msgErro[5] = "A data inicial deste bimestre está interferindo com a data de término de um bimestre anterior.";
                            $cadastroCorreto = false;
                        }
                    }
                }
            }

            $sql = "SELECT numero, dataInicio FROM bimestre";
            $resultado = $conexao->query($sql);
            if ($resultado->num_rows > 0) {
                while($dados = $resultado->fetch_assoc()) {
                    if ($dados['numero'] > $_POST['numero']){
                        if ($_POST['data_final'] >= $dados['dataInicio']) {
                            $msgErro[6] = "A data final deste bimestre está interferindo com a data incial de um próximo bimestre.";
                            $cadastroCorreto = false;
                        }
                    }
                }
            }

            $sql = "SELECT numero FROM bimestre";
            $resultado = $conexao->query($sql);
            if ($resultado->num_rows > 0) {
                while ($dados = $resultado->fetch_assoc()) {
                    if ($_POST['numero']==$dados['numero']) {
                        $msgErro[7] = "Esse bimestre já foi cadastrado.";
                        $cadastroCorreto = false;
                    }
                }
            }
            break;
    }

    if ($cadastroCorreto) {
        switch ($_POST['tipo']) {
            case "turma":
                $nm = $_POST['nome_turma'];
                $sr = $_POST['serie'];
                if (!isset($_GET['att'])) {
                    header ("Location: ../../CRUD/Turma/create.php?nm=$nm&sr=$sr");
                } else {
                    $linkagem  = "Location: ../../CRUD/Turma/update.php?idtf=" . $_GET['idtf'] . "&nm=$nm&sr=$sr";
                    if (isset($_POST['quant_disciplina'])) {
                        $quantidade = (int) $_POST['quant_disciplina'];
                        for ($i = 0; $i < $quantidade; $i++){
                            $getName   = "didtf_$i";
                            $linkagem .= "&didtf$i=".$_POST[$getName];
                            $getName   = "disciplina_$i";
                            $linkagem .= "&dsc$i=".$_POST[$getName];
                            $getName   = "professor_$i";
                            $linkagem .= "&prf$i=".$_POST[$getName];
                        }
                        $linkagem .= "&quant=$i";
                    }
                    header($linkagem);
                }
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
                if (!isset($_GET['att'])) {
                    header ("Location: ../../CRUD/Disciplina/create.php?nm=$nm&ano=$ano&prf=$prof$linkTurmas");
                } else {
                    $idtf = $_GET['idtf'];
                    header ("Location: ../../CRUD/Disciplina/update.php?nm=$nm&prf=$prof&idtf=$idtf");
                }
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
                if (!isset($_GET['att'])) {
                    header ("Location: ../../formularios-cadastro.php?id=turma&tfm=cadastrar&nm=$nm&sr=$sr&enm=$msgErro[1]&esr=$msgErro[2]&jcd=$msgErro[3]");
                } else {
                    $linkagem  = "Location: ../../formularios-cadastro.php?id=turma&tfm=atualizar&nm=$nm&sr=$sr&enm=$msgErro[1]&esr=$msgErro[2]&jcd=$msgErro[3]";
                    if (isset($_POST['quant_disciplina'])) {
                        $quantidade = (int) $_POST['quant_disciplina'];
                        for ($i = 0; $i < $quantidade; $i++){
                            $getName   = "didtf_$i";
                            $linkagem .= "&didtf$i=".$_POST[$getName];
                            $getName   = "disciplina_$i";
                            $linkagem .= "&dsc$i=".$_POST[$getName];
                            $getName   = "professor_$i";
                            $linkagem .= "&prf$i=".$_POST[$getName];
                        }
                        $linkagem .= "&quant=$i&idtf=".$_GET['idtf'];
                    }
                    header($linkagem);
                }
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
                header ("Location: ../../formularios-cadastro.php?id=disciplina&tfm=cadastrar&nm=$nm&ano=$ano&prf=$prof$linkTurmas&enm=$msgErro[1]&eano=$msgErro[2]&eprf=$msgErro[3]&etur=$msgErro[4]&jcd=$msgErro[5]");
                break;
            case "bimestre":
                $nmr = $_POST['numero'];
                $dti = $_POST['data_inicial'];
                $dtf = $_POST['data_final'];
                header ("Location: ../../formularios-cadastro.php?id=bimestre&tfm=cadastrar&nmr=$nmr&dti=$dti&dtf=$dtf&enmr=$msgErro[1]&edti=$msgErro[2]&edtf=$msgErro[3]&dtinv=$msgErro[4]&dtic=$msgErro[5]&dtfc=$msgErro[6]&jcd=$msgErro[7]");
                break;
        }
    }
?>