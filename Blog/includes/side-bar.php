<?php

require_once "benvinguda.php";
            
if (isset($_SESSION["usuari"])) {
    mostrarBenvinguda($_SESSION["usuari"]["nom"], $_SESSION["usuari"]["cognom"]); echo "<br>";
    require_once "cerca.php"; echo "<br>";
} else {
    require_once "cerca.php"; echo "<br>";
    require_once "login.php"; echo "<br>";
    require_once "register.php"; echo "<br>";
}

?>