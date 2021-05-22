
<?php

if (!isset($_GET['id'])){
    echo "Erro!";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>

<?php

    /**********
    * Funções *
    **********/
    function def() {
        echo "<div style='width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;'>";
            echo "<h1 style='font-family: Arial, Helvetica, Calibri; font-size: 55px; font-weight: bold; color: gray;'>SIEGE</h1>";
        echo "</div>";
    }

    function sup_sec_dir() {
        echo "<h1 class='titulo_medio'>Cadastro de Supervisores</h1>";
        
        echo "<form method='POST' action='validacao_cadastros.php'>";
            echo "<label for='nome_completo' class='form-label'>Nome completo: </label>";
                echo "<input type='text' class='form-control' id='nome_completo' name='nome_completo' value=''>";

            echo "<label for='email' class='form-label'>RG: </label>";
                echo "<input type='password' class='form-control' minlength = '5' maxlength = '30' required placeholder='Senha:' id='senha' name='senha' value=''>";

            echo "<label for='opcao_s'>Sexo: </label>";
                echo "<input type='radio' name='campo_s' id='campo_sM' value=''>";
            echo "<label for='campo_sM'>Masculino</label>";
                echo "<input type='radio' name='campo_s' id='campo_sF' value=''>";
            echo "<label for='campo_sF'>Feminino</label> <br><br>";

            echo "<label for='cidade' class='form-label'>Cidade: </label>";
                echo "<input type='text' class='form-control' id='cidade' name='cidade' value=''>";

            echo "<label for='cep' class='form-label'>CEP: </label>";
                echo "<input type='text' class='form-control' id='cep' name='cep' value=''>";

            echo "<label for='rua' class='form-label'>Rua: </label>";
                echo "<input type='text' class='form-control' id='rua' name='rua' value=''>";
            echo "<label for='numero_endereco' class='form-label'>Número: </label>";
                echo "<input type='text' class='form-control' id='numero_endereco' name='numero_endereco' value=''>";
            echo "<label for='bairro' class='form-label'>Bairro: </label>";
                echo "<input type='text' class='form-control' id='bairro' name='bairro' value=''>";

            echo "<label for='senha' class='form-label'>Senha: </label>";
                echo "<input type='password' maxlength = '6' required name='senha' value=''>";
    }

    $formType = $_GET['id'];

    switch ($formType) {
        case "default":
            def();
            break;
        case "supervisor":
            sup_sec_dir();
            break;
    }
?>

</body>
</html>