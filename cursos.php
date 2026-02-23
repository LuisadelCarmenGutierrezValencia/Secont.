<?php
session_start();

// Validar sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}

$rol = $_SESSION['rol'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Cursos | SECONT</title>
<link rel="icon" href="recursos/imagenes/favicon.png">

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Iconos -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<!-- Owl Carousel -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet">

<style>
:root{
    --verde:#2E7D32;
    --verde-secont:#437e42;
    --naranja:#eda750;
    --gris:#f4f6f6;
}

body{
    background:var(--gris);
    font-family:Arial,sans-serif;
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

.courses-thumb{
    background:#fff;
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 6px 30px rgba(0,0,0,.15);
}

.courses-image video{
    width:100%;
    height:350px;
    object-fit:cover;
}

.courses-detail{
    padding:15px;
}

.courses-detail h3 a{
    color:var(--verde);
    text-decoration:none;
}

.btn-inicio{
    background:var(--verde);
    color:#fff;
    padding:12px 30px;
    border-radius:30px;
    font-weight:bold;
    text-decoration:none;
}

.btn-inicio:hover{
    background:var(--naranja);
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
                <li class="nav-item"><a class="nav-link" href="cursos.php">Cursos Visuales</a></li>

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

<!-- CURSOS -->
<section class="container my-5">
<div class="owl-carousel owl-theme">

<!-- CURSO 1 -->
<div class="item">
<div class="courses-thumb">
    <div class="courses-image">
        <video controls>
            <source src="videos/calibarcion.mp4" type="video/mp4">
        </video>
    </div>
    <div class="courses-detail">
        <h3><a href="#">Solicitudes de calibracion</a></h3>
        <p>Curso práctico en formato video.</p>
    </div>
</div>
</div>

<!-- CURSO 2 -->
<div class="item">
<div class="courses-thumb">
    <div class="courses-image">
        <video controls>
            <source src="videos/video2.mp4" type="video/mp4">
        </video>
    </div>
    <div class="courses-detail">
        <h3><a href="#">Selección y verificación</a></h3>
        <p>Capacitación visual paso a paso.</p>
    </div>
</div>
</div>

<!-- CURSO 3 -->
<div class="item">
<div class="courses-thumb">
    <div class="courses-image">
        <video controls>
            <source src="videos/calibarcion.mp4" type="video/mp4">
        </video>
    </div>
    <div class="courses-detail">
        <h3><a href="#">Solicitudes de calibracion</a></h3>
        <p>Curso practico.</p>
    </div>
</div>
</div>

</div>

<div class="text-center mt-5">
    <a href="index.php" class="btn-inicio">
        <i class="fa fa-home"></i> Volver a Inicio
    </a>
</div>
</section>

<!-- SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:30,
    nav:true,
    responsive:{
        0:{items:1},
        768:{items:2},
        992:{items:3}
    }
});
</script>

</body>
</html>

