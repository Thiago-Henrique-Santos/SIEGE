<?php

include ("../../BancoDados/conexao_mysql.php");

$sql = "SELECT * FROM bimestre";
	$resultado = $conexao->query($sql);
	
	if ($resultado->num_rows > 0)
	{
		while ($linha = $resultado->fetch_assoc())
		{
			echo "Nome: " . $linha["nome"] . "<br>";
			echo "Sexo: " . $linha["sexo"] . "<br>";
			echo "Idade: " . $linha["idade"] . "<br>";
		}
	}
	else
		echo "Não foram encontrados clientes!";	

$conexao->close();

?>