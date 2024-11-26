<?php

$host = "localhost";
$usuari = "joel_r";
$password = "Breakinglalo7";
$database = "blog";

$conn = mysqli_connect($host, $usuari, $password, $database);

mysqli_query($conn, "SET NAMES 'utf8'");

if (!$conn) {
    die("Connexió fallida: " . mysqli_connect_error());
}

?>