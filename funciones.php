<?php
//Función hecha por la ia, sanitiza la marca y el modelo para poder crear las carpetas sin errores
function sanitizaNombre($texto){
    $texto = strtolower($texto);
    $texto = preg_replace('/[^a-z0-9]/', '_', $texto);
    $texto = preg_replace('/_+/', '_', $texto);
    return trim($texto, '_');
}

function añadirArchivoACarpeta($contador, $rutaCarpeta, $rutasImagenes){
    $archivos = $_FILES['archivos'];

    // Recorrer cada archivo subido
    for ($i = 0; $i < count($archivos['name']); $i++) {
        $nombreTemporal = $archivos['tmp_name'][$i];

        $nombreNuevo = $contador . '.JPG';
        $rutaDestino = $rutaCarpeta . '/' . $nombreNuevo;
        array_push($rutasImagenes, $rutaDestino);

        // Mover temporal a destino final
        if (move_uploaded_file($nombreTemporal, $rutaDestino)) {
            $contador++;
        }
    }

    return $rutasImagenes;
}

function crearCarpeta($contador){
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];

    // Crear nombre de carpeta: "marca_modelo" (limpio de caracteres raros)
    $carpetaNombre = sanitizaNombre($marca) . '_' . sanitizaNombre($modelo);
    $rutaCarpeta = 'imgs_motos/' . $carpetaNombre; // carpeta base "motos"
    //var_dump($ruta_carpeta);

    // Si YA EXISTE la carpeta da error, no se puede añadir la misma moto dos veces
    if (is_dir($rutaCarpeta)) {
        $errorAñadirMoto = "Error: Ya existe una moto con esta marca y modelo. No se permiten duplicados.";

        // Si no existe, la creamos
    } elseif (!mkdir($rutaCarpeta, 0755, true)) {
        $errorAñadirMoto = "No se pudo crear la carpeta para la moto.";
    } else {
        $rutasImagenes = [];
        $rutasImagenesNueva = añadirArchivoACarpeta($contador, $rutaCarpeta, $rutasImagenes);
        return $rutasImagenesNueva;
    }
}

function buscarRutaCarpeta($ruta){
    $contador = 0;
    $barra = "/";
    $rutaCarpeta = "";

    for ($i = 0; $i < strlen($ruta); $i++) {
        if ($ruta[$i] != $barra) {
            $rutaCarpeta = $rutaCarpeta . $ruta[$i];
        } elseif ($ruta[$i] == $barra && $contador == 0) {
            $rutaCarpeta = $rutaCarpeta . $ruta[$i];
            $contador++;
        } elseif ($ruta[$i] == $barra && $contador == 1) {
            break;
        }
    }

    return $rutaCarpeta;
}
