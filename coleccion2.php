<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
session_start();

//Llamada al archivo para conectar con la base de datos
require_once "db.php";
$textoFavoritos = "";

if (isset($_GET['moto'])) {
    //Variable de sesión que guarda la actividad del usuario para luego mostrarla en su cuenta
    $_SESSION['vistoReciente'] = $_GET['moto'];

    //Consulta para la información de la moto
    $sentencia = "SELECT  m.id_moto, ma.nombre, m.modelo, m.año, m.color, m.historia, m.tipo, p.nombre_pais 
                FROM moto m 
                JOIN marca ma ON m.marca_id = ma.id_marca 
                JOIN pais p ON ma.pais_id = p.id_pais 
                WHERE m.id_moto = " . $_GET['moto'] . ";";

    $resultado = $db->query($sentencia);
    $listaResultado = [];
    while ($moto = $resultado->fetch_assoc()) {
        array_push($listaResultado, $moto);
    }

    //Consulta para las fotos de la moto
    $sentencia = "SELECT ruta_imagen FROM imagen WHERE moto_id = " . $_GET['moto'] . ";";
    $resultado = $db->query($sentencia);
    $listaResultadoRutas = [];
    while ($imagen = $resultado->fetch_assoc()) {
        array_push($listaResultadoRutas, $imagen);
    }

    //Consulta de los comentarios de la moto
    $sentencia = "SELECT u.usuario, c.puntuacion, c.texto, c.fecha FROM usuarios u JOIN comentario c ON u.id_usuario = c.usuario_id WHERE c.moto_id = " . $_GET['moto'] . " ORDER BY id_comentario DESC;";
    $resultado = $db->query($sentencia);
    $listaResultadoComentarios = [];
    while ($comentario = $resultado->fetch_assoc()) {
        array_push($listaResultadoComentarios, $comentario);
    }

    //Si el usuario esta logueado comprueba si la moto esta añadida o no a favoritos
    if (isset($_SESSION['usuario'])) {
        //Consulta favoritos, comprueba si la moto esta 
        $sentencia = "SELECT moto_id FROM favoritos WHERE moto_id = " . $_GET['moto'] . " AND usuario_id = " . $_SESSION['usuario'] . ";";
        $resultado = $db->query($sentencia);
        if ($resultado -> num_rows == 0) {
            $textoFavoritos = "Añadir a favoritos";
        }else{
            $textoFavoritos = "Eliminar de favoritos";
        }
    //Si no esta logueado por defecto pone añadir
    }else{
        $textoFavoritos = "Añadir a favoritos";
    }
    
}

//Añade un comentario a la moto
if (isset($_POST['nuevoComentario']) && isset($_POST['puntuacion'])) {
    $texto = $_POST['nuevoComentario'];
    $puntuacion = $_POST['puntuacion'];

    //Comprueba si el usuario inició sesión
    if (isset($_SESSION['usuario'])) {
        $sentencia = "INSERT INTO comentario(usuario_id, moto_id, texto, puntuacion) VALUES (" . $_SESSION['usuario'] . ", " .  $_GET['moto'] . ", '" . $texto . "', '" . $puntuacion . "');";
        $resultado =  $db->query($sentencia);
        header("Location: ?moto=" . $_GET['moto']);
        exit;
    } else {
        header("Location: login.php");
        exit;
    }
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
                                <!-- Muestra una cosa u otra dependiendo de si el usuario inició sesión o no -->
                                <?php
                                if (isset($_SESSION['usuario'])) {
                                    echo '<a href="usuario.php" class="enlacesIconos botonesIconos oculto" id="botonIniciarSesion2">MI CUENTA</a>';
                                } else {
                                    echo '<a href="login.php" class="enlacesIconos botonesIconos oculto" id="botonIniciarSesion2">INICIAR SESIÓN</a>';
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>

            <!-- MAIN -->
            <main class="container pt-5 pb-3">
                <div class="row">
                    <div class="row">
                        <div id="coleccion2ContenedorImg" class="col-sm-12 col-md-9 col-lg-6 mb-4">

                            <!-- Aquí se detectan los eventos para el carrusel de imagenes de la moto -->
                            <div>
                                <img id="coleccion2Img" class="img-fluid">
                                <a href="#" class="coleccion2Flechas " id="coleccion2FlechaI" onclick="imgAtras()"><i class="fi fi-rs-angle-left"></i></a>
                                <a href="#" class="coleccion2Flechas" id="coleccion2FlechaD" onclick="imgAlante()"><i class="fi fi-rs-angle-right"></i></a>
                            </div>
                            <div class="d-flex justify-content-center">
                                    <?php 
                                    if (isset($_SESSION['admin']) && isset($_GET['moto'])) {
                                        echo "<a href='modificarMoto.php?moto=" . $_GET['moto'] . "'><button class='enlacesIconos botonesIconos visto my-3'>MODIFICAR CICLOMOTOR</button></a>";
                                        echo "<a href='eliminarMoto.php?moto=" . $_GET['moto'] . "'><button class='enlacesIconos botonesIconos visto my-3'>ELIMINAR CICLOMOTOR</button></a>";
                                    }
                                    ?> 
                                </div> 
                        </div>

                        <!-- Información de la moto -->
                        <div id="coleccion2ContenedorInfo" class="col-sm-12 col-md-9 col-lg-6">
                            <h2 id="coleccion2MarcaModelo"></h2>
                            <div id="coleccion2Caracteristicas">
                                <div class="coleccion2CaracteristicasDiv">
                                    <div class="coleccion2LabelInfo">
                                        <i class="fi fi-rs-calendar"></i>
                                        <p>Año:</p>
                                    </div>
                                    <p id="coleccion2Año"></p>
                                </div>
                                <div class="coleccion2CaracteristicasDiv">
                                    <div class="coleccion2LabelInfo">
                                        <i class="fi fi-rs-palette"></i>
                                        <p>Color:</p>
                                    </div>
                                    <p id="coleccion2Color"></p>
                                </div>
                                <div class="coleccion2CaracteristicasDiv">
                                    <div class="coleccion2LabelInfo">
                                        <i class="fi fi-rs-motorcycle"></i>
                                        <p>Tipo:</p>
                                    </div>
                                    <p id="coleccion2Tipo"></p>
                                </div>
                                <div class="coleccion2CaracteristicasDiv">
                                    <div class="coleccion2LabelInfo">
                                        <i class="fi fi-rs-world"></i>
                                        <p>Origen:</p>
                                    </div>
                                    <p id="coleccion2Origen"></p>
                                </div>
                            </div>
                            <div id="coleccion2Historia">
                                <i class="fas fa-quote-left me-2"></i>
                                <p id="coleccion2HistoriaP"></p>
                            </div>
                            <?php 
                                echo "<button id='botonFavoritos'>" . $textoFavoritos . "</button>";
                            ?>
                            
                        </div>
                    </div>

                    <!-- Comentarios de la moto -->
                    <div id="coleccion2ContenedorComentarios" class="col-12">
                        <div id="coleccion2ComentariosTitulo">
                            <i class="fi fi-rs-comments"></i>
                            <h1>Comentarios</h1>
                        </div>
                        <div id="coleccion2Comentarios">

                        </div>
                        <hr>
                        <form action="?moto=<?php echo $_GET['moto']; ?>" method="POST">
                            <div id="coleccion2DejaComentario">
                                <i class="fi fi-rs-comment-dots"></i>
                                <p>Deja tu comentario y puntúa</p>
                                <div id="coleccion2DivIconosEstrella">
                                    <i class="fi fi-rs-star estrella" data-valor="1"></i>
                                    <i class="fi fi-rs-star estrella" data-valor="2"></i>
                                    <i class="fi fi-rs-star estrella" data-valor="3"></i>
                                    <i class="fi fi-rs-star estrella" data-valor="4"></i>
                                    <i class="fi fi-rs-star estrella" data-valor="5"></i>
                                </div>
                                <input type="hidden" name="puntuacion" id="puntuacion" value="0">
                            </div>
                            <div>
                                <textarea name="nuevoComentario" id="nuevoComentario" rows="12" placeholder="¿Qué opinas de este maravilloso ciclomotor? Comparte tu experiencia o conocimiento..."></textarea>
                                <button type="submit">Publicar comentario</button>
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                    //Asignación de variables de php a JavaScipt con JSON
                    let listaMotos = <?php echo json_encode($listaResultado ?? [], JSON_UNESCAPED_UNICODE) ?>;
                    let listaRutas = <?php echo json_encode($listaResultadoRutas ?? [], JSON_UNESCAPED_UNICODE) ?>;
                    let listaComentarios = <?php echo json_encode($listaResultadoComentarios ?? [], JSON_UNESCAPED_UNICODE) ?>;
                    console.log(listaComentarios);
                </script>
            </main>

            <!-- FOOTER -->
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
                                <a href="https://www.facebook.com/share/g/14bA9mEYBn1/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
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
    <script src="js/coleccion2.js"></script>
</body>

</html>