<?php

    include ("../../BancoDados/conexao_mysql.php");
    include ("../../Bibliotecas/FPDF/fpdf.php");
    include ("../../modulos/funcoes.php");

    if (!isset($_GET['opvl']) || empty($_GET['opvl'])){
        echo "Erro!";
    }

    $opvl = $_GET['opvl'];

    $pdf = new FPDF("l", "cm", "A4");
    $pdf -> SetTopMargin(0.5);
    $pdf -> SetLeftMargin(0.5);
    $pdf -> SetRightMargin(0.5);
    $pdf -> AddPage();
    
    $pdf -> Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
    $pdf -> Ln(4);
    $pdf -> SetFont('Arial', 'BU', 20);
    $pdf -> SetTextColor(220, 50, 50);
    
    //Parâmetros da função Cell: largura, altura, título, borda, onde se inicia a escrita, alinhamento, preenchimento


    switch ($opvl) {
        case "usuarios":
            $pdf -> Cell(27.7, 1.5, utf8_decode('Relatório de Usuários'), 0, 0, "C");
            $pdf -> Ln(2);
            $pdf -> SetFont('Arial', 'B', 14);
            $pdf -> SetTextColor(0, 0, 0);
            $pdf -> Cell(27.7, 1.5, utf8_decode('Funcionários'), 0, 0, "L");
            $pdf -> Ln(1.5);
            celulasTituloUFG();
            celulasFuncionarios();
            $pdf -> Ln(2);
            $pdf -> SetFont('Arial', 'B', 14);
            $pdf -> SetTextColor(0, 0, 0);
            $pdf -> Cell(27.7, 1.5, utf8_decode('Alunos'), 0, 0, "L");
            $pdf -> Ln(1.5);
            celulasTituloAlunos();
            celulasAlunos();
            $pdf -> Output("I", "RelatorioUsuarios.pdf");
            break;

        case "funcionarios":
            $pdf -> Cell(27.7, 1.5, utf8_decode('Relatório de Funcionários'), 0, 0, "C");
            $pdf -> Ln(2);
            celulasTituloUFG();
            celulasFuncionarios();
            $pdf -> Output("I", "RelatorioFuncionarios.pdf");
            break;

        case "gerenciadores":
            $pdf -> Cell(27.7, 1.5, utf8_decode('Relatório de Gerenciadores'), 0, 0, "C");
            $pdf -> Ln(2);
            celulasTituloUFG();
            $sql = "SELECT * FROM usuario u, gerenciadores g WHERE u.id=g.idGerenciador AND u.id != 1 ORDER BY u.nome ASC";
            $resultado = $conexao->query($sql);
            
            if ($resultado->num_rows > 0)
            {
                $pdf -> SetFont('Arial', '', 10);
                $pdf->SetTextColor(0, 0, 0);
                $pdf -> SetFillColor(255, 255, 255);
                while ($linha = $resultado->fetch_assoc())
                {
                    $i++;
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

                    if($linha['tipo_empregado'] == 'D' && $linha['sexo']=='M')
                        $linha['tipo_empregado'] = 'Designado';
                    elseif($linha['tipo_empregado'] == 'D' && $linha['sexo']=='F')
                        $linha['tipo_empregado'] = 'Designada';
                    elseif($linha['tipo_empregado'] == 'E' && $linha['sexo']=='M')
                        $linha['tipo_empregado'] = 'Efetivo';
                    elseif($linha['tipo_empregado'] == 'E' && $linha['sexo']=='F')
                        $linha['tipo_empregado'] = 'Efetiva';

                    $pdf -> Cell(4, 0.75, $linha['tipo_empregado'], 1, 0, "C", 1);

                    if($linha['sexo'] == 'F')
                        $linha['sexo'] = 'Feminino';
                    else
                        $linha['sexo'] = 'Masculino';

                    $pdf -> Cell(2.7, 0.75, $linha['sexo'], 1, 0, "C", 1);

                    $pdf -> Ln();
                    if($i%2==0){
                        $pdf -> SetFillColor(255, 255, 255);
                    }else{
                        $pdf -> SetFillColor(217, 222, 255);
                    }
                }
            }
            else
                echo "Não foram encontrados registros.";	

            $pdf -> Output("I", "RelatorioGerenciadores.pdf");
            break;
            
        case "diretores_vices":
            $pdf -> Cell(27.7, 1.5, utf8_decode('Relatório de Diretores e Vices'), 0, 0, "C");
            $pdf -> Ln(2);
            celulasTituloDSSP();
            $sql = "SELECT * FROM usuario u, gerenciadores g WHERE u.id=g.idGerenciador AND u.id != 1 AND g.tipo='diretor' ORDER BY u.nome ASC";
            celulasDSSP();
            $pdf -> Output("I", "RelatorioDiretoresVices.pdf");
            break;

        case "supervisores":
            $pdf -> Cell(27.7, 1.5, utf8_decode('Relatório de Supervisores'), 0, 0, "C");
            $pdf -> Ln(2);
            celulasTituloDSSP();
            $sql = "SELECT * FROM usuario u, gerenciadores g WHERE u.id=g.idGerenciador AND u.id != 1 AND g.tipo='supervisor' ORDER BY u.nome ASC";
            celulasDSSP();
            $pdf -> Output("I", "RelatorioSupervisores.pdf");
            break;

        case "secretarios":
            $pdf -> Cell(27.7, 1.5, utf8_decode('Relatório de Secretários'), 0, 0, "C");
            $pdf -> Ln(2);
            celulasTituloDSSP();
            $sql = "SELECT * FROM usuario u, gerenciadores g WHERE u.id=g.idGerenciador AND u.id != 1 AND g.tipo='secretario' ORDER BY u.nome ASC";
            celulasDSSP();
            $pdf -> Output("I", "RelatorioSecretarios.pdf");
            break;

        case "professores":
            $pdf -> Cell(27.7, 1.5, utf8_decode('Relatório de Professores'), 0, 0, "C");
            $pdf -> Ln(2);
            celulasTituloDSSP();
            $sql = "SELECT * FROM usuario u, professor p WHERE u.id=p.idProfessor AND u.id != 1 ORDER BY u.nome ASC";
            celulasDSSP();
            $pdf -> Output("I", "RelatorioProfessores.pdf");
            break;

        case "alunos":
            $pdf -> Cell(27.7, 1.5, utf8_decode('Relatório de Alunos'), 0, 0, "C");
            $pdf -> Ln(2);
            celulasTituloAlunos();
            celulasAlunos();
            $pdf -> Output("I", "RelatorioAlunos.pdf");
            break;

        case "erro":
            alertaErro();
            break;
        default:
            def();
            break;
    }


    /*******
    Funções
    *******/

    function celulasTituloUFG(){
        global $pdf;
        global $i;
        $i = 0;
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
        $pdf -> Cell(4, 0.75, "Tip. Empregado(a)", 1, 0, "C", 1);
        $pdf -> Cell(2.7, 0.75, "Sexo", 1, 0, "C", 1);
        $pdf -> Ln();
    }

    function celulasTituloDSSP(){
        global $pdf;
        global $i;
        $i = 0;
        $pdf -> SetFillColor(3, 22, 133);
        $pdf -> SetTextColor(255, 255, 255);
        $pdf -> SetFont('Arial', 'B', 33);
        $pdf -> Cell(0.9, 1.5, "", 1, 0, "C", 1);
        $pdf -> SetFont('Arial', 'B', 10);
        $pdf -> Cell(11, 1.5, "Nome", 1, 0, "C", 1);
        $pdf -> Cell(9.2, 0.75, "Email", 1, 0, "C", 1);
        $pdf -> Cell(4.5, 0.75, "Zon. Moradia", 1, 0, "C", 1);
        $pdf -> Cell(3.1, 0.75, "MASP", 1, 0, "C", 1);
        $pdf -> Cell(0, 0.75, "", 0, 1);
        $pdf -> Cell(11.9, 0.75, "", 0, 0);
        $pdf -> Cell(9.2, 0.75, utf8_decode("Função"), 1, 0, "C", 1);
        $pdf -> Cell(4.5, 0.75, "Tip. Empregado(a)", 1, 0, "C", 1);
        $pdf -> Cell(3.1, 0.75, "Sexo", 1, 0, "C", 1);
        $pdf -> Ln();
    }

    function celulasTituloAlunos(){
        global $pdf;
        global $conexao;
        global $i;
        $pdf -> SetFillColor(3, 22, 133);
        $pdf -> SetTextColor(255, 255, 255);
        $pdf -> SetFont('Arial', 'B', 33);
        $pdf -> Cell(0.8, 1.5, "", 1, 0, "C", 1);
        $pdf -> SetFont('Arial', 'B', 10);
        $pdf -> Cell(9.5, 1.5, "Nome", 1, 0, "C", 1);
        $pdf -> Cell(9.2, 0.75, "Email", 1, 0, "C", 1);
        $pdf -> Cell(3.7, 0.75, "Zon. Moradia", 1, 0, "C", 1);
        $pdf -> Cell(2.5, 0.75, utf8_decode("N°. Matrícula"), 1, 0, "C", 1);
        $pdf -> Cell(3, 0.75, "Telefone", 1, 0, "C", 1);
        $pdf -> Cell(0, 0.75, "", 0, 1);
        $pdf -> Cell(10.3, 0.75, "", 0, 0);
        $pdf -> Cell(9.2, 0.75, utf8_decode("Responsável"), 1, 0, "C", 1);
        $pdf -> Cell(3.7, 0.75, "Data de Nascimento", 1, 0, "C", 1);
        $pdf -> Cell(2.5, 0.75, "Sexo", 1, 0, "C", 1);
        $pdf -> Cell(3, 0.75, "Turma", 1, 0, "C", 1);
        $pdf -> Ln();
    }

    function celulasDSSP(){
        global $pdf;
        global $conexao;
        global $i;
        global $sql;
        $resultado = $conexao->query($sql);
            
            if ($resultado->num_rows > 0)
            {
                $pdf -> SetFont('Arial', '', 10);
                $pdf->SetTextColor(0, 0, 0);
                $pdf -> SetFillColor(255, 255, 255);
                while ($linha = $resultado->fetch_assoc())
                {
                    $i++;
                    $pdf -> Cell(0.9, 1.5, $i, 1, 0, "C", 1);
                    $pdf -> Cell(11, 1.5, utf8_decode($linha['nome']), 1, 0, "C", 1);
                    $pdf -> Cell(9.2, 0.75, utf8_decode($linha['email']), 1, 0, "C", 1);

                    if($linha['local_moradia'] == 'R')
                        $linha['local_moradia'] = 'Rural';
                    else
                        $linha['local_moradia'] = 'Urbana';

                    $pdf -> Cell(4.5, 0.75, utf8_decode($linha['local_moradia']), 1, 0, "C", 1);
                    $pdf -> Cell(3.1, 0.75, utf8_decode($linha['masp']), 1, 0, "C", 1);
                    $pdf -> Cell(0, 0.75, "", 0, 1);
                    $pdf -> Cell(11.9, 0.75, "", 0, 0);
                    $pdf -> Cell(9.2, 0.75, utf8_decode($linha['funcao']), 1, 0, "C", 1);

                    if($linha['tipo_empregado'] == 'D' && $linha['sexo']=='M')
                        $linha['tipo_empregado'] = 'Designado';
                    elseif($linha['tipo_empregado'] == 'D' && $linha['sexo']=='F')
                        $linha['tipo_empregado'] = 'Designada';
                    elseif($linha['tipo_empregado'] == 'E' && $linha['sexo']=='M')
                        $linha['tipo_empregado'] = 'Efetivo';
                    elseif($linha['tipo_empregado'] == 'E' && $linha['sexo']=='F')
                        $linha['tipo_empregado'] = 'Efetiva';

                    $pdf -> Cell(4.5, 0.75, $linha['tipo_empregado'], 1, 0, "C", 1);

                    if($linha['sexo'] == 'F')
                        $linha['sexo'] = 'Feminino';
                    else
                        $linha['sexo'] = 'Masculino';

                    $pdf -> Cell(3.1, 0.75, $linha['sexo'], 1, 0, "C", 1);
                    $pdf -> Ln();
                    if($i%2==0){
                        $pdf -> SetFillColor(255, 255, 255);
                    }else{
                        $pdf -> SetFillColor(217, 222, 255);
                    }
                }
            }
            else
                echo "Não foram encontrados registros.";
    }

    function celulasFuncionarios(){
        global $pdf;
        global $conexao;
        global $i;
        $sql = "SELECT * FROM usuario u WHERE (u.tipo_usuario = 2 OR u.tipo_usuario = 3) AND u.id != 1 ORDER BY u.nome ASC";
            $sp = "";
            $resultado = $conexao->query($sql);
            
            if ($resultado->num_rows > 0)
            {
                $pdf -> SetFont('Arial', '', 10);
                $pdf->SetTextColor(0, 0, 0);
                $pdf -> SetFillColor(255, 255, 255);
                while ($linha = $resultado->fetch_assoc())
                {
                    $i++;
                    $pdf -> Cell(0.8, 1.5, $i, 1, 0, "C", 1);
                    $pdf -> Cell(10, 1.5, utf8_decode($linha['nome']), 1, 0, "C", 1);
                    $pdf -> Cell(8.5, 0.75, utf8_decode($linha['email']), 1, 0, "C", 1);

                    if($linha['local_moradia'] == 'R')
                        $linha['local_moradia'] = 'Rural';
                    else
                        $linha['local_moradia'] = 'Urbana';

                    $pdf -> Cell(4, 0.75, utf8_decode($linha['local_moradia']), 1, 0, "C", 1);

                    if ($linha['tipo_usuario'] == 3) {
                        $sql2 = "SELECT * FROM gerenciadores g WHERE g.idGerenciador =" . $linha['id'];
                        $resultado2 = $conexao->query($sql2);
                        if ($resultado2->num_rows > 0) {
                            while ($linha2 = $resultado2->fetch_assoc()) {
                                $pdf -> Cell(2.7, 0.75, utf8_decode($linha2['masp']), 1, 0, "C", 1);
                                if ($linha2['tipo'] == 'diretor' && $linha['sexo'] == 'M'){
                                    $linha2['tipo'] = 'Diretor';
                                } elseif ($linha2['tipo'] == 'diretor' && $linha['sexo'] == 'F'){
                                    $linha2['tipo'] = 'Diretora';
                                } elseif ($linha2['tipo'] == 'supervisor' && $linha['sexo'] == 'M'){
                                    $linha2['tipo'] = 'Supervisor';
                                } elseif ($linha2['tipo'] == 'supervisor' && $linha['sexo'] == 'F'){
                                    $linha2['tipo'] = 'Supervisora';
                                } elseif ($linha2['tipo'] == 'secretario' && $linha['sexo'] == 'M'){
                                    $linha2['tipo'] = 'Secretário';
                                } elseif ($linha2['tipo'] == 'secretario' && $linha['sexo'] == 'F'){
                                    $linha2['tipo'] = 'Secretária';
                                }
        
                                $pdf -> Cell(2.7, 1.5, utf8_decode($linha2['tipo']), 1, 0, "C", 1);
                                $pdf -> Cell(0, 0.75, "", 0, 1);
                                $pdf -> Cell(10.8, 0.75, "", 0, 0);
                                $pdf -> Cell(8.5, 0.75, utf8_decode($linha2['funcao']), 1, 0, "C", 1);

                                if($linha2['tipo_empregado'] == 'D' && $linha['sexo']=='M')
                                    $linha2['tipo_empregado'] = 'Designado';
                                elseif($linha2['tipo_empregado'] == 'D' && $linha['sexo']=='F')
                                    $linha2['tipo_empregado'] = 'Designada';
                                elseif($linha2['tipo_empregado'] == 'E' && $linha['sexo']=='M')
                                    $linha2['tipo_empregado'] = 'Efetivo';
                                elseif($linha2['tipo_empregado'] == 'E' && $linha['sexo']=='F')
                                    $linha2['tipo_empregado'] = 'Efetiva';

                                $pdf -> Cell(4, 0.75, $linha2['tipo_empregado'], 1, 0, "C", 1);
                            }
                        }
                    } elseif ($linha['tipo_usuario'] == 2) {
                        $sql2 = "SELECT * FROM professor p WHERE p.idProfessor =" . $linha['id'];
                        $resultado2 = $conexao->query($sql2);
                        if ($resultado2->num_rows > 0) {
                            while ($linha2 = $resultado2->fetch_assoc()) {
                                $pdf -> Cell(2.7, 0.75, utf8_decode($linha2['masp']), 1, 0, "C", 1);
                                if($linha['sexo'] == 'M'){
                                    $sp = 'Professor';
                                }else{
                                    $sp = 'Professora';
                                }
        
                                $pdf -> Cell(2.7, 1.5, utf8_decode($sp), 1, 0, "C", 1);
                                $pdf -> Cell(0, 0.75, "", 0, 1);
                                $pdf -> Cell(10.8, 0.75, "", 0, 0);
                                $pdf -> Cell(8.5, 0.75, utf8_decode($linha2['funcao']), 1, 0, "C", 1);

                                if($linha2['tipo_empregado'] == 'D' && $linha['sexo']=='M')
                                    $linha2['tipo_empregado'] = 'Designado';
                                elseif($linha2['tipo_empregado'] == 'D' && $linha['sexo']=='F')
                                    $linha2['tipo_empregado'] = 'Designada';
                                elseif($linha2['tipo_empregado'] == 'E' && $linha['sexo']=='M')
                                    $linha2['tipo_empregado'] = 'Efetivo';
                                elseif($linha2['tipo_empregado'] == 'E' && $linha['sexo']=='F')
                                    $linha2['tipo_empregado'] = 'Efetiva';

                                $pdf -> Cell(4, 0.75, $linha2['tipo_empregado'], 1, 0, "C", 1);
                            }
                        }
                    }

                    if($linha['sexo'] == 'F')
                        $linha['sexo'] = 'Feminino';
                    else
                        $linha['sexo'] = 'Masculino';

                    $pdf -> Cell(2.7, 0.75, $linha['sexo'], 1, 0, "C", 1);

                    $pdf -> Ln();
                    if($i%2==0){
                        $pdf -> SetFillColor(255, 255, 255);
                    }else{
                        $pdf -> SetFillColor(217, 222, 255);
                    }
                }
            }
            else
                echo "Não foram encontrados registros.";	
    }

    function celulasAlunos(){
        global $pdf;
        global $conexao;
        global $i;
        $sql = "
                SELECT u.id AS 'id', u.nome AS 'nome_usuario', u.email AS 'email', u.local_moradia AS 'local_moradia',  
                u.sexo AS 'sexo', a.idAluno AS 'idAluno', a.data_nascimento AS 'data_nascimento', 
                a.numero_matricula AS 'numero_matricula', a.nome_responsavel AS 'nome_responsavel', a.telefone AS 'telefone',
                a.id_turma AS 'id_turma', t.id AS 'idTurma', t.serie AS 'serie', t.nome AS 'nome_turma' 
                FROM usuario u, aluno a, turma t WHERE u.id=a.idAluno AND u.id != 1 AND a.id_turma=t.id ORDER BY u.nome ASC
                ";
        $resultado = $conexao->query($sql);
            
            if ($resultado->num_rows > 0)
            {
                $pdf -> SetFont('Arial', '', 10);
                $pdf->SetTextColor(0, 0, 0);
                $pdf -> SetFillColor(255, 255, 255);
                while ($linha = $resultado->fetch_assoc())
                {
                    $i++;
                    $pdf -> Cell(0.8, 1.5, $i, 1, 0, "C", 1);
                    $pdf -> Cell(9.5, 1.5, utf8_decode($linha['nome_usuario']), 1, 0, "C", 1);
                    $pdf -> Cell(9.2, 0.75, utf8_decode($linha['email']), 1, 0, "C", 1);

                    if($linha['local_moradia'] == 'R')
                        $linha['local_moradia'] = 'Rural';
                    else
                        $linha['local_moradia'] = 'Urbana';

                    $pdf -> Cell(3.7, 0.75, utf8_decode($linha['local_moradia']), 1, 0, "C", 1);
                    $pdf -> Cell(2.5, 0.75, $linha['numero_matricula'], 1, 0, "C", 1);
                    $pdf -> Cell(3, 0.75, utf8_decode($linha['telefone']), 1, 0, "C", 1);
                    $pdf -> Cell(0, 0.75, "", 0, 1);
                    $pdf -> Cell(10.3, 0.75, "", 0, 0);
                    $pdf -> Cell(9.2, 0.75, utf8_decode($linha['nome_responsavel']), 1, 0, "C", 1);
                    $pdf -> Cell(3.7, 0.75, formata_data($linha['data_nascimento']), 1, 0, "C", 1);

                    if($linha['sexo'] == 'F')
                        $linha['sexo'] = 'Feminino';
                    else
                        $linha['sexo'] = 'Masculino';

                    $pdf -> Cell(2.5, 0.75, $linha['sexo'], 1, 0, "C", 1);

                    if($linha['id_turma'] == 1){
                        $turma = "Não vinculada";
                        $pdf -> Cell(3, 0.75, utf8_decode($turma), 1, 0, "C", 1);
                    }
                    else{
                        $turma = $linha['serie'] . "° ano " . $linha['nome_turma'];
                        $pdf -> Cell(3, 0.75, utf8_decode($turma), 1, 0, "C", 1);
                    }
                        
                    $pdf -> Ln();
                    if($i%2==0){
                        $pdf -> SetFillColor(255, 255, 255);
                    }else{
                        $pdf -> SetFillColor(217, 222, 255);
                    }
                }
            }
            else
                echo "Não foram encontrados registros.";
    }

    function def() {
        echo "<div style='width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;'>";
            echo "<h1 style='font-family: Arial, Helvetica, Calibri; font-size: 55px; font-weight: bold; color: gray;'>SIEGE</h1>";
        echo "</div>";
    }

    function alertaErro () {
        echo "<h1 align='center'>Ocorreu um erro inesperado!</h1>";
        echo "<br>";
        echo "<center>";
            echo "<img src='../../img/erro.gif' style='margin-bottom: 10px; width: 350px; height: auto;'>";
        echo "<br><br>";
        echo "<div id='mostra erro' style='width:100%; display: flex; justify-content: center; align-items: center;'>";
            echo "<img src='../../img/atencao.png' style='height: 20px; width: auto;'>";
            echo "<font style='font-size: 20px;'>".$_GET['info']."</font>";
        echo "</div>";
    }
?>