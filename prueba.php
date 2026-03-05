<?php
    $db = new mysqli('localhost', 'root', '', 'museo_ciclomotor');
    $sentencia = "SELECT i.ruta_imagen, ma.nombre, m.modelo, m.año, p.nombre_pais 
    FROM imagen i 
        JOIN moto m ON i.moto_id = m.id_moto 
        JOIN marca ma ON m.marca_id = ma.id_marca 
        JOIN pais p ON ma.pais_id = p.id_pais 
        WHERE i.ruta_imagen LIKE '%1.JPG';";

    $resultado = $db->query($sentencia);
    $listaResultado = [];
    while ($moto = $resultado->fetch_assoc()) {
        array_push($listaResultado, $moto);
    }

    $json = json_encode($listaResultado, JSON_UNESCAPED_UNICODE);
    echo $json;
?>