<?php

    include ("../../BancoDados/conexao_mysql.php");
    include ("../../Bibliotecas/FPDF/fpdf.php");
    include ("../../modulos/funcoes.php");

    $pdf = new FPDF("l", "cm", "A4");
    $pdf -> SetTopMargin(0.5);
    $pdf -> SetLeftMargin(0.5);
    $pdf -> SetRightMargin(0.5);
    $pdf -> AddPage();
    
    $pdf -> SetFont('Arial', 'B', 20);
    $pdf -> SetFont('Arial', 'U', 20);
    //Parâmetros da função Cell: largura, altura, título, borda, onde se inicia a escrita, alinhamento, preenchimento
    $pdf -> SetTextColor(220, 50, 50);
    $pdf -> Cell(27.7, 1.5, utf8_decode('Relatório de Gerenciadores'), 0, 0, "C");
    //Pular linha
    $pdf -> Ln(2);

    $pdf -> SetFillColor(3, 22, 133);
    $pdf -> SetTextColor(255, 255, 255);
    $pdf -> SetFont('Arial', 'B', 33);
    $pdf -> Cell(0.8, 1.5, "", 1, 0, "C", 1);
    $pdf -> SetFont('Arial', 'B', 10);
    $pdf -> Cell(10, 1.5, "Nome", 1, 0, "C", 1);
    $pdf -> Cell(8.5, 0.75, "Email", 1, 0, "C", 1);
    $pdf -> Cell(4, 0.75, "Zon. Moradia", 1, 0, "C", 1);
    $pdf -> Cell(2.7, 0.75, "MASP", 1, 0, "C", 1);
    $pdf -> Cell(2.7, 1.5, utf8_decode("Ocupação"), 1, 0, "C", 1);
    $pdf -> Cell(0, 0.75, "", 0, 1);
    $pdf -> Cell(10.8, 0.75, "", 0, 0);
    $pdf -> Cell(8.5, 0.75, utf8_decode("Função"), 1, 0, "C", 1);
    $pdf -> Cell(4, 0.75, "Tip. Empregado", 1, 0, "C", 1);
    $pdf -> Cell(2.7, 0.75, "Sexo", 1, 0, "C", 1);
    $pdf -> Ln();

    $i=1;
    $sql = "SELECT * FROM usuario u, gerenciadores g WHERE u.id=g.idGerenciador AND g.idGerenciador != 1 ORDER BY u.nome ASC";
	$resultado = $conexao->query($sql);
	
	if ($resultado->num_rows > 0)
	{
        $pdf -> SetFont('Arial', '', 10);
        $pdf->SetTextColor(0, 0, 0);
        $pdf -> SetFillColor(255, 255, 255);
		while ($linha = $resultado->fetch_assoc())
		{
            $pdf -> Cell(0.8, 1.5, $i, 1, 0, "C", 1);
            $pdf -> Cell(10, 1.5, utf8_decode($linha['nome']), 1, 0, "C", 1);
            $pdf -> Cell(8.5, 0.75, utf8_decode($linha['email']), 1, 0, "C", 1);

            if($linha['local_moradia'] == 'R')
                $linha['local_moradia'] = 'Rural';
            else
                $linha['local_moradia'] = 'Urbana';

            $pdf -> Cell(4, 0.75, utf8_decode($linha['local_moradia']), 1, 0, "C", 1);
            $pdf -> Cell(2.7, 0.75, utf8_decode($linha['masp']), 1, 0, "C", 1);

            if ($linha['tipo'] == 'diretor' && $linha['sexo'] == 'M'){
                $linha['tipo'] = 'Diretor';
            } elseif ($linha['tipo'] == 'diretor' && $linha['sexo'] == 'F'){
                $linha['tipo'] = 'Diretora';
            } elseif ($linha['tipo'] == 'supervisor' && $linha['sexo'] == 'M'){
                $linha['tipo'] = 'Supervisor';
            } elseif ($linha['tipo'] == 'supervisor' && $linha['sexo'] == 'F'){
                $linha['tipo'] = 'Supervisora';
            } elseif ($linha['tipo'] == 'secretario' && $linha['sexo'] == 'M'){
                $linha['tipo'] = 'Secretário';
            } elseif ($linha['tipo'] == 'secretario' && $linha['sexo'] == 'F'){
                $linha['tipo'] = 'Secretária';
            }

            $pdf -> Cell(2.7, 1.5, utf8_decode($linha['tipo']), 1, 0, "C", 1);
            $pdf -> Cell(0, 0.75, "", 0, 1);
            $pdf -> Cell(10.8, 0.75, "", 0, 0);
            $pdf -> Cell(8.5, 0.75, utf8_decode($linha['funcao']), 1, 0, "C", 1);

            if($linha['tipo_empregado'] == 'D')
                $linha['tipo_empregado'] = 'Designado';
            else
                $linha['tipo_empregado'] = 'Efetivo';

            $pdf -> Cell(4, 0.75, $linha['tipo_empregado'], 1, 0, "C", 1);

            if($linha['sexo'] == 'F')
                $linha['sexo'] = 'Feminino';
            else
                $linha['sexo'] = 'Masculino';

            $pdf -> Cell(2.7, 0.75, $linha['sexo'], 1, 0, "C", 1);

            $pdf -> Ln();
            $i++;
            if($i%2==0){
                $pdf -> SetFillColor(217, 222, 255);
            }else{
                $pdf -> SetFillColor(255, 255, 255);
            }
		}
	}
	else
		echo "Não foram encontrados gerenciadores!";	

    $pdf -> Output("I", "RelatorioGerenciadores.pdf");

?>