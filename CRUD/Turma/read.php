<?php

    include ("C:/xampp/htdocs/SIEGE/BancoDados/conexao_mysql.php");

    $sql = "
            SELECT t.serie AS 'serie', t.nome AS 'nome_turma', d.nome AS 'disciplina', u.id AS 'id_professor', 
            u.nome AS 'professor' FROM turma t INNER JOIN disciplina d ON d.id_turma=t.id INNER JOIN usuario u 
            ON u.id=d.id_professor ORDER BY serie ASC
            ";
            
	$resultado = $conexao->query($sql);
	
	if ($resultado->num_rows > 0)
	{
		while ($linha = $resultado->fetch_assoc())
		{
            echo "<div style='border: 1px solid black;'>";
			echo "Turma: " . $linha['serie'] . "°" . " ano " . $linha['nome'];


            echo "&nbsp; <button>Atualizar</button> &nbsp;";
            echo "<button>Remover</button>";
            echo "</div>";
        }
    }
	else
		echo "Não foram encontradas turmas!";	

    $conexao->close();

?>