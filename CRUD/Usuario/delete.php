<?php

include ("../../BancoDados/conexao_mysql.php");
    $usu_codigo = intval($_GET['usuario']);
    $sql_code = "DELETE FROM usuario WHERE codigo = '$usu_codigo'";
    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

    if($sql_query)
    echo <script> location.href='index.php?p=inicial'; </script>
    else 
    echo <script> alert('Usuário não foi deletado.');
    location.href='index.php?p=inicial'; </script>
$conexao->close();

?>

