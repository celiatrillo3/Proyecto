<?php
    session_start();
    $json = file_get_contents('php://input');

    $datos = json_decode($json, true);

    if ($datos == 1) {
        unset($_SESSION['usuario']);
        //session_destroy();
        echo json_encode(['success' => true]);
    }
?>