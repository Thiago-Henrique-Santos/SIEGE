<?php
    session_start();
    include ("C:/xampp/htdocs/SIEGE/BancoDados/conexao_mysql.php");
    include ("C:/xampp/htdocs/SIEGE/modulos/funcoes.php");

    $registros = array();
    $sql = "";
    $tipo_gerenciador = "";

    if($_SESSION['tip_usu'] != 1){
        if (isset($_GET['dir']) || isset($_GET['secr']) || isset($_GET['sup']) || isset($_GET['prof']) || isset($_GET['alu'])) {
            $tipoUsuario_escolhidos = array(
                "aluno"       => false,
                "professor"   => false,
                "gerenciador" => false
            );
            $gerenciadores_escolhidos = array(
                "supervisor" => false,
                "secretario" => false,
                "diretor"    => false
            );

            if (isset($_GET['alu'])) {
                $tipoUsuario_escolhidos['aluno'] = true;
            }
            if (isset($_GET['prof'])) {
                $tipoUsuario_escolhidos['professor'] = true;
            }
            if (isset($_GET['sup'])) {
                $gerenciadores_escolhidos['supervisor'] = true;
                $tipoUsuario_escolhidos['gerenciador'] = true;
            }
            if (isset($_GET['secr'])) {
                $gerenciadores_escolhidos['secretario'] = true;
                $tipoUsuario_escolhidos['gerenciador'] = true;
            }
            if (isset($_GET['dir'])) {
                $gerenciadores_escolhidos['diretor'] = true;
                $tipoUsuario_escolhidos['gerenciador'] = true;
            }

            $tipoUsuario_contador = 0;
            foreach ($tipoUsuario_escolhidos as $status) {
                if ($status) {
                    $tipoUsuario_contador++;
                }
            }

            $gerenciadores_contador = 0;
            foreach ($gerenciadores_escolhidos as $status) {
                if ($status) {
                    $gerenciadores_contador++;
                }
            }

            for ($i = 0; $i < $tipoUsuario_contador; $i++) {
                if ($i > 0) {
                    $sql .= "; ";
                }

                $sql .= "SELECT * FROM usuario u INNER JOIN ";

                if ($tipoUsuario_escolhidos['aluno']) {
                    $sql = "
                        SELECT u.id AS 'id', u.nome, u.email, u.local_moradia, u.sexo, u.tipo_usuario, 
                        a.data_nascimento, a.numero_matricula, a.nome_responsavel, a.telefone, 
                        t.id AS 'id_turma', t.nome AS 'nome_turma', t.serie FROM usuario u 
                        INNER JOIN aluno a ON u.id=a.idAluno INNER JOIN turma t ON t.id=a.id_turma
                        ";
                    $tipoUsuario_escolhidos['aluno'] = false;
                } elseif ($tipoUsuario_escolhidos['professor']) {
                    $sql .= "professor p ON u.id=p.idProfessor WHERE p.idProfessor != 1";
                    $tipoUsuario_escolhidos['professor'] = false;
                } elseif ($tipoUsuario_escolhidos['gerenciador']) {
                    $sql .= "gerenciadores g ON u.id=g.idGerenciador";
                    if (!$gerenciadores_escolhidos['supervisor'] || !$gerenciadores_escolhidos['secretario'] || !$gerenciadores_escolhidos['diretor']) {
                        $sql .= " WHERE ";
                        $c = 0;
                        foreach ($gerenciadores_escolhidos as $gerenciador => $status) {
                            if ($status) {
                                $c++;
                                if ($c < $gerenciadores_contador)
                                    $sql .= "g.tipo='$gerenciador' OR ";
                                else
                                    $sql .= "g.tipo='$gerenciador'";
                                $gerenciadores_escolhidos[$gerenciador] = false;
                            }
                        }
                    }
                    $tipoUsuario_escolhidos['gerenciador'] = false;
                }
                $sql .= " ORDER BY u.nome ASC";
            }

            $i = 0;
            $existeRegistros = 0;
            if ($conexao->multi_query($sql)) {
                do {
                    if  (!$existeRegistros)
                        $registros['usuario'] = false;
                    
                    if ($resultado = $conexao->store_result()) {
                        if ($resultado->num_rows > 0) {
                            $existeRegistros++;
                            while ($linha = $resultado->fetch_assoc()) {
                                if($linha['local_moradia'] == 'U')
                                    $local_moradia = 'Urbana';
                                else
                                    $local_moradia = 'Rural';

                                if($linha['sexo'] == 'F')
                                    $sexo = 'Feminino';
                                else
                                    $sexo = 'Masculino';

                                $registros['usuario'][$i]['idtf'] = $linha['id'];
                                $registros['usuario'][$i]['nome'] = $linha['nome'];
                                $registros['usuario'][$i]['email'] = $linha['email'];
                                $registros['usuario'][$i]['local_moradia'] = $local_moradia;
                                $registros['usuario'][$i]['sexo'] = $sexo;
                                
                                if ($linha['tipo_usuario'] == 1) {
                                    $registros['usuario'][$i]['cargo_info']['data_nascimento'] = formata_data($linha['data_nascimento']);
                                    $registros['usuario'][$i]['cargo_info']['matricula'] = $linha['numero_matricula'];
                                    $registros['usuario'][$i]['cargo_info']['responsavel'] = $linha['nome_responsavel'];
                                    $registros['usuario'][$i]['cargo_info']['telefone'] = $linha['telefone'];

                                    if($linha['id_turma'] == 1)
                                        $registros['usuario'][$i]['cargo_info']['turma'] = false;
                                    else{
                                        $registros['usuario'][$i]['cargo_info']['turma']['idtf'] = $linha['id_turma'];
                                        $registros['usuario'][$i]['cargo_info']['turma']['serie'] = $linha['serie'];
                                        $registros['usuario'][$i]['cargo_info']['turma']['nome'] = $linha['nome_turma'];
                                    }
                                    
                                    $registros['usuario'][$i]['cargo_info']['ocupacao'] = "aluno";
                                } elseif ($linha['tipo_usuario'] == 2) {

                                    if($linha['tipo_empregado'] == 'D')
                                        $tipo_empregado = 'Designado';
                                    else
                                        $tipo_empregado = 'Efetivo';

                                    $registros['usuario'][$i]['cargo_info']['masp'] = $linha['masp'];
                                    $registros['usuario'][$i]['cargo_info']['tipo_empregado'] = $tipo_empregado;
                                    $registros['usuario'][$i]['cargo_info']['funcao'] = $linha['funcao'];
                                    $registros['usuario'][$i]['cargo_info']['ocupacao'] = "professor";
                                } else {

                                    if($linha['tipo_empregado'] == 'D')
                                        $tipo_empregado = 'Designado';
                                    else
                                        $tipo_empregado = 'Efetivo';
                                    $registros['usuario'][$i]['cargo_info']['masp'] = $linha['masp'];
                                    $registros['usuario'][$i]['cargo_info']['tipo_empregado'] = $tipo_empregado;
                                    $registros['usuario'][$i]['cargo_info']['funcao'] = $linha['funcao'];
                                    $registros['usuario'][$i]['cargo_info']['ocupacao'] = $linha['tipo'];
                                }
                                    
                                $i++;
                            }
                        } else {
                            $registros['usuario'] = false;
                        }
                    }
                } while ($conexao->next_result());
            }
        } else {
            $sql .= "SELECT * FROM usuario WHERE id != 1 ORDER BY nome ASC";
            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
                $i = 0;

                while ($linha = $resultado->fetch_assoc()) {
                    if($linha['local_moradia'] == 'U')
                        $local_moradia = 'Urbana';
                    else
                        $local_moradia = 'Rural';

                    if($linha['sexo'] == 'F')
                        $sexo = 'Feminino';
                    else
                        $sexo = 'Masculino';

                    $registros['usuario'][$i]['idtf'] = $linha['id'];
                    $registros['usuario'][$i]['nome'] = $linha['nome'];
                    $registros['usuario'][$i]['email'] = $linha['email'];
                    $registros['usuario'][$i]['local_moradia'] = $local_moradia;
                    $registros['usuario'][$i]['sexo'] = $sexo;
                    
                    
                    if ($linha["tipo_usuario"] == 1) {
                        $sql2 = "SELECT * FROM aluno, turma WHERE aluno.idAluno =" . $linha['id'] . " AND aluno.id_turma = turma.id";
                        $resultado2 = $conexao->query($sql2);
                        if ($resultado2->num_rows > 0) {
                            while ($linha2 = $resultado2->fetch_assoc()) {
                                $registros['usuario'][$i]['cargo_info']['data_nascimento'] = formata_data($linha2['data_nascimento']);
                                $registros['usuario'][$i]['cargo_info']['matricula'] = $linha2['numero_matricula'];
                                $registros['usuario'][$i]['cargo_info']['responsavel'] = $linha2['nome_responsavel'];
                                $registros['usuario'][$i]['cargo_info']['telefone'] = $linha2['telefone'];
                                
                                if($linha2['id_turma'] == 1)
                                    $registros['usuario'][$i]['cargo_info']['turma'] = false;
                                else{
                                    $registros['usuario'][$i]['cargo_info']['turma']['idtf'] = $linha2['id'];
                                    $registros['usuario'][$i]['cargo_info']['turma']['serie'] = $linha2['serie'];
                                    $registros['usuario'][$i]['cargo_info']['turma']['nome'] = $linha2['nome'];
                                }
                                
                                $registros['usuario'][$i]['cargo_info']['ocupacao'] = "aluno";
                            }
                        }
                    } elseif ($linha["tipo_usuario"] == 2) {
                        $sql2 = "SELECT * FROM professor WHERE idProfessor =" . $linha['id'] . " AND idProfessor != 1";
                        $resultado2 = $conexao->query($sql2);
                        if ($resultado2->num_rows > 0) {
                            while ($linha2 = $resultado2->fetch_assoc()) {

                                if($linha2['tipo_empregado'] == 'D')
                                    $tipo_empregado = 'Designado';
                                else
                                    $tipo_empregado = 'Efetivo';

                                $registros['usuario'][$i]['cargo_info']['masp'] = $linha2['masp'];
                                $registros['usuario'][$i]['cargo_info']['tipo_empregado'] = $tipo_empregado;
                                $registros['usuario'][$i]['cargo_info']['funcao'] = $linha2['funcao'];
                                $registros['usuario'][$i]['cargo_info']['ocupacao'] = "professor";
                            }
                        }
                    } else {
                        $sql2 = "SELECT * FROM gerenciadores WHERE idGerenciador  =" . $linha['id'];
                        $resultado2 = $conexao->query($sql2);
                        if ($resultado2->num_rows > 0) {
                            while ($linha2 = $resultado2->fetch_assoc()) {

                                if($linha2['tipo_empregado'] == 'D')
                                    $tipo_empregado = 'Designado';
                                else
                                    $tipo_empregado = 'Efetivo';

                                $registros['usuario'][$i]['cargo_info']['masp'] = $linha2['masp'];
                                $registros['usuario'][$i]['cargo_info']['tipo_empregado'] = $tipo_empregado;
                                $registros['usuario'][$i]['cargo_info']['funcao'] = $linha2['funcao'];
                                $registros['usuario'][$i]['cargo_info']['ocupacao'] = $linha2['tipo'];
                            }
                        }
                    }
                    $i++;
                }
            } else {
                $registros['usuario'] = false;
            }
        }
    }else{
        if (isset($_GET['dir']) || isset($_GET['secr']) || isset($_GET['sup']) || isset($_GET['prof']) || isset($_GET['alu'])) {
          $sql0 = "SELECT a.id_turma FROM aluno a, usuario u WHERE a.idAluno = u.id AND u.email = '" . $_SESSION['campo_email'] . "'";
          $resultado0 = $conexao->query($sql0);
          
          if ($resultado0->num_rows > 0){
            $linha0 = $resultado0->fetch_assoc();

            $tipoUsuario_escolhidos = array(
                "aluno"       => false,
                "professor"   => false,
                "gerenciador" => false
            );
            $gerenciadores_escolhidos = array(
                "supervisor" => false,
                "secretario" => false,
                "diretor"    => false
            );

            if (isset($_GET['alu'])) {
                $tipoUsuario_escolhidos['aluno'] = true;
            }
            if (isset($_GET['prof'])) {
                $tipoUsuario_escolhidos['professor'] = true;
            }
            if (isset($_GET['sup'])) {
                $gerenciadores_escolhidos['supervisor'] = true;
                $tipoUsuario_escolhidos['gerenciador'] = true;
            }
            if (isset($_GET['secr'])) {
                $gerenciadores_escolhidos['secretario'] = true;
                $tipoUsuario_escolhidos['gerenciador'] = true;
            }
            if (isset($_GET['dir'])) {
                $gerenciadores_escolhidos['diretor'] = true;
                $tipoUsuario_escolhidos['gerenciador'] = true;
            }

            $tipoUsuario_contador = 0;
            foreach ($tipoUsuario_escolhidos as $status) {
                if ($status) {
                    $tipoUsuario_contador++;
                }
            }

            $gerenciadores_contador = 0;
            foreach ($gerenciadores_escolhidos as $status) {
                if ($status) {
                    $gerenciadores_contador++;
                }
            }

            for ($i = 0; $i < $tipoUsuario_contador; $i++) {
                if ($i > 0) {
                    $sql .= "; ";
                }

                if ($tipoUsuario_escolhidos['aluno']) {
                    $sql .= "
                        SELECT u.id AS 'id', u.nome, u.email, u.local_moradia, u.sexo, u.tipo_usuario, 
                        a.data_nascimento, a.numero_matricula, a.nome_responsavel, a.telefone, 
                        t.id AS 'id_turma', t.nome AS 'nome_turma', t.serie FROM usuario u 
                        INNER JOIN aluno a ON u.id=a.idAluno INNER JOIN turma t ON t.id=a.id_turma WHERE t.id = " . $linha0['id_turma'];

                    $tipoUsuario_escolhidos['aluno'] = false;
                } elseif ($tipoUsuario_escolhidos['professor']) {
                    $sql .= "
                        SELECT u.*, p.*, d.nome AS 'nome_disciplina' FROM usuario u 
                        INNER JOIN professor p ON u.id=p.idProfessor INNER JOIN disciplina d ON p.idProfessor=d.id_professor 
                        WHERE p.idProfessor != 1 AND d.id_turma = " . $linha0['id_turma'];
                        
                    $tipoUsuario_escolhidos['professor'] = false;
                } elseif ($tipoUsuario_escolhidos['gerenciador']) {
                    $sql .= "SELECT * FROM usuario u INNER JOIN gerenciadores g ON u.id=g.idGerenciador";

                    if (!$gerenciadores_escolhidos['supervisor'] || !$gerenciadores_escolhidos['secretario'] || !$gerenciadores_escolhidos['diretor']) {
                        $sql .= " WHERE ";
                        $c = 0;
                        foreach ($gerenciadores_escolhidos as $gerenciador => $status) {
                            if ($status) {
                                $c++;
                                if ($c < $gerenciadores_contador)
                                    $sql .= "g.tipo='$gerenciador' OR ";
                                else
                                    $sql .= "g.tipo='$gerenciador'";
                                $gerenciadores_escolhidos[$gerenciador] = false;
                            }
                        }
                    }
                    $tipoUsuario_escolhidos['gerenciador'] = false;
                }
                $sql .= " ORDER BY u.nome ASC";
            }

            $i = 0;
            $existeRegistros = 0;
            if ($conexao->multi_query($sql)) {
                do {
                    if  (!$existeRegistros)
                        $registros['usuario'] = false;
                    
                    if ($resultado = $conexao->store_result()) {
                        if ($resultado->num_rows > 0) {
                            $existeRegistros++;
                            while ($linha = $resultado->fetch_assoc()) {
                                if($linha['local_moradia'] == 'U')
                                    $local_moradia = 'Urbana';
                                else
                                    $local_moradia = 'Rural';

                                if($linha['sexo'] == 'F')
                                    $sexo = 'Feminino';
                                else
                                    $sexo = 'Masculino';

                                $registros['usuario'][$i]['idtf'] = $linha['id'];
                                $registros['usuario'][$i]['nome'] = $linha['nome'];
                                $registros['usuario'][$i]['email'] = $linha['email'];
                                $registros['usuario'][$i]['local_moradia'] = $local_moradia;
                                $registros['usuario'][$i]['sexo'] = $sexo;
                                
                                if ($linha['tipo_usuario'] == 1) {
                                    $registros['usuario'][$i]['cargo_info']['data_nascimento'] = formata_data($linha['data_nascimento']);
                                    $registros['usuario'][$i]['cargo_info']['matricula'] = $linha['numero_matricula'];
                                    $registros['usuario'][$i]['cargo_info']['responsavel'] = $linha['nome_responsavel'];

                                    if($linha['id_turma'] == 1)
                                        $registros['usuario'][$i]['cargo_info']['turma'] = false;
                                    else{
                                        $registros['usuario'][$i]['cargo_info']['turma']['idtf'] = $linha['id_turma'];
                                        $registros['usuario'][$i]['cargo_info']['turma']['serie'] = $linha['serie'];
                                        $registros['usuario'][$i]['cargo_info']['turma']['nome'] = $linha['nome_turma'];
                                    }
                                    
                                    $registros['usuario'][$i]['cargo_info']['ocupacao'] = "aluno";
                                } elseif ($linha['tipo_usuario'] == 2) {

                                    if($linha['tipo_empregado'] == 'D')
                                        $tipo_empregado = 'Designado';
                                    else
                                        $tipo_empregado = 'Efetivo';

                                    $registros['usuario'][$i]['cargo_info']['masp'] = $linha['masp'];
                                    $registros['usuario'][$i]['cargo_info']['tipo_empregado'] = $tipo_empregado;
                                    $registros['usuario'][$i]['cargo_info']['funcao'] = $linha['funcao'];
                                    $registros['usuario'][$i]['cargo_info']['ocupacao'] = "professor";
                                } else {

                                    if($linha['tipo_empregado'] == 'D')
                                        $tipo_empregado = 'Designado';
                                    else
                                        $tipo_empregado = 'Efetivo';
                                    $registros['usuario'][$i]['cargo_info']['masp'] = $linha['masp'];
                                    $registros['usuario'][$i]['cargo_info']['tipo_empregado'] = $tipo_empregado;
                                    $registros['usuario'][$i]['cargo_info']['funcao'] = $linha['funcao'];
                                    $registros['usuario'][$i]['cargo_info']['ocupacao'] = $linha['tipo'];
                                }
                                    
                                $i++;
                            }
                        } else {
                            $registros['usuario'] = false;
                        }
                    }
                } while ($conexao->next_result());
            }
          }
        } else {
            $sql0 = "SELECT a.id_turma FROM aluno a, usuario u WHERE a.idAluno = u.id AND u.email = '" . $_SESSION['campo_email'] . "'";
            $resultado0 = $conexao->query($sql0);
            $i = 0;

            if ($resultado0->num_rows > 0){
                $linha0 = $resultado0->fetch_assoc();

                $sql1 = "SELECT u.id, u.nome, u.email, u.local_moradia, u.sexo, a.idAluno, a.data_nascimento, a.numero_matricula, a.nome_responsavel, a.telefone, a.id_turma, t.id AS 'idTurma', t.nome AS 'nome_turma', t.serie FROM usuario u, aluno a, turma t WHERE u.id = a.idAluno AND a.id_turma = t.id AND t.id = " . $linha0['id_turma'] . " ORDER BY u.nome ASC";
                $resultado1 = $conexao->query($sql1);
                if ($resultado1->num_rows > 0) {
                    while ($linha1 = $resultado1->fetch_assoc()) {

                        if($linha1['local_moradia'] == 'U')
                            $local_moradia = 'Urbana';
                        else
                            $local_moradia = 'Rural';

                        if($linha1['sexo'] == 'F')
                            $sexo = 'Feminino';
                        else
                            $sexo = 'Masculino';

                        $registros['usuario'][$i]['idtf'] = $linha1['id'];
                        $registros['usuario'][$i]['nome'] = $linha1['nome'];
                        $registros['usuario'][$i]['email'] = $linha1['email'];
                        $registros['usuario'][$i]['local_moradia'] = $local_moradia;
                        $registros['usuario'][$i]['sexo'] = $sexo;


                        $registros['usuario'][$i]['cargo_info']['data_nascimento'] = formata_data($linha1['data_nascimento']);
                        $registros['usuario'][$i]['cargo_info']['matricula'] = $linha1['numero_matricula'];
                        $registros['usuario'][$i]['cargo_info']['responsavel'] = $linha1['nome_responsavel'];
                        
                        if($linha1['id_turma'] == 1)
                            $registros['usuario'][$i]['cargo_info']['turma'] = false;
                        else{
                            $registros['usuario'][$i]['cargo_info']['turma']['idtf'] = $linha1['idTurma'];
                            $registros['usuario'][$i]['cargo_info']['turma']['serie'] = $linha1['serie'];
                            $registros['usuario'][$i]['cargo_info']['turma']['nome'] = $linha1['nome_turma'];
                        }
                        
                        $registros['usuario'][$i]['cargo_info']['ocupacao'] = "aluno";
                        $i++;
                    }
                }

                $sql2 = "SELECT u.id, u.nome, u.email, u.local_moradia, u.sexo, p.idProfessor, p.masp, p.tipo_empregado, p.funcao, d.id AS 'idDisciplina', d.nome AS 'nome_disciplina', d.ano, d.id_professor, d.id_turma FROM usuario u, professor p, disciplina d WHERE u.id = p.idProfessor AND d.id_professor = p.idProfessor AND d.id_turma = " . $linha0['id_turma'] . " ORDER BY u.nome ASC";
                $resultado2 = $conexao->query($sql2);
                if ($resultado2->num_rows > 0) {
                    while ($linha2 = $resultado2->fetch_assoc()) {
                        if($linha2['local_moradia'] == 'U')
                            $local_moradia = 'Urbana';
                        else
                            $local_moradia = 'Rural';

                        if($linha2['sexo'] == 'F')
                            $sexo = 'Feminino';
                        else
                            $sexo = 'Masculino';

                        $registros['usuario'][$i]['idtf'] = $linha2['id'];
                        $registros['usuario'][$i]['nome'] = $linha2['nome'];
                        $registros['usuario'][$i]['email'] = $linha2['email'];
                        $registros['usuario'][$i]['local_moradia'] = $local_moradia;
                        $registros['usuario'][$i]['sexo'] = $sexo;


                        if($linha2['tipo_empregado'] == 'D')
                            $tipo_empregado = 'Designado';
                        else
                            $tipo_empregado = 'Efetivo';

                        $registros['usuario'][$i]['cargo_info']['masp'] = $linha2['masp'];
                        $registros['usuario'][$i]['cargo_info']['tipo_empregado'] = $tipo_empregado;
                        $registros['usuario'][$i]['cargo_info']['funcao'] = $linha2['funcao'];
                        $registros['usuario'][$i]['cargo_info']['ocupacao'] = "professor";
                        $i++;
                    }
                }
                $sql3 = "SELECT * FROM usuario u, gerenciadores g WHERE u.id=g.idGerenciador AND g.tipo='diretor' ORDER BY u.nome ASC";
                $resultado3 = $conexao->query($sql3);
                if ($resultado3->num_rows > 0) {
                    while ($linha3 = $resultado3->fetch_assoc()) {
                        if($linha3['local_moradia'] == 'U')
                            $local_moradia = 'Urbana';
                        else
                            $local_moradia = 'Rural';

                        if($linha3['sexo'] == 'F')
                            $sexo = 'Feminino';
                        else
                            $sexo = 'Masculino';

                        $registros['usuario'][$i]['idtf'] = $linha3['id'];
                        $registros['usuario'][$i]['nome'] = $linha3['nome'];
                        $registros['usuario'][$i]['email'] = $linha3['email'];
                        $registros['usuario'][$i]['local_moradia'] = $local_moradia;
                        $registros['usuario'][$i]['sexo'] = $sexo;


                        if($linha3['tipo_empregado'] == 'D')
                            $tipo_empregado = 'Designado';
                        else
                            $tipo_empregado = 'Efetivo';

                        $registros['usuario'][$i]['cargo_info']['masp'] = $linha3['masp'];
                        $registros['usuario'][$i]['cargo_info']['tipo_empregado'] = $tipo_empregado;
                        $registros['usuario'][$i]['cargo_info']['funcao'] = $linha3['funcao'];
                        $registros['usuario'][$i]['cargo_info']['ocupacao'] = $linha3['tipo'];
                        $i++;
                    }
                }
            } else {
                $registros['usuario'] = false;
            }
        }
    }

    usort($registros['usuario'], "cmp_nome");
    echo json_encode($registros);
    $conexao->close();

    function cmp_nome($registro, $proximoRegistro) {
        return strcmp($registro['nome'], $proximoRegistro['nome']);
    }
?>