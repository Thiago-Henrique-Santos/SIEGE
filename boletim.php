<?php
    include ('BancoDados/conexao_mysql.php');
    session_start();
    if(!isset($_SESSION['campo_email']) || empty($_SESSION['campo_email'])){
        header ("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/icon_siege.png"/>
    <title>SIEGE - Boletins </title>
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link rel="stylesheet" type="text/css" href="CSS/user_main.css">
    <link rel="stylesheet" href="CSS/boletim.css" type="text/css">
    <script src="JS/boletim.js"></script>
    <script src="JS/filtro_boletim.js" type="module"></script>
</head>

<body>
    
    <?php
        include ('componentes/user_nav.php');
    ?>

    <h1 class="titulo-principal">Boletim</h1>
    <button id="btn_editar" name="btn_editar" type="button" onclick="toogle_disabled(false)">Editar</button>
    <button id="btn_cancelar" name="btn_cancelar" type="button" onclick="cancel(true)">Cancelar</button>
    <button id="btn_limpar" name="btn_limpar" type="button" onclick="clearInputs()">Limpar</button>
    <button id="btn_publicar" name="btn_publicar" type="button" onclick="postGrades()" disabled="">Publicar</button>

    <br><br>
    
                <select name="turmas">
                    <option selected="sut">Selecione uma Turma</option>
                    <?php
                        $prepara = $conexao->prepare("SELECT * FROM turma WHERE id != 1");
                        $prepara->execute();
                        $resultado = $prepara->get_result();
                        while($t = $resultado->fetch_object()){
                            $turmas[] = $t;
                        }
                        foreach ($turmas as $tur){
							echo "<option value = $tur->id>" . $tur->serie . "º " . $tur->nome . "</option>";
						}
                    ?>
                </select>
                &emsp;
                <select name="disciplinas">
                    <option selected="sud">Selecione uma Disciplina</option>
                    <?php
                        $prepara2 = $conexao->prepare("SELECT nome FROM disciplina WHERE id_turma = /*$(Variável com o id da turma selecionada)*/");
                        $prepara2->execute();
                        $resultado2 = $prepara2->get_result();
                        while($d = $resultado2->fetch_object()){
                            $disciplinas[] = $d;
                        }
                        foreach ($disciplinas as $dis){
							echo "<option value = $dis->id>" . $dis->nome . "</option>";
						}
                    ?>
                </select>
                
    <br><br>
    
    <!--tr = linha, td = coluna-->
    <!-- Tabela na visão de gerenciadores e professores -->
        <table id="boletim">

            <!-- ***** Parte Fixa abaixo*****-->
            <tr class="titulo_tabela">
                <td></td>
                <td colspan="2">
                    <h2>1° Bimestre</h2>
                </td>

                <td colspan="2">
                    <h2>2° Bimestre</h2>
                </td>

                <td colspan="2">
                    <h2>3° Bimestre</h2>
                </td>

                <td colspan="2">
                    <h2>4° Bimestre</h2>
                </td>

                <td colspan="2">
                    <h2>Recuperação</h2>
                </td>

                <td rowspan="2">
                    <h2>Faltas totais</h2>
                </td>

                <td rowspan="2">
                    <h2>Nota Final</h2>
                </td>

                <td rowspan="2">
                    <h2>Situação</h2>
                </td>
            </tr>

            <tr class="titulo_tabela">
                <td>
                    <h2>Alunos</h2>
                </td>

                <!--1° bimestre-->
                <td>
                    <h2>Faltas</h2>
                </td>

                <td>
                    <h2>Notas</h2>
                </td>

                <!--2° bimestre-->
                <td>
                    <h2>Faltas</h2>
                </td>

                <td>
                    <h2>Notas</h2>
                </td>

                <!--3° bimestre-->
                <td>
                    <h2>Faltas</h2>
                </td>

                <td>
                    <h2>Notas</h2>
                </td>

                <!--4° bimestre-->
                <td>
                    <h2>Faltas</h2>
                </td>

                <td>
                    <h2>Notas</h2>
                </td>

                <!--Recuperação-->
                <td>
                    <h2>Faltas</h2>
                </td>

                <td>
                    <h2>Notas</h2>
                </td>

            </tr>

            <tr class="linha_registros">

                <!--Primeira coluna -> Aluno-->
                <td class="nome">
                    <h3>Ana Clara Souza</h3>
                </td>

                <!--Segunda coluna -> Falta 1° bim-->
                <td>
                    <input min="0" type="number" step="1" name="f1b" id="i" value="" placeholder="-" disabled="">
                </td>

                <!--Terceira coluna -> Nota 1° bim-->
                <td>
                    <input min="0" type="number" step="0.5" name="n1b" id="i" value="" placeholder="-,-" disabled="">
                </td>

                <!--Quarta coluna -> Falta 2° bim-->
                <td>
                    <input min="0" type="number" step="1" name="f2b" id="i" value="" placeholder="-" disabled="">
                </td>

                <!--Quinta coluna -> Nota 2° bim-->
                <td>
                    <input min="0" type="number" step="0.5" name="n2b" id="i" value="" placeholder="-,-" disabled="">
                </td>

                <!--Sexta coluna -> Falta 3° bim-->
                <td>
                    <input min="0" type="number" step="1" name="f3b" id="i" value="" placeholder="-" disabled="">
                </td>

                <!--Sétima coluna -> Nota 3° bim-->
                <td>
                    <input min="0" type="number" step="0.5" name="n3b" id="i" value="" placeholder="-,-" disabled="">
                </td>

                <!--Oitava coluna -> Falta 4° bim-->
                <td>
                    <input min="0" type="number" step="1" name="f4b" id="i" value="" placeholder="-" disabled="">
                </td>

                <!--Nona coluna -> Nota 4° bim-->
                <td>
                    <input min="0" type="number" step="0.5" name="n4b" id="i" value="" placeholder="-,-" disabled="">
                </td>

                <!--Décima coluna -> Falta recuperação-->
                <td>
                    <input min="0" type="number" step="1" name="f4b" id="i" value="" placeholder="-" disabled="">
                </td>

                <!--Décima primeira coluna -> Nota recuperação-->
                <td>
                    <input min="0" type="number" step="0.5" name="n3b" id="i" value="" placeholder="-,-" disabled="">
                </td>

                <!--Falta final-->
                <td>
                    <h3>
                        <font color="green">10</font>
                    </h3>
                </td>

                <!--Nota final-->
                <td>
                    <h3>
                        <font color="green">100,0</font>
                    </h3>
                </td>

                <!--Situação-->
                <td>
                    <h3>
                        <font color="green">Aprovada</font>
                    </h3>
                </td>

            </tr>


            <!-- Registro 2 -->
            <tr class="linha_registros">

                <!--Primeira coluna -> Aluno-->
                <td class="nome">
                    <h3>Bianca Barroso da Silva</h3>
                </td>

                <!--Segunda coluna -> Falta 1° bim-->
                <td>
                    <input min="0" type="number" step="1" name="f1b" id="i" value="" placeholder="-" disabled="">
                </td>

                <!--Terceira coluna -> Nota 1° bim-->
                <td>
                    <input min="0" type="number" step="0.5" name="n1b" id="i" value="" placeholder="-,-" disabled="">
                </td>

                <!--Quarta coluna -> Falta 2° bim-->
                <td>
                    <input min="0" type="number" step="1" name="f2b" id="i" value="" placeholder="-" disabled="">
                </td>

                <!--Quinta coluna -> Nota 2° bim-->
                <td>
                    <input min="0" type="number" step="0.5" name="n2b" id="i" value="" placeholder="-,-" disabled="">
                </td>

                <!--Sexta coluna -> Falta 3° bim-->
                <td>
                    <input min="0" type="number" step="1" name="f3b" id="i" value="" placeholder="-" disabled="">
                </td>

                <!--Sétima coluna -> Nota 3° bim-->
                <td>
                    <input min="0" type="number" step="0.5" name="n3b" id="i" value="" placeholder="-,-" disabled="">
                </td>

                <!--Oitava coluna -> Falta 4° bim-->
                <td>
                    <input min="0" type="number" step="1" name="f4b" id="i" value="" placeholder="-" disabled="">
                </td>

                <!--Nona coluna -> Nota 4° bim-->
                <td>
                    <input min="0" type="number" step="0.5" name="n4b" id="i" value="" placeholder="-,-" disabled="">
                </td>

                <!--Décima coluna -> Falta recuperação-->
                <td>
                    <input min="0" type="number" step="1" name="f4b" id="i" value="" placeholder="-" disabled="">
                </td>

                <!--Décima primeira coluna -> Nota recuperação-->
                <td>
                    <input min="0" type="number" step="0.5" name="n3b" id="i" value="" placeholder="-,-" disabled="">
                </td>

                <!--Falta final-->
                <td>
                    <h3>
                        <font color="gray" title="A falta final ainda não está disponível, já que nem todas as faltas foram lançadas.">-:--</font>
                    </h3>
                </td>

                <!--Nota final-->
                <td>
                    <h3>
                        <font color="gray" title="A nota final ainda não está disponível, já que nem todas as notas foram lançadas.">-,-</font>
                    </h3>
                </td>

                <!--Situação-->
                <td>
                    <h3>
                        <font color="gray" title="A situação do aluno ainda está em andamento, já que nem todas as notas e faltas foram publicadas.">Em andamento</font>
                    </h3>
                </td>

            </tr>


            <!-- Registro 3 -->
            <tr class="linha_registros">

                <!--Primeira coluna -> Aluno-->
                <td class="nome">
                    <h3>Bruno Muniz de Carvalho</h3>
                </td>

                <!--Segunda coluna -> Falta 1° bim-->
                <td>
                    <input min="0" type="number" step="1" name="f1b" id="i" value="" placeholder="-" disabled="">
                </td>

                <!--Terceira coluna -> Nota 1° bim-->
                <td>
                    <input min="0" type="number" step="0.5" name="n1b" id="i" value="" placeholder="-,-" disabled="">
                </td>

                <!--Quarta coluna -> Falta 2° bim-->
                <td>
                    <input min="0" type="number" step="1" name="f2b" id="i" value="" placeholder="-" disabled="">
                </td>

                <!--Quinta coluna -> Nota 2° bim-->
                <td>
                    <input min="0" type="number" step="0.5" name="n2b" id="i" value="" placeholder="-,-" disabled="">
                </td>

                <!--Sexta coluna -> Falta 3° bim-->
                <td>
                    <input min="0" type="number" step="1" name="f3b" id="i" value="" placeholder="-" disabled="">
                </td>

                <!--Sétima coluna -> Nota 3° bim-->
                <td>
                    <input min="0" type="number" step="0.5" name="n3b" id="i" value="" placeholder="-,-" disabled="">
                </td>

                <!--Oitava coluna -> Falta 4° bim-->
                <td>
                    <input min="0" type="number" step="1" name="f4b" id="i" value="" placeholder="-" disabled="">
                </td>

                <!--Nona coluna -> Nota 4° bim-->
                <td>
                    <input min="0" type="number" step="0.5" name="n4b" id="i" value="" placeholder="-,-" disabled="">
                </td>

                <!--Décima coluna -> Falta recuperação-->
                <td>
                    <input min="0" type="number" step="1" name="f4b" id="i" value="" placeholder="-" disabled="">
                </td>

                <!--Décima primeira coluna -> Nota recuperação-->
                <td>
                    <input min="0" type="number" step="0.5" name="n3b" id="i" value="" placeholder="-,-" disabled="">
                </td>

                <!--Falta final-->
                <td>
                    <h3>
                        <font color="green">4</font>
                    </h3>
                </td>

                <!--Nota final-->
                <td>
                    <h3>
                        <font color="red">40,0</font>
                    </h3>
                </td>

                <!--Situação-->
                <td>
                    <h3>
                        <font color="red">Reprovado</font>
                    </h3>
                </td>

            </tr>

            <!-- ***** Parte dinâmica acima*****-->

        </table>
    </form>
        
</body>
</html>