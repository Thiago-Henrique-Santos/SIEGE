<?php

    include ("C:/xampp/htdocs/SIEGE/BancoDados/conexao_mysql.php");
    $sql = "";
    $registros = "";

    if(isset($_GET['seg']) || isset($_GET['terc']) || isset($_GET['quart']) || isset($_GET['quin']) || isset($_GET['sext']) || isset($_GET['seti']) || isset($_GET['oit']) || isset($_GET['non'])){
        $innerJoin_counter = 0;
        $series_escolhidas = array(
            "segundo"  => false,
            "terceiro" => false,
            "quarto"   => false,
            "quinto"   => false,
            "sexto"    => false,
            "setimo"   => false,
            "oitavo"   => false,
            "nono"     => false
        );

        if(isset($_GET['seg'])){
            $innerJoin_counter++;
            $series_escolhidas['segundo'] = true;
        }

        if(isset($_GET['terc'])){
            $innerJoin_counter++;
            $series_escolhidas['terceiro'] = true;
        }

        if(isset($_GET['quart'])){
            $innerJoin_counter++;
            $series_escolhidas['quarto'] = true;
        }

        if(isset($_GET['quin'])){
            $innerJoin_counter++;
            $series_escolhidas['quinto'] = true;
        }

        if(isset($_GET['sext'])){
            $innerJoin_counter++;
            $series_escolhidas['sexto'] = true;
        }

        if(isset($_GET['seti'])){
            $innerJoin_counter++;
            $series_escolhidas['setimo'] = true;
        }

        if(isset($_GET['oit'])){
            $innerJoin_counter++;
            $series_escolhidas['oitavo'] = true;
        }

        if(isset($_GET['non'])){
            $innerJoin_counter++;
            $series_escolhidas['nono'] = true;
        }

        $sql .= "SELECT t.id AS 'id_turma', t.serie AS 'serie', t.nome AS 'nome_turma' FROM turma t WHERE ";
        $c = 0;
        foreach ($series_escolhidas as $se => $status) {
            if($status==true){
                $sql .= "t.serie = ";
                $c++;
                if ($se == "segundo") {
                    $sql .= "2";
                }
                if ($se == "terceiro") {
                    $sql .= "3";
                }
                if ($se == "quarto") {
                    $sql .= "4";
                }
                if ($se == "quinto") {
                    $sql .= "5";
                }
                if ($se == "sexto") {
                    $sql .= "6";
                }
                if ($se == "setimo") {
                    $sql .= "7";
                }
                if ($se == "oitavo") {
                    $sql .= "8";
                }
                if ($se == "nono") {
                    $sql .= "9";
                }

                if ($c < ($innerJoin_counter)) {
                    $sql .= " OR ";
                }
                $series_escolhidas[$se] = false;
            }

        }

        $sql .= " ORDER BY t.serie ASC, t.nome ASC";

        $resultado = $conexao->query($sql);
        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                $registros .= "<div style='border: 1px solid black;'>";
                $registros .= "<strong>Turma: </strong>" . $linha['serie'] . "° ano " . $linha['nome_turma'] . "<br>";
                $sql2 = "SELECT a.idAluno AS 'id_aluno', u.nome AS 'nome_aluno' FROM usuario u WHERE a.idAluno=u.id AND a.id_turma=$linha[id_turma]";
                    
                $resultado2 = $conexao->query($sql2);


                if ($resultado2->num_rows > 0)
                {
                    $c_al=1;
                    while ($linha2 = $resultado2->fetch_assoc())
                    {
                        $registros .= "&emsp;";
                        $registros .= "<u>" . $c_al . "</u>: " . $linha2['nome_aluno'];
                        //$registros .= "&emsp;";
                        //$registros .= "<button id='" . $linha2['id_disciplina'] . "' onclick='deleteConfirm(\"Disciplina\", \"none\", " . $linha2['id_disciplina'] . ")'>Desvincular</button>";
                        // $registros .= "&nbsp;<button onclick='loadSubjectModal(\"".$linha2['nome_disciplina']."\", \"".$linha2['id_professor']."\", \"".$linha2['id_disciplina']."\")'>Atualizar</button>";
                        $registros .= "<br>";
                        $c_al++;
                    }
                }else{
                    $registros .= "&nbsp;Não foram encontrados alunos!<br>";
                }
                $registros .= "&nbsp; <button id='atualizar' onclick='loadClassModal(\"".$linha['nome_turma']."\", ".$linha['serie'].", ". $linha['id_turma'] . ")'>Atualizar</button> &nbsp;";
                $registros .= "<button id='remover' onclick='deleteConfirm(\"Turma\", \"none\", " . $linha['id_turma'] . ")'>Remover</button>";
                $registros .= "</div>";
            }
        } else {
            $registros .= "&emsp;Não foram encontradas turmas desta(s) série(s)!<br>";
        }
    }else{
        $sql = "
                SELECT t.id AS 'id_turma', t.serie AS 'serie', t.nome AS 'nome_turma' FROM turma t WHERE id != 1 ORDER BY t.serie ASC, t.nome ASC;
               ";
            
        $resultado = $conexao->query($sql);
        
        if ($resultado->num_rows > 0)
        {
            $c_al=1;
            while ($linha = $resultado->fetch_assoc())
            {
                $registros .= "<div style='border: 1px solid black;'>";
                $registros .= "<strong>Turma: </strong>" . $linha['serie'] . "° ano " . $linha['nome_turma'] . "<br>";
                $sql2 = "SELECT a.idAluno AS 'id_aluno', u.nome AS 'nome_aluno' FROM usuario u, aluno a WHERE a.idAluno=u.id AND a.id_turma=$linha[id_turma]";
                    
                $resultado2 = $conexao->query($sql2);

                if ($resultado2->num_rows > 0)
                {
                    while ($linha2 = $resultado2->fetch_assoc())
                    {
                        $registros .= "&emsp;";
                        $registros .= "<u>" . $c_al . "</u>: " . $linha2['nome_aluno'];
                        //$registros .= "&emsp;";
                        //$registros .= "<button id='" . $linha2['id_disciplina'] . "' onclick='deleteConfirm(\"Disciplina\", \"none\", " . $linha2['id_disciplina'] . ")'>Desvincular</button>";
                        //$registros .= "&nbsp;<button onclick='loadSubjectModal(\"".$linha2['nome_disciplina']."\", \"".$linha2['id_professor']."\", \"".$linha2['id_disciplina']."\")'>Atualizar</button>";
                        $registros .= "<br>";
                        $c_al++;
                    }
                }else{
                    $registros .= "&nbsp;Não foram encontradas disciplinas!<br>";
                }
                $registros .= "&nbsp; <button id='atualizar' onclick='loadClassModal(\"".$linha['nome_turma']."\", ".$linha['serie'].", ". $linha['id_turma'] . ")'>Atualizar</button> &nbsp;";
                $registros .= "<button id='remover' onclick='deleteConfirm(\"Turma\", \"none\", " . $linha['id_turma'] . ")'>Remover</button>";
                $registros .= "</div>";
            }
        }
        else
            $registros .= "Não foram encontradas turmas!";
    }

    echo json_encode($registros);

    $conexao->close();

?>