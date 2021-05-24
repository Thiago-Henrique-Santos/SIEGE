<?php
    include ('../modulos/funcoes.php');

    if (!isset($_POST['cargo'])) {
        header("Location: ../formularios-cadastro.php?id=weird");
        echo "Ocorreu um erro inesperado! Por favor, tente cadastrar novamente.";
    }

    $cadastroCorreto = true;
    $msgErro_aluno = array(
        1 => "",
        2 => "",
        3 => "",
        4 => "",
        5 => "",
        6 => "",
        7 => "",
        8 => "",
        9 => "",
        10 => "",
        11 => ""
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
            if (!isset($_POST['nome_completo']) || $_POST['nome_completo']=="") {
                $msgErro_aluno[1] = "<br> * Você esqueceu de inserir o nome do aluno!";
                $cadastroCorreto = false;
            }

            if (!isJustLetter($_POST['nome_completo'])) {
                $msgErro_aluno[1] = "<br> * Este campo só aceita letras!";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['data_nascimento']) || $_POST['data_nascimento']=="") {
                $msgErro_aluno[2] = "<br> * Você esqueceu de inserir a data de nascimento!";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['matricula']) || $_POST['matricula']=="") {
                $msgErro_aluno[3] = "<br> * Você esqueceu de inserir o número da matricula!";
                $cadastroCorreto = false;
            }

            if (!is_numeric($_POST['matricula'])) {
                $msgErro_aluno[3] = "<br> * Este campo só permite número!";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['responsavel']) || $_POST['responsavel']=="") {
                $msgErro_aluno[4] = "<br> * Você esqueceu de inserir o nome do responsável pelo aluno!";
                $cadastroCorreto = false;
            }

            if (!isJustLetter($_POST['responsavel'])) {
                $msgErro_aluno[4] = "<br> * Este campo só aceita letras!";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['email']) || $_POST['email']=="") {
                $msgErro_aluno[5] = "<br> * Você esqueceu de inserir o email!";
                $cadastroCorreto = false;
            }
            if (strlen($_POST['email']) < 5) {
                $msgErro_aluno[5] = "<br> * O email deve conter, pelo menos, 5 caracteres";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['telefone']) || $_POST['telefone'] == "") {
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

            if (!isset($_POST['senha']) || $_POST['senha']=="") {
                $msgErro_aluno[9] = "<br> * Você esqueceu de inserir a senha de acesso do aluno!";
                $cadastroCorreto = false;
            }
            if (!is_numeric($_POST['senha'])) {
                $msgErro_aluno[9] = "<br> * A senha deve ser numérica!";
                $cadastroCorreto = false;
            }
            if (strlen($_POST['senha']) < 6) {
                $msgErro_aluno[9] = "<br> * A senha deve conter 6 caracteres!";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['confirm_senha']) || $_POST['confirm_senha']=="") {
                $msgErro_aluno[10] = "<br> * Você esqueceu de confirmar a senha de acesso do aluno!";
                $cadastroCorreto = false;
            }
            if ($_POST['senha'] != $_POST['confirm_senha']) {
                $msgErro_aluno[10] = "<br> * As senhas não coincidem!";
                $cadastroCorreto = false;
            }
            break;
        case "professor":
            if (!isset($_POST['nome_completo']) || $_POST['nome_completo']=="") {
                $msgErro_sec_sup_prof_dir[1] = "<br> * Você esqueceu de inserir o nome!";
                $cadastroCorreto = false;
            }
            if (!isJustLetter($_POST['nome_completo'])) {
                $msgErro_aluno[1] = "<br> * Este campo só aceita letras!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['masp']) || $_POST['masp']=="") {
                $msgErro_sec_sup_prof_dir[2] = "<br> * Você esqueceu de inserir o número do MASP!";
                $cadastroCorreto = false;
            }
            if (strlen($_POST['masp']) > 8) {
                $msgErro_sec_sup_prof_dir[2] = "<br> * Este campo deve conter no máximo 8 caracteres!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['email']) || $_POST['email']=="") {
                $msgErro_sec_sup_prof_dir[3] = "<br> * Você esqueceu de inserir o email!";
                $cadastroCorreto = false;
            }
            if (strlen($_POST['email']) < 5) {
                $msgErro_aluno[3] = "<br> * O email deve conter, pelo menos, 5 caracteres";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['campo_zona'])) {
                $msgErro_sec_sup_prof_dir[4] = "<br> * Você esqueceu de escolher a zona de residência!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['tipo_empregado'])) {
                $msgErro_sec_sup_prof_dir[5] = "<br> * Você esqueceu de escolher o tipo de empregado!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['campo_s'])) {
                $msgErro_sec_sup_prof_dir[6] = "<br> * Você esqueceu de escolher o sexo!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['funcao']) || $_POST['funcao']=="") {
                $msgErro_sec_sup_prof_dir[7] = "<br> * Você esqueceu de inserir a função dessa pessoa!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['senha']) || $_POST['senha']=="") {
                $msgErro_sec_sup_prof_dir[8] = "<br> * Você esqueceu de inserir a senha de acesso!";
                $cadastroCorreto = false;
            }
            if (strlen($_POST['senha']) < 6) {
                $msgErro_aluno[8] = "<br> * A senha deve conter 6 caracteres!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['confirm_senha']) || $_POST['confirm_senha']=="") {
                $msgErro_sec_sup_prof_dir[9] = "<br> * Você esqueceu de confirmar a senha de acesso!";
                $cadastroCorreto = false;
            }
    
            if ($_POST['senha'] != $_POST['confirm_senha']) {
                $msgErro_sec_sup_prof_dir[9] = "<br> * As senhas não coincidem!";
                $cadastroCorreto = false;
            }
            break;
        case "secretario":
            if (!isset($_POST['nome_completo']) || $_POST['nome_completo']=="") {
                $msgErro_sec_sup_prof_dir[1] = "<br> * Você esqueceu de inserir o nome!";
                $cadastroCorreto = false;
            }
            if (!isJustLetter($_POST['nome_completo'])) {
                $msgErro_aluno[1] = "<br> * Este campo só aceita letras!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['masp']) || $_POST['masp']=="") {
                $msgErro_sec_sup_prof_dir[2] = "<br> * Você esqueceu de inserir o número do MASP!";
                $cadastroCorreto = false;
            }
            if (strlen($_POST['masp']) > 8) {
                $msgErro_sec_sup_prof_dir[2] = "<br> * Este campo deve conter no máximo 8 caracteres!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['email']) || $_POST['email']=="") {
                $msgErro_sec_sup_prof_dir[3] = "<br> * Você esqueceu de inserir o email!";
                $cadastroCorreto = false;
            }
            if (strlen($_POST['email']) < 5) {
                $msgErro_aluno[3] = "<br> * O email deve conter, pelo menos, 5 caracteres";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['campo_zona'])) {
                $msgErro_sec_sup_prof_dir[4] = "<br> * Você esqueceu de escolher a zona de residência!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['tipo_empregado'])) {
                $msgErro_sec_sup_prof_dir[5] = "<br> * Você esqueceu de escolher o tipo de empregado!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['campo_s'])) {
                $msgErro_sec_sup_prof_dir[6] = "<br> * Você esqueceu de escolher o sexo!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['funcao']) || $_POST['funcao']=="") {
                $msgErro_sec_sup_prof_dir[7] = "<br> * Você esqueceu de inserir a função dessa pessoa!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['senha']) || $_POST['senha']=="") {
                $msgErro_sec_sup_prof_dir[8] = "<br> * Você esqueceu de inserir a senha de acesso!";
                $cadastroCorreto = false;
            }
            if (strlen($_POST['senha']) < 6) {
                $msgErro_aluno[8] = "<br> * A senha deve conter 6 caracteres!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['confirm_senha']) || $_POST['confirm_senha']=="") {
                $msgErro_sec_sup_prof_dir[9] = "<br> * Você esqueceu de confirmar a senha de acesso!";
                $cadastroCorreto = false;
            }
    
            if ($_POST['senha'] != $_POST['confirm_senha']) {
                $msgErro_sec_sup_prof_dir[9] = "<br> * As senhas não coincidem!";
                $cadastroCorreto = false;
            }
            break;
        case "supervisor":
            if (!isset($_POST['nome_completo']) || $_POST['nome_completo']=="") {
                $msgErro_sec_sup_prof_dir[1] = "<br> * Você esqueceu de inserir o nome!";
                $cadastroCorreto = false;
            }
            if (!isJustLetter($_POST['nome_completo'])) {
                $msgErro_aluno[1] = "<br> * Este campo só aceita letras!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['masp']) || $_POST['masp']=="") {
                $msgErro_sec_sup_prof_dir[2] = "<br> * Você esqueceu de inserir o número do MASP!";
                $cadastroCorreto = false;
            }
            if (strlen($_POST['masp']) > 8) {
                $msgErro_sec_sup_prof_dir[2] = "<br> * Este campo deve conter no máximo 8 caracteres!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['email']) || $_POST['email']=="") {
                $msgErro_sec_sup_prof_dir[3] = "<br> * Você esqueceu de inserir o email!";
                $cadastroCorreto = false;
            }
            if (strlen($_POST['email']) < 5) {
                $msgErro_aluno[3] = "<br> * O email deve conter, pelo menos, 5 caracteres";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['campo_zona'])) {
                $msgErro_sec_sup_prof_dir[4] = "<br> * Você esqueceu de escolher a zona de residência!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['tipo_empregado'])) {
                $msgErro_sec_sup_prof_dir[5] = "<br> * Você esqueceu de escolher o tipo de empregado!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['campo_s'])) {
                $msgErro_sec_sup_prof_dir[6] = "<br> * Você esqueceu de escolher o sexo!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['funcao']) || $_POST['funcao']=="") {
                $msgErro_sec_sup_prof_dir[7] = "<br> * Você esqueceu de inserir a função dessa pessoa!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['senha']) || $_POST['senha']=="") {
                $msgErro_sec_sup_prof_dir[8] = "<br> * Você esqueceu de inserir a senha de acesso!";
                $cadastroCorreto = false;
            }
            if (strlen($_POST['senha']) < 6) {
                $msgErro_aluno[8] = "<br> * A senha deve conter 6 caracteres!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['confirm_senha']) || $_POST['confirm_senha']=="") {
                $msgErro_sec_sup_prof_dir[9] = "<br> * Você esqueceu de confirmar a senha de acesso!";
                $cadastroCorreto = false;
            }
    
            if ($_POST['senha'] != $_POST['confirm_senha']) {
                $msgErro_sec_sup_prof_dir[9] = "<br> * As senhas não coincidem!";
                $cadastroCorreto = false;
            }
            break;
        case "diretor":
            if (!isset($_POST['nome_completo']) || $_POST['nome_completo']=="") {
                $msgErro_sec_sup_prof_dir[1] = "<br> * Você esqueceu de inserir o nome!";
                $cadastroCorreto = false;
            }
            if (!isJustLetter($_POST['nome_completo'])) {
                $msgErro_aluno[1] = "<br> * Este campo só aceita letras!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['masp']) || $_POST['masp']=="") {
                $msgErro_sec_sup_prof_dir[2] = "<br> * Você esqueceu de inserir o número do MASP!";
                $cadastroCorreto = false;
            }
            if (strlen($_POST['masp']) > 8) {
                $msgErro_sec_sup_prof_dir[2] = "<br> * Este campo deve conter no máximo 8 caracteres!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['email']) || $_POST['email']=="") {
                $msgErro_sec_sup_prof_dir[3] = "<br> * Você esqueceu de inserir o email!";
                $cadastroCorreto = false;
            }
            if (strlen($_POST['email']) < 5) {
                $msgErro_aluno[3] = "<br> * O email deve conter, pelo menos, 5 caracteres";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['campo_zona'])) {
                $msgErro_sec_sup_prof_dir[4] = "<br> * Você esqueceu de escolher a zona de residência!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['tipo_empregado'])) {
                $msgErro_sec_sup_prof_dir[5] = "<br> * Você esqueceu de escolher o tipo de empregado!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['campo_s'])) {
                $msgErro_sec_sup_prof_dir[6] = "<br> * Você esqueceu de escolher o sexo!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['funcao']) || $_POST['funcao']=="") {
                $msgErro_sec_sup_prof_dir[7] = "<br> * Você esqueceu de inserir a função dessa pessoa!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['senha']) || $_POST['senha']=="") {
                $msgErro_sec_sup_prof_dir[8] = "<br> * Você esqueceu de inserir a senha de acesso!";
                $cadastroCorreto = false;
            }
            if (strlen($_POST['senha']) < 6) {
                $msgErro_aluno[8] = "<br> * A senha deve conter 6 caracteres!";
                $cadastroCorreto = false;
            }
    
            if (!isset($_POST['confirm_senha']) || $_POST['confirm_senha']=="") {
                $msgErro_sec_sup_prof_dir[9] = "<br> * Você esqueceu de confirmar a senha de acesso!";
                $cadastroCorreto = false;
            }
    
            if ($_POST['senha'] != $_POST['confirm_senha']) {
                $msgErro_sec_sup_prof_dir[9] = "<br> * As senhas não coincidem!";
                $cadastroCorreto = false;
            }
            break;
    }

    if ($cadastroCorreto) {
        header ("Location: ../formularios-cadastro.php?id=validadoOK");
    } else {
        $nm  = $_POST['nome_completo'];
        $eml = $_POST['email'];
        $czn = $_POST['campo_zona'];
        $cms = $_POST['campo_s'];
        if ($_POST['cargo'] == "aluno") {
            $dt  = $_POST['data_nascimento'];
            $mt  = $_POST['matricula'];
            $rsp = $_POST['responsavel'];
            $tlf = $_POST['telefone'];
            header ("Location: ../formularios-cadastro.php?id=aluno&nm=$nm&dt=$dt&mt=$mt&rsp=$rsp&eml=$eml&tlf=$tlf&czn=$czn&cms=$cms&enm=$msgErro_aluno[1]&edt=$msgErro_aluno[2]&emt=$msgErro_aluno[3]&ersp=$msgErro_aluno[4]&eeml=$msgErro_aluno[5]&etlf=$msgErro_aluno[6]&eczn=$msgErro_aluno[7]&ecms=$msgErro_aluno[8]&epss=$msgErro_aluno[9]&ecps=$msgErro_aluno[10]");
        } else {
            $cg  = $_POST['cargo'];
            $mp  = $_POST['masp'];
            $tep = $_POST['tipo_empregado'];
            $fnc = $_POST['funcao'];
            header ("Location: ../formularios-cadastro.php?id=$cg&nm=$nm&mp=$mp&tep=$tep&fnc=$fnc&czn=$czn&cms=$cms&enm=$msgErro_sec_sup_prof_dir[1]&emp=$msgErro_sec_sup_prof_dir[2]&eeml=$msgErro_sec_sup_prof_dir[3]&eczn=$msgErro_sec_sup_prof_dir[4]&etep=$msgErro_sec_sup_prof_dir[5]&ecms=$msgErro_sec_sup_prof_dir[6]&efnc=$msgErro_sec_sup_prof_dir[7]&epss=$msgErro_aluno[8]&ecps=$msgErro_sec_sup_prof_dir[9]");
        }
    }

    /******************************
    *           Funções           *
    ******************************/
    function validacao_sec_sup_prof_dir(){
        if (!isset($_POST['nome_completo']) || $_POST['nome_completo']=="") {
            $msgErro_sec_sup_prof_dir[1] = "<br> * Você esqueceu de inserir o nome!";
            $cadastroCorreto = false;
        }
        if (!isJustLetter($_POST['nome_completo'])) {
            $msgErro_aluno[1] = "<br> * Este campo só aceita letras!";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['masp']) || $_POST['masp']=="") {
            $msgErro_sec_sup_prof_dir[2] = "<br> * Você esqueceu de inserir o número do MASP!";
            $cadastroCorreto = false;
        }
        if (strlen($_POST['masp']) > 8) {
            $msgErro_sec_sup_prof_dir[2] = "<br> * Este campo deve conter no máximo 8 caracteres!";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['email']) || $_POST['email']=="") {
            $msgErro_sec_sup_prof_dir[3] = "<br> * Você esqueceu de inserir o email!";
            $cadastroCorreto = false;
        }
        if (strlen($_POST['email']) < 5) {
            $msgErro_aluno[3] = "<br> * O email deve conter, pelo menos, 5 caracteres";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['campo_zona'])) {
            $msgErro_sec_sup_prof_dir[4] = "<br> * Você esqueceu de escolher a zona de residência!";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['tipo_empregado'])) {
            $msgErro_sec_sup_prof_dir[5] = "<br> * Você esqueceu de escolher o tipo de empregado!";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['campo_s'])) {
            $msgErro_sec_sup_prof_dir[6] = "<br> * Você esqueceu de escolher o sexo!";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['funcao']) || $_POST['funcao']=="") {
            $msgErro_sec_sup_prof_dir[7] = "<br> * Você esqueceu de inserir a função dessa pessoa!";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['senha']) || $_POST['senha']=="") {
            $msgErro_sec_sup_prof_dir[8] = "<br> * Você esqueceu de inserir a senha de acesso!";
            $cadastroCorreto = false;
        }
        if (strlen($_POST['senha']) < 6) {
            $msgErro_aluno[8] = "<br> * A senha deve conter 6 caracteres!";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['confirm_senha']) || $_POST['confirm_senha']=="") {
            $msgErro_sec_sup_prof_dir[9] = "<br> * Você esqueceu de confirmar a senha de acesso!";
            $cadastroCorreto = false;
        }

        if ($_POST['senha'] != $_POST['confirm_senha']) {
            $msgErro_sec_sup_prof_dir[9] = "<br> * As senhas não coincidem!";
            $cadastroCorreto = false;
        }
    }
?>