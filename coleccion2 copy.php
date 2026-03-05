<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css">
    <link rel="stylesheet" href="estilos/estilos.css">
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
                                                <div id="contenedorMenuDinamico">
                                                    <div class="linea-con-pico"></div>
                                                    <div id="menuDinamico"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="galeria.php" class="enlacesMenu">GALERÍA</i></a>
                                </li>
                                <li class="nav-item d-flex align-items-center">
                                    <input type="text" name="buscadorInput" id="buscadorInput" class="rounded-4 ms-4" placeholder="   Buscar...">
                                    <a href="#" class="enlacesIconos d-flex align-self-start" id="buscador"><i class="fa-solid fa-magnifying-glass mt-2"></i></a>
                                </li>
                                <li class="nav-item ">
                                    <a href="#" class="enlacesIconos botonesIconos visto">FAVORITOS</a>
                                </li>
                                <li class="nav-item">
                                    <?php
                                    session_start();
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
                                <a href="#" class="enlacesIconos d-flex align-self-start" id="buscador2"><i class="fa-solid fa-magnifying-glass mt-2"></i></a>
                                <input type="text" name="buscadorInput" id="buscadorInput2" class="rounded-4 ms-4" placeholder="   Buscar...">
                            </li>
                            <li class="nav-item mb-4">
                                <a href="#" class="enlacesIconos botonesIconos oculto">FAVORITOS</a>
                            </li>
                            <li class="nav-item ">
                                <a href="login.php" class="enlacesIconos botonesIconos oculto">INICIAR SESIÓN</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <main class="container pt-5 pb-3">
                <div class="row">
                    <div class="d-flex flex-row">
                        <div id="coleccion2ContenedorImg" class="col-sm-12 col-md-6 col-lg-6">
                            <div>
                                <img id="coleccion2Img" class="img-fluid">
                                <a href="#" class="coleccion2Flechas " id="coleccion2FlechaI" onclick="imgAtras()"><i class="fi fi-rs-angle-left"></i></a>
                                <a href="#" class="coleccion2Flechas" id="coleccion2FlechaD" onclick="imgAlante()"><i class="fi fi-rs-angle-right"></i></a>
                            </div>
                        </div>
                        <div id="coleccion2ContenedorInfo" class="col-sm-12 col-md-6 col-lg-6">
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
                            <p id="coleccion2Historia"><i class="fas fa-quote-left me-2"></i></p>
                            <button>Añadir a favoritos</button>
                        </div>
                    </div>

                    <div id="coleccion2ContenedorComentarios" class="col-12">
                        <div id="coleccion2ComentariosTitulo">
                            <i class="fi fi-rs-comments"></i>
                            <h1>Comentarios</h1>
                        </div>
                        <div class="coleccion2CajaComentario">
                            <div>
                                <div class="comentarioUsuario">
                                    <i class="fi fi-rs-circle-user"></i>
                                    <p>Usuario</p>
                                </div>
                                <p>Fecha</p>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis maxime quam, accusamus error assumenda quas.</p>
                        </div>
                        <hr>
                        <div id="coleccion2DejaComentario">
                            <i class="fi fi-rs-comment-dots"></i>
                            <p>Deja tu comentario</p>
                        </div>
                        <form action="?moto=<?php echo $_GET['moto']; ?>" method="POST">
                            <textarea name="nuevoComentario" id="nuevoComentario" rows="12" placeholder="¿Qué opinas de esta maravillosa moto? Comparte tu experiencia o conocimiento..."></textarea>
                            <button type="submit">Publicar comentario</button>
                        </form>
                    </div>
                </div>
                <?php
                if (isset($_GET['moto'])) {
                    $db = new mysqli('localhost', 'root', '', 'museo_ciclomotor');
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

                    $sentencia = "SELECT ruta_imagen FROM imagen WHERE moto_id = " . $_GET['moto'] . ";";
                    $resultado = $db->query($sentencia);
                    $listaResultadoRutas = [];
                    while ($imagen = $resultado->fetch_assoc()) {
                        array_push($listaResultadoRutas, $imagen);
                    }
                }

                ?>
                <script>
                    let listaMotosJson = <?php echo json_encode($listaResultado, JSON_UNESCAPED_UNICODE) ?>;
                    let listaRutas = <?php echo json_encode($listaResultadoRutas, JSON_UNESCAPED_UNICODE) ?>;

                    // listaRutas = JSON.stringify(listaRutas);
                    // listaRutas = JSON.parse(listaRutas);
                    let coleccion2Img = document.getElementById('coleccion2Img');
                    let posicion;
                    if (localStorage.getItem("posicion") == null) {
                        posicion = 0;
                        localStorage.setItem("posicion", posicion);
                    } else {
                        posicion = localStorage.getItem("posicion");
                    }
                    coleccion2Img.setAttribute('src', listaRutas[posicion]['ruta_imagen']);


                    function cambiarImagenConEfecto(nuevaPosicion) {
                        let imgElement = document.getElementById('coleccion2Img');
                        let rutaNueva = listaRutas[nuevaPosicion]['ruta_imagen'];
                        imgElement.style.opacity = "1";
                        let imagenFantasma = new Image();
                        imagenFantasma.src = rutaNueva;

                        imagenFantasma.onload = function() {
                            imgElement.style.opacity = "0";

                            setTimeout(() => {
                                imgElement.src = rutaNueva;
                                imgElement.style.opacity = "1";
                                posicion = nuevaPosicion;
                                localStorage.setItem("posicion", posicion);
                            }, 150);
                        };
                    }

                    // Funciones de flechas simplificadas
                    function imgAtras() {
                        let pos = parseInt(localStorage.getItem("posicion") || 0);
                        let nueva = (pos <= 0) ? listaRutas.length - 1 : pos - 1;
                        cambiarImagenConEfecto(nueva);
                    }

                    function imgAlante() {
                        let pos = parseInt(localStorage.getItem("posicion") || 0);
                        let nueva = (pos >= listaRutas.length - 1) ? 0 : pos + 1;
                        cambiarImagenConEfecto(nueva);
                    }

                    
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
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
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
    <script src="js/script.js"></script>
</body>

</html>