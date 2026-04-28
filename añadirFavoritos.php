<?php
    session_start();
    //Llamada al archivo para conectar con la base de datos
    require_once "db.php";

    $json = file_get_contents('php://input');

    $data = json_decode($json, true);
    error_log($json);
    //Se asegura de que si el valor es null, asigne null a la variable y no de error
    $idMoto = $data['id_moto'] ?? null;

    //Comprueba el valor del id para que no sea null
    if ($idMoto == null) {
        http_response_code(400);
        echo "ERROR: No se recibió id_moto válido";
        var_dump($idMoto);
        exit;
    }

    //Inserta en la base de datos con el id del usuario y sino redirige a login.php para poder iniciar sesión
    if (isset($_SESSION['usuario'])) {
        var_dump($idMoto);
        $idUsuario = $_SESSION['usuario'];

        $sentencia = "INSERT INTO favoritos(usuario_id, moto_id) VALUES ($idUsuario, $idMoto)";
        $resultado = $db->query($sentencia);
    } else {
        header("Location: login.php");
    }
?>
