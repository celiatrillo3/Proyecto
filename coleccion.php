<?php
session_start();

//Llamada al archivo para conectar con la base de datos
require_once "db.php";

if (isset($_POST['buscadorInput'])) {
    echo $_POST['buscadorInput'];
    $busqueda = $_POST['buscadorInput'];
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
    if ($resultado->num_rows > 0) {
        $listaResultadoBuscador = [];
        while ($busqueda = $resultado->fetch_assoc()) {
            array_push($listaResultadoBuscador, $busqueda);
        }
        echo "if num rows";
    }
}

$listaResultado = [];
if (isset($listaResultadoBuscador)) {
    $listaResultado = $listaResultadoBuscador;
    unset($listaResultadoBuscador);
    echo "if";
} else {
    $sentencia = "SELECT i.ruta_imagen, ma.nombre, m.modelo, m.año, p.nombre_pais , m.id_moto
                    FROM imagen i 
                    JOIN moto m ON i.moto_id = m.id_moto 
                    JOIN marca ma ON m.marca_id = ma.id_marca 
                    JOIN pais p ON ma.pais_id = p.id_pais 
                    WHERE i.ruta_imagen LIKE '%1.JPG';";
    $resultado = $db->query($sentencia);

    while ($moto = $resultado->fetch_assoc()) {
        array_push($listaResultado, $moto);
    }
    echo "else";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colección - Museo del ciclomotor clásico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css">
    <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="icon" type="image/x-icon" href="img/favicon4.png">
</head>
<!-- EL DROPDOWN MENU ORDENADO POR AÑOS!!!! -->

<body>

    <div id="paginaGris">
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
                                    <?php
                                    if (isset($_SESSION['usuario'])) {
                                        echo '<a href="usuario.php" class="enlacesIconos botonesIconos visto">MI CUENTA</a>';
                                    } else {
                                        echo '<a href="login.php" class="enlacesIconos botonesIconos visto">INICIAR SESIÓN</a>';
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
                                <a href="login.php" class="enlacesIconos botonesIconos oculto">INICIAR SESIÓN</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <main class="container-fluid py-5">
                <div class="colecionBuscador">
                    <form action="coleccion.php" method="post" class="search-container">
                        <input type="text" placeholder="Search anything" name="buscadorInput" autocomplete="off">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass mt-1"></i></button>
                    </form>
                </div>
                <div class="row g-4" id="contenedorImgsColeccion">

                </div>
                <script>
                    let listaMotos = <?php echo json_encode($listaResultado, JSON_UNESCAPED_UNICODE) ?>;
                </script>
            </main>
            <footer>
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
                                <a href="https://www.facebook.com/share/g/14bA9mEYBn1/"><i class="fa-brands fa-facebook-f"></i></a>
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
    <script src="js/coleccion.js"></script>
</body>

</html>