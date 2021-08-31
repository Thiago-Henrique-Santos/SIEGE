<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "siege";

	$conexao = new mysqli ($servidor, $usuario, $senha, $banco);

	if ($conexao->connect_error)
		die ("Conexão falhou: " . $conexao->connect_error);

    //Gerenciadores(Usuário)
	$sql = "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (2, 'Francisney Rezende', 'francisney@juvenal.com', 'U', 'M', '111111', 3);";
	$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (3, 'Deise Feitosa', 'deise@juvenal.com', 'U', 'F', '222222', 3);";
	$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (4, 'Luciana Alvarenga', 'luciana@juvenal.com', 'R', 'F', '444444', 3);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (5, 'Cíntia Medeiros', 'cintia@juvenal.com', 'U', 'F', '555555', 3);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (6, 'Gaspar Mendes', 'gaspar@juvenal.com', 'U', 'M', '111188', 3);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (7, 'Fabiana Faria', 'fabiana@juvenal.com', 'R', 'F', '777777', 3);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (8, 'Heitor Simeão', 'heitor@juvenal.com', 'U', 'M', '012315', 3);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (9, 'Ângela Lomônaco', 'angela@juvenal.com', 'U', 'F', '022315', 3);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (10, 'Camila Alexandrino', 'camila@juvenal.com', 'R', 'F', '123456', 3);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (11, 'Renata de Sousa', 'renata@juvenal.com', 'U', 'F', '012498', 3);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (12, 'Margô Favila', 'margo@juvenal.com', 'R', 'F', '091234', 3);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (13, 'Simone Costa', 'simone@juvenal.com', 'R', 'F', '120345', 3);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (14, 'Alexandre Gouvêa', 'alexandre@juvenal.com', 'R', 'F', '098123', 3);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (15, 'Humberto Maia', 'humberto@juvenal.com', 'U', 'M', '331245', 3);";

    //Professores(Usuário)
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (16, 'Alessandra Sofo', 'alessandra@juvenal.com', 'U', 'F', '123412', 2);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (17, 'Caio Silva', 'caio@juvenal.com', 'U', 'M', '120998', 2);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (18, 'Fátima Pereira', 'fatima.pereira@juvenal.com', 'U', 'F', '451277', 2);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (19, 'Fátima Vieira', 'fatima.vieira@juvenal.com', 'U', 'F', '098712', 2);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (20, 'Fernanda Mira', 'fernanda@juvenal.com', 'U', 'F', '221133', 2);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (21, 'Ana Paula Bueno', 'ana.paula@juvenal.com', 'U', 'F', '112311', 2);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (22, 'César Couto', 'cesar@juvenal.com', 'U', 'M', '008122', 2);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (23, 'Ricardo Sousa', 'ricardo@juvenal.com', 'U', 'M', '113312', 2);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (24, 'Raquel Teles', 'raquel@juvenal.com', 'U', 'F', '123411', 2);";

    //Turmas
    $sql .= "INSERT INTO turma (id, nome, serie) VALUES (2, 'A', 2);";
    $sql .= "INSERT INTO turma (id, nome, serie) VALUES (3, 'B', 2);";
    $sql .= "INSERT INTO turma (id, nome, serie) VALUES (4, 'A', 3);";
    $sql .= "INSERT INTO turma (id, nome, serie) VALUES (5, 'B', 3);";
    $sql .= "INSERT INTO turma (id, nome, serie) VALUES (6, 'A', 4);";
    $sql .= "INSERT INTO turma (id, nome, serie) VALUES (7, 'B', 4);";
    $sql .= "INSERT INTO turma (id, nome, serie) VALUES (8, 'C', 4);";
    $sql .= "INSERT INTO turma (id, nome, serie) VALUES (9, 'A', 5);";
    $sql .= "INSERT INTO turma (id, nome, serie) VALUES (10, 'B', 5);";
    $sql .= "INSERT INTO turma (id, nome, serie) VALUES (11, 'C', 5);";
    $sql .= "INSERT INTO turma (id, nome, serie) VALUES (12, 'D', 5);";
    $sql .= "INSERT INTO turma (id, nome, serie) VALUES (13, 'A', 7);";
    $sql .= "INSERT INTO turma (id, nome, serie) VALUES (14, 'B', 7);";
    $sql .= "INSERT INTO turma (id, nome, serie) VALUES (15, 'C', 7);";
    $sql .= "INSERT INTO turma (id, nome, serie) VALUES (16, 'A', 8);";
    $sql .= "INSERT INTO turma (id, nome, serie) VALUES (17, 'B', 8);";
    $sql .= "INSERT INTO turma (id, nome, serie) VALUES (18, 'A', 9);";
    $sql .= "INSERT INTO turma (id, nome, serie) VALUES (19, 'Z', 9);";

    //Alunos(Usuário)
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (25, 'Ana Beatriz Costa', 'ana.beatriz@juvenal.com', 'U', 'F', '003411', 1);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (26, 'Antônia Goulart', 'antonia@juvenal.com', 'R', 'F', '123341', 1);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (27, 'Benedito Simões', 'benedito@juvenal.com', 'R', 'M', '103411', 1);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (28, 'Carlos Araújo', 'carlos@juvenal.com', 'U', 'M', '113111', 1);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (29, 'Davi Donizetti', 'davi@juvenal.com', 'U', 'M', '190831', 1);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (30, 'Eliézer Pereira', 'eliezer@juvenal.com', 'R', 'M', '145211', 1);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (31, 'Fabiana Rivelina', 'fabiana@juvenal.com', 'R', 'F', '011341', 1);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (32, 'Gabriel Assis', 'gabriel@juvenal.com', 'U', 'M', '087654', 1);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (33, 'Haroldo Teixeira', 'haroldo@juvenal.com', 'U', 'M', '112100', 1);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (34, 'Isadora Castro', 'isadora@juvenal.com', 'U', 'F', '003411', 1);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (35, 'Joana Garcia', 'joana@juvenal.com', 'R', 'F', '330129', 1);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (36, 'Kelly Monteiro', 'kelly@juvenal.com', 'U', 'F', '210341', 1);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (37, 'Luis Dorival', 'luis@juvenal.com', 'U', 'M', '353011', 1);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (38, 'Marcos Albuquerque', 'marcos@juvenal.com', 'R', 'M', '092114', 1);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (39, 'Nádia de Paula', 'nadia@juvenal.com', 'U', 'F', '112211', 1);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (40, 'Otávio dos Santos', 'otavio@juvenal.com', 'U', 'M', '445577', 1);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (41, 'Paula Ribeiro', 'paula@juvenal.com', 'R', 'F', '113322', 1);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (42, 'Quézia Limeira', 'quezia@juvenal.com', 'U', 'F', '004788', 1);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (43, 'Rita Freitas', 'rita@juvenal.com', 'U', 'F', '112355', 1);";
    $sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (44, 'Soraia Juscelina', 'soraia@juvenal.com', 'U', 'F', '121109', 1);";



    //Gerenciadores(Tabela)
    $sql .= "INSERT INTO gerenciadores (idGerenciador, masp, tipo_empregado, funcao, tipo) VALUES (2, '11223344', 'E', 'Diretor principal', 'diretor');";
    $sql .= "INSERT INTO gerenciadores (idGerenciador, masp, tipo_empregado, funcao, tipo) VALUES (3, '10981133', 'E', 'Vice diretora', 'diretor');";
    $sql .= "INSERT INTO gerenciadores (idGerenciador, masp, tipo_empregado, funcao, tipo) VALUES (4, '09211132', 'D', 'Vice diretora vespertina', 'diretor');";
    $sql .= "INSERT INTO gerenciadores (idGerenciador, masp, tipo_empregado, funcao, tipo) VALUES (5, '13554809', 'D', 'Supervisora integral', 'supervisor');";
    $sql .= "INSERT INTO gerenciadores (idGerenciador, masp, tipo_empregado, funcao, tipo) VALUES (6, '12445567', 'E', 'Supervisor estadual', 'supervisor');";
    $sql .= "INSERT INTO gerenciadores (idGerenciador, masp, tipo_empregado, funcao, tipo) VALUES (7, '22337709', 'E', 'Supervisora local', 'supervisor');";
    $sql .= "INSERT INTO gerenciadores (idGerenciador, masp, tipo_empregado, funcao, tipo) VALUES (8, '16348712', 'D', 'Supervisor matutino', 'supervisor');";
    $sql .= "INSERT INTO gerenciadores (idGerenciador, masp, tipo_empregado, funcao, tipo) VALUES (9, '00321614', 'E', 'Secretária administrativa', 'secretario');";
    $sql .= "INSERT INTO gerenciadores (idGerenciador, masp, tipo_empregado, funcao, tipo) VALUES (10, '09123456', 'D', 'Secretária vespertina', 'secretario');";
    $sql .= "INSERT INTO gerenciadores (idGerenciador, masp, tipo_empregado, funcao, tipo) VALUES (11, '33124576', 'E', 'Secretária matutina', 'secretario');";
    $sql .= "INSERT INTO gerenciadores (idGerenciador, masp, tipo_empregado, funcao, tipo) VALUES (12, '09811234', 'D', 'Secretária fiscal', 'secretario');";
    $sql .= "INSERT INTO gerenciadores (idGerenciador, masp, tipo_empregado, funcao, tipo) VALUES (13, '31122556', 'E', 'Secretária 1', 'secretario');";
    $sql .= "INSERT INTO gerenciadores (idGerenciador, masp, tipo_empregado, funcao, tipo) VALUES (14, '11557800', 'D', 'Secretário 2', 'secretario');";
    $sql .= "INSERT INTO gerenciadores (idGerenciador, masp, tipo_empregado, funcao, tipo) VALUES (15, '12435589', 'E', 'Secretário 3', 'secretario');";

    //Professores(tabela)
    $sql .= "INSERT INTO professor (idProfessor, masp, tipo_empregado, funcao) VALUES (16, '00112123', 'E', 'Professora de Ciências');";
    $sql .= "INSERT INTO professor (idProfessor, masp, tipo_empregado, funcao) VALUES (17, '12340012', 'D', 'Professor de Educação Física');";
    $sql .= "INSERT INTO professor (idProfessor, masp, tipo_empregado, funcao) VALUES (18, '12339800', 'E', 'Professora de Inglês');";
    $sql .= "INSERT INTO professor (idProfessor, masp, tipo_empregado, funcao) VALUES (19, '00984411', 'E', 'Professora de Geografia');";
    $sql .= "INSERT INTO professor (idProfessor, masp, tipo_empregado, funcao) VALUES (20, '35367812', 'E', 'Professora de Matemática');";
    $sql .= "INSERT INTO professor (idProfessor, masp, tipo_empregado, funcao) VALUES (21, '10981374', 'D', 'Professora de História');";
    $sql .= "INSERT INTO professor (idProfessor, masp, tipo_empregado, funcao) VALUES (22, '09123123', 'E', 'Professor de Educação Física');";
    $sql .= "INSERT INTO professor (idProfessor, masp, tipo_empregado, funcao) VALUES (23, '40023412', 'D', 'Professor de História');";
    $sql .= "INSERT INTO professor (idProfessor, masp, tipo_empregado, funcao) VALUES (24, '12426451', 'D', 'Professora de Português');";

    //Alunos(tabela)
    $sql .= "INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES (25, '2010-05-04', '12345677', 'Dirléa Costa', '(35) 99976-1202', 2);";
    $sql .= "INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES (26, '2011-04-05', '12045678', 'Jéssica Goulart', '(35) 99134-1202', 2);";
    $sql .= "INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES (27, '2011-02-06', '99012345', 'Francisco Simões', '(35) 99111-1302', 2);";
    $sql .= "INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES (28, '2012-01-07', '01123455', 'Henrique Araújo', '(35) 99123-1202', 2);";
    $sql .= "INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES (29, '2013-12-08', '02340567', 'Bento Donizetti', '(35) 90913-1202', 3);";
    $sql .= "INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES (30, '2014-11-09', '01134587', 'Thiago Pereira', '(35) 91144-4788', 3);";
    $sql .= "INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES (31, '2015-10-10', '00981234', 'Amanda Rivelina', '(35) 91234-0012', 4);";
    $sql .= "INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES (32, '2016-09-11', '20191901', 'Pedro Assis', '(35) 91231-4984', 4);";
    $sql .= "INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES (33, '2017-08-11', '20201223', 'Gabriela Teixeira', '(35) 94829-9114', 5);";
    $sql .= "INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES (34, '2011-08-12', '20101123', 'Leandra Castro', '(35) 92819-1202', 6);";
    $sql .= "INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES (35, '2010-07-20', '20091356', 'Janaina Garcia', '(35) 91093-1202', 19);";
    $sql .= "INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES (36, '2009-03-21', '20089012', 'Kevin Monteiro', '(35) 99123-8761', 7);";
    $sql .= "INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES (37, '2011-10-25', '20102345', 'Luis Dorival', '(35) 99134-0865', 7);";
    $sql .= "INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES (38, '2012-11-30', '21113455', 'Felipe Albuquerque', '(35) 94438-1202', 8);";
    $sql .= "INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES (39, '2015-12-21', '99761234', 'Ivete de Paula', '(35) 99381-1401', 9);";
    $sql .= "INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES (40, '2018-01-15', '09811245', 'Grasiela dos Santos', '(35) 99921-9680', 10);";
    $sql .= "INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES (41, '2019-02-17', '21308109', 'Ulisses Ribeiro', '(35) 98976-0951', 11);";
    $sql .= "INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES (42, '2009-03-19', '54311234', 'Silvio Limeira', '(35) 90912-7580', 11);";
    $sql .= "INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES (43, '2008-04-18', '09123456', 'Guilherme Freitas', '(35) 91998-9920', 19);";
    $sql .= "INSERT INTO aluno (idAluno, data_nascimento, numero_matricula, nome_responsavel, telefone, id_turma) VALUES (44, '2010-05-17', '09125697', 'Silvana Juscelina', '(35) 92945-9970', 19)";

	if ($conexao->multi_query($sql) === TRUE)
		echo "Cadastros inseridos com sucesso";
	else
		echo "Erro inserindo cadastros: " . $conexao->error;

	$conexao->close();
?>