<?php

    include ("C:/xampp/htdocs/SIEGE/BancoDados/conexao_mysql.php");
    $registros = "";

    if (isset($_GET['dir']) || isset($_GET['secr']) || isset($_GET['sup']) || isset($_GET['prof']) || isset($_GET['alu'])) {
        $innerJoin_counter = 0;
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
            $innerJoin_counter++;
        }
        if (isset($_GET['prof'])) {
            $tipoUsuario_escolhidos['professor'] = true;
            $innerJoin_counter++;
        }
        if (isset($_GET['sup'])) {
            $gerenciadores_escolhidos['supervisor'] = true;
            $tipoUsuario_escolhidos['gerenciador'] = true;
            $innerJoin_counter++;
        }
        if (isset($_GET['secr'])) {
            $gerenciadores_escolhidos['secretario'] = true;
            $tipoUsuario_escolhidos['gerenciador'] = true;
            $innerJoin_counter++;
        }
        if (isset($_GET['dir'])) {
            $gerenciadores_escolhidos['diretor'] = true;
            $tipoUsuario_escolhidos['gerenciador'] = true;
            $innerJoin_counter++;
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

        $sql = "";
        for ($i=0; $i<$tipoUsuario_contador; $i++) {
            $sql .= "SELECT * FROM usuario u INNER JOIN ";
            if ($tipoUsuario_escolhidos['aluno']) {
                $sql .= "aluno a ON u.id=a.idAluno; ";
                $tipoUsuario_escolhidos['aluno'] = false;
            } elseif ($tipoUsuario_escolhidos['professor']) {
                $sql .= "professor p ON u.id=p.idProfessor; ";
                $tipoUsuario_escolhidos['professor'] = false;
            } elseif ($tipoUsuario_escolhidos['gerenciador']) {
                $sql .= "gerenciadores g ON u.id=g.idGerenciador";
                if(!$gerenciadores_escolhidos['supervisor'] || !$gerenciadores_escolhidos['secretario'] || !$gerenciadores_escolhidos['diretor']){
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
        }

        if ($mysqli->multi_query($sql)) {
            $registros .= "<div style='border: 1px solid black;'>";
            do {
                if ($resultado = $mysqli->store_result()){
                    while ($linha = $resultado->fetch_row()) {
                        $registros .= "<strong>Nome:</strong> " . $linha['nome'] . "<br>";
                        $registros .= "<strong>Email:</strong> " . $linha['email'] . "<br>";
                        $registros .= "<strong>Z. Moradia:</strong> " . $linha['local_moradia'] . "<br>";
                        $registros .= "<strong>Sexo:</strong> " . $linha['sexo'] . "<br>";
                        if ($linha['tipo_usuario']==1){
                            $registros .= "<strong>Data de nascimento:</strong> " . $linha2['data_nascimento'] . "<br>";
                            $registros .= "<strong>Matrícula:</strong> " . $linha2['numero_matricula'] . "<br>";
                            $registros .= "<strong>Responsável:</strong> " . $linha2['nome_responsavel'] . "<br>";
                            $registros .= "<strong>Turma:</strong> " . $linha2['serie'] . "° ano " . $linha2['nome'] . "<br>";
                            $registros .= "<strong>Ocupação:</strong> Aluno <br>";
                        } elseif ($linha['tipo_usuario']==2) {
                            $registros .= "<strong>MASP:</strong> " . $linha2['masp'] . "<br>";
                            $registros .= "<strong>T. empregado:</strong> " . $linha2['tipo_empregado'] . "<br>";
                            $registros .= "<strong>Função:</strong> " . $linha2['funcao'] . "<br>";
                            $registros .= "<strong>Ocupação:</strong> Professor <br>";
                        } else {
                            $registros .= "<strong>MASP:</strong> " . $linha2['masp'] . "<br>";
                            $registros .= "<strong>T. empregado:</strong> " . $linha2['tipo_empregado'] . "<br>";
                            $registros .= "<strong>Função:</strong> " . $linha2['funcao'] . "<br>";
                            $registros .= "<strong>Ocupação:</strong> " . $linha2['tipo'] . "<br>";
                        }
                    }
                }
            } while ($mysqli -> next_result());
        } else {
            $registros .= "&nbsp;Não foram encontrados usuários!";
        }
        $registros .= "&nbsp;<button id='atualizar'>Atualizar</button>&nbsp;&nbsp;";
        $registros .= "<button id='remover'>Remover</button>";
        $registros .= "</div>";
    } else {
        $sql = "SELECT * FROM usuario ORDER BY nome ASC";
        $resultado = $conexao->query($sql);
        
        if ($resultado->num_rows > 0)
        {
            while ($linha = $resultado->fetch_assoc())
            {
                $registros .= "<div style='border: 1px solid black;'>";
                $registros .= "<strong>Nome:</strong> " . $linha['nome'] . "<br>";
                $registros .= "<strong>Email:</strong> " . $linha['email'] . "<br>";
                $registros .= "<strong>Z. Moradia:</strong> " . $linha['local_moradia'] . "<br>";
                $registros .= "<strong>Sexo:</strong> " . $linha['sexo'] . "<br>";
                
                if($linha["tipo_usuario"] == 1){
                    $sql2 = "SELECT * FROM aluno, turma WHERE aluno.idAluno =" . $linha['id'] . " AND aluno.id_turma = turma.id";
                    $resultado2 = $conexao->query($sql2);
                    if ($resultado2->num_rows > 0)
                    {
                        while ($linha2 = $resultado2->fetch_assoc())
                        {
                            $registros .= "<strong>Data de nascimento:</strong> " . $linha2['data_nascimento'] . "<br>";
                            $registros .= "<strong>Matrícula:</strong> " . $linha2['numero_matricula'] . "<br>";
                            $registros .= "<strong>Responsável:</strong> " . $linha2['nome_responsavel'] . "<br>";
                            $registros .= "<strong>Turma:</strong> " . $linha2['serie'] . "° ano " . $linha2['nome'] . "<br>";
                            $registros .= "<strong>Ocupação:</strong> Aluno <br>";
                        }
                    }
                }elseif($linha["tipo_usuario"] == 2){
                    $sql2 = "SELECT * FROM professor WHERE idProfessor =" . $linha['id'];
                    $resultado2 = $conexao->query($sql2);
                    if ($resultado2->num_rows > 0)
                    {
                        while ($linha2 = $resultado2->fetch_assoc())
                        {
                            $registros .= "<strong>MASP:</strong> " . $linha2['masp'] . "<br>";
                            $registros .= "<strong>T. empregado:</strong> " . $linha2['tipo_empregado'] . "<br>";
                            $registros .= "<strong>Função:</strong> " . $linha2['funcao'] . "<br>";
                            $registros .= "<strong>Ocupação:</strong> Professor <br>";
                        }
                    }
                }else{
                    $sql2 = "SELECT * FROM gerenciadores WHERE idGerenciador  =" . $linha['id'];
                    $resultado2 = $conexao->query($sql2);
                    if ($resultado2->num_rows > 0)
                    {
                        while ($linha2 = $resultado2->fetch_assoc())
                        {
                            $registros .= "<strong>MASP:</strong> " . $linha2['masp'] . "<br>";
                            $registros .= "<strong>T. empregado:</strong> " . $linha2['tipo_empregado'] . "<br>";
                            $registros .= "<strong>Função:</strong> " . $linha2['funcao'] . "<br>";
                            $registros .= "<strong>Ocupação:</strong> " . $linha2['tipo'] . "<br>";
                        }
                    }
                }
                $registros .= "&nbsp;<button id='atualizar'>Atualizar</button>&nbsp;&nbsp;";
                $registros .= "<button id='remover'>Remover</button>";
                $registros .= "</div>";
            }
        } else {
            $registros .= "&nbsp;Não foram encontrados usuários!";
        }
    }

    echo json_encode($teste);

    $conexao->close();

?>