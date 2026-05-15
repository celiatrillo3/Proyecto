<?php
session_start();
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

//Llamada al archivo para conectar con la base de datos
require_once "db.php";
$errorAñadirMoto = "";

$sentencia = "SELECT nombre_pais FROM pais;";
$resultado = $db->query($sentencia);

$resultadoPaises = [];
while ($pais = $resultado->fetch_assoc()) {
    array_push($resultadoPaises, $pais);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo "upload_max_filesize: " . ini_get('upload_max_filesize') . "<br>";
    // echo "post_max_size: " . ini_get('post_max_size') . "<br>";

    $marca = ($_POST['marca']);
    $modelo = ($_POST['modelo']);

    // ini_set('upload_max_filesize', '20M');
    // ini_set('post_max_size', '20M');

    // Crear nombre de carpeta: "marca_modelo" (limpio de caracteres raros)
    $carpeta_nombre = sanitizar_nombre($marca) . '_' . sanitizar_nombre($modelo);
    $ruta_carpeta = 'imgs_motos/' . $carpeta_nombre; // carpeta base "motos"
    //var_dump($ruta_carpeta);

    // Si YA EXISTE la carpeta -> error, no se puede añadir la misma moto dos veces
    if (is_dir($ruta_carpeta)) {
        $errorAñadirMoto = "Error: Ya existe una moto con esta marca y modelo. No se permiten duplicados.";
        //exit;

    } elseif (!mkdir($ruta_carpeta, 0755, true)) { // Si no existe, la creamos
        $errorAñadirMoto = "No se pudo crear la carpeta para la moto.";
        //exit;
    } else {

        //var_dump($_FILES);
        $archivos = $_FILES['archivos'];
        $contador = 1;
        $errores = [];
        $rutasImagenes = [];

        // Recorrer cada archivo subido
        for ($i = 0; $i < count($archivos['name']); $i++) {
            // Solo procesar si no hubo error en la subida
            if ($archivos['error'][$i] === UPLOAD_ERR_OK) {
                $nombre_tmp = $archivos['tmp_name'][$i];
                $tipo = mime_content_type($nombre_tmp);

                // Validar que sea imagen (puedes ampliar tipos)
                if (strpos($tipo, 'image/') !== 0) {
                    $errores[] = "El archivo '{$archivos['name'][$i]}' no es una imagen válida.";
                    continue;
                }

                // Extensiones permitidas (para renombrar usamos .jpg o mantener original)
                $extension = pathinfo($archivos['name'][$i], PATHINFO_EXTENSION);
                // Podrías forzar .jpg, pero para mantener calidad, usar la extensión original
                // O convertir siempre a JPG (requiere GD). Para simplificar, usamos la extensión original
                $nombre_nuevo = $contador . '.' . $extension;
                $ruta_destino = $ruta_carpeta . '/' . $nombre_nuevo;
                array_push($rutasImagenes, $ruta_destino);

                // Mover temporal a destino final
                if (move_uploaded_file($nombre_tmp, $ruta_destino)) {
                    $contador++;
                } else {
                    $errores[] = "Error al guardar el archivo '{$archivos['name'][$i]}'.";
                }
            } else {
                // $errores[] = "Error en la subida del archivo '{$archivos['name'][$i]}' (código: {$archivos['error'][$i]}).";
                $codigo_error = $archivos['error'][$i];
                // Obtener el mensaje del código
                $mensaje_error = mensaje_error_upload($codigo_error);
                $errores[] = "Error en el archivo '{$archivos['name'][$i]}': $mensaje_error";
                continue;
            }
        }

        // if (empty($errores)) {
        //     echo "Moto guardada correctamente. Se subieron " . ($contador - 1) . " fotos a la carpeta '$ruta_carpeta'.";
        // } else {
        //     echo "Se completó con algunos errores:<br>" . implode('<br>', $errores);
        // }

        $sentencia = "SELECT id_marca FROM marca WHERE nombre = '" . $_POST['marca'] . "';";
        $resultado = $db->query($sentencia);

        if ($resultado->num_rows == 0) {
            $sentencia = "SELECT id_pais FROM pais WHERE nombre = '" . $_POST['pais'] . "';";
            $resultado = $db->query($sentencia);

            while ($id = $resultado->fetch_assoc()) {
                $idPais = $id['id_pais'];
            }

            $sentencia = "INSERT INTO marca(nombre, pais_id) VALUES ('" . $_POST['marca'] . "', '" . $idPais . "');";
            $resultado = $db->query($sentencia);
            $idMarca = $db->insert_id;
        } else {
            while ($id = $resultado->fetch_assoc()) {
                $idMarca = $id['id_marca'];
            }
        }
    
    $sentencia = "INSERT INTO moto(modelo, año, color, historia, marca_id) VALUES ('" . $_POST['modelo'] . "','" . $_POST['año'] . "','" . $_POST['color'] . "','" . $_POST['historia'] . "','" . $idMarca . "')";
    $resultado = $db->query($sentencia);
    $idMoto = $db->insert_id;

    foreach ($rutasImagenes as $key => $value) {
        $sentencia = "INSERT INTO imagen(ruta_imagen, moto_id) VALUES ('" . $value . "', '" . $idMoto . "');";
        $resultado = $db->query($sentencia);
    }
}
}

function sanitizar_nombre($texto)
{
    $texto = mb_strtolower($texto, 'UTF-8');
    $texto = preg_replace('/[^a-z0-9]/', '_', $texto);
    $texto = preg_replace('/_+/', '_', $texto);
    return trim($texto, '_');
}

function mensaje_error_upload($codigo)
{
    switch ($codigo) {
        case UPLOAD_ERR_INI_SIZE:
            return "El archivo supera el límite de upload_max_filesize en php.ini";
        case UPLOAD_ERR_FORM_SIZE:
            return "El archivo supera el límite MAX_FILE_SIZE del formulario";
        case UPLOAD_ERR_PARTIAL:
            return "El archivo solo se subió parcialmente";
        case UPLOAD_ERR_NO_FILE:
            return "No se subió ningún archivo";
        case UPLOAD_ERR_NO_TMP_DIR:
            return "Falta la carpeta temporal en el servidor";
        case UPLOAD_ERR_CANT_WRITE:
            return "Error al escribir el archivo en el disco";
        case UPLOAD_ERR_EXTENSION:
            return "Una extensión de PHP detuvo la subida";
        default:
            return "Código de error desconocido: $codigo";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir ciclomotor - Museo del ciclomotor clásico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css">
    <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="icon" type="image/x-icon" href="img/favicon4.png">
</head>
<!-- EL DROPDOWN MENU ORDENADO POR AÑOS!!!! -->

<body>

    <div id="pagina">
        <div id="pagina2" class="min-vh-100">
            <header>
                <nav class="navbar navbar-expand-lg" id="menuSuperior">
                    <div class="container-fluid">
                        <div id="titulo">
                            <a href="index.php" class="ms-5 mb-2 d-flex flex-column p-0">
                                <h1 class="mt-3 align-self-center fw-bold h2">MUSEO</h1>
                                <h4 class="mt-0 align-self-center fw-bold h6">— DEL CICLOMOTOR CLÁSICO —</h4>
                            </a>
                        </div>

                        <!-- botón móvil -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuLateral">
                            <span class="navbar-toggler-icon"><img src="img/align-justify.png" alt=""></span>
                        </button>

                        <!-- menú normal ordenador -->
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav ms-auto d-none d-lg-flex">
                                <li class="nav-item">
                                    <div class="d-flex">
                                        <div class="dropdown me-1">
                                            <a href="coleccion.php" id="coleccion" class="enlacesMenu">COLECCIÓN
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="galeria.php" class="enlacesMenu">GALERÍA</i></a>
                                </li>
                                <li class="nav-item d-flex align-items-center">
                                    <a href="coleccion.php" class="enlacesIconos d-flex align-self-start" id="buscador"><i class="fa-solid fa-magnifying-glass mt-2"></i></a>
                                </li>
                                <li class="nav-item ">
                                    <a href="favoritos.php" class="enlacesIconos botonesIconos visto">FAVORITOS</a>
                                </li>
                                <li class="nav-item">
                                    <!-- Muestra una cosa u otra dependiendo de si el usuario inició sesión o no -->
                                    <?php
                                    if (isset($_SESSION['usuario'])) {
                                        echo '<a href="usuario.php" class="enlacesIconos botonesIconos visto">MI CUENTA</a>';
                                    } else {
                                        echo '<a href="Input.php" class="enlacesIconos botonesIconos visto">INICIAR SESIÓN</a>';
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- MENU LATERAL MOVIL -->
                <div class="offcanvas offcanvas-end " tabindex="-1" id="menuLateral">
                    <div class="offcanvas-header">
                        <div id="titulo" class="navbar-brand d-flex flex-column">
                            <p class="mt-1 mb-0 h4 fw-bold align-self-center">MUSEO</p>
                            <p class="mt-0 fw-bold align-self-center">— DEL CICLOMOTOR CLÁSICO —</p>
                        </div>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <div class="d-flex">
                                    <div class="dropdown me-1">
                                        <a href="coleccion.php" id="coleccion" class="enlacesMenu ps-3">COLECCIÓN
                                            <div id="menuDinamico2"></div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="enlacesMenu ps-3" href="galeria.php">GALERÍA</a>
                            </li>
                            <li class="nav-item mb-4 mt-2 d-flex flex-row">
                                <a href="coleccion.php" class="enlacesIconos d-flex align-self-start" id="buscador2"><i class="fa-solid fa-magnifying-glass mt-2"></i></a>
                            </li>
                            <li class="nav-item mb-4">
                                <a href="favoritos.php" class="enlacesIconos botonesIconos oculto">FAVORITOS</a>
                            </li>
                            <li class="nav-item ">
                                <!-- Muestra una cosa u otra dependiendo de si el usuario inició sesión o no -->
                                <?php
                                if (isset($_SESSION['usuario'])) {
                                    echo '<a href="usuario.php" class="enlacesIconos botonesIconos oculto" id="botonIniciarSesion2">MI CUENTA</a>';
                                } else {
                                    echo '<a href="Input.php" class="enlacesIconos botonesIconos oculto" id="botonIniciarSesion2">INICIAR SESIÓN</a>';
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <main class=" d-flex justify-content-center align-items-center">
                <div id="login" class="text-center min-vw-50 mt-5 mb-5">
                    <div id="contenedorAñadirMoto" class="p-3 px-5 rounded-3">
                        <div>
                            <h1 class="mb-0">NUEVO CICLOMOTOR</h1>
                            <p>Añade una nueva joya clásica a la colección.</p>
                        </div>
                        <?php
                        if ($errorAñadirMoto != "") {
                            echo "<div class='alert alert-danger'> " . $errorAñadirMoto . " </div>";
                        }
                        ?>
                        <form action="añadirMoto.php" method="post" class="d-flex flex-column" enctype="multipart/form-data">
                            <label for="marca" class="align-self-start">Marca</label>
                            <div class="añadirMotoContenedorInput
                         rounded-3 p-2 mb-4 d-flex">
                                <i class="fi fi-rs-wrench-simple"></i>
                                <input type="text" name="marca" id="marca" required autocomplete="off" class="ms-3">
                            </div>

                            <label for="modelo" class="align-self-start">Modelo</label>
                            <div class="añadirMotoContenedorInput
                         rounded-3 p-2 mb-4 d-flex">
                                <i class="fi fi-rs-motorcycle"></i>
                                <input type="text" name="modelo" id="modelo" required autocomplete="off" class="ms-3">
                            </div>

                            <label for="año" class="align-self-start">Año</label>
                            <div class="añadirMotoContenedorInput
                         rounded-3 p-2 mb-4 d-flex">
                                <i class="fi fi-rs-calendar-days"></i>
                                <input type="text" name="año" id="año" required autocomplete="off" class="ms-3">
                            </div>

                            <label for="color" class="align-self-start">Color</label>
                            <div class="añadirMotoContenedorInput
                         rounded-3 p-2 mb-4 d-flex">
                                <i class="fi fi-rs-palette"></i>
                                <input type="text" name="color" id="color" required autocomplete="off" class="ms-3">
                            </div>

                            <label for="historia" class="align-self-start">Historia</label>
                            <div class="añadirMotoContenedorInput
                         rounded-3 p-2 mb-4 d-flex">
                                <i class="fi fi-rs-book-open-cover"></i>
                                <input type="text" name="historia" id="historia" required autocomplete="off" class="ms-3">
                            </div>

                            <label for="paises" class="align-self-start">Pais</label>
                            <div class="
                         rounded-3 p-2 mb-4 d-flex">

                                <select name="paises" id="paises" required autocomplete="off">
                                </select>
                            </div>

                            <label class="align-self-start">Imágenes del ciclomotor</label>
                            <div class="añadirMotoContenedorInputSinBorde
                         rounded-3 p-2 mb-4 d-flex">
                                <i class="fi fi-rs-graphic-style pe-3"></i>
                                <label for="archivo" class="fw-light" id="labelInputArchivos" class="ms-3">SELECCIONAR ARCHIVOS</label>
                                <input type="file" id="archivo" name="archivos[]" class="archivo" required accept=".jpg, image/jpg" multiple>
                            </div>
                            <button type="submit" id="loginBotonIniciarSesion" class="mt-2 mb-4 p-2 py-2 rounded-3 w-75 align-self-center">Añadir</button>
                        </form>
                    </div>
                </div>



                <script>
                    let resultadoPaises = <?php echo json_encode($resultadoPaises ?? [], JSON_UNESCAPED_UNICODE); ?>;
                </script>
            </main>
            <footer id="footerUsuario">
                <div class="container-fluid py-5">
                    <div class="row text-center">
                        <div class="col-md-4 mb-4 mb-md-0">
                            <h6 class="fw-bold mb-3">CONTACTO</h6>
                            <p class="mb-2">Email: info@museo.com</p>
                            <p>Teléfono: +34 123 456 789</p>
                        </div>
                        <div class="col-md-4 mb-4 mb-md-0">
                            <h6 class="fw-bold  mb-3">SÍGUENOS</h6>
                            <div class="redes-sociales">
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a href="https://sites.google.com/view/agacc/inicio" target="_blank"><i class="fi fi-rs-motorcycle mt-1"></i></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h6 class="fw-bold mb-3">LEGAL</h6>
                            <p>Política de privacidad • Términos de uso</p>
                        </div>
                    </div>
                    <hr class="my-4 linea-separadora">
                    <div class="text-center">
                        <p class="mb-0">&copy; 2026 Museo del Ciclomotor Clásico. Todos los derechos reservados.</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/añadirMoto.js"></script>
</body>

</html>