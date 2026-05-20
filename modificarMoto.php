<?php
session_start();
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

//Llamada al archivo para conectar con la base de datos
require_once "db.php";


if ($_GET['moto']) {
    $sentencia = "SELECT m.id_moto, ma.nombre, m.modelo, m.año, m.color, m.historia, m.tipo, p.nombre_pais 
                FROM moto m 
                JOIN marca ma ON m.marca_id = ma.id_marca 
                JOIN pais p ON ma.pais_id = p.id_pais 
                WHERE m.id_moto = " . $_GET['moto'] . ";";

    $resultado = $db->query($sentencia);
    $listaMoto = [];
    while ($moto = $resultado->fetch_assoc()) {
        array_push($listaMoto, $moto);
    }

    $sentencia = "SELECT ruta_imagen FROM imagen WHERE mot_id = " . $_GET['moto'] . ";";
    $resultado = $db->query($sentencia);
    $listaRutas = [];
    while ($ruta = $resultado->fetch_assoc()) {
        ar_p
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