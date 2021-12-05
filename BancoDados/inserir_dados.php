<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "siege";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error)
    die("Conexão falhou: " . $conexao->connect_error);

//Gerenciadores(Usuário)
$senha_criptografada = csbd("111111");
$sql = "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (2, 'Francisney Rezende', 'francisney@juvenal.com', 'U', 'M', '$senha_criptografada', 3);";
$senha_criptografada = csbd("222222");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (3, 'Deise Feitosa', 'deise@juvenal.com', 'U', 'F', '$senha_criptografada', 3);";
$senha_criptografada = csbd("555555");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (5, 'Cíntia Medeiros', 'cintia@juvenal.com', 'U', 'F', '$senha_criptografada', 3);";
$senha_criptografada = csbd("444444");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (4, 'Luciana Alvarenga', 'luciana@juvenal.com', 'R', 'F', '$senha_criptografada', 3);";
$senha_criptografada = csbd("111188");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (6, 'Gaspar Mendes', 'gaspar@juvenal.com', 'U', 'M', '$senha_criptografada', 3);";
$senha_criptografada = csbd("777777");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (7, 'Fabiana Faria', 'fabiana@juvenal.com', 'R', 'F', '$senha_criptografada', 3);";
$senha_criptografada = csbd("012315");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (8, 'Heitor Simeão', 'heitor@juvenal.com', 'U', 'M', '$senha_criptografada', 3);";
$senha_criptografada = csbd("022315");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (9, 'Ângela Lomônaco', 'angela@juvenal.com', 'U', 'F', '$senha_criptografada', 3);";
$senha_criptografada = csbd("123456");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (10, 'Camila Alexandrino', 'camila@juvenal.com', 'R', 'F', '$senha_criptografada', 3);";
$senha_criptografada = csbd("012498");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (11, 'Renata de Sousa', 'renata@juvenal.com', 'U', 'F', '$senha_criptografada', 3);";
$senha_criptografada = csbd("091234");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (12, 'Margô Favila', 'margo@juvenal.com', 'R', 'F', '$senha_criptografada', 3);";
$senha_criptografada = csbd("120345");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (13, 'Simone Costa', 'simone@juvenal.com', 'R', 'F', '$senha_criptografada', 3);";
$senha_criptografada = csbd("098123");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (14, 'Alexandre Gouvêa', 'alexandre@juvenal.com', 'R', 'M', '$senha_criptografada', 3);";
$senha_criptografada = csbd("331245");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (15, 'Humberto Maia', 'humberto@juvenal.com', 'U', 'M', '$senha_criptografada', 3);";

//Professores(Usuário)
$senha_criptografada = csbd("120998");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (17, 'Caio Silva', 'caio@juvenal.com', 'U', 'M', '$senha_criptografada', 2);";
$senha_criptografada = csbd("451277");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (18, 'Fátima Pereira', 'fatima.pereira@juvenal.com', 'U', 'F', '$senha_criptografada', 2);";
$senha_criptografada = csbd("123412");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (16, 'Alessandra Sofo', 'alessandra@juvenal.com', 'U', 'F', '$senha_criptografada', 2);";
$senha_criptografada = csbd("098712");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (19, 'Fátima Vieira', 'fatima.vieira@juvenal.com', 'U', 'F', '$senha_criptografada', 2);";
$senha_criptografada = csbd("221133");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (20, 'Fernanda Mira', 'fernanda@juvenal.com', 'U', 'F', '$senha_criptografada', 2);";
$senha_criptografada = csbd("112311");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (21, 'Ana Paula Bueno', 'ana.paula@juvenal.com', 'U', 'F', '$senha_criptografada', 2);";
$senha_criptografada = csbd("008122");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (22, 'César Couto', 'cesar@juvenal.com', 'U', 'M', '$senha_criptografada', 2);";
$senha_criptografada = csbd("113312");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (23, 'Ricardo Sousa', 'ricardo@juvenal.com', 'U', 'M', '$senha_criptografada', 2);";
$senha_criptografada = csbd("123411");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (24, 'Raquel Teles', 'raquel@juvenal.com', 'U', 'F', '$senha_criptografada', 2);";

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
$senha_criptografada = csbd("003411");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (25, 'Ana Beatriz Costa', 'ana.beatriz@juvenal.com', 'U', 'F', '$senha_criptografada', 1);";
$senha_criptografada = csbd("123341");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (26, 'Antônia Goulart', 'antonia@juvenal.com', 'R', 'F', '$senha_criptografada', 1);";
$senha_criptografada = csbd("103411");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (27, 'Benedito Simões', 'benedito@juvenal.com', 'R', 'M', '$senha_criptografada', 1);";
$senha_criptografada = csbd("113111");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (28, 'Carlos Araújo', 'carlos@juvenal.com', 'U', 'M', '$senha_criptografada', 1);";
$senha_criptografada = csbd("190831");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (29, 'Davi Donizetti', 'davi@juvenal.com', 'U', 'M', '$senha_criptografada', 1);";
$senha_criptografada = csbd("145211");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (30, 'Eliézer Pereira', 'eliezer@juvenal.com', 'R', 'M', '$senha_criptografada', 1);";
$senha_criptografada = csbd("011341");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (31, 'Fabiana Rivelina', 'fabiana@juvenal.com', 'R', 'F', '$senha_criptografada', 1);";
$senha_criptografada = csbd("087654");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (32, 'Gabriel Assis', 'gabriel@juvenal.com', 'U', 'M', '$senha_criptografada', 1);";
$senha_criptografada = csbd("112100");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (33, 'Haroldo Teixeira', 'haroldo@juvenal.com', 'U', 'M', '$senha_criptografada', 1);";
$senha_criptografada = csbd("003411");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (34, 'Isadora Castro', 'isadora@juvenal.com', 'U', 'F', '$senha_criptografada', 1);";
$senha_criptografada = csbd("330129");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (35, 'Joana Garcia', 'joana@juvenal.com', 'R', 'F', '$senha_criptografada', 1);";
$senha_criptografada = csbd("210341");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (36, 'Kelly Monteiro', 'kelly@juvenal.com', 'U', 'F', '$senha_criptografada', 1);";
$senha_criptografada = csbd("353011");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (37, 'Luis Dorival', 'luis@juvenal.com', 'U', 'M', '$senha_criptografada', 1);";
$senha_criptografada = csbd("092114");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (38, 'Marcos Albuquerque', 'marcos@juvenal.com', 'R', 'M', '$senha_criptografada', 1);";
$senha_criptografada = csbd("112211");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (39, 'Nádia de Paula', 'nadia@juvenal.com', 'U', 'F', '$senha_criptografada', 1);";
$senha_criptografada = csbd("445577");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (40, 'Otávio dos Santos', 'otavio@juvenal.com', 'U', 'M', '$senha_criptografada', 1);";
$senha_criptografada = csbd("113322");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (41, 'Paula Ribeiro', 'paula@juvenal.com', 'R', 'F', '$senha_criptografada', 1);";
$senha_criptografada = csbd("004788");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (42, 'Quézia Limeira', 'quezia@juvenal.com', 'U', 'F', '$senha_criptografada', 1);";
$senha_criptografada = csbd("112355");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (43, 'Rita Freitas', 'rita@juvenal.com', 'U', 'F', '$senha_criptografada', 1);";
$senha_criptografada = csbd("121109");
$sql .= "INSERT INTO usuario (id, nome, email, local_moradia, sexo, senha, tipo_usuario) VALUES (44, 'Soraia Juscelina', 'soraia@juvenal.com', 'U', 'F', '$senha_criptografada', 1);";



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
    echo "<br>Cadastros inseridos com sucesso";
else
    echo "Erro inserindo cadastros: " . $conexao->error;

function csbd($s_dcrpt)
{
    $crpt1 = MD5($s_dcrpt);
    $crpt2 = sha1($crpt1);
    $crpt3 = substr($crpt2, 0, 6);
    return $crpt3;
}

$conexao->close();