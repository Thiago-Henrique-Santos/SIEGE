<?php

    include ("C:/xampp/htdocs/SIEGE/BancoDados/conexao_mysql.php");

    $sql = "SELECT * FROM turma ORDER BY serie ASC";
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