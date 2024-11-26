<?php

session_start();

if (isset($_POST["register"])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        require_once "includes/connect.php";

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $nom = test_input($_POST["nom"]);
        $cognoms = test_input($_POST["cognoms"]);
        $email = test_input($_POST["email"]);
        $password = test_input($_POST["password"]);

        $minLong = 8;
        $conteMajuscules = preg_match("/[A-Z]/", $password);
        $conteMinuscules = preg_match("/[a-z]/", $password);
        $conteNombres = preg_match("/[0-9]/", $password);
        $conteCarEspec = preg_match("/[\W]/", $password);

        if (empty($nom)) {
            $_SESSION["error_nom"] = "El nom és obligatori";
            header("Location: index.php");
        } else {
            if (!preg_match("/^[a-zA-Z ]+$/", $nom)) {
                $_SESSION["error_nom"] = "El nom només pot tenir majúscules, minúscules i espais en blanc";
                header("Location: index.php");
            } else {
                $nom_valid = true;
            }
        }

        if (empty($cognoms)) {
            $_SESSION["error_cognoms"] = "Els cognoms són obligatoris";
            header("Location: index.php");
        } else {
            if (!preg_match("/^[a-zA-Z ]+$/", $cognoms)) {
                $_SESSION["error_cognoms"] = "Els cognoms només poden tenir majúscules, minúscules i espais en blanc";
                header("Location: index.php");
            } else {
                $cognoms_valid = true;
            }
        }

        if (empty($email)) {
            $_SESSION["error_email"] = "L'email és obligatori";
            header("Location: index.php");
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION["error_email"] = "El format de correu electrònic no és vàlid";
                header("Location: index.php");
            } else {
                $email_valid = true;
            }
        }

        if (empty($password)) {
            $_SESSION["error_password"] = "El password és obligatori";
            header("Location: index.php");
        } else {
            if (strlen($password) < 8) {
                $_SESSION["error_password"] = "El password ha de tenir una longitud de 8 o més caràcters";
                header("Location: index.php");
            } elseif (!$conteMajuscules) {
                $_SESSION["error_password"] = "El password ha de tenir mínim una majúscula";
                header("Location: index.php");
            } elseif (!$conteMinuscules) {
                $_SESSION["error_password"] = "El password ha de tenir mínim una minúscula";
                header("Location: index.php");
            } elseif (!$conteNombres) {
                $_SESSION["error_password"] = "El password ha de tenir mínim un nombre";
                header("Location: index.php");
            } elseif (!$conteCarEspec) {
                $_SESSION["error_password"] = "El password ha de tenir mínim un caràcter especial";
                header("Location: index.php");
            } else {
                $password_valid = true;
            }
        }

        if ($nom_valid && $cognoms_valid && $email_valid && $password_valid) {
            $password_segur = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
            $sql = "INSERT INTO usuaris (id, nom, cognom, email, password, data) VALUES (null, '$nom', '$cognoms', '$email', '$password_segur', CURDATE());";
            $desarBD = mysqli_query($conn, $sql);

            if ($desarBD) {
                $_SESSION["nou_registre"] = "S'ha creat un nou registre d'usuari";
                header("Location: index.php");
            } else {
                $_SESSION["error_registre"] = "Error: " . mysqli_error($conn);
                header("Location: index.php");
            }

            mysqli_close($conn);
        }
    } else {
        echo "El mètode per enviar dades no és el POST";
    }
} else {
    echo "Les dades del formulari no s'han enviat";
}

?>