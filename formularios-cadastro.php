
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

    function supervisor() {
        echo "<h1 class='titulo_medio'>Cadastro de Supervisores</h1>";
        
        echo "<form method='POST' action='validacao_cadastros.php'>";
            echo "<label for='nome_completo' class='form-label'>Nome completo: </label>";
                echo "<input type='text' class='form-control' id='nome_completo' name='nome_completo' value=''>";
            
            echo "<label for='data_nascimento' class='form-label'>Data de nascimento: </label>";
                echo "<input type='date' class='form-control' id='data_nascimento' name='data_nascimento' value=''>";

            echo "<label for='cpf' class='form-label'>CPF: </label>";
                echo "<input type='text' class='form-control' id='cpf' name='cpf' placeholder='000.000.000-00' required pattern='^(\d{3}.\d{3}.\d{3}-\d{2})|(\d{11})$' maxlength = '14' title='Insira seu CPF, no formato padrão.' value=''>";        
            
            echo "<label for='email' class='form-label'>RG: </label>";
                echo "<input type='password' class='form-control' minlength = '6' maxlength = '25' required placeholder='Senha:' id='senha' name='senha' value=''>";
            
            echo "<label for='tel' class='form-label'>Telefone: </label>";
                echo "<input type='tel' name='tel' id='tel' placeholder='(00) 00000-0000' required pattern='\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}' maxlength = '15' title='Insira seu telefone com o DDD e o número. Não se esqueça que, após digitar os 5 primeiros dígitos, colocar um hífen para digitar os 4 dígitos restantes.' id='tel'> <br><br>";

            echo "<label for='opcao_s'>Sexo: </label>";
                echo "<input type='radio' name='campo_s' id='campo_sM' value=''>";
            echo "<label for='campo_sM'>Masculino</label>";
                echo "<input type='radio' name='campo_s' id='campo_sF' value=''>";
            echo "<label for='campo_sF'>Feminino</label> <br><br>";
            
            echo "<label for='opcao_estado'>Estado:</label> <br>";
                echo "<select name='estado'>";
                    echo "<option id='AC' value='AC'>Acre</option>";
                    echo "<option id='AL' value='AL'>Alagoas</option>";
                    echo "<option id='AP' value='AP'>Amapá</option>";
                    echo "<option id='AM' value='AM'>Amazonas</option>";
                    echo "<option id='BA' value='BA'>Bahia</option>";
                    echo "<option id='CE' value='CE'>Ceará</option>";
                    echo "<option id='DF' value='DF'>Distrito Federal</option>";
                    echo "<option id='ES' value='ES'>Espírito Santo</option>";
                    echo "<option id='GO' value='GO'>Goiás</option>";
                    echo "<option id='MA' value='MA'>Maranhão</option>";
                    echo "<option id='MT' value='MT'>Mato Grosso</option>";
                    echo "<option id='MS' value='MS'>Mato Grosso do Sul</option>";
                    echo "<option id='MG' value='MG'>Minas Gerais</option>";
                    echo "<option id='PA' value='PA'>Pará</option>";
                    echo "<option id='PB' value='PB'>Paraíba</option>";
                    echo "<option id='PR' value='PR'>Paraná</option>";
                    echo "<option id='PE' value='PE'>Pernambuco</option>";
                    echo "<option id='PI' value='PI'>Piauí</option>";
                    echo "<option id='RJ' value='RJ'>Rio de Janeiro</option>";
                    echo "<option id='RN' value='RN'>Rio Grande do Norte</option>";
                    echo "<option id='RS' value='RS'>Rio Grande do Sul</option>";
                    echo "<option id='RO' value='RO'>Rondônia</option>";
                    echo "<option id='RR' value='RR'>Roraima</option>";
                    echo "<option id='SC' value='SC'>Santa Catarina</option>";
                    echo "<option id='SP' value='SP'>São Paulo</option>";
                    echo "<option id='SE' value='SE'>Sergipe</option>";
                    echo "<option id='TO' value='TO'>Tocantins</option>";
                echo "</select><br><br>";

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
                echo "<input type='password' minlength = '6' maxlength = '25' required name='campo_senha' value=''>";
    }

    $formType = $_GET['id'];

    switch ($formType) {
        case "default":
            def();
            break;
        case "supervisor":
            supervisor();
            break;
    }
?>

</body>
</html>