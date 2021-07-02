<?php

include ("../../BancoDados/conexao_mysql.php");

$sql = "
SELECT * FROM usuario u ORDER BY u.nome ASC;
";
	$resultado = $conexao->query($sql);
	
	if ($resultado->num_rows > 0)
	{
        echo "<div style='border: 1px solid black'>";
		while ($linha = $resultado->fetch_assoc())
		{
			echo "Nome: " . $linha['nome'] . "<br>";
			echo "Email: " . $linha['email'] . "<br>";
			echo "Z. Moradia: " . $linha['local_moradia'] . "<br>";
            echo "Sexo: " . $linha['sexo'] . "<br>";
            
            if($linha["tipo_usuario"] == 1){
                var_dump($linha['id']);
                $sql = "SELECT * FROM aluno WHERE idAluno =" . $linha['id'];
                    $resultado = $conexao->query($sql);
                    
                    if ($resultado->num_rows > 0)
                    {
                        while ($linha = $resultado->fetch_assoc())
                        {
                            echo "Data de nascimento: " . $linha['data_nascimento'] . "<br>";
                            echo "Matrícula: " . $linha['numero_matricula'] . "<br>";
                            echo "Responsável: " . $linha['nome_responsavel'] . "<br>";
                            echo "Sexo: " . $linha['sexo'] . "<br>";
                        }
		            }
	        }

            if($linha["tipo_usuario"] == 2){
                $sql = "SELECT * FROM professor WHERE idProfessor =" . $linha['id'];
                    $resultado = $conexao->query($sql);
                    
                    if ($resultado->num_rows > 0)
                    {
                        while ($linha = $resultado->fetch_assoc())
                        {
                            echo "MASP: " . $linha['masp'] . "<br>";
                            echo "T. empregado: " . $linha['email'] . "<br>";
                            echo "Função: " . $linha['funcao'] . "<br>";
                        }
		            }
	        }


            if($linha["tipo_usuario"] == 3){
                $sql = "SELECT * FROM gerenciadores WHERE idGerenciador  =" . $linha['id'];
                    $resultado = $conexao->query($sql);
                    
                    if ($resultado->num_rows > 0)
                    {
                        while ($linha = $resultado->fetch_assoc())
                        {
                            echo "MASP: " . $linha['masp'] . "<br>";
                            echo "T. empregado: " . $linha['email'] . "<br>";
                            echo "Função: " . $linha['funcao'] . "<br>";
                            echo "Tipo: " . $linha['tipo'] . "<br>";
                        }
		            }
	        }
        }
        echo "</div>";
    }
	else
		echo "Não foram encontrados usuários!";	

$conexao->close();

?>