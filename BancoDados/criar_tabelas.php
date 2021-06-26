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
            ano INT
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
            FOREIGN KEY(id_turma) REFERENCES turma(id)
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
        FOREIGN KEY(id_professor) REFERENCES professor(idProfessor)
        )";

    if($conexao->query($sql) === TRUE)
        echo "<br> Tabela de disciplina criada com sucesso!";
    else    
        echo "<br> Erro criando a tabela disciplina: " . $conexao->error;


    //Atividade
    $sql = "CREATE TABLE IF NOT EXISTS atividade (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100),
        descricao VARCHAR(700),
        valor FLOAT,
        dataPostagem DATE,
        id_disciplina INT UNSIGNED,
        FOREIGN KEY(id_disciplina) REFERENCES disciplina(id)
        )";

    if($conexao->query($sql) === TRUE)
        echo "<br> Tabela de atividade criada com sucesso!";
    else    
        echo "<br> Erro criando a tabela atividade: " . $conexao->error;

    
    //Aula
    $sql = "CREATE TABLE IF NOT EXISTS aula (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        dataRealizacao DATE,
        conteudo VARCHAR(700),
        id_disciplina INT UNSIGNED,
        FOREIGN KEY(id_disciplina) REFERENCES disciplina(id) 
        )";

    if($conexao->query($sql) === TRUE)
        echo "<br> Tabela de aula criada com sucesso!";
    else    
        echo "<br> Erro criando a tabela aula: " . $conexao->error;



    //Bimestre
    $sql = "CREATE TABLE IF NOT EXISTS bimestre (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        dataInicio DATE,
        dataTermino DATE
        )";

    if($conexao->query($sql) === TRUE)
        echo "<br> Tabela de bimestre criada com sucesso!";
    else    
        echo "<br> Erro criando a tabela bimestre: " . $conexao->error;


    //Aluno_realiza_disciplina
    $sql = "CREATE TABLE IF NOT EXISTS aluno_realiza_disciplina (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        id_aluno INT UNSIGNED,
        id_disciplina INT UNSIGNED,
        FOREIGN KEY(id_aluno) REFERENCES aluno(idAluno),
        FOREIGN KEY(id_disciplina) REFERENCES disciplina(id) 
        )";

    if($conexao->query($sql) === TRUE)
        echo "<br> Tabela de aluno_realiza_disciplina criada com sucesso!";
    else    
        echo "<br> Erro criando a tabela aluno_realiza_disciplina: " . $conexao->error;

    
    //Turma_tem_disciplina
    $sql = "CREATE TABLE IF NOT EXISTS turma_tem_disciplina (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        id_turma INT UNSIGNED,
        id_disciplina INT UNSIGNED,
        FOREIGN KEY(id_turma) REFERENCES turma(id),
        FOREIGN KEY(id_disciplina) REFERENCES disciplina(id) 
        )";

    if($conexao->query($sql) === TRUE)
        echo "<br> Tabela de turma_tem_disciplina criada com sucesso!";
    else    
        echo "<br> Erro criando a tabela turma_tem_disciplina: " . $conexao->error;


    
    //Aluno_faz_aula
    $sql = "CREATE TABLE IF NOT EXISTS aluno_faz_aula (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        falta TIME,
        id_aluno INT UNSIGNED,
        id_aula INT UNSIGNED,
        FOREIGN KEY(id_aluno) REFERENCES aluno(idAluno),
        FOREIGN KEY(id_aula) REFERENCES aula(id) 
        )";

    if($conexao->query($sql) === TRUE)
        echo "<br> Tabela de aluno_faz_aula criada com sucesso!";
    else    
        echo "<br> Erro criando a tabela aluno_faz_aula: " . $conexao->error;


    //Aluno_faz_atividade
    $sql = "CREATE TABLE IF NOT EXISTS aluno_faz_atividade (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nota FLOAT,
        dataEntrega DATE,
        id_aluno INT UNSIGNED,
        id_atividade INT UNSIGNED,
        FOREIGN KEY(id_aluno) REFERENCES aluno(idAluno),
        FOREIGN KEY(id_atividade) REFERENCES atividade(id) 
        )";

    if($conexao->query($sql) === TRUE)
        echo "<br> Tabela de aluno_faz_atividade criada com sucesso!";
    else    
        echo "<br> Erro criando a tabela aluno_faz_atividade: " . $conexao->error;
   
    $conexao->close();

?>