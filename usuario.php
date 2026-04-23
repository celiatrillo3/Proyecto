<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu cuenta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css">
    <link rel="stylesheet" href="estilos/usuario.css">
</head>
<!-- EL DROPDOWN MENU ORDENADO POR AÑOS!!!! -->
<body>

    <div id="pagina">
        <div id="pagina2" class="min-vh-100">
            <header>
        <nav class="navbar navbar-expand-lg" id="menuSuperior">
            <div class="container-fluid">
                <div id="titulo" >
                    <a href="index.html" class="ms-5 mb-2 d-flex flex-column p-0">
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
                                    <a href="coleccion.html" id="coleccion" class="enlacesMenu">COLECCIÓN
                                        <div id="contenedorMenuDinamico">
                                            <div class="linea-con-pico"></div>
                                            <div id="menuDinamico"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="enlacesMenu">GALERÍA</i></a>
                        </li>
                        <li class="nav-item d-flex">
                            <a href="coleccion.html" class="enlacesIconos d-flex align-self-start" id="buscador"><i class="fa-solid fa-magnifying-glass"></i></a>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="enlacesIconos botonesIconos visto">FAVORITOS</a>
                        </li>
                        <li class="nav-item">
                            <a href="login2.html" class="enlacesIconos botonesIconos visto">INICIAR SESIÓN</a>
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
                                <a href="coleccion.html" id="coleccion" class="enlacesMenu ps-3">COLECCIÓN
                                    <div id="menuDinamico2"></div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="enlacesMenu ps-3" href="#">GALERÍA</a>
                    </li>
                    <li class="nav-item mb-4 mt-2">
                        <a href="coleccion.html" class="enlacesIconos" id="buscador"><i class="fa-solid fa-magnifying-glass"></i></a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="#" class="enlacesIconos botonesIconos oculto">FAVORITOS</a>
                    </li>
                    <li class="nav-item ">
                        <a href="login2.html" class="enlacesIconos botonesIconos oculto">INICIAR SESIÓN</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
            <main class="vh-75 d-flex justify-content-center align-items-center">
                
            </main>
            <footer>
                <div></div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>