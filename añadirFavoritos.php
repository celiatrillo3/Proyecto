<?php
// $json = file_get_contents("php://input");
// $idMoto = json_decode($json, true);
// var_dump($idMoto);
?>

<?php
session_start(); // si necesitas saber qué usuario añade el favorito

// Leer el cuerpo de la petición
$json = file_get_contents('php://input');

// Depuración opcional (borrar después)
file_put_contents('debug_favoritos.log', $json . PHP_EOL, FILE_APPEND);

// Decodificar JSON a array asociativo
$data = json_decode($json, true);
$idMoto = $data['id_moto'] ?? null;

// Validar que se recibió el id
if ($idMoto === null) {
    http_response_code(400);
    echo "ERROR: No se recibió id_moto válido";
    var_dump($idMoto);
    exit;
}

// Aquí tu lógica para guardar en favoritos (ejemplo)
if (isset($_SESSION['usuario'])) {
    echo $idMoto;
    var_dump($data);
    $usuario_id = $_SESSION['usuario'];
    // Conectar a la base de datos y hacer INSERT (evita inyección SQL con prepared statements)
    $db = new mysqli('localhost', 'root', '', 'museo_ciclomotor');
    $stmt = $db->prepare("INSERT INTO favoritos (usuario_id, moto_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $usuario_id, $idMoto);
    if ($stmt->execute()) {
        echo "OK: Favorito añadido";
    } else {
        echo "ERROR: No se pudo guardar (quizás ya existe)";
    }
    $stmt->close();
    $db->close();
} else {
    http_response_code(401);
    echo "ERROR: Usuario no autenticado";
}
?>
