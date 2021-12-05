<?php

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Ocorreu um erro!";
}

include("../../BancoDados/conexao_mysql.php");

$nome = $_GET['nm'];
$email = $_GET['eml'];
$campo_zona = $_GET['czn'];
$campo_sexo = $_GET['cms'];
$senha = $_GET['pss'];

$crpt1 = MD5($senha);
$crpt2 = sha1($crpt1);

if ($_GET['id'] == 'aluno') {

    $data_nasc = $_GET['dt'];
    $matricula = $_GET['mt'];
    $responsavel = $_GET['rsp'];
    $telefone = $_GET['tlf'];
    $turma = $_GET['tur'];

    $sql = "
    INSERT INTO usuario (nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES ('$nome', '$email', '$campo_zona', '$campo_sexo', '$crpt2', 1)
    ";

    if ($conexao->query($sql) === FALSE) {
        echo "Erro inserindo usuario: " . $conexao->error;
    }

    $idUsuario = "SELECT id FROM usuario WHERE email = '$email'";
    $resultado = $conexao->query($idUsuario);

    if ($resultado->num_rows > 0) {
        while ($linha = $resultado->fetch_assoc()) {
            $idUsuario = (int) $linha["id"];
        }
        $sql = "
        INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES ($idUsuario, '$data_nasc', '$matricula', '$responsavel', '$telefone', $turma)
        ";
    } else {
        echo "<br> Não foram encontrados alunos!";
    }

    if ($conexao->query($sql) === TRUE) {
        $idsDisciplinas = array();
        $quantidadeDisciplinas = 0;

        $sql2 = "SELECT id FROM disciplina WHERE id_turma = $turma";
        $resultado2 = $conexao->query($sql2);
        if ($resultado2->num_rows > 0) {
            while ($dados2 = $resultado2->fetch_assoc()) {
                $idDisciplina = $dados2['id'];
                array_push($idsDisciplinas, $idDisciplina);
                $quantidadeDisciplinas++;
            }
        }

        $headerLink = "Location: ../Boletim/create.php?ent=aluno&ida=$idUsuario&qtd=$quantidadeDisciplinas";
        for ($i = 0; $i < $quantidadeDisciplinas; $i++) {
            $headerLink .= "&idd$i=$idsDisciplinas[$i]";
        }
        header($headerLink);
    } else {
        echo "Erro inserindo aluno: " . $conexao->error;
        $sql = "DELETE FROM usuario WHERE email == $email";
        $resultado = $conexao->query($sql);
    }
} else if ($_GET['id'] == 'professor') {
    $masp  = $_GET['mp'];
    $tipo_empregado  = $_GET['tep'];
    $funcao = $_GET['fnc'];

    $sql = "
    INSERT INTO usuario (nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES ('$nome', '$email', '$campo_zona', '$campo_sexo', '$crpt2', 2);
    ";

    if ($conexao->query($sql) === FALSE)
        echo "Erro inserindo usuario: " . $conexao->error;

    $idUsuario = "SELECT id FROM usuario WHERE email = '$email';";
    $resultado = $conexao->query($idUsuario);

    if ($resultado->num_rows > 0) {
        while ($linha = $resultado->fetch_assoc()) {
            $idUsuario = (int) $linha["id"];
        }
        $sql = "
    INSERT INTO professor (idProfessor, masp, tipo_empregado, funcao) VALUES ($idUsuario, '$masp', '$tipo_empregado', '$funcao')
    ";
    } else {
        echo "<br> Não foram encontrados professores!";
    }

    if ($conexao->query($sql) === TRUE)
        header("Location: ../../formularios-cadastro.php?id=validadoOK&tfm=cadastrar&rcd=professor");
    else {
        echo "Erro inserindo professor: " . $conexao->error;
        $sql = "DELETE FROM usuario WHERE email == $email";
        $resultado = $conexao->query($sql);
    }
} else {
    $masp  = $_GET['mp'];
    $tipo_empregado  = $_GET['tep'];
    $funcao = $_GET['fnc'];
    $cargo = $_GET['id'];

    $sql = "
    INSERT INTO usuario (nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES ('$nome', '$email', '$campo_zona', '$campo_sexo', '$crpt2', 3);
    ";

    if ($conexao->query($sql) === FALSE)
        echo "Erro inserindo usuario: " . $conexao->error;

    $idUsuario = "SELECT id FROM usuario WHERE email = '$email'";
    $resultado = $conexao->query($idUsuario);

    if ($resultado->num_rows > 0) {
        while ($linha = $resultado->fetch_assoc()) {
            $idUsuario = (int) $linha["id"];
        }
        $sql = "
    INSERT INTO gerenciadores (idGerenciador, masp, tipo_empregado, funcao, tipo) VALUES ($idUsuario, '$masp', '$tipo_empregado', '$funcao', '$cargo');
    ";
    } else {
        echo "<br> Não foram encontrados gerenciadores!";
    }

    if ($conexao->query($sql) === TRUE)
        header("Location: ../../formularios-cadastro.php?id=validadoOK&tfm=cadastrar&rcd=$cargo");
    else {
        echo "Erro inserindo gerenciador: " . $conexao->error;
        $sql = "DELETE FROM usuario WHERE email == $email";
        $resultado = $conexao->query($sql);
    }
}


$conexao->close();
