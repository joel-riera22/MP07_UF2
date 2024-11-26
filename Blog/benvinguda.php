<?php

function mostrarBenvinguda($nom, $cognom) { ?>
    <div style='background-color:white; margin-bottom:25px; padding:15px'>
        <p style='color:black; font-size:25px; font-weight:bold'><?php echo "Benvingut ".$nom. " " .$cognom?></p>
        <button style='background-color:#FFA500; width:200px; height:45px; margin-bottom:10px; border-radius:4px'><a style='text-decoration:none; color:white; font-size:20px' href='index.php'>Les Meves Dades</a></button>
        <button style='background-color:#21B921; width:200px; height:45px; margin-bottom:10px; border-radius:4px'><a style='text-decoration:none; color:white; font-size:20px' href='index.php'>Entrades</a></button>
        <button style='background-color:#21B921; width:200px; height:45px; margin-bottom:10px; border-radius:4px'><a style='text-decoration:none; color:white; font-size:20px' href='index.php'>Categories</a></button>
        <button style='background-color:#007EE5; width:200px; height:45px; border-radius:4px'><a style='text-decoration:none; color:white; font-size:20px' href='logout.php'>Logout</a></button>
    </div>
<?php
}
?>