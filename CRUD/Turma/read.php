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
                $sql2 = "SELECT d.id AS 'id_disciplina', d.nome AS 'nome_disciplina', u.id AS 'id_professor', u.nome AS 'professor' FROM disciplina d, usuario u WHERE d.id_turma=$linha[id_turma] AND d.id_professor=u.id ORDER BY d.nome ASC";
                    
                $resultado2 = $conexao->query($sql2);

                if ($resultado2->num_rows > 0)
                {
                    while ($linha2 = $resultado2->fetch_assoc())
                    {
                        $registros .= "&emsp;";

                        if($linha2['id_professor'] == 1)
                            $registros .= "<u>" . $linha2['nome_disciplina'] . "</u>: Não há um professor vinculado a essa disciplina";
                        else
                            $registros .= "<u>" . $linha2['nome_disciplina'] . "</u>: " . $linha2['professor'];
                        $registros .= "&emsp;";
                        $registros .= "<button id='" . $linha2['id_disciplina'] . "' onclick='deleteConfirm(\"Disciplina\", \"none\", " . $linha2['id_disciplina'] . ")'>Desvincular</button> <br>";
                    }
                }else{
                    $registros .= "&nbsp;Não foram encontradas disciplinas!<br>";
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
            while ($linha = $resultado->fetch_assoc())
            {
                $registros .= "<div style='border: 1px solid black;'>";
                $registros .= "<strong>Turma: </strong>" . $linha['serie'] . "° ano " . $linha['nome_turma'] . "<br>";
                $sql2 = "SELECT d.id AS 'id_disciplina', d.nome AS 'nome_disciplina', u.id AS 'id_professor', u.nome AS 'professor' FROM disciplina d, usuario u WHERE d.id_turma=$linha[id_turma] AND d.id_professor=u.id ORDER BY d.nome ASC";
                    
                $resultado2 = $conexao->query($sql2);

                if ($resultado2->num_rows > 0)
                {
                    while ($linha2 = $resultado2->fetch_assoc())
                    {
                        $registros .= "&emsp;";

                        if($linha2['id_professor'] == 1)
                            $registros .= "<u>" . $linha2['nome_disciplina'] . "</u>: Não há um professor vinculado a essa disciplina";
                        else
                            $registros .= "<u>" . $linha2['nome_disciplina'] . "</u>: " . $linha2['professor'];
                        $registros .= "&emsp;";
                        $registros .= "<button id='" . $linha2['id_disciplina'] . "' onclick='deleteConfirm(\"Disciplina\", \"none\", " . $linha2['id_disciplina'] . ")'>Desvincular</button> <br>";
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