<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de l'hort</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Capçalera -->
    <?php require_once "includes/helpers.php"; ?>
    <?php require_once "includes/header.php"; ?>

    <?php llistarCategories($conn) ?>
    <?php mostrarCategories($arrayCategories) ?>

    <!-- Pàgina principal -->
    <div id="pagina_principal">
        <!-- Caixa principal -->
        <div id="caixa_principal">
        </div>

        <!-- Barra lateral -->
        <div id="side-bar">
            <?php require_once "includes/side-bar.php"; ?>
        </div>
    <div>
    
    <!-- Peu de pàgina -->
    <div>
        <?php require_once "includes/footer.php"; ?>
    <div>

</body>
</html>