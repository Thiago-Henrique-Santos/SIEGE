<?php

include("../../BancoDados/conexao_mysql.php");

$id            = $_GET['idtf'];
$nome          = $_GET['nm'];
$email         = $_GET['eml'];
$sexo          = $_GET['cms'];
$senha         = $_GET['pss'];
$local_moradia = $_GET['czn'];

$crpt1 = MD5($senha);
$crpt2 = sha1($crpt1);

$sql = "UPDATE usuario SET nome = '$nome', email = '$email', sexo = '$sexo', local_moradia = '$local_moradia', senha = '$crpt2' WHERE id=$id";
if ($conexao->query($sql) === TRUE)
    echo "Usuario atualiado com sucesso!";
else
    echo "Erro ao atualizar cliente: " . $conexao->error;

$tipo_usuario = 0;
$sql = "SELECT tipo_usuario FROM usuario WHERE id = $id";
$resultado = $conexao->query($sql);
if ($resultado->num_rows > 0) {
    while ($info = $resultado->fetch_assoc()) {
        $tipo_usuario = $info['tipo_usuario'];
    }
}

switch ($tipo_usuario) {
    case 1:
        // Aluno:  dt | mt | rsp | tlf | tur
        $data_nascimento = $_GET['dt'];
        $matricula       = $_GET['mt'];
        $responsavel     = $_GET['rsp'];
        $telefone        = $_GET['tlf'];
        $turma           = $_GET['tur'];
        $sql = "UPDATE aluno 
        SET data_nascimento = '$data_nascimento', numero_matricula ='$matricula', 
        nome_responsavel = '$responsavel', telefone = '$telefone', id_turma=$turma 
        WHERE idAluno = $id";
        break;

    case 2:
        $masp           = $_GET['mp'];
        $tipo_empregado = $_GET['tep'];
        $funcao         = $_GET['fnc'];
        $sql = "UPDATE professor 
        SET masp = '$masp', tipo_empregado = '$tipo_empregado', funcao = '$funcao' 
        WHERE idProfessor = $id";
        break;

    case 3:
        $cargo          = $_GET['cg'];
        $masp           = $_GET['mp'];
        $tipo_empregado = $_GET['tep'];
        $funcao         = $_GET['fnc'];
        $sql = "UPDATE gerenciadores 
        SET masp = '$masp', tipo_empregado = '$tipo_empregado', funcao = '$funcao', tipo = '$cargo' 
        WHERE idGerenciador = $id";
        break;
}

if ($conexao->query($sql))
    header("Location: ../../formularios-cadastro.php?id=validadoOK&tfm=atualizar");
else
    header("location: ../../formularios-cadastro.php?id=erro&tfm=atualizar&info=" . $conexao->error);

$conexao->close();
