<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $miDb = "museo_ciclomotor";

    $db = new mysqli($host, $user, $pass, $miDb);

    if ($db->connect_error) {
        die("Error de conexión: " . $db->connect_error);
    }
?>