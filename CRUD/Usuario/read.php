<?php

    include ("C:/xampp/htdocs/SIEGE/BancoDados/conexao_mysql.php");

    $sql = "SELECT * FROM usuario ORDER BY nome ASC";
	$resultado = $conexao->query($sql);
	
	if ($resultado->num_rows > 0)
	{
		while ($linha = $resultado->fetch_assoc())
		{
            echo "<div style='border: 1px solid black;'>";
			echo "Nome: " . $linha['nome'] . "<br>";
			echo "Email: " . $linha['email'] . "<br>";
			echo "Z. Moradia: " . $linha['local_moradia'] . "<br>";
            echo "Sexo: " . $linha['sexo'] . "<br>";
            
            if($linha["tipo_usuario"] == 1){
                $sql2 = "SELECT * FROM aluno WHERE idAluno =" . $linha['id'];
                $resultado2 = $conexao->query($sql2);  
                if ($resultado2->num_rows > 0)
                {
                    while ($linha2 = $resultado2->fetch_assoc())
                    {
                        echo "Data de nascimento: " . $linha2['data_nascimento'] . "<br>";
                        echo "Matrícula: " . $linha2['numero_matricula'] . "<br>";
                        echo "Responsável: " . $linha2['nome_responsavel'] . "<br>";
                        echo "Ocupação: Aluno <br>";
                    }
                }
	        }elseif($linha["tipo_usuario"] == 2){
                $sql2 = "SELECT * FROM professor WHERE idProfessor =" . $linha['id'];
                $resultado2 = $conexao->query($sql2);
                if ($resultado2->num_rows > 0)
                {
                    while ($linha2 = $resultado2->fetch_assoc())
                    {
                        echo "MASP: " . $linha2['masp'] . "<br>";
                        echo "T. empregado: " . $linha2['tipo_empregado'] . "<br>";
                        echo "Função: " . $linha2['funcao'] . "<br>";
                        echo "Ocupação: Professor <br>";
                    }
                }
	        }else{
                $sql2 = "SELECT * FROM gerenciadores WHERE idGerenciador  =" . $linha['id'];
                $resultado2 = $conexao->query($sql2);
                if ($resultado2->num_rows > 0)
                {
                    while ($linha2 = $resultado2->fetch_assoc())
                    {
                        echo "MASP: " . $linha2['masp'] . "<br>";
                        echo "T. empregado: " . $linha2['tipo_empregado'] . "<br>";
                        echo "Função: " . $linha2['funcao'] . "<br>";
                        echo "Ocupação: " . $linha2['tipo'] . "<br>";
                    }
                }
	        }
            echo "<button>Atualizar</button> &emsp;";
            echo "<button>Remover</button>";
            echo "</div>";
        }
    }
	else
		echo "Não foram encontrados usuários!";	

    $conexao->close();

?>