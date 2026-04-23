
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museo del Ciclomotor Clásico - Ficha de la Moto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css">
    <style>
        /* VARIABLES */
        :root {
            --color-texto1: #F4F1EA;
            --color-primario: #293133;
            --color-acento: #C78916;
            --color-secundario: #949494;
            --color-texto2: #000000;
        }

        /* FUENTES */
        @font-face {
            font-family: 'playfair';
            src: url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&display=swap');
            font-display: swap;
        }
        @font-face {
            font-family: 'crimsonText';
            src: url('https://fonts.googleapis.com/css2?family=Crimson+Text:wght@400;600;700&display=swap');
            font-display: swap;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Crimson Text', serif;
            background-color: var(--color-primario);
        }

        #paginaGris {
            background: linear-gradient(135deg, #1e2628 0%, #2a3436 100%);
            min-height: 100vh;
        }

        #pagina2 {
            background: linear-gradient(rgba(41, 49, 51, 0.85), rgba(41, 49, 51, 0.75));
            min-height: 100vh;
        }

        a {
            text-decoration: none;
        }

        /* HEADER */
        header {
            color: var(--color-texto1);
            background-color: var(--color-primario);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 100;
        }

        #titulo a {
            color: var(--color-texto1);
            transition: transform 0.3s ease;
        }
        #titulo a:hover {
            transform: translateY(-2px);
        }

        #titulo h1 {
            font-family: 'playfair', serif;
            letter-spacing: 2px;
            background: linear-gradient(135deg, #fff, var(--color-acento));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        #titulo h4 {
            font-family: 'crimsonText', serif;
            letter-spacing: 1px;
        }

        /* NAV */
        .enlacesMenu {
            color: var(--color-texto1);
            font-family: 'crimsonText', serif;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 10px 15px;
            transition: all 0.3s ease;
            position: relative;
        }

        .enlacesMenu:hover {
            color: var(--color-acento);
            transform: translateY(-2px);
        }

        .enlacesMenu::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--color-acento);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .enlacesMenu:hover::after {
            width: 80%;
        }

        .visto {
            font-family: 'playfair', serif;
            padding: 8px 20px;
            background-color: var(--color-acento);
            color: var(--color-texto2);
            border: 2px solid var(--color-acento);
            border-radius: 30px;
            font-weight: bold;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .visto:hover {
            background-color: transparent;
            color: var(--color-texto1);
            border-color: var(--color-acento);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(199, 137, 22, 0.3);
        }

        /* MAIN CONTENIDO */
        .ficha-moto {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Carrusel de imágenes */
        .image-carousel-container {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.4);
            background: #000;
        }

        #catalogo2Img {
            width: 100%;
            height: 450px;
            object-fit: cover;
            transition: transform 0.3s ease;
            display: block;
        }

        .carousel-control {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-acento);
            font-size: 1.8rem;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .carousel-control:hover {
            background: var(--color-acento);
            color: var(--color-primario);
            transform: translateY(-50%) scale(1.1);
        }

        .carousel-control.prev {
            left: 20px;
        }

        .carousel-control.next {
            right: 20px;
        }

        /* Tarjeta de información */
        .info-card {
            background: rgba(41, 49, 51, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(199, 137, 22, 0.3);
            padding: 25px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            height: 100%;
        }

        .moto-title {
            font-family: 'playfair', serif;
            color: var(--color-acento);
            font-size: 2rem;
            font-weight: bold;
            border-bottom: 2px solid var(--color-acento);
            display: inline-block;
            padding-bottom: 8px;
            margin-bottom: 20px;
        }

        .info-row {
            display: flex;
            margin-bottom: 18px;
            padding: 8px 0;
            border-bottom: 1px dashed rgba(244, 241, 234, 0.2);
        }

        .info-label {
            width: 100px;
            font-weight: bold;
            color: var(--color-acento);
            font-family: 'playfair', serif;
        }

        .info-value {
            flex: 1;
            color: var(--color-texto1);
            font-size: 1.05rem;
        }

        .historia-text {
            background: rgba(0, 0, 0, 0.3);
            padding: 15px;
            border-radius: 12px;
            margin-top: 15px;
            color: var(--color-texto1);
            line-height: 1.6;
            font-style: italic;
        }

        /* Sección de comentarios */
        .comentarios-section {
            background: rgba(41, 49, 51, 0.8);
            backdrop-filter: blur(8px);
            border-radius: 20px;
            border: 1px solid rgba(199, 137, 22, 0.3);
            padding: 25px;
            margin-top: 30px;
        }

        .comentarios-header {
            font-family: 'playfair', serif;
            color: var(--color-acento);
            font-size: 1.5rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .comentario-item {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 15px;
            transition: transform 0.2s ease;
        }

        .comentario-item:hover {
            transform: translateX(5px);
            background: rgba(0, 0, 0, 0.4);
        }

        .comentario-usuario {
            font-weight: bold;
            color: var(--color-acento);
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
        }

        .comentario-usuario i {
            font-size: 1.2rem;
        }

        .comentario-fecha {
            font-size: 0.75rem;
            color: var(--color-secundario);
            margin-left: auto;
        }

        .comentario-texto {
            color: var(--color-texto1);
            line-height: 1.5;
            padding-left: 30px;
        }

        .form-comentario {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid rgba(199, 137, 22, 0.3);
        }

        .form-comentario textarea {
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(199, 137, 22, 0.4);
            border-radius: 12px;
            color: var(--color-texto1);
            padding: 12px;
            width: 100%;
            resize: vertical;
        }

        .form-comentario textarea:focus {
            outline: none;
            border-color: var(--color-acento);
            box-shadow: 0 0 10px rgba(199, 137, 22, 0.3);
        }

        .btn-enviar {
            background: var(--color-acento);
            color: var(--color-primario);
            border: none;
            padding: 8px 25px;
            border-radius: 30px;
            font-weight: bold;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-enviar:hover {
            background: transparent;
            color: var(--color-acento);
            border: 1px solid var(--color-acento);
            transform: translateY(-2px);
        }

        /* FOOTER */
        footer {
            background-color: var(--color-primario);
            color: var(--color-texto1);
            font-family: 'crimsonText', serif;
            margin-top: 60px;
            border-top: 2px solid var(--color-acento);
        }

        footer h6 {
            font-family: 'playfair', serif;
            color: var(--color-acento);
            letter-spacing: 1px;
        }

        .redes-sociales a {
            display: inline-flex;
            width: 40px;
            height: 40px;
            align-items: center;
            justify-content: center;
            border: 2px solid var(--color-acento);
            border-radius: 50%;
            transition: all 0.3s ease;
            color: var(--color-texto1);
            margin: 0 5px;
        }

        .redes-sociales a:hover {
            background-color: var(--color-acento);
            color: var(--color-texto2);
            transform: translateY(-3px);
        }

        .linea-separadora {
            border-color: var(--color-acento);
            opacity: 0.3;
        }

        @media (max-width: 768px) {
            .info-label {
                width: 80px;
                font-size: 0.9rem;
            }
            .moto-title {
                font-size: 1.5rem;
            }
            #catalogo2Img {
                height: 300px;
            }
            .carousel-control {
                width: 35px;
                height: 35px;
                font-size: 1.2rem;
            }
        }
    </style>
</head>
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
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuLateral">
                        <span class="navbar-toggler-icon"><i class="fas fa-bars" style="color: var(--color-texto1);"></i></span>
                    </button>
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav ms-auto d-none d-lg-flex">
                            <li class="nav-item"><a href="coleccion.php" class="enlacesMenu">COLECCIÓN</a></li>
                            <li class="nav-item"><a href="galeria.php" class="enlacesMenu">GALERÍA</a></li>
                            <li class="nav-item d-flex align-items-center">
                                <input type="text" id="buscadorInput" class="rounded-4 ms-4" placeholder="Buscar..." style="background:transparent; border:1px solid rgba(244,241,234,0.3); color:white; padding:5px 10px;">
                                <a href="#" class="enlacesIconos ms-2"><i class="fa-solid fa-magnifying-glass"></i></a>
                            </li>
                            <li class="nav-item ms-3"><a href="#" class="visto">FAVORITOS</a></li>
                            <li class="nav-item ms-2"><a href="login.php" class="visto">INICIAR SESIÓN</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="menuLateral" style="background-color:var(--color-primario);">
                <div class="offcanvas-header">
                    <div class="d-flex flex-column">
                        <p class="h4 fw-bold text-white">MUSEO</p>
                        <p class="text-white-50">— DEL CICLOMOTOR CLÁSICO —</p>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="enlacesMenu" href="coleccion.php">COLECCIÓN</a></li>
                        <li class="nav-item"><a class="enlacesMenu" href="galeria.php">GALERÍA</a></li>
                        <li class="nav-item"><a class="visto mt-3 d-inline-block" href="#">FAVORITOS</a></li>
                        <li class="nav-item mt-2"><a class="visto d-inline-block" href="login.php">INICIAR SESIÓN</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <main class="container py-5">
            <?php
                // Simulación de datos de la moto (en tu implementación real vendrían de la BD)
                $moto = [
                    'id' => 1,
                    'marca' => 'Vespa',
                    'modelo' => 'Primavera 125',
                    'año' => 1968,
                    'color' => 'Verde Menta',
                    'tipo' => 'Scooter Clásico',
                    'pais' => 'Italia',
                    'historia' => 'La Vespa Primavera se lanzó en 1968 como una evolución de la famosa Vespa 125. Su nombre significa "primavera" en italiano, simbolizando frescura y renovación. Este modelo se convirtió en un ícono de la movilidad urbana y la cultura italiana, apareciendo en innumerables películas y siendo el sueño de toda una generación. Su diseño elegante y su fiabilidad mecánica la convirtieron en la compañera perfecta para recorrer las calles de Europa.'
                ];
                
                $imagenes = [
                    'https://images.unsplash.com/photo-1558981807-2f6f5b5c9d2a?w=800&h=500&fit=crop',
                    'https://images.unsplash.com/photo-1568772585407-9361f9bf3a87?w=800&h=500&fit=crop',
                    'https://images.unsplash.com/photo-1591637333184-19aaab8f2a8f?w=800&h=500&fit=crop'
                ];
                
                // Comentarios de ejemplo
                $comentarios = [
                    ['usuario' => 'Carlos M.', 'fecha' => '15/03/2025', 'texto' => '¡Qué belleza de moto! Tuve una igual en los 70. Me trae tantos recuerdos.'],
                    ['usuario' => 'Laura G.', 'fecha' => '10/03/2025', 'texto' => 'El diseño es simplemente atemporal. Me encantaría verla en persona.'],
                    ['usuario' => 'MuseoFan', 'fecha' => '05/03/2025', 'texto' => 'Excelente conservación. Los detalles originales están impecables.']
                ];
            ?>
            
            <div class="row ficha-moto">
                <!-- Columna izquierda: Carrusel de imágenes -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="image-carousel-container">
                        <img id="catalogo2Img" class="img-fluid" src="<?php echo $imagenes[0]; ?>" alt="Moto clásica">
                        <a href="#" class="carousel-control prev" id="catalogo2FlechaI">
                            <i class="fi fi-rs-angle-left"></i>
                        </a>
                        <a href="#" class="carousel-control next" id="catalogo2FlechaD">
                            <i class="fi fi-rs-angle-right"></i>
                        </a>
                    </div>
                    <div class="text-center mt-3">
                        <small class="text-white-50"><i class="fas fa-images me-1"></i> <?php echo count($imagenes); ?> fotografías | Haz clic en las flechas para ver más</small>
                    </div>
                </div>

                <!-- Columna derecha: Información de la moto -->
                <div class="col-lg-6">
                    <div class="info-card">
                        <h2 class="moto-title"><?php echo $moto['marca'] . ' ' . $moto['modelo']; ?></h2>
                        
                        <div class="info-row">
                            <div class="info-label"><i class="fas fa-calendar-alt me-2"></i> Año:</div>
                            <div class="info-value"><?php echo $moto['año']; ?></div>
                        </div>
                        <div class="info-row">
                            <div class="info-label"><i class="fas fa-palette me-2"></i> Color:</div>
                            <div class="info-value"><?php echo $moto['color']; ?></div>
                        </div>
                        <div class="info-row">
                            <div class="info-label"><i class="fas fa-motorcycle me-2"></i> Tipo:</div>
                            <div class="info-value"><?php echo $moto['tipo']; ?></div>
                        </div>
                        <div class="info-row">
                            <div class="info-label"><i class="fas fa-globe me-2"></i> Origen:</div>
                            <div class="info-value"><?php echo $moto['pais']; ?></div>
                        </div>
                        
                        <div class="historia-text">
                            <i class="fas fa-quote-left me-2" style="color: var(--color-acento);"></i>
                            <?php echo $moto['historia']; ?>
                        </div>
                        
                        <div class="mt-4 d-flex gap-3">
                            <a href="#" class="visto" style="background-color: transparent; border-color: var(--color-acento); color: var(--color-acento);">
                                <i class="far fa-heart me-2"></i> Añadir a favoritos
                            </a>
                            <a href="#" class="visto">
                                <i class="fas fa-share-alt me-2"></i> Compartir
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SECCIÓN DE COMENTARIOS DEBAJO -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="comentarios-section">
                        <div class="comentarios-header">
                            <i class="fas fa-comments fa-2x"></i>
                            <span>Comentarios de los visitantes</span>
                            <span class="badge" style="background-color: var(--color-acento); color: var(--color-primario);"><?php echo count($comentarios); ?></span>
                        </div>
                        
                        <div id="comentariosLista">
                            <?php foreach($comentarios as $comentario): ?>
                            <div class="comentario-item">
                                <div class="comentario-usuario">
                                    <i class="fas fa-user-circle"></i>
                                    <span><?php echo htmlspecialchars($comentario['usuario']); ?></span>
                                    <span class="comentario-fecha"><i class="far fa-clock me-1"></i><?php echo $comentario['fecha']; ?></span>
                                </div>
                                <div class="comentario-texto">
                                    <?php echo htmlspecialchars($comentario['texto']); ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="form-comentario">
                            <h6 style="color: var(--color-acento); margin-bottom: 15px;"><i class="fas fa-edit me-2"></i>Deja tu comentario</h6>
                            <textarea id="nuevoComentario" rows="3" placeholder="¿Qué opinas de esta maravillosa moto? Comparte tu experiencia o conocimiento..."></textarea>
                            <div class="d-flex justify-content-end">
                                <button class="btn-enviar" onclick="agregarComentario()">
                                    <i class="fas fa-paper-plane me-2"></i> Publicar comentario
                                </button>
                            </div>
                        </div>
                    </div>
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
                        <h6 class="fw-bold mb-3">SÍGUENOS</h6>
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
<script>
    // Simulación de imágenes para el carrusel (en tu implementación real vendrían de PHP)
    const imagenesMoto = <?php echo json_encode($imagenes); ?>;
    let posicionActual = 0;
    const imgElement = document.getElementById('catalogo2Img');
    
    function actualizarImagen() {
        imgElement.src = imagenesMoto[posicionActual];
        imgElement.alt = "Moto clásica vista " + (posicionActual + 1);
    }
    
    function imgAtras(e) {
        if(e) e.preventDefault();
        posicionActual = (posicionActual === 0) ? imagenesMoto.length - 1 : posicionActual - 1;
        actualizarImagen();
    }
    
    function imgAlante(e) {
        if(e) e.preventDefault();
        posicionActual = (posicionActual === imagenesMoto.length - 1) ? 0 : posicionActual + 1;
        actualizarImagen();
    }
    
    document.getElementById('catalogo2FlechaI').addEventListener('click', imgAtras);
    document.getElementById('catalogo2FlechaD').addEventListener('click', imgAlante);
    
    // Función para agregar comentarios dinámicamente
    function agregarComentario() {
        const textoComentario = document.getElementById('nuevoComentario').value.trim();
        if (textoComentario === "") {
            alert("Por favor, escribe un comentario antes de publicar.");
            return;
        }
        
        const fechaActual = new Date();
        const fechaFormateada = fechaActual.getDate() + '/' + (fechaActual.getMonth() + 1) + '/' + fechaActual.getFullYear();
        const nombreUsuario = "Visitante " + Math.floor(Math.random() * 1000);
        
        const nuevoComentarioHTML = `
            <div class="comentario-item" style="animation: fadeInUp 0.3s ease-out;">
                <div class="comentario-usuario">
                    <i class="fas fa-user-circle"></i>
                    <span>${escapeHtml(nombreUsuario)}</span>
                    <span class="comentario-fecha"><i class="far fa-clock me-1"></i>${fechaFormateada}</span>
                </div>
                <div class="comentario-texto">
                    ${escapeHtml(textoComentario)}
                </div>
            </div>
        `;
        
        const contenedorComentarios = document.getElementById('comentariosLista');
        contenedorComentarios.insertAdjacentHTML('afterbegin', nuevoComentarioHTML);
        
        // Actualizar contador de comentarios
        const badge = document.querySelector('.comentarios-header .badge');
        const totalComentarios = document.querySelectorAll('.comentario-item').length;
        badge.textContent = totalComentarios;
        
        // Limpiar textarea
        document.getElementById('nuevoComentario').value = "";
        
        // Mostrar mensaje de éxito
        const mensajeExito = document.createElement('div');
        mensajeExito.className = 'alert alert-success mt-2';
        mensajeExito.style.backgroundColor = 'rgba(199, 137, 22, 0.2)';
        mensajeExito.style.color = '#C78916';
        mensajeExito.style.border = 'none';
        mensajeExito.style.borderRadius = '10px';
        mensajeExito.innerHTML = '<i class="fas fa-check-circle me-2"></i>¡Comentario publicado con éxito!';
        document.querySelector('.form-comentario').appendChild(mensajeExito);
        setTimeout(() => mensajeExito.remove(), 3000);
    }
    
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
    
    // Añadir efecto de tecla Enter en el textarea
    document.getElementById('nuevoComentario').addEventListener('keypress', function(e) {
        if (e.key === 'Enter' && e.ctrlKey) {
            e.preventDefault();
            agregarComentario();
        }
    });
</script>
</body>
</html>