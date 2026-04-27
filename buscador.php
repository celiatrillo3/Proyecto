<?php
    require_once "db.php";
    if (isset($_GET['buscadorInput'])) {
        $busqueda = $_GET['buscadorInput'];
        $busqueda = $db->real_escape_string($busqueda);

        $sentencia = "SELECT i.ruta_imagen, ma.nombre, m.modelo, m.año, p.nombre_pais , m.id_moto
                FROM imagen i 
                JOIN moto m ON i.moto_id = m.id_moto 
                JOIN marca ma ON m.marca_id = ma.id_marca 
                JOIN pais p ON ma.pais_id = p.id_pais 
                WHERE i.ruta_imagen LIKE '%1.JPG'
                AND (ma.nombre LIKE '%" . $busqueda . "%'
                OR m.modelo LIKE '%" . $busqueda . "%'
                OR m.año LIKE '%" . $busqueda . "%'
                OR m.color LIKE '%" . $busqueda . "%'
                OR p.nombre_pais LIKE '%" . $busqueda . "%');";
        
        $resultado = $db->query($sentencia);
        $listaResultadoBuscador = [];
        while ($busqueda = $resultado->fetch_assoc()) {
            array_push($listaResultadoBuscador, $busqueda);
        }
    }
?>



