<?php
    include ('../../modulos/funcoes.php');
    include ('../../BancoDados/conexao_mysql.php');
    date_default_timezone_set('America/Sao_Paulo');
    $data_atual = date('Y-m-d');

    if (!isset($_POST['cargo']) || empty($_POST['cargo'])) {
        header("Location: ../formularios-cadastro.php?id=weird");
        echo "Ocorreu um erro inesperado! Por favor, tente cadastrar novamente.";
    }

    $cadastroCorreto = true;
    $msgErro_aluno = array(
        1 => "",  //nome
        2 => "",  //data de nascimento
        3 => "",  //matricula
        4 => "",  //responsavel
        5 => "",  //e-mail
        6 => "",  //telefone
        7 => "",  //campo zona
        8 => "",  //campo de sexo
        9 => "",  //turma
        10 => "", //senha
        11 => ""  //confirmação de senha
    );

    $msgErro_sec_sup_prof_dir = array(
        1 => "",
        2 => "",
        3 => "",
        4 => "",
        5 => "",
        6 => "",
        7 => "",
        8 => "",
        9 => ""
    );

    switch ($_POST['cargo']) {
        case "aluno":
            if (!isset($_POST['nome_completo']) || empty($_POST['nome_completo'])) {
                $msgErro_aluno[1] = "<br> * Você esqueceu de inserir o nome do aluno.";
                $cadastroCorreto = false;
            }
            if (!isJustLetter($_POST['nome_completo'])) {
                $msgErro_aluno[1] = "<br> * Este campo só aceita letras!";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['data_nascimento']) || empty($_POST['data_nascimento'])) {
                $msgErro_aluno[2] = "<br> * Você esqueceu de inserir a data de nascimento.";
                $cadastroCorreto = false;
            }

            if ($_POST['data_nascimento'] > $data_atual) {
                $msgErro_aluno[2] = "<br> * A data de nascimento está maior que a data atual.";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['matricula']) || empty($_POST['matricula'])) {
                $msgErro_aluno[3] = "<br> * Você esqueceu de inserir o número da matrícula.";
                $cadastroCorreto = false;
            }
            if (!is_numeric($_POST['matricula'])) {
                $msgErro_aluno[3] = "<br> * Este campo só permite número.";
                $cadastroCorreto = false;
            }

            $sql = "SELECT numero_matricula FROM aluno";
            $resultado = $conexao->query($sql);
            if ($resultado->num_rows > 0) {
                while ($dados = $resultado->fetch_assoc()){
                    if (!isset($_GET['att'])) {
                        if ($_POST['matricula']==$dados['numero_matricula']) {
                            $msgErro_aluno[3] = "<br> * Este número de matrícula já está cadastrado.";
                            $cadastroCorreto = false;
                        }
                    } else {
                        $sql2 = "SELECT numero_matricula FROM aluno WHERE idAluno=".$_GET['idtf'];
                        $resultado2 = $conexao->query($sql2);
                        if ($resultado2->num_rows > 0) {
                            while($info = $resultado2->fetch_assoc()){
                                $matriculaAtual = $info['numero_matricula'];
                                if ($_POST['matricula']==$dados['numero_matricula'] && $dados['numero_matricula']!=$matriculaAtual) {
                                    $msgErro_aluno[3] = "<br> * Este número de matrícula já está cadastrado.";
                                    $cadastroCorreto = false;
                                }
                            }
                        }
                    }
                }
            }

            if (!isset($_POST['responsavel']) || empty($_POST['responsavel'])) {
                $msgErro_aluno[4] = "<br> * Você esqueceu de inserir o nome do responsável pelo aluno.";
                $cadastroCorreto = false;
            }
            if (!isJustLetter($_POST['responsavel'])) {
                $msgErro_aluno[4] = "<br> * Este campo só aceita letras!";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['email']) || empty($_POST['email'])) {
                $msgErro_aluno[5] = "<br> * Você esqueceu de inserir o email.";
                $cadastroCorreto = false;
            }
            if (strlen($_POST['email']) < 5) {
                $msgErro_aluno[5] = "<br> * O email deve conter, pelo menos, 5 caracteres.";
                $cadastroCorreto = false;
            }
            if(jaExisteEmail($_POST['email'])){
                $msgErro_aluno[5] = "<br> * Este email já está cadastrado.";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['telefone']) || empty($_POST['telefone'])) {
                $msgErro_aluno[6] = "<br> * Você esqueceu de inserir o telefone do responsável!";
                $cadastroCorreto = false;
            }
            if (strlen($_POST['telefone']) < 15) {
                $msgErro_aluno[6] = "<br> * Este campo deve ter 15 caracteres!";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['campo_zona'])) {
                $msgErro_aluno[7] = "<br> * Você esqueceu de escolher a zona em que o aluno mora!";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['campo_s'])) {
                $msgErro_aluno[8] = "<br> * Você esqueceu de escolher o sexo do aluno!";
                $cadastroCorreto = false;
            }

            if(!isset($_POST['turma']) || $_POST['turma'] == "none") {
                $msgErro_aluno[9] = "<br> * Você esqueceu de escolher a turma do aluno!";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['senha']) || empty($_POST['senha'])) {
                $msgErro_aluno[10] = "<br> * Você esqueceu de inserir a senha de acesso do aluno!";
                $cadastroCorreto = false;
            }
            if (!is_numeric($_POST['senha'])) {
                $msgErro_aluno[10] = "<br> * A senha deve ser numérica!";
                $cadastroCorreto = false;
            }
            if (strlen($_POST['senha']) < 6) {
                $msgErro_aluno[10] = "<br> * A senha deve conter 6 caracteres!";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['confirm_senha']) || empty($_POST['confirm_senha'])) {
                $msgErro_aluno[11] = "<br> * Você esqueceu de confirmar a senha de acesso do aluno!";
                $cadastroCorreto = false;
            }
            if ($_POST['senha'] != $_POST['confirm_senha']) {
                $msgErro_aluno[11] = "<br> * As senhas não coincidem!";
                $cadastroCorreto = false;
            }
            break;
        case "professor":
            validacao_sec_sup_prof_dir();
            break;
        case "secretario":
            validacao_sec_sup_prof_dir();
            break;
        case "supervisor":
            validacao_sec_sup_prof_dir();
            break;
        case "diretor":
            validacao_sec_sup_prof_dir();
            break;
    }

    //Atributos de todos os cargos
    $nm  = $_POST['nome_completo'];
    $eml = $_POST['email'];
    $czn = $_POST['campo_zona'];
    $cms = $_POST['campo_s'];
    $pss = $_POST['senha'];
    //Atributos de alunos
    $dt  = "";
    $mt  = "";
    $rsp = "";
    $tlf = "";
    $tur = "";
    //Atributos funcionarios
    $cg  = "";
    $mp  = "";
    $tep = "";
    $fnc = "";
    if ($_POST['cargo']=="aluno") {
        $dt  = $_POST['data_nascimento'];
        $mt  = $_POST['matricula'];
        $rsp = $_POST['responsavel'];
        $tlf = $_POST['telefone'];
        $tur = $_POST['turma'];
    } else {
        $cg  = $_POST['cargo'];
        $mp  = $_POST['masp'];
        $tep = $_POST['tipo_empregado'];
        $fnc = $_POST['funcao'];
    }
    
    /*
    if ($cadastroCorreto) {
        if(!isset($_GET['att'])){
            if ($_POST['cargo']=="aluno") {
                header ("Location: ../../CRUD/Usuario/create.php?id=aluno&nm=$nm&eml=$eml&czn=$czn&cms=$cms&dt=$dt&mt=$mt&rsp=$rsp&tlf=$tlf&tur=$tur&pss=$pss");
            } else {
                header ("Location: ../../CRUD/Usuario/create.php?id=$cg&nm=$nm&eml=$eml&czn=$czn&cms=$cms&mp=$mp&tep=$tep&fnc=$fnc&pss=$pss");
            }
        } else {
            $idtf = $_GET['idtf'];
            if ($_POST['cargo']=="aluno") {
                header ("Location: ../../CRUD/Usuario/update.php?idtf=$idtf&nm=$nm&eml=$eml&czn=$czn&cms=$cms&dt=$dt&mt=$mt&rsp=$rsp&tlf=$tlf&tur=$tur&pss=$pss");
            } else {
                header ("Location: ../../CRUD/Usuario/update.php?idtf=$idtf&nm=$nm&eml=$eml&czn=$czn&cms=$cms&cg=$cg&mp=$mp&tep=$tep&fnc=$fnc&pss=$pss");
            }
        }
    } else {
        $idtf = $_GET['idtf'];
        if (!isset($_GET['att'])) {
            if ($_POST['cargo'] == "aluno") {
                header ("Location: ../../formularios-cadastro.php?id=aluno&tfm=cadastrar&nm=$nm&dt=$dt&mt=$mt&rsp=$rsp&eml=$eml&tlf=$tlf&czn=$czn&cms=$cms&tur=$tur&enm=$msgErro_aluno[1]&edt=$msgErro_aluno[2]&emt=$msgErro_aluno[3]&ersp=$msgErro_aluno[4]&eeml=$msgErro_aluno[5]&etlf=$msgErro_aluno[6]&eczn=$msgErro_aluno[7]&ecms=$msgErro_aluno[8]&etur=$msgErro_aluno[9]&epss=$msgErro_aluno[10]&ecps=$msgErro_aluno[11]");
            } else {
                header ("Location: ../../formularios-cadastro.php?id=$cg&tfm=cadastrar&nm=$nm&mp=$mp&eml=$eml&tep=$tep&fnc=$fnc&czn=$czn&cms=$cms&enm=$msgErro_sec_sup_prof_dir[1]&emp=$msgErro_sec_sup_prof_dir[2]&eeml=$msgErro_sec_sup_prof_dir[3]&eczn=$msgErro_sec_sup_prof_dir[4]&etep=$msgErro_sec_sup_prof_dir[5]&ecms=$msgErro_sec_sup_prof_dir[6]&efnc=$msgErro_sec_sup_prof_dir[7]&epss=$msgErro_sec_sup_prof_dir[8]&ecps=$msgErro_sec_sup_prof_dir[9]");
            }
        } else {
            if ($_POST['cargo'] == "aluno") {
                header ("Location: ../../formularios-cadastro.php?id=aluno&tfm=atualizar&idtf=$idtf&nm=$nm&dt=$dt&mt=$mt&rsp=$rsp&eml=$eml&tlf=$tlf&czn=$czn&cms=$cms&tur=$tur&enm=$msgErro_aluno[1]&edt=$msgErro_aluno[2]&emt=$msgErro_aluno[3]&ersp=$msgErro_aluno[4]&eeml=$msgErro_aluno[5]&etlf=$msgErro_aluno[6]&eczn=$msgErro_aluno[7]&ecms=$msgErro_aluno[8]&etur=$msgErro_aluno[9]&epss=$msgErro_aluno[10]&ecps=$msgErro_aluno[11]");
            } else {
                header ("Location: ../../formularios-cadastro.php?id=$cg&tfm=atualizar&idtf=$idtf&nm=$nm&mp=$mp&eml=$eml&tep=$tep&fnc=$fnc&czn=$czn&cms=$cms&enm=$msgErro_sec_sup_prof_dir[1]&emp=$msgErro_sec_sup_prof_dir[2]&eeml=$msgErro_sec_sup_prof_dir[3]&eczn=$msgErro_sec_sup_prof_dir[4]&etep=$msgErro_sec_sup_prof_dir[5]&ecms=$msgErro_sec_sup_prof_dir[6]&efnc=$msgErro_sec_sup_prof_dir[7]&epss=$msgErro_sec_sup_prof_dir[8]&ecps=$msgErro_sec_sup_prof_dir[9]");
            }
        }
    }*/

    /******************************
    *           Funções           *
    ******************************/
    function validacao_sec_sup_prof_dir() {
        global $cadastroCorreto, $msgErro_sec_sup_prof_dir;
        if (!isset($_POST['nome_completo']) || empty($_POST['nome_completo'])) {
            $msgErro_sec_sup_prof_dir[1] = "<br> * Você esqueceu de inserir o nome.";
            $cadastroCorreto = false;
        }
        if (!isJustLetter($_POST['nome_completo'])) {
            $msgErro_sec_sup_prof_dir[1] = "<br> * Este campo só aceita letras.";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['masp']) || empty($_POST['masp'])) {
            $msgErro_sec_sup_prof_dir[2] = "<br> * Você esqueceu de inserir o número do MASP.";
            $cadastroCorreto = false;
        }
        if (strlen($_POST['masp']) > 8 || strlen($_POST['masp']) < 7) {
            $msgErro_sec_sup_prof_dir[2] = "<br> * Este campo deve conter no mínimo 7 e no máximo 8 caracteres.";
            $cadastroCorreto = false;
        }
        if(jaExisteMasp($_POST['masp'], $_POST['cargo'])){
            $msgErro_sec_sup_prof_dir[2] = "<br> * Este MASP já está cadastrado.";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['email']) || empty($_POST['email'])) {
            $msgErro_sec_sup_prof_dir[3] = "<br> * Você esqueceu de inserir o email.";
            $cadastroCorreto = false;
        }
        if (strlen($_POST['email']) < 5) {
            $msgErro_sec_sup_prof_dir[3] = "<br> * O email deve conter, pelo menos, 5 caracteres.";
            $cadastroCorreto = false;
        }
        if(jaExisteEmail($_POST['email'])){
            $msgErro_sec_sup_prof_dir[3] = "<br> * Este email já está cadastrado.";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['campo_zona'])) {
            $msgErro_sec_sup_prof_dir[4] = "<br> * Você esqueceu de escolher a zona de residência.";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['tipo_empregado'])) {
            $msgErro_sec_sup_prof_dir[5] = "<br> * Você esqueceu de escolher o tipo de empregado.";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['campo_s'])) {
            $msgErro_sec_sup_prof_dir[6] = "<br> * Você esqueceu de escolher o sexo.";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['funcao']) || empty($_POST['funcao'])) {
            $msgErro_sec_sup_prof_dir[7] = "<br> * Você esqueceu de inserir a função dessa pessoa.";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['senha']) || empty($_POST['senha'])) {
            $msgErro_sec_sup_prof_dir[8] = "<br> * Você esqueceu de inserir a senha de acesso.";
            $cadastroCorreto = false;
        }
        if (strlen($_POST['senha']) < 6) {
            $msgErro_sec_sup_prof_dir[8] = "<br> * A senha deve conter 6 caracteres.";
            $cadastroCorreto = false;
        }
        if (!is_numeric($_POST['senha'])){
            $msgErro_sec_sup_prof_dir[8] = "<br> * A senha deve ser numérica.";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['confirm_senha']) || empty($_POST['confirm_senha'])) {
            $msgErro_sec_sup_prof_dir[9] = "<br> * Você esqueceu de confirmar a senha de acesso.";
            $cadastroCorreto = false;
        }

        if ($_POST['senha'] != $_POST['confirm_senha']) {
            $msgErro_sec_sup_prof_dir[9] = "<br> * As senhas não coincidem.";
            $cadastroCorreto = false;
        }
    }

    function jaExisteEmail ($string) {
        global $conexao;
        $sql = "SELECT email FROM usuario";
        $resultado = $conexao->query($sql);
        if ($resultado->num_rows > 0) {
            while ($dados = $resultado->fetch_assoc()) {
                if (!isset($_GET['att'])) {
                    if ($_POST['email']==$dados['email']) {
                        return true;
                    }
                } else {
                    $sql2 = "SELECT email FROM usuario WHERE id=".$_GET['idtf'];
                    $resultado2 = $conexao->query($sql2);
                    if ($resultado2->num_rows > 0) {
                        while($info = $resultado2->fetch_assoc()){
                            $emailAtual = $info['email'];
                            if ($_POST['email']==$dados['email'] && $dados['email']!=$emailAtual) {
                                return true;
                            }
                        }
                    }
                }
            }
        }
        return false;
    }

    function jaExisteMasp ($masp, $cargo) {
        global $conexao;
        $sql = "SELECT masp FROM professor;";
        $sql .= "SELECT masp FROM gerenciadores;";

        if($conexao -> multi_query($sql)){
            do{
                if($resultado = $conexao -> store_result()){
                    while($linha = $resultado -> fetch_row()){
                        echo $linha[0] . "<br>";
                    }
                    $resultado -> free_result();
                }
                if($conexao -> more_results()){
                    if(!isset($_GET['att'])){
                            if($_POST['masp']==$linha['masp']){
                                return true;
                            }
                        }else{
                            $sql2 = "SELECT masp FROM ";
                            if($cargo=='professor'){
                                 $sql2 .= "professor WHERE idProfessor=".$_GET['idtf'];
                            }else{
                                $sql2 .= "gerenciadores WHERE idGerenciador=".$_GET['idtf'];
                            }
                            $resultado2 = $conexao->query($sql2);
                            if ($resultado2->num_rows > 0) {
                                while($info = $resultado2->fetch_assoc()){
                                    $maspAtual = $info['masp'];
                                    if ($_POST['masp']==$linha['masp'] && $linha['masp']!=$maspAtual) {
                                        return true;
                                    }
                                }
                            }
                        }
                    echo "-------------------------<br>";
                }
                
            } while($conexao -> next_result());
        }
        // if ($cargo=="professor") {
        //     $sql .= "professor";
        // } else {
        //     $sql .= "gerenciadores";
        // }
        // $resultado = $conexao->query($sql);
        // if ($resultado->num_rows > 0) {
        //     while ($dados = $resultado->fetch_assoc()) {
        //         if(!isset($_GET['att'])){
        //             if ($_POST['masp']==$dados['masp']) {
        //                 return true;
        //             }
        //         } else {
        //             // $sql2 = "SELECT masp FROM ";
        //             $sql2 = "SELECT masp AS 'masp_p' FROM professor WHERE idProfessor=" . $_GET['idtf'];
        //             $sql2 .= " SELECT masp AS 'masp_g' FROM gerenciadores WHERE idGerenciador=".$_GET['idtf'];
        //             // if ($cargo=="professor") {
        //             //     $sql2 .= "professor WHERE idProfessor=".$_GET['idtf'];
        //             // } else {
        //             //     $sql2 .= "gerenciadores WHERE idGerenciador=".$_GET['idtf'];
        //             // }
        //             $resultado2 = $conexao->query($sql2);
        //             if ($resultado2->num_rows > 0) {
        //                 while($info = $resultado2->fetch_assoc()){
        //                     $maspAtual = $info['masp'];
        //                     if ($_POST['masp']==$dados['masp'] && $dados['masp']!=$maspAtual) {
        //                         return true;
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // return false;
    }
    $conexao->close();
?>