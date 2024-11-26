<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre</title>
</head>
<body>
    <div class="formulari">
        <?php if (isset($_SESSION["nou_registre"])) mostrarNouRegistre($_SESSION["nou_registre"]); ?>
        <?php if (isset($_SESSION["error_registre"])) mostrarError($_SESSION["error_registre"]); ?>

        <h5>Registra't</h5>

        <form action="valida_register.php" method="post">
            <label for="nom">Nom</label><br>
            <input type="text" id="nom" name="nom" required><br><br>
            <?php if (isset($_SESSION["error_nom"])) {mostrarError($_SESSION["error_nom"]);} ?>

            <label for="cognoms">Cognoms</label><br>
            <input type="text" id="cognoms" name="cognoms" required><br><br>
            <?php if (isset($_SESSION["error_cognoms"])) {mostrarError($_SESSION["error_cognoms"]);} ?>

            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <?php if (isset($_SESSION["error_email"])) {mostrarError($_SESSION["error_email"]);} ?>

            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <?php if (isset($_SESSION["error_password"])) {mostrarError($_SESSION["error_password"]);} ?>

            <input class="boto_form" type="submit" name="register" value="register">
        </form>
    </div>
</body>
</html>

<?php
session_unset();
?>