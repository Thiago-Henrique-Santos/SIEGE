<?php

    include ("C:/xampp/htdocs/SIEGE/BancoDados/conexao_mysql.php");

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
                $sql2 = "SELECT * FROM aluno WHERE idAluno =" . $linha['id'];
                $resultado2 = $conexao->query($sql2);
                if ($resultado2->num_rows > 0)
                {
                    while ($linha2 = $resultado2->fetch_assoc())
                    {
                        echo "<strong>Data de nascimento:</strong> " . $linha2['data_nascimento'] . "<br>";
                        echo "<strong>Matrícula:</strong> " . $linha2['numero_matricula'] . "<br>";
                        echo "<strong>Responsável:</strong> " . $linha2['nome_responsavel'] . "<br>";
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
            echo "&nbsp;<button>Atualizar</button>&nbsp;&nbsp;";
            echo "<button>Remover</button>";
            echo "</div>";
        }
    }
	else
		echo "&nbsp;Não foram encontrados usuários!";	

    $conexao->close();

?>