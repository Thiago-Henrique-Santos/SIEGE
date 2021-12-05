<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "siege";

    $conexao = new mysqli ($servidor, $usuario, $senha, $banco);

    if($conexao->connect_error)
        die ("Conexão falhou: " . $conexao->connect_error);


    //Usuario
    $sql = "CREATE TABLE IF NOT EXISTS usuario (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(80),
        email VARCHAR(70),
        local_moradia VARCHAR(11),
        sexo VARCHAR(9),
        senha VARCHAR(6),
        tipo_usuario INT
        )";

    if($conexao->query($sql) === TRUE)
        echo "<br> Tabela de usuario criada com sucesso!";
    else    
        echo "<br> Erro criando a tabela usuario: " . $conexao->error;
    

    //Gerenciadores
    $sql = "CREATE TABLE IF NOT EXISTS gerenciadores (
            idGerenciador INT UNSIGNED PRIMARY KEY,
            masp VARCHAR(8),
            tipo_empregado VARCHAR(9),
            funcao VARCHAR(50),
            tipo VARCHAR(15),
            FOREIGN KEY(idGerenciador) REFERENCES usuario(id)
            )";

    if($conexao->query($sql) === TRUE)
        echo "<br> Tabela de gerenciadores criada com sucesso!";
    else    
        echo "<br> Erro criando a tabela gerenciadores: " . $conexao->error;



    //Turma
    $sql = "CREATE TABLE IF NOT EXISTS turma (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(10),
            serie INT
            )";

    if($conexao->query($sql) === TRUE)
        echo "<br> Tabela de turma criada com sucesso!";
    else    
        echo "<br> Erro criando a tabela turma: " . $conexao->error;



    //Aluno
    $sql = "CREATE TABLE IF NOT EXISTS aluno (
            idAluno INT UNSIGNED PRIMARY KEY,
            data_nascimento DATE,
            numero_matricula VARCHAR(15),
            nome_responsavel VARCHAR(80),
            telefone VARCHAR(15),
            id_turma INT UNSIGNED,
            FOREIGN KEY(idAluno) REFERENCES usuario(id),
            FOREIGN KEY(id_turma) REFERENCES turma(id) ON DELETE SET NULL
            )";

    if($conexao->query($sql) === TRUE)
        echo "<br> Tabela de aluno criada com sucesso!";
    else    
        echo "<br> Erro criando a tabela aluno: " . $conexao->error;



    //Professor
    $sql = "CREATE TABLE IF NOT EXISTS professor (
        idProfessor INT UNSIGNED PRIMARY KEY,
        masp VARCHAR(8),
        tipo_empregado VARCHAR(9),
        funcao VARCHAR(50),
        FOREIGN KEY(idProfessor) REFERENCES usuario(id)
        )";

    if($conexao->query($sql) === TRUE)
        echo "<br> Tabela de professor criado com sucesso!";
    else    
        echo "<br> Erro criando a tabela professor: " . $conexao->error;


    //Disciplina
    $sql = "CREATE TABLE IF NOT EXISTS disciplina (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(30),
        ano YEAR,
        id_professor INT UNSIGNED,
        id_turma INT UNSIGNED,
        FOREIGN KEY(id_professor) REFERENCES professor(idProfessor) ON DELETE SET NULL,
        FOREIGN KEY(id_turma) REFERENCES turma(id)
        )";

    if($conexao->query($sql) === TRUE)
        echo "<br> Tabela de disciplina criada com sucesso!";
    else    
        echo "<br> Erro criando a tabela disciplina: " . $conexao->error;


    //Boletim
    $sql = "CREATE TABLE IF NOT EXISTS boletim (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nota1bim FLOAT,
        nota2bim FLOAT,
        nota3bim FLOAT,
        nota4bim FLOAT,
        falta1bim INT,
        falta2bim INT,
        falta3bim INT,
        falta4bim INT,
        notaRecuperacao FLOAT,
        faltaRecuperacao INT,
        id_aluno INT UNSIGNED,
        id_disciplina INT UNSIGNED,
        FOREIGN KEY(id_aluno) REFERENCES aluno(idAluno),
        FOREIGN KEY(id_disciplina) REFERENCES disciplina(id) 
        )";

    if($conexao->query($sql) === TRUE)
        echo "<br> Tabela de boletim criada com sucesso!";
    else    
        echo "<br> Erro criando a tabela boletim: " . $conexao->error;


    //Criação da turma de id 1 (default)
    $sql = "INSERT INTO turma (id, nome, serie) VALUES (1, 'Default', 0)";

	if ($conexao->query($sql) === TRUE)
		echo "<br> Turma 1 criada com sucesso";
	else
		echo "<br> Erro criando turma 1: " . $conexao->error;

    
    //Criação do usuário de id 1 (default) -> professor
    $sql = "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (1, 'Default', 'default@email.com', 'U', 'M', '000000', 2)";

	if ($conexao->query($sql) === TRUE)
		echo "<br> Usuário 1 criado com sucesso";
	else
		echo "<br> Erro criando usuário 1: " . $conexao->error;

    
    //Criação do professor de id 1 (default)
    $sql = "INSERT INTO professor (idProfessor, masp, tipo_empregado, funcao) VALUES (1, '00000001', 'D', 'Guardar disciplinas não vinculadas a um professor')";

	if ($conexao->query($sql) === TRUE)
		echo "<br> Professor 1 criado com sucesso";
	else
		echo "<br> Erro criando professor 1: " . $conexao->error;
   
    $conexao->close();

?>