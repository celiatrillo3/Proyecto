<?php
session_start();

$json = file_get_contents('php://input');

$data = json_decode($json, true);
var_dump($json);
$idMoto = $data['id_moto'] ?? null;

if ($idMoto == null) {
    http_response_code(400);
    echo "ERROR: No se recibió id_moto válido";
    var_dump($idMoto);
    exit;
}

if (isset($_SESSION['usuario'])) {
    var_dump($idMoto);
    $idUsuario = $_SESSION['usuario'];


    $db = new mysqli('localhost', 'root', '', 'museo_ciclomotor');
    $sentencia = "INSERT INTO favoritos(usuario_id, moto_id) VALUES ($idUsuario, $idMoto)";
    $resultado = $db->query($sentencia);


} else {
    http_response_code(401);
    echo "ERROR: Usuario no autenticado";
}


?>
