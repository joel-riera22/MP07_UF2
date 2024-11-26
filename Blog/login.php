<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php if (isset($_SESSION["incorrecte"])) mostrarError($_SESSION["incorrecte"]); ?>
    <?php
        if (isset($_SESSION["usuari"])) {
            mostrarBenvinguda($_SESSION["usuari"]["nom"], $_SESSION["usuari"]["cognom"]);
        }
    ?>
    <div class="formulari">
        <h5>Identifica't</h5>

        <form action="valida_login.php" method="post">
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <input class="boto_form" type="submit" name="login" value="login">
        </form>
    </div>
</body>
</html>