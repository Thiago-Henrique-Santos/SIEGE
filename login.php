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
        <a href="index.php" class="logo">
            <img src="img/logo_transparente2.png" alt="logo do siege">
        </a>
    </header>

    <main>
        <div class="login-box">
            <form class="box" action="Validacoes/validacao_login.php" method="post">
                <h1>Login</h1>
                <div class="textbox">
                    <img src="img/user.png" alt="Esse é um ícone de usuários">
                    <input type="email" placeholder="Email:" minlength = "5" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" 
                    title="O email deve conter @ e . ao final." name="campo_email" value="<?php if (isset($_GET["valor_email"])) echo $_GET["valor_email"]; ?>">
                </div>
                <?php
                    if (isset($_GET["erros_email"]))
                    echo "<p class=\"msg_erro\">" . $_GET["erros_email"] . "</p>";
                ?>

                <div class="textbox">
                    <img src="img/key.png" alt="Esse é um ícone de chave, indicando a senha">
                    <input type="password" maxlength = "6" required placeholder="Senha:" name="campo_senha" value="" title="A senha deve possuir 6 caracteres e apenas números">
                </div>
                <?php
                    if (isset($_GET["erros_senha"]))
                    echo "<p class=\"msg_erro\">" . $_GET["erros_senha"] . "</p>";
                ?>

                <input class="btn" type="submit" name="botao" value="Acessar">
            </form>
        </div>
    </main>

    <footer class="container-fluid" style="margin-top: 5px">
        <p> SIEGE - Sistema Informativo E Gerenciamento Escolar </p>
    </footer>
</body>

</html>