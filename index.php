<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}
$rol = $_SESSION["rol"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SECONT | Capacitación</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href="recursos/imagenes/favicon.png">

    <style>
        :root {
            --verde-secont: #437e42;
            --naranja-secont: #eda750;
        }

        .navbar-secont { background-color: var(--verde-secont) !important; }
        .navbar-dark .nav-link, .navbar-dark .navbar-brand { color: #fff !important; }

        /* Estilos para el logo interactivo */
        .logo-link {
            transition: transform 0.3s ease, filter 0.3s ease;
            cursor: pointer;
            display: inline-block;
        }

        .logo-link:hover {
            transform: scale(1.1) rotate(-2deg);
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
        }

        .logo-link:active {
            transform: scale(0.95);
        }

        .logo-img {
            transition: transform 0.2s ease;
        }

        .btn-primary {
            background-color: var(--naranja-secont);
            border-color: var(--naranja-secont);
        }
        .btn-primary:hover {
            background-color: #e67600;
            border-color: #e67600;
        }

        .text-primary, .bi { color: var(--naranja-secont) !important; }
        .bg-primary { background-color: var(--naranja-secont) !important; }
        footer.bg-dark { background-color: var(--verde-secont) !important; }

        /* Animación de rebote para los iconos */
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-15px);
            }
        }

        @keyframes scaleHover {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.15);
            }
            100% {
                transform: scale(1);
            }
        }

        /* Estilos para los iconos de "Por qué capacitarse" */
        .icon-card {
            padding: 30px;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            cursor: pointer;
        }

        .icon-card i {
            display: inline-block;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            color: var(--verde-secont);
            margin-bottom: 15px;
        }

        .icon-card:hover {
            background-color: rgba(67, 126, 66, 0.1);
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(67, 126, 66, 0.2);
        }

        .icon-card:hover i {
            animation: scaleHover 0.6s ease-in-out;
            color: var(--naranja-secont);
            filter: drop-shadow(0 4px 8px rgba(237, 167, 80, 0.3));
        }

        .icon-card h5 {
            color: var(--negro-secont);
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .icon-card:hover h5 {
            color: var(--naranja-secont);
        }

        /* Botón flotante hacia arriba */
        #botonArriba {
            display: none;
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, var(--verde-secont) 0%, #2d5f2c 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(67, 126, 66, 0.25);
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            z-index: 999;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
        }

        #botonArriba:hover {
            background: linear-gradient(135deg, #2d5f2c 0%, #1f4620 100%);
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(67, 126, 66, 0.35);
        }

        #botonArriba:active {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(67, 126, 66, 0.25);
        }

        #botonArriba::before {
            content: "";
            display: inline-block;
            width: 5px;
            height: 5px;
            border-top: 1.5px solid white;
            border-right: 1.5px solid white;
            transform: rotate(-45deg) translateY(3px);
        }

        @media (max-width: 768px) {
            #botonArriba {
                bottom: 20px;
                right: 20px;
                width: 40px;
                height: 40px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-secont">
    <div class="container">
        <a class="navbar-brand fw-bold logo-link" href="index.php" title="Volver al inicio">
            <img src="recursos/imagenes/image.png" height="60" alt="Logo SECONT" class="logo-img">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="recursos/cursos.php">Cursos Visuales</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        Capacitación
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                    <a class="dropdown-item" href="recursos/paginas/CapacitacionCursos.php">
                        Requisitos del Proceso
                    </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="bg-light py-5 text-center">
    <div class="container">
        <h1 class="fw-bold">Capacitación para nuevos trabajadores</h1>
        <p class="lead mt-3">
            Formación clara, segura y eficiente para una integración exitosa en SECONT
        </p>
        <a href="recursos/cursos.php" class="btn btn-primary btn-lg mt-3">Ver cursos</a>
    </div>
</section>

<!-- POR QUÉ -->
<section class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">¿Por qué capacitarse en SECONT?</h2>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="icon-card">
                    <i class="bi bi-person-check fs-1"></i>
                    <h5>Integración rápida</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="icon-card">
                    <i class="bi bi-shield-check fs-1"></i>
                    <h5>Seguridad laboral</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="icon-card">
                    <i class="bi bi-gear fs-1"></i>
                    <h5>Procesos claros</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="icon-card">
                    <i class="bi bi-graph-up fs-1"></i>
                    <h5>Mejor desempeño</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-light py-5">
    <div class="container">

        <div class="row text-center mb-4">
            <h2 class="fw-bold">Cursos de Capacitación</h2>
        </div>

        <!-- FILA 1: 3 TARJETAS -->
        <div class="row g-4 justify-content-center mb-4">

            <div class="col-md-4 col-lg-3">
                <a href="recursos/paginas/CapacitacionCursos.php" class="btn btn-light w-100 h-100 d-flex flex-column align-items-center justify-content-center p-4 text-decoration-none">
                    <i class="bi bi-building fs-1"></i>
                    <h5 class="mt-3">Inducción</h5>
                    <p>Historia, valores y objetivos de la empresa.</p>
                </a>
            </div>

            <div class="col-md-4 col-lg-3">
                <a href="recursos/paginas/CapacitacionCursos.php" class="btn btn-light w-100 h-100 d-flex flex-column align-items-center justify-content-center p-4 text-decoration-none">
                    <i class="bi bi-exclamation-triangle fs-1"></i>
                    <h5 class="mt-3">Higiene y Seguridad</h5>
                    <p>Normas y prevención de riesgos.</p>
                </a>
            </div>

            <div class="col-md-4 col-lg-3">
                <a href="recursos/paginas/CapacitacionCursos.php" class="btn btn-light w-100 h-100 d-flex flex-column align-items-center justify-content-center p-4 text-decoration-none">
                    <i class="bi bi-diagram-3 fs-1"></i>
                    <h5 class="mt-3">Sistema de Gestión</h5>
                    <p>Procedimientos del sistema de gestión.</p>
                </a>
            </div>

        </div>

        <!-- FILA 2: 2 TARJETAS -->
        <div class="row g-4 justify-content-center">

            <div class="col-md-4 col-lg-3">
                <a href="recursos/paginas/CapacitacionCursos.php" class="btn btn-light w-100 h-100 d-flex flex-column align-items-center justify-content-center p-4 text-decoration-none">
                    <i class="bi bi-tools fs-1"></i>
                    <h5 class="mt-3">Procedimientos Técnicos</h5>
                    <p>Uso correcto de herramientas y tareas.</p>
                </a>
            </div>

            <div class="col-md-4 col-lg-3">
                <a href="recursos/paginas/CapacitacionCursos.php" class="btn btn-light w-100 h-100 d-flex flex-column align-items-center justify-content-center p-4 text-decoration-none">
                    <i class="bi bi-cart-check fs-1"></i>
                    <h5 class="mt-3">Procesos Comerciales</h5>
                    <p>Gestión comercial y atención al cliente.</p>
                </a>
            </div>

        </div>

    </div>
</section>

<!-- METODOLOGÍA -->
<section class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Metodología de capacitación</h2>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="icon-card">
                    <i class="bi bi-play-circle fs-1"></i>
                    <h5>Videos explicativos</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="icon-card">
                    <i class="bi bi-image fs-1"></i>
                    <h5>Material visual</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="icon-card">
                    <i class="bi bi-file-text fs-1"></i>
                    <h5>Guías prácticas</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="icon-card">
                    <i class="bi bi-clipboard-check fs-1"></i>
                    <h5>Evaluaciones básicas</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CTA -->
<section class="bg-primary text-white text-center py-5">
    <h2 class="fw-bold">Comienza tu capacitación hoy</h2>
    <a href="recursos/paginas/CapacitacionCursos.php" class="btn btn-light btn-lg mt-3">
        Iniciar capacitación
    </a>
</section>

<footer class="bg-dark text-white text-center py-3">
    © 2026 SECONT. Todos los derechos reservados.
</footer>

<!-- Botón flotante hacia arriba -->
<button id="botonArriba" onclick="scrollAlTop()" title="Volver al inicio"></button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Mostrar/ocultar botón flotante según scroll
window.addEventListener('scroll', () => {
    const boton = document.getElementById('botonArriba');
    if (window.pageYOffset > 300) {
        boton.style.display = 'flex';
    } else {
        boton.style.display = 'none';
    }
});

// Scroll suave hacia arriba
function scrollAlTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}
</script>
</body>
</html>

