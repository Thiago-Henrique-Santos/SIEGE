<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIEGE - Login</title>
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/login.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <header>
        <a href="login.php" class="logo">
            <img src="img/logo_transparente.png" alt="logo do siege">
        </a>
    </header>

    <main>
        <div class="login-box">
            <form class="box" action="Validacoes/validacao_login.php" method="post">
                <h1>Login</h1>
                <div class="textbox">
                    <img src="img/user.png" alt="Esse é um ícone de usuários">
                    <input type="email" placeholder="Email:" name="campo_email" value="">
                    <?php if (isset($_GET["erros_email"]))
                        echo "<p class=\"msg_erro\">" . $_GET["erros_email"] . "</p></br>";
                    ?>
                </div>

                <div class="textbox">
                    <img src="img/key.png" alt="Esse é um ícone de chave, indicando a senha">
                    <input type="password" placeholder="Senha:" name="campo_senha" value="">
                    <?php if (isset($_GET["erros_senha"]))
                        echo "<p class=\"msg_erro\">" . $_GET["erros_senha"] . "</p></br>";
                    ?>
                </div>

                <input class="btn" type="submit" name="botao" value="Acessar">
            </form>
        </div>
    </main>

    <footer>
        <p> SIEGE - Sistema de Incentivo ao Estudo e Gerenciamento Escolar </p>
    </footer>
</body>

</html>