<?php

include ("C:/xampp/htdocs/SIEGE/BancoDados/conexao_mysql.php");
include ("C:/xampp/htdocs/SIEGE/modulos/funcoes.php");

$registros = "";
$sql = "";
$tipo_gerenciador = "";

if (isset($_GET['dir']) || isset($_GET['secr']) || isset($_GET['sup']) || isset($_GET['prof']) || isset($_GET['alu'])) {
    $tipoUsuario_escolhidos = array(
        "aluno"       => false,
        "professor"   => false,
        "gerenciador" => false
    );
    $gerenciadores_escolhidos = array(
        "supervisor" => false,
        "secretario" => false,
        "diretor"    => false
    );

    if (isset($_GET['alu'])) {
        $tipoUsuario_escolhidos['aluno'] = true;
    }
    if (isset($_GET['prof'])) {
        $tipoUsuario_escolhidos['professor'] = true;
    }
    if (isset($_GET['sup'])) {
        $gerenciadores_escolhidos['supervisor'] = true;
        $tipoUsuario_escolhidos['gerenciador'] = true;
    }
    if (isset($_GET['secr'])) {
        $gerenciadores_escolhidos['secretario'] = true;
        $tipoUsuario_escolhidos['gerenciador'] = true;
    }
    if (isset($_GET['dir'])) {
        $gerenciadores_escolhidos['diretor'] = true;
        $tipoUsuario_escolhidos['gerenciador'] = true;
    }

    $tipoUsuario_contador = 0;
    foreach ($tipoUsuario_escolhidos as $status) {
        if ($status) {
            $tipoUsuario_contador++;
        }
    }

    $gerenciadores_contador = 0;
    foreach ($gerenciadores_escolhidos as $status) {
        if ($status) {
            $gerenciadores_contador++;
        }
    }

    for ($i = 0; $i < $tipoUsuario_contador; $i++) {
        if ($i > 0) {
            $sql .= "; ";
        }

        $sql .= "SELECT * FROM usuario u INNER JOIN ";

        if ($tipoUsuario_escolhidos['aluno']) {
            $sql = "
                SELECT u.nome, u.email, u.local_moradia, u.sexo, u.tipo_usuario, 
                a.data_nascimento, a.numero_matricula, a.nome_responsavel, a.telefone, 
                t.id AS 'id_turma', t.nome AS 'nome_turma', t.serie FROM usuario u 
                INNER JOIN aluno a ON u.id=a.idAluno INNER JOIN turma t ON t.id=a.id_turma
                ";
            $tipoUsuario_escolhidos['aluno'] = false;
        } elseif ($tipoUsuario_escolhidos['professor']) {
            $sql .= "professor p ON u.id=p.idProfessor WHERE p.idProfessor != 1";
            $tipoUsuario_escolhidos['professor'] = false;
        } elseif ($tipoUsuario_escolhidos['gerenciador']) {
            $sql .= "gerenciadores g ON u.id=g.idGerenciador";
            if (!$gerenciadores_escolhidos['supervisor'] || !$gerenciadores_escolhidos['secretario'] || !$gerenciadores_escolhidos['diretor']) {
                $sql .= " WHERE ";
                $c = 0;
                foreach ($gerenciadores_escolhidos as $gerenciador => $status) {
                    if ($status) {
                        $c++;
                        if ($c < $gerenciadores_contador)
                            $sql .= "g.tipo='$gerenciador' OR ";
                        else
                            $sql .= "g.tipo='$gerenciador'";
                        $gerenciadores_escolhidos[$gerenciador] = false;
                    }
                }
            }
            $tipoUsuario_escolhidos['gerenciador'] = false;
        }
        $sql .= " ORDER BY u.nome ASC";
    }

    $existeRegistros = 0;
    if ($conexao->multi_query($sql)) {
        do {
            if  (!$existeRegistros)
                $registros = "";
            
            if ($resultado = $conexao->store_result()) {
                if ($resultado->num_rows > 0) {
                    $existeRegistros++;
                    while ($linha = $resultado->fetch_assoc()) {
                        if($linha['local_moradia'] == 'U')
                            $local_moradia = 'Urbana';
                        else
                            $local_moradia = 'Rural';

                        if($linha['sexo'] == 'F')
                            $sexo = 'Feminino';
                        else
                            $sexo = 'Masculino';

                        $registros .= "<div style='border: 1px solid black;'>";
                        $registros .= "<strong>Nome:</strong> " . $linha['nome'] . "<br>";
                        $registros .= "<strong>Email:</strong> " . $linha['email'] . "<br>";
                        $registros .= "<strong>Zona de moradia:</strong> " . $local_moradia . "<br>";
                        $registros .= "<strong>Sexo:</strong> " . $sexo . "<br>";
                        
                        if ($linha['tipo_usuario'] == 1) {
                            $registros .= "<strong>Data de nascimento:</strong> " . formata_data($linha['data_nascimento']) . "<br>";
                            $registros .= "<strong>Matrícula:</strong> " . $linha['numero_matricula'] . "<br>";
                            $registros .= "<strong>Responsável:</strong> " . $linha['nome_responsavel'] . "<br>";
                            $registros .= "<strong>Telefone:</strong> " . $linha['telefone'] . "<br>";

                            if($linha['id_turma'] == 1)
                                $registros .= "<strong>Turma:</strong> " . "Este aluno não está vinculado a uma turma. <br>";
                            else
                                $registros .= "<strong>Turma:</strong> " . $linha['serie'] . "° ano " . $linha['nome_turma'] . "<br>";
                            $registros .= "<strong>Ocupação:</strong> Aluno <br>";
                        } elseif ($linha['tipo_usuario'] == 2) {

                            if($linha['tipo_empregado'] == 'D')
                                $tipo_empregado = 'Designado';
                            else
                                $tipo_empregado = 'Efetivo';

                            $registros .= "<strong>MASP:</strong> " . $linha['masp'] . "<br>";
                            $registros .= "<strong>Tipo de empregado:</strong> " . $tipo_empregado . "<br>";
                            $registros .= "<strong>Função:</strong> " . $linha['funcao'] . "<br>";
                            $registros .= "<strong>Ocupação:</strong> Professor <br>";
                        } else {

                            if($linha['tipo_empregado'] == 'D')
                                $tipo_empregado = 'Designado';
                            else
                                $tipo_empregado = 'Efetivo';
                            $registros .= "<strong>MASP:</strong> " . $linha['masp'] . "<br>";
                            $registros .= "<strong>Tipo de empregado:</strong> " . $tipo_empregado . "<br>";
                            $registros .= "<strong>Função:</strong> " . $linha['funcao'] . "<br>";
                            $registros .= "<strong>Ocupação:</strong> " . $linha['tipo'] . "<br>";
                        }
                        $registros .= "&nbsp;<button id='atualizar' onclick='"; 
                        if ($linha['tipo_usuario']==1) {
                            $registros .= "loadStudentModal(\"".$linha['nome']."\", \"".$linha['data_nascimento']."\", \"".$linha['numero_matricula']."\", \"".$linha['nome_responsavel']."\", \"".$linha['email']."\", \"".$linha['telefone']."\", \"".$linha['local_moradia']."\", \"".$linha['sexo']."\", \"".$linha['id_turma']."\")";
                        } else {
                            $registros .= "loadStaffModal(";
                            if ($linha['tipo_usuario']==2) 
                                $registros .= "\"professor\", \"".$linha['nome']."\", \"".$linha['masp']."\", \"".$linha['email']."\", \"".$linha['local_moradia']."\", \"".$linha['tipo_empregado']."\", \"".$linha['sexo']."\", \"".$linha['funcao']."\"";
                            else
                                $registros .= "\"".$linha['tipo']."\", \"".$linha['nome']."\", \"".$linha['masp']."\", \"".$linha['email']."\", \"".$linha['local_moradia']."\", \"".$linha['tipo_empregado']."\", \"".$linha['sexo']."\", \"".$linha['funcao']."\"";
                            $registros .= ")";
                        }
                        $registros .= "'>Atualizar</button>&nbsp;&nbsp;";
                        $registros .= "<button id='remover' onclick='deleteConfirm(\"Usuario\", \""; if($linha['tipo_usuario']==1){$registros.="aluno";}elseif($linha['tipo_usuario']==2){$registros.="professor";}else{$registros.="$tipo_gerenciador";} $registros.="\", \"".$linha['id']."\")'>Remover</button>";
                        $registros .= "</div>";
                    }
                } else {
                    $registros .= "&nbsp;Não foram encontrados usuários!";
                }
            }
        } while ($conexao->next_result());
    }
} else {
    $sql .= "SELECT * FROM usuario WHERE id != 1 ORDER BY nome ASC";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {

        while ($linha = $resultado->fetch_assoc()) {
            if($linha['local_moradia'] == 'U')
                $local_moradia = 'Urbana';
            else
                $local_moradia = 'Rural';

            if($linha['sexo'] == 'F')
                $sexo = 'Feminino';
            else
                $sexo = 'Masculino';

            $registros .= "<div style='border: 1px solid black;'>";
            $registros .= "<strong>Nome:</strong> " . $linha['nome'] . "<br>";
            $registros .= "<strong>Email:</strong> " . $linha['email'] . "<br>";
            $registros .= "<strong>Zona de moradia:</strong> " . $local_moradia . "<br>";
            $registros .= "<strong>Sexo:</strong> " . $sexo . "<br>";
            
            
            if ($linha["tipo_usuario"] == 1) {
                $sql2 = "SELECT * FROM aluno, turma WHERE aluno.idAluno =" . $linha['id'] . " AND aluno.id_turma = turma.id";
                $resultado2 = $conexao->query($sql2);
                if ($resultado2->num_rows > 0) {
                    while ($linha2 = $resultado2->fetch_assoc()) {
                        $registros .= "<strong>Data de nascimento:</strong> " . formata_data($linha2['data_nascimento']) . "<br>";
                        $registros .= "<strong>Matrícula:</strong> " . $linha2['numero_matricula'] . "<br>";
                        $registros .= "<strong>Responsável:</strong> " . $linha2['nome_responsavel'] . "<br>";
                        $registros .= "<strong>Telefone:</strong> " . $linha2['telefone'] . "<br>";
                        
                        if($linha2['id_turma'] == 1)
                            $registros .= "<strong>Turma:</strong> " . "Este aluno não está vinculado a uma turma. <br>";
                        else
                            $registros .= "<strong>Turma:</strong> " . $linha2['serie'] . "° ano " . $linha2['nome'] . "<br>";
                        $registros .= "<strong>Ocupação:</strong> Aluno <br>";
                        $registros .= "&nbsp;<button id='atualizar' onclick='loadStudentModal(\"".$linha['nome']."\", \"".$linha2['data_nascimento']."\", \"".$linha2['numero_matricula']."\", \"".$linha2['nome_responsavel']."\", \"".$linha['email']."\", \"".$linha2['telefone']."\", \"".$linha['local_moradia']."\", \"".$linha['sexo']."\", \"".$linha2['id']."\")'>Atualizar</button>&nbsp;&nbsp;";
                    }
                }
            } elseif ($linha["tipo_usuario"] == 2) {
                $sql2 = "SELECT * FROM professor WHERE idProfessor =" . $linha['id'] . " AND idProfessor != 1";
                $resultado2 = $conexao->query($sql2);
                if ($resultado2->num_rows > 0) {
                    while ($linha2 = $resultado2->fetch_assoc()) {

                        if($linha2['tipo_empregado'] == 'D')
                            $tipo_empregado = 'Designado';
                        else
                            $tipo_empregado = 'Efetivo';

                        $registros .= "<strong>MASP:</strong> " . $linha2['masp'] . "<br>";
                        $registros .= "<strong>Tipo de empregado:</strong> " . $tipo_empregado . "<br>";
                        $registros .= "<strong>Função:</strong> " . $linha2['funcao'] . "<br>";
                        $registros .= "<strong>Ocupação:</strong> Professor <br>";
                        $registros .= "&nbsp;<button id='atualizar' onclick='loadStaffModal(\"professor\", \"".$linha['nome']."\", \"".$linha2['masp']."\", \"".$linha['email']."\", \"".$linha['local_moradia']."\", \"".$linha2['tipo_empregado']."\", \"".$linha['sexo']."\", \"".$linha2['funcao']."\")'>Atualizar</button>&nbsp;&nbsp;";
                    }
                }
            } else {
                $sql2 = "SELECT * FROM gerenciadores WHERE idGerenciador  =" . $linha['id'];
                $resultado2 = $conexao->query($sql2);
                if ($resultado2->num_rows > 0) {
                    while ($linha2 = $resultado2->fetch_assoc()) {

                        if($linha2['tipo_empregado'] == 'D')
                            $tipo_empregado = 'Designado';
                        else
                            $tipo_empregado = 'Efetivo';

                        $registros .= "<strong>MASP:</strong> " . $linha2['masp'] . "<br>";
                        $registros .= "<strong>Tipo de empregado:</strong> " . $tipo_empregado . "<br>";
                        $registros .= "<strong>Função:</strong> " . $linha2['funcao'] . "<br>";
                        $registros .= "<strong>Ocupação:</strong> " . $linha2['tipo'] . "<br>";
                        $registros .= "&nbsp;<button id='atualizar' onclick='loadStaffModal(\"".$linha2['tipo']."\", \"".$linha['nome']."\", \"".$linha2['masp']."\", \"".$linha['email']."\", \"".$linha['local_moradia']."\", \"".$linha2['tipo_empregado']."\", \"".$linha['sexo']."\", \"".$linha2['funcao']."\")'>Atualizar</button>&nbsp;&nbsp;";
                    }
                }
            }
            $registros .= "<button id='remover' onclick='deleteConfirm(\"Usuario\", \""; if($linha['tipo_usuario']==1){$registros.="aluno";}elseif($linha['tipo_usuario']==2){$registros.="professor";}else{$registros.="$tipo_gerenciador";} $registros.="\", \"".$linha['id']."\")'>Remover</button>";
            $registros .= "</div>";
        }
    } else {
        $registros .= "&nbsp;Não foram encontrados usuários!";
    }
}

echo json_encode($registros);

$conexao->close();
?>