<?php
session_start();
require "conexion.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario  = $_POST["usuario"];
    $password = hash("sha256", $_POST["password"]);

    $sql = "
        SELECT u.id, u.usuario, r.nombre AS rol
        FROM usuarios u
        INNER JOIN roles r ON u.rol_id = r.id
        WHERE u.usuario = :usuario AND u.password = :password
    ";

    $stmt = $conexion->prepare($sql);
    $stmt->execute([
        ":usuario" => $usuario,
        ":password" => $password
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Guardar sesión
        $_SESSION["usuario"] = $user["usuario"];
        $_SESSION["rol"] = $user["rol"];

        // Registrar acceso
        $sqlAcceso = "INSERT INTO accesos (usuario_id) VALUES (:id)";
        $stmtAcceso = $conexion->prepare($sqlAcceso);
        $stmtAcceso->execute([
            ":id" => $user["id"]
        ]);

        header("Location: index.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>SECONT | Login</title>
<link rel="icon" href="recursos/imagenes/favicon.png">

<style>
*{box-sizing:border-box;font-family:'Segoe UI',Tahoma,sans-serif}
body{
    margin:0;height:100vh;
    background:linear-gradient(135deg,#f1f3f1,#eef3ee,#d7e1d7);
    display:flex;align-items:center;justify-content:center
}
.login-card{
    background:#fff;width:360px;padding:30px;border-radius:14px;
    box-shadow:0 20px 45px rgba(0,0,0,.25);text-align:center
}
.login-card img{width:95px;margin-bottom:10px}
.login-header{
    background:linear-gradient(135deg,#2e7d32,#43a047);
    padding:15px;border-radius:10px;margin-bottom:25px
}
.login-header h2{margin:0;color:#fff}
.login-header p{margin:5px 0 0;color:#e8f5e9;font-size:14px}
input{
    width:100%;padding:12px;margin-bottom:15px;
    border-radius:8px;border:1px solid #ccc
}
button{
    width:100%;padding:12px;background:#ff9800;
    color:#fff;border:none;border-radius:8px;cursor:pointer
}
button:hover{background:#f57c00}
.error{color:red;font-size:14px;margin-bottom:10px}
.footer{margin-top:20px;font-size:13px;color:#888}
</style>
</head>

<body>

<div class="login-card">
    <img src="recursos/imagenes/image.png" alt="SECONT">

    <div class="login-header">
        <h2>SECONT</h2>
        <p>Acceso al sistema de capacitación</p>
    </div>

    <?php if($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Iniciar sesión</button>
    </form>

    <div class="footer">© 2026 SECONT</div>
</div>

</body>
</html>
