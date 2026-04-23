<?php
    session_start();
    $errorLogin = "";

    if (isset($_POST['user'], $_POST['email'], $_POST['password'], $_POST['password2'])) {
        $user = $_POST['user'];
        $email = $_POST['email'];
        $password = SHA1($_POST['password']);
        $password2 = SHA1($_POST['password2']);

        $db = new mysqli('localhost', 'root', '', 'museo_ciclomotor');
        $db->autocommit(false);

        $sentencia = "SELECT id_usuario FROM usuarios WHERE usuario = '" . $user ."'";
        $resultado = $db->query($sentencia);

        if ($resultado->num_rows > 0) {
            $errorLogin = "Ese usuario ya existe";
        }else{
            $sentencia = "SELECT id_usuario FROM usuarios WHERE email = '" . $email ."'";
            $resultado = $db->query($sentencia);
            if ($resultado->num_rows > 0) {
                $errorLogin = "Ese correo electrónico ya existe";
            }else{
                if ($password != $password2) {
                    $errorLogin = "Las contraseñas no coinciden";
                }else{
                    try {
                        $sentencia = "INSERT INTO usuarios(usuario, email, contraseña) VALUES
                        ('" . $user . "', '" . $email . "', '" . $password . "');";
                        $db->query($sentencia);
                        $db->commit();
                        header("Location: login.php");
                    } catch (Exception $e) {
                        echo "excepccion";
                        echo $e;
                        $db->rollback();
                    }
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css">
    <link rel="stylesheet" href="estilos/estilos.css">
</head>
<!-- EL DROPDOWN MENU ORDENADO POR AÑOS -->

<body>
    <div id="pagina">
        <div id="pagina2" class="min-vh-100">
            <header>
                <nav class="navbar navbar-expand-lg" id="menuSuperior">
                    <div class="container-fluid">
                        <div id="titulo" >
                            <a href="index.php" class="ms-5 mb-2 d-flex flex-column p-0">
                                <h1 class="mt-3 align-self-center fw-bold h2">MUSEO</h1>
                                <h4 class="mt-0 align-self-center fw-bold h6">— DEL CICLOMOTOR CLÁSICO —</h4>
                            </a>
                        </div>

                        <!-- botón móvil -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#menuLateral">
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
                                    <a href="login.php" class="enlacesIconos botonesIconos visto">INICIAR SESIÓN</a>
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
            <main class="min-vh-100 d-flex justify-content-center align-items-center">
                <!-- Eslogan que cambia -->
                <section id="login" class="text-center h-85 min-w-20">
                    <div id="contenedorLogin" class="p-3 px-5 w-100 h-100 rounded-3">
                        <div>
                            <h1 class="mb-0">BIENVENIDO</h1>
                            <p>Crea tu cuenta</p>
                        </div>
                        <?php
                        if ($errorLogin != "") {
                            echo "<div class='alert alert-danger'> " . $errorLogin . " </div>";
                        }
                        ?>
                        <form action="registrarse.php" method="post" class="d-flex flex-column">
                            <label for="loginUser" class="align-self-start">Usuario</label>
                            <div class="loginContenedorInput rounded-3 p-2 mb-3 d-flex">
                                <i class="fi fi-rs-user"></i>
                                <input type="text" name="user" id="user" placeholder="user" required class="ms-3" autocomplete="off">
                            </div>

                            <label for="email" class="align-self-start">Email</label>
                            <div class="loginContenedorInput rounded-3 p-2 mb-3 d-flex">
                                <i class="fi fi-rs-envelope"></i>
                                <input type="email" name="email" id="loginEmail" placeholder="mueso@ejemplo.com" required class="ms-3" autocomplete="off">
                            </div>
                            
                            <label for="loginPassword" class="align-self-start">Contraseña</label>
                            <div class="loginContenedorInput rounded-3 p-2 mb-3 d-flex">
                                <i class="fi fi-rs-lock pt-1"></i>
                                <input type="password" name="password" id="password" placeholder="********" minlength="7" required class="ms-3">

                                <a href="#" class=" pt-1" onclick="mostrarContraseña(event)"><i class="fi fi-rs-eye"></i></a>
                            </div>

                            <label for="loginPassword2" class="align-self-start">Confirmar contraseña</label>
                            <div class="loginContenedorInput rounded-3 p-2 mb-3 d-flex">
                                <i class="fi fi-rs-lock pt-1"></i>
                                <input type="password" name="password2" id="password2" placeholder="********" minlength="7" required class="ms-3">

                                <a href="#" class=" pt-1" onclick="mostrarContraseña(event)"><i class="fi fi-rs-eye"></i></a>
                            </div>
                            
                            <button type="submit" class="mt-2 mb-3 p-2 py-2 rounded-3" id="loginBotonIniciarSesion">REGISTARSE</button>
                    </div>
                </section>
                <!-- Carrusel-->
                 <div id="carruselPalabras" class="d-flex align-self-center ">
                    <div id="divInteriorCarrusel">
                        <span>Ducati</span>
                        <span>•</span>
                        <span>Mobylette</span>
                        <span>•</span>
                        <span>Puch</span>
                        <span>•</span>
                        <span>Torrot</span>
                        <span>•</span>
                        <span>Derbi</span>
                        <span>•</span>
                        <span>Ossa</span>
                        <span>•</span>
                        <span>Piaggio</span>
                        <span>•</span>

                        <!-- duplicamos para loop infinito -->
                        <span>Ducati</span>
                        <span>•</span>
                        <span>Mobylette</span>
                        <span>•</span>
                        <span>Puch</span>
                        <span>•</span>
                        <span>Torrot</span>
                        <span>•</span>
                        <span>Derbi</span>
                        <span>•</span>
                        <span>Ossa</span>
                        <span>•</span>
                        <span>Piaggio</span>
                        <span>•</span>
                    </div>
                </div>
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
    <script src="js/registrarse.js"></script>
</body>

</html>