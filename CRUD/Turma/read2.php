<?php

    include ("C:/xampp/htdocs/SIEGE/BancoDados/conexao_mysql.php");
    $sql = "";
    $registros = array();

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
            $i = 0;
            while ($linha = $resultado->fetch_assoc()) {
                $registros['turma'][$i]['serie'] = $linha['serie'];
                $registros['turma'][$i]['nome'] = $linha['nome_turma'];
                $sql2 = "SELECT a.idAluno AS 'id_aluno', u.nome AS 'nome_aluno' FROM usuario u WHERE a.idAluno=u.id AND a.id_turma=$linha[id_turma] ORDER BY u.nome ASC";
                    
                $resultado2 = $conexao->query($sql2);

                if ($resultado2->num_rows > 0)
                {
                    $j=0;
                    while ($linha2 = $resultado2->fetch_assoc())
                    {
                        $registros['turma'][$i]['aluno'][$j]['numero_chamada'] = $j + 1;
                        $registros['turma'][$i]['aluno'][$j]['nome'] = $linha2['nome_aluno'];
                        $j++;
                    }
                }else{
                    $registros['turma'][$i]['aluno'] = false;
                }
                $i++;
            }
        } else {
            $registros['turma'] = false;
        }
    }else{
        $sql = "
                SELECT t.id AS 'id_turma', t.serie AS 'serie', t.nome AS 'nome_turma' FROM turma t WHERE id != 1 ORDER BY t.serie ASC, t.nome ASC;
               ";
            
        $resultado = $conexao->query($sql);
        
        if ($resultado->num_rows > 0)
        {
            $i = 0;
            while ($linha = $resultado->fetch_assoc())
            {
                $registros['turma'][$i]['serie'] = $linha['serie'];
                $registros['turma'][$i]['nome'] = $linha['nome_turma'];
                $sql2 = "SELECT a.idAluno AS 'id_aluno', u.nome AS 'nome_aluno' FROM usuario u, aluno a WHERE a.idAluno=u.id AND a.id_turma=$linha[id_turma] ORDER BY u.nome ASC";
                    
                $resultado2 = $conexao->query($sql2);

                if ($resultado2->num_rows > 0)
                {
                    $j = 0;
                    while ($linha2 = $resultado2->fetch_assoc())
                    {
                        $registros['turma'][$i]['aluno'][$j]['numero_chamada'] = $j + 1;
                        $registros['turma'][$i]['aluno'][$j]['nome'] = $linha2['nome_aluno'];
                        $j++;
                    }
                }else{
                    $registros['turma'][$i]['aluno'] = false;
                }
                $i++;
            }
        }
        else
        $registros['turma'] = false;
    }

    echo json_encode($registros);

    $conexao->close();

?>