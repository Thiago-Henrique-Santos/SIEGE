<?php


    if (!isset($_POST['cargo'])) {
        header("Location: ../formularios_cadastro.php?id=weird");
        echo "Ocorreu um erro inesperado! Por favor, tente cadastrar novamente.";
    }

    $cadastroCorreto = true;
    $msgErro_aluno = array(
        "nome_completo" => "",
        "data_nascimento" => "",
        "matricula" => "",
        "responsavel" => "",
        "email" => "",
        "telefone" => "",
        "campo_zona" => "",
        "campo_s" => "",
        "senha" => "",
        "confirm_senha" => "",
        "confirmacao_senha" => "",
    );

    $msgErro_sec_sup_prof_dir = array(
        "nome_completo" => "",
        "masp" => "",
        "email" => "",
        "campo_zona" => "",
        "tipo_empregado" => "",
        "campo_s" => "",
        "funcao" => "",
        "senha" => "",
        "confirm_senha" => "",
        "confirmacao_senha" => "",
    );

    function validacao_sec_sup_prof_dir(){
        if (!isset($_POST['nome_completo'])) {
            $msgErro_sec_sup_prof_dir["nome_completo"] = "Você esqueceu de inserir o nome!";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['masp'])) {
            $msgErro_sec_sup_prof_dir["masp"] = "Você esqueceu de inserir o número do MASP!";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['email'])) {
            $msgErro_sec_sup_prof_dir["email"] = "Você esqueceu de inserir o email!";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['campo_zona'])) {
            $msgErro_sec_sup_prof_dir["campo_zona"] = "Você esqueceu de escolher a zona de residência!";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['tipo_empregado'])) {
            $msgErro_sec_sup_prof_dir["tipo_empregado"] = "Você esqueceu de escolher o tipo de empregado!";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['campo_s'])) {
            $msgErro_sec_sup_prof_dir["campo_s"] = "Você esqueceu de escolher o sexo!";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['funcao'])) {
            $msgErro_sec_sup_prof_dir["funcao"] = "Você esqueceu de inserir a função dessa pessoa!";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['senha'])) {
            $msgErro_sec_sup_prof_dir["senha"] = "Você esqueceu de inserir a senha de acesso!";
            $cadastroCorreto = false;
        }

        if (!isset($_POST['confirm_senha'])) {
            $msgErro_sec_sup_prof_dir["confirm_senha"] = "Você esqueceu de confirmar a senha de acesso!";
            $cadastroCorreto = false;
        }

        if ($_POST['senha'] != $_POST['confirm_senha']) {
            $msgErro_sec_sup_prof_dir["confirmacao_senha"] = "As senhas não coincidem!";
            $cadastroCorreto = false;
        }
    }


    switch ($_POST['cargo']) {
        case "aluno":
            if (!isset($_POST['nome_completo'])) {
                $msgErro_aluno["nome_completo"] = "Você esqueceu de inserir o nome do aluno!";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['data_nascimento'])) {
                $msgErro_aluno["data_nascimento"] = "Você esqueceu de inserir a data de nascimento!";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['matricula'])) {
                $msgErro_aluno["matricula"] = "Você esqueceu de inserir o número da matricula!";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['responsavel'])) {
                $msgErro_aluno["responsavel"] = "Você esqueceu de inserir o nome do responsável pelo aluno!";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['email'])) {
                $msgErro_aluno["email"] = "Você esqueceu de inserir o email!";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['telefone'])) {
                $msgErro_aluno["telefone"] = "Você esqueceu de inserir o telefone do responsável!";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['campo_zona'])) {
                $msgErro_aluno["campo_zona"] = "Você esqueceu de escolher a zona em que o aluno mora!";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['campo_s'])) {
                $msgErro_aluno["campo_s"] = "Você esqueceu de escolher o sexo do aluno!";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['senha'])) {
                $msgErro_aluno["senha"] = "Você esqueceu de inserir a senha de acesso do aluno!";
                $cadastroCorreto = false;
            }

            if (!isset($_POST['confirm_senha'])) {
                $msgErro_aluno["confirm_senha"] = "Você esqueceu de confirmar a senha de acesso do aluno!";
                $cadastroCorreto = false;
            }

            if ($_POST['senha'] != $_POST['confirm_senha']) {
                $msgErro_aluno["confirmacao_senha"] = "As senhas não coincidem!";
                $cadastroCorreto = false;
            }
            break;
        case "professor":
            validacao_sec_sup_prof_dir();
            # E um só array também.
            break;
        case "secretario":
            validacao_sec_sup_prof_dir();
            # E um só array também.
            break;
        case "supervisor":
            validacao_sec_sup_prof_dir();
            # E um só array também.
            break;
        case "diretor":
            validacao_sec_sup_prof_dir();
            # E um só array também.
            break;
    }

    if ($cadastroCorreto) {
        header("Location: formularios_cadastro.php?id=validadoOK");
        # Criar o local (na página formularios-cadastros.php) depois, ou criar uma nova página para mostar que deu certo
    }

?>