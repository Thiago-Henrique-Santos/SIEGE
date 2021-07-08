<?php

    include ("C:/xampp/htdocs/SIEGE/BancoDados/conexao_mysql.php");

    if (isset($_GET['dir']) || isset($_GET['secr']) || isset($_GET['sup']) || isset($_GET['prof']) || isset($_GET['alu'])) {
        $innerJoin_counter = 0;
        $cargos_escolhidos = array(
            "aluno"      => false,
            "professor"  => false,
            "supervisor" => false,
            "secretario" => false,
            "diretor"    => false
        );

        if (isset($_GET['alu'])) {
            $cargos_escolhidos['aluno'] = true;
            $innerJoin_counter++;
        }
        if (isset($_GET['prof'])) {
            $cargos_escolhidos['professor'] = true;
            $innerJoin_counter++;
        }
        if (isset($_GET['dir'])) {
            $cargos_escolhidos['diretor'] = true;
            $innerJoin_counter++;
        }
        if (isset($_GET['secr'])) {
            $cargos_escolhidos['secretario'] = true;
            $innerJoin_counter++;
        }
        if (isset($_GET['sup'])) {
            $cargos_escolhidos['supervisor'] = true;
            $innerJoin_counter++;
        }

        $sql = "SELECT * FROM usuario WHERE ";
        $c = 0;
        foreach ($cargos_escolhidos as $cargo => $status) {
            if($status==true){
                $c++;
                if ($cargos_escolhidos[$cargo])
                    $sql .= "tipo_usuario = ";

                if ($cargo == "aluno")
                    $sql .= "1";
                if ($cargo == "professor")
                    $sql .= "2";
                if ($cargo == "supervisor" || $cargo == "secretario" || $cargo == "diretor"){
                    if ($cargos_escolhidos[$cargo])
                        $sql .= "3";

                    // $cargos_escolhidos['supervisor'] = false;
                    // $cargos_escolhidos['secretario'] = false;
                    // $cargos_escolhidos['diretor']    = false;
                }

                if ($c < ($innerJoin_counter)) 
                    if ($cargos_escolhidos[$cargo])
                        $sql .= " OR ";
                
                $cargos_escolhidos[$cargo] = false;
            }
        }
        echo json_encode($sql);
    } else {
        $sql = "SELECT * FROM usuario ORDER BY nome ASC";
        $resultado = $conexao->query($sql);
        
        if ($resultado->num_rows > 0)
        {
            while ($linha = $resultado->fetch_assoc())
            {
                echo "<div style='border: 1px solid black;'>";
                echo "<strong>Nome:</strong> " . $linha['nome'] . "<br>";
                echo "<strong>Email:</strong> " . $linha['email'] . "<br>";
                echo "<strong>Z. Moradia:</strong> " . $linha['local_moradia'] . "<br>";
                echo "<strong>Sexo:</strong> " . $linha['sexo'] . "<br>";
                
                if($linha["tipo_usuario"] == 1){
                    $sql2 = "SELECT * FROM aluno, turma WHERE aluno.idAluno =" . $linha['id'] . " AND aluno.id_turma = turma.id";
                    $resultado2 = $conexao->query($sql2);
                    //echo $sql2;
                    if ($resultado2->num_rows > 0)
                    {
                        while ($linha2 = $resultado2->fetch_assoc())
                        {
                            echo "<strong>Data de nascimento:</strong> " . $linha2['data_nascimento'] . "<br>";
                            echo "<strong>Matrícula:</strong> " . $linha2['numero_matricula'] . "<br>";
                            echo "<strong>Responsável:</strong> " . $linha2['nome_responsavel'] . "<br>";
                            echo "<strong>Turma:</strong> " . $linha2['serie'] . "° ano " . $linha2['nome'] . "<br>";
                            echo "<strong>Ocupação:</strong> Aluno <br>";
                        }
                    }
                }elseif($linha["tipo_usuario"] == 2){
                    $sql2 = "SELECT * FROM professor WHERE idProfessor =" . $linha['id'];
                    $resultado2 = $conexao->query($sql2);
                    if ($resultado2->num_rows > 0)
                    {
                        while ($linha2 = $resultado2->fetch_assoc())
                        {
                            echo "<strong>MASP:</strong> " . $linha2['masp'] . "<br>";
                            echo "<strong>T. empregado:</strong> " . $linha2['tipo_empregado'] . "<br>";
                            echo "<strong>Função:</strong> " . $linha2['funcao'] . "<br>";
                            echo "<strong>Ocupação:</strong> Professor <br>";
                        }
                    }
                }else{
                    $sql2 = "SELECT * FROM gerenciadores WHERE idGerenciador  =" . $linha['id'];
                    $resultado2 = $conexao->query($sql2);
                    if ($resultado2->num_rows > 0)
                    {
                        while ($linha2 = $resultado2->fetch_assoc())
                        {
                            echo "<strong>MASP:</strong> " . $linha2['masp'] . "<br>";
                            echo "<strong>T. empregado:</strong> " . $linha2['tipo_empregado'] . "<br>";
                            echo "<strong>Função:</strong> " . $linha2['funcao'] . "<br>";
                            echo "<strong>Ocupação:</strong> " . $linha2['tipo'] . "<br>";
                        }
                    }
                }
                echo "&nbsp;<button id='atualizar'>Atualizar</button>&nbsp;&nbsp;";
                echo "<button id='remover'>Remover</button>";
                echo "</div>";
            }
        }else{
            echo "&nbsp;Não foram encontrados usuários!";
        }   
    }

    $conexao->close();

?>