<?php

include ("../../BancoDados/conexao_mysql.php");

    $nome = $_GET['nm'];
    $email = $_GET['eml'];
    $campo_zona = $_GET['czn'];
    $campo_sexo = $_GET['cms'];
    $senha = $_GET['pss'];

//Aluno
if($_GET['id'] == 'aluno'){

    $data_nasc = $_GET['dt'];
    $matricula = $_GET['mt'];
    $responsavel = $_GET['rsp'];
    $telefone = $_GET['tlf'];
    $turma = $_GET['tur'];

    $sql = "
    INSERT INTO usuario (nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES ('$nome', '$email', '$campo_zona', '$campo_sexo', '$senha', 1);
    ";

    if ($conexao->query($sql) === FALSE)
        echo "Erro inserindo usuario: " . $conexao->error;

    $idUsuario = "SELECT id FROM usuario WHERE email = '$email'";
    $resultado = $conexao->query($idUsuario);

    if ($resultado->num_rows > 0){
        while ($linha = $resultado->fetch_assoc())
		{
			$idUsuario = (int) $linha["id"];
		}
    $sql = "
    INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES ($idUsuario, '$data_nasc', '$matricula', '$responsavel', '$telefone', 1);
    ";
    }else{
        echo "<br> Não foram encontrados clientes!";
    }

    if ($conexao->query($sql) === TRUE)
        header ("Location ../../formularios-cadastro.php?id=validadoOK");
    else
        echo "Erro inserindo aluno: " . $conexao->error;
}


$conexao->close();

?>