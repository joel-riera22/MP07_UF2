<?php

function mostrarError($errors) {
    echo "<p style='background-color:red; color:white; font-weight:bold; padding:5px 0px 5px 10px'>$errors</p>";
}

function mostrarNouRegistre($missatge) {
    echo "<p style='background-color:green; color:white; font-weight:bold; padding:5px 0px 5px 10px'>$missatge</p>";
}

require_once "includes/connect.php";

function llistarCategories($conn) {
    
    $sql = "SELECT * FROM categories ORDER BY id ASC;";

    $resultat = mysqli_query($conn, $sql);

    if ($resultat && mysqli_num_rows($resultat) >= 1) {

        $arrayCategories = [];

        while ($fila = mysqli_fetch_assoc($resultat)) {
            array_push($arrayCategories, $fila["nombre"]);
        }

        return $arrayCategories;
    }
}

$arrayCategories = llistarCategories($conn);

function mostrarCategories($arrayCategories) { ?>
    <div class="menu">
        <ul>
            <li><a href="#Inici">Inici</a></li>
            <?php foreach ($arrayCategories as $categoria) { ?>
                <li><a href="<?php echo "#".$categoria?>"><?php echo $categoria ?></a></li>
            <?php } ?>
            <li><a href="#Aboutme">About me</a></li>
            <li><a href="#Contacte">Contacte</a></li>
        </ul>
    </div>
<?php  
}
?>