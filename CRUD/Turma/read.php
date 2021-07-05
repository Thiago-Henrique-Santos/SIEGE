<?php

    include ("C:/xampp/htdocs/SIEGE/BancoDados/conexao_mysql.php");

    $sql = "
            SELECT t.id AS 'id_turma', t.serie AS 'serie', t.nome AS 'nome_turma' FROM turma t ORDER BY t.serie ASC;
           ";
            
	$resultado = $conexao->query($sql);
	
	if ($resultado->num_rows > 0)
	{
		while ($linha = $resultado->fetch_assoc())
		{
            echo "<div style='border: 1px solid black;'>";
			echo "<strong>Turma: </strong>" . $linha['serie'] . "°" . " ano " . $linha['nome_turma'] . "<br>";

            $sql2 = "SELECT d.nome AS 'nome_disciplina', u.id AS 'id_professor', u.nome AS 'professor' FROM disciplina d, usuario u WHERE d.id_turma=$linha[id_turma] AND d.id_professor=u.id ORDER BY d.nome ASC";
            
	        $resultado2 = $conexao->query($sql2);
	
        if ($resultado2->num_rows > 0)
        {
            while ($linha2 = $resultado2->fetch_assoc())
            {
                echo "&emsp;";
                echo "<u>" . $linha2['nome_disciplina'] . "</u>: " . $linha2['professor'] . "<br>";
            }

            echo "&nbsp; <button>Atualizar</button> &nbsp;";
            echo "<button>Remover</button>";
            echo "</div>";
        }else{
            echo "Não foram encontradas disciplinas!";
        }

        }
    }
	else
		echo "Não foram encontradas turmas!";	

    $conexao->close();

?>