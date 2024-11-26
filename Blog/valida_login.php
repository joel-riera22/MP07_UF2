<?php

session_start();

if (isset($_POST["login"])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        require_once "includes/connect.php";

        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM usuaris WHERE email='$email'";

        $login = mysqli_query($conn, $sql);

        if ($login && mysqli_num_rows($login) == 1) {

            $usuari = mysqli_fetch_assoc($login);

            $verify = password_verify($password, $usuari['password']);

            if ($verify) {
                $_SESSION["usuari"] = $usuari;
                header("Location: index.php");
            } else {
                $_SESSION["incorrecte"] = "Usuari o Password incorrectes";
                header("Location: index.php");
            }

        } else {
            $_SESSION["incorrecte"] = "Usuari o Password incorrectes";
            header("Location: index.php");
        }

    } else {
        echo "El mètode per enviar dades no és el POST";
    }

} else {
    echo "Les dades del formulari no s'han enviat";
}

?>