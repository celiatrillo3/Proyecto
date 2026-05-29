<?php
session_start();
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

//Llamada al archivo para conectar con la base de datos
require_once "db.php";
require_once "funciones.php";
$motoModificada = "";

//Comprueba si el array esta vacio, para poder añadirle un valor para que se pueda comprobar
if (empty($_POST['imagenes'])) {
    $_POST['imagenes'] = ['0'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['motoModificada'])) {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];

    //Array de imagenes 
    $imagenes = $_POST['imagenes'];


    $sentencia = "SELECT ruta_imagen FROM imagen WHERE moto_id = " . $_SESSION['motoModificada'] . ";";
    $resultado = $db->query($sentencia);
    $rutaAnterior = [];
    while ($ruta = $resultado->fetch_assoc()) {
        //Comprueba cuales de las rutas de la base de datos coinciden con las imagenes que el usuario quiere conservar
        foreach ($imagenes as $key => $value) {
            if (str_contains($ruta['ruta_imagen'], $value)) {
                array_push($rutaAnterior, $ruta);
            }
        }
    }

    // Crear nombre de carpeta: "marca_modelo" 
    $carpetaNombre = sanitizaNombre($marca) . '_' . sanitizaNombre($modelo);
    $rutaCarpeta = 'imgs_motos/' . $carpetaNombre;

    if (is_dir($rutaCarpeta)) {

        //Guarda en un array las rutas de todas las imagenes de la carpeta de la moto
        $imagenesCarpeta = glob($rutaCarpeta . "/*.JPG", GLOB_BRACE);
        //El contador empieza en uno para los nombres de las fotos
        $contador = 1;
        $rutasImagenes = [];

        //elimina los archivos de la carpeta que no coincidan con el array imagenes
        foreach ($imagenesCarpeta as $rutaAntigua) {
            $mantener = false;
            foreach ($imagenes as $imagen) {
                if (str_contains($rutaAntigua, $imagen)) {
                    $mantener = true;
                    break;
                }
            }

            //Borra el archivo
            if (!$mantener && is_file($rutaAntigua)) {
                unlink($rutaAntigua);
            }
        }

        //Guarda en un array las rutas de todas las imagenes de la carpeta de la moto, hay que sobreescribirlo porque puede que se borraran archivos
        $imagenesCarpeta = glob($rutaCarpeta . "/*.JPG", GLOB_BRACE);

        //Renombra todos los archivos empezando en 1 para que no quede ningun numero suelto por el medio
        foreach ($imagenesCarpeta as $rutaAntigua) {
            $nombreNuevo = $contador . ".JPG";
            $rutaNueva = $rutaCarpeta . "/" . $nombreNuevo;

            if (rename($rutaAntigua, $rutaNueva)) {
                $contador++;
            }
        }

        //Comprueba que se subieron archivos nuevos para llamar a la función que los añade a la carpeta
        if ($_FILES['archivos'] != null) {
            $rutasImagenesNuevas = añadirArchivoACarpeta($contador, $rutaCarpeta, $rutasImagenes);
        }

        //Entra aqui cuando se modifica la marca o el modelo de la moto porque se tiene que crear otra carpeta con el nuevo nombre
    } elseif (!mkdir($rutaCarpeta, 0755, true)) {
        $errorAñadirMoto = "No se pudo crear la carpeta para la moto.";
    } else {
        //El contador empieza en uno para los nombres de las fotos
        $contador = 1;
        $rutasImagenes = [];

        if ($imagenes != null) {
            for ($i = 0; $i < count($imagenes); $i++) {
                //Se crea una nueva ruta para cada archivo, se mueve el archivo y se guarda la ruta en un array
                $rutaArchivoNueva = $rutaCarpeta . "/" . $contador . ".JPG";
                if (rename($rutaAnterior[$i]['ruta_imagen'], $rutaArchivoNueva)) {
                    $contador++;
                    array_push($rutasImagenes, $rutaArchivoNueva);
                }
            }

            //Comprueba que se subieron archivos nuevos para llamar a la función que los añade a la carpeta
            if ($_FILES['archivos'] != null) {
                $rutasImagenesNuevas = añadirArchivoACarpeta($contador, $rutaCarpeta, $rutasImagenes);
            }

            //Comprueba que se subieron archivos nuevos para llamar a la función que los añade a la carpeta
        } else if ($_FILES['archivos'] != null) {
            $rutasImagenesNuevas = añadirArchivoACarpeta($contador, $rutaCarpeta, $rutasImagenes);
            var_dump($rutasImagenesNuevas);
        }
    }

    //Hace el update en la base de datos
    $sentencia = "UPDATE moto m
                    JOIN marca ma ON m.marca_id = ma.id_marca
                    JOIN pais p ON ma.pais_id = p.id_pais
                    SET ma.nombre = '" . $_POST['marca'] . "',
                        m.modelo = '" . $_POST['modelo'] . "',
                        m.año = " . $_POST['año'] . ",
                        m.color = '" . $_POST['color'] . "',
                        m.historia = '" . $_POST['historia'] . "',
                        p.nombre_pais = '" . $_POST['paises'] . "'
                    WHERE m.id_moto = " . $_SESSION['motoModificada'] . ";";
    $resultado = $db->query($sentencia);

    if ($resultado) {
        //Borra todas las rutas de las imagenes de las motos y crea otras nuevas
        $sentencia = "DELETE FROM imagen WHERE moto_id = " . $_SESSION['motoModificada'] . ";";
        $resultado = $db->query($sentencia);

        if ($resultado) {
            $rutasImagenes = glob($rutaCarpeta . "/*.JPG", GLOB_BRACE);
            foreach ($rutasImagenes as $rutaImagen) {
                $sentencia = "INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('" . $rutaImagen . "', '" . $_SESSION['motoModificada'] . "')";
                $resultado = $db->query($sentencia);
            }

            $motoModificada = "<a href='coleccion.php' class='mt-5'><div class='favoritosDivError'>El ciclomotor fue modificado correctamente.</div></a>";
        }
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
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
</head>

<body>

    <div id="paginaGris">
        <div id="pagina2" class="min-vh-100">
            <header>
                <nav class="navbar navbar-expand-lg" id="menuSuperior">
                    <div class="container-fluid">
                        <div id="titulo">
                            <a href="index.php" class="ms-5 mb-2 d-flex flex-column p-0">
                                <!-- <h1 class="mt-3 align-self-center fw-bold h2">MUSEO</h1>
                                <h4 class="mt-0 align-self-center fw-bold h6">— DEL CICLOMOTOR CLÁSICO —</h4> -->
                                <img src="img/logomc.png" class="imgLogo" alt="">
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
            <main>
                <?php
                if (isset($motoModificada)) {
                    echo $motoModificada;
                }
                ?>
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