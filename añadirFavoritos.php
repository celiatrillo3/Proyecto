<?php
// $json = file_get_contents("php://input");
// $idMoto = json_decode($json, true);
// var_dump($idMoto);
?>

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

// if (isset($_SESSION['usuario'])) {
//     var_dump($idMoto);
//     $idUsuario = $_SESSION['usuario'];


//     $db = new mysqli('localhost', 'root', '', 'museo_ciclomotor');
//     $db->autocommit(false);
//     try {
//         $sentencia = "INSERT INTO favoritos(usuario_id, moto_id) VALUES ($idUsuario, $idMoto)";
//         $resultado = $db->query($sentencia);
//         $db->commit();
//     } catch (Exception $e) {
//         echo $e;
//         $db->rollback();
//     }
//     $db->close();
// } else {
//     http_response_code(401);
//     echo "ERROR: Usuario no autenticado";
// }


// session_start();

// $json = file_get_contents('php://input');

// file_put_contents('debug_favoritos.log', $json . PHP_EOL, FILE_APPEND);

// $data = json_decode($json, true);
// $idMoto = $data['id_moto'] ?? null;

// if ($idMoto === null) {
//     http_response_code(400);
//     echo "ERROR: No se recibió id_moto válido";
//     var_dump($idMoto);
//     exit;
// }


// if (isset($_SESSION['usuario'])) {
//     echo $idMoto;
//     var_dump($data);
//     $usuario_id = $_SESSION['usuario'];
//     $db = new mysqli('localhost', 'root', '', 'museo_ciclomotor');
//     $stmt = $db->prepare("INSERT INTO favoritos (usuario_id, moto_id) VALUES (?, ?)");
//     $stmt->bind_param("ii", $usuario_id, $idMoto);
//     if ($stmt->execute()) {
//         echo "OK: Favorito añadido";
//     } else {
//         echo "ERROR: No se pudo guardar (quizás ya existe)";
//     }
//     $stmt->close();
//     $db->close();
// } else {
//     http_response_code(401);
//     echo "ERROR: Usuario no autenticado";
// }

?>
