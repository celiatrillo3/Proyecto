<?php
    //Variables para la conexión con la base de datos
    $host = "localhost";
    $user = "root";
    $pass = "";
    $miDb = "museo_ciclomotor";

    //Conexión con la base de datos
    $db = new mysqli($host, $user, $pass, $miDb);

    //Salta error si no se da conectado con la base de datos
    if ($db->connect_error) {
        die("Error de conexión: " . $db->connect_error);
    }
?>