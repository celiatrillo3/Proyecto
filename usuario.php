<?php
session_start();
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

//Llamada al archivo para conectar con la base de datos
require_once "db.php";

if (isset($_SESSION['usuario'])) {
    $sentencia = "SELECT usuario, email FROM usuarios WHERE id_usuario = " . $_SESSION['usuario'] . ";";
    $resultado = $db->query($sentencia);
    $resultadoUsuario = [];
    while ($usuario = $resultado->fetch_assoc()) {
        array_push($resultadoUsuario, $usuario);
    }
}


if (isset($_SESSION['vistoReciente'])) {
    $sentencia = "SELECT i.ruta_imagen, ma.nombre, m.modelo, m.historia 
        FROM imagen i 
        JOIN moto m ON i.moto_id = m.id_moto 
        JOIN marca ma ON m.marca_id = ma.id_marca 
        WHERE m.id_moto = " . $_SESSION['vistoRecientemente'] . " 
        AND i.ruta_imagen LIKE '%1.JPG%';";
    $resultado = $db->query($sentencia);
    $resultadoVistoRecientemente = [];
    while ($moto = $resultado->fetch_assoc()) {
        array_push($resultadoVistoRecientemente, $moto);
    }
} else {
    $errorVistoRecientemente = "<div class='favoritosDivError'>¡Explora nuestra maravillosa colección!</div>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi cuenta - Museo del ciclomotor clásico</title>
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
            <main class="container">
                <section id="usuarioSection" class="ps-4 pe-4 pt-4">
                    <div id="usuarioInfo" class="d-flex flex-row justify-content-between pb-2">
                        <div>
                            <div class="d-flex flex-row">
                                <p id="usuarioUser" class="pe-2">USUARIO: </p>

                            </div>
                            <div class="d-flex flex-row">
                                <p id="usuarioEmail" class="pe-2">CORREO ELECTRÓNICO: </p>
                            </div>
                        </div>
                        <button class="enlacesIconos botonesIconos visto my-3">CERRAR SESIÓN</button>
                    </div>
                    <article id="usuarioArticleVisto" class="pt-4">
                        <h4>VISTO RECIENTEMENTE</h4>
                        <div id="usuarioVistoReciente" class="row p-5">
                            <?php
                            // if (isset($errorVistoRecientemente)) {
                            //     echo $errorVistoRecientemente;
                            //     unset($errorVistoRecientemente);
                            // }
                            ?>
                            <div class="col-sm-10 col-md-8 col-lg-6 me-4">
                                <img src="imgs_motos/atala_califfone/1.JPG" alt="" class="img-fluid ">
                            </div>
                            <div class="col-sm-10 col-md-8 col-lg-5 mb-4 d-flex flex-column align-items-start" id="usuarioContenedorInfoVistoReciente">
                                <h2 id="usuarioMoto">Atala Califfone</h2>
                                <div id="usuarioHistoriaMoto">
                                    <i class="fas fa-quote-left me-2"></i>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia ut harum fugit, ex debitis quos? Exercitationem quos quis enim. Itaque ad ab nostrum enim inventore eum, provident voluptas. Eaque cumque esse eos quisquam saepe ratione minus alias maxime nam, numquam et quibusdam quod aspernatur veritatis sequi odio, accusamus nihil consequuntur.</p>
                                </div>
                                <button type="submit" class="enlacesIconos botonesIconos visto  align-self-end">VER MÁS</button>
                            </div>
                        </div>
                    </article>
                    <article id="usuarioArticleComentarios" class="pt-4">
                        <h4>COMENTARIOS RECIENTES</h4>
                        <div id="usuarioComentarioReciente" class="p-5">
                            <div class="coleccion2CajaComentario">
                                <div>
                                    <div class="comentarioUsuario">
                                        <i class="fi fi-rs-circle-user"></i>
                                        <p>usuario</p>
                                        <div class="coleccion2DivIconosEstrellaComentarios">
                                            <i class="fi fi-ss-star iconoEstrella"></i>
                                            <i class="fi fi-ss-star iconoEstrella"></i>
                                            <i class="fi fi-ss-star iconoEstrella"></i>
                                            <i class="fi fi-rs-star iconoEstrella"></i>
                                            <i class="fi fi-rs-star iconoEstrella"></i>
                                        </div>
                                    </div>
                                    <p>fecha</p>
                                </div>
                                <p>texto del comentario</p>
                            </div>
                            <div class="coleccion2CajaComentario">
                                <div>
                                    <div class="comentarioUsuario">
                                        <i class="fi fi-rs-circle-user"></i>
                                        <p>usuario</p>
                                        <div class="coleccion2DivIconosEstrellaComentarios">
                                            <i class="fi fi-ss-star iconoEstrella"></i>
                                            <i class="fi fi-ss-star iconoEstrella"></i>
                                            <i class="fi fi-ss-star iconoEstrella"></i>
                                            <i class="fi fi-rs-star iconoEstrella"></i>
                                            <i class="fi fi-rs-star iconoEstrella"></i>
                                        </div>
                                    </div>
                                    <p>fecha</p>
                                </div>
                                <p>texto del comentario</p>
                            </div>
                            <div class="coleccion2CajaComentario">
                                <div>
                                    <div class="comentarioUsuario">
                                        <i class="fi fi-rs-circle-user"></i>
                                        <p>usuario</p>
                                        <div class="coleccion2DivIconosEstrellaComentarios">
                                            <i class="fi fi-ss-star iconoEstrella"></i>
                                            <i class="fi fi-ss-star iconoEstrella"></i>
                                            <i class="fi fi-ss-star iconoEstrella"></i>
                                            <i class="fi fi-rs-star iconoEstrella"></i>
                                            <i class="fi fi-rs-star iconoEstrella"></i>
                                        </div>
                                    </div>
                                    <p>fecha</p>
                                </div>
                                <p>texto del comentario</p>
                            </div>
                        </div>
                    </article>
                </section>
                <script>
                    let resultadoUsuario = <?php echo json_encode($resultadoUsuario ?? [], JSON_UNESCAPED_UNICODE); ?>;
                    let resultadoVisto = <?php echo json_encode($resultadoVistoRecientemente ?? [], JSON_UNESCAPED_UNICODE); ?>;
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
    <script src="js/usuario.js"></script>
</body>



</html>