<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "siege";

    $conexao = new mysqli ($servidor, $usuario, $senha, $banco);

    if($conexao->connect_error)
        die ("Conexão falhou: " . $conexao->connect_error);


    //Gerenciadores
    $sql = "CREATE TABLE IF NOT EXISTS gerenciadores (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(70),
            masp VARCHAR(8),
            email VARCHAR(55),
            local_moradia VARCHAR(11),
            tipo_empregado VARCHAR(9),
            sexo VARCHAR(9),
            funcao VARCHAR(20),
            senha VARCHAR(6),
            tipo VARCHAR(15)
            )";

    if($conexao->query($sql) === TRUE)
        echo "Tabela de gerenciadores criado com sucesso!";
    else    
        echo "Erro criando a tabela gerenciadores: " . $conexao->error;



    //Turma
    $sql = "CREATE TABLE IF NOT EXISTS turma (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(10),
            ano INT
            )";

    if($conexao->query($sql) === TRUE)
        echo "Tabela de turma criado com sucesso!";
    else    
        echo "Erro criando a tabela turma: " . $conexao->error;



    //Aluno
    $sql = "CREATE TABLE IF NOT EXISTS aluno (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(70),
            data_nascimento date,
            numero_matricula VARCHAR(10),
            nome_responsavel VARCHAR(70),
            email VARCHAR(55),
            telefone VARCHAR(15),
            local_moradia VARCHAR(11),
            sexo VARCHAR(9),
            senha VARCHAR(6),
            id_turma INT,
            FOREIGN KEY(id_turma) REFERENCES turma(id)
            )";

    if($conexao->query($sql) === TRUE)
        echo "Tabela de aluno criado com sucesso!";
    else    
        echo "Erro criando a tabela aluno: " . $conexao->error;


        
    //Professor
    $sql = "CREATE TABLE IF NOT EXISTS professor (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(70),
        masp VARCHAR(8),
        email VARCHAR(55),
        local_moradia VARCHAR(11),
        tipo_empregado VARCHAR(9),
        sexo VARCHAR(9),
        funcao VARCHAR(20),
        senha VARCHAR(6),
        )";

if($conexao->query($sql) === TRUE)
    echo "Tabela de professor criado com sucesso!";
else    
    echo "Erro criando a tabela professor: " . $conexao->error;