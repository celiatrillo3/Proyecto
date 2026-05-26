<?php
    session_start();

    //Recibimos un true por un fetch de JavaScript y hacemos un unset de la variable de sesión
    $json = file_get_contents('php://input');

    $datos = json_decode($json, true);

    if ($datos == 1) {
        unset($_SESSION['usuario']);
        //session_destroy();
        echo json_encode(['success' => true]);
    }
?>