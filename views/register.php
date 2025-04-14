<?php

require_once __DIR__ . '/../controllers/auth_controller.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $dni = $_POST["dni"];
    $password = $_POST["password"];

    $exito = registerUser($nombre, $apellido, $email, $telefono, $dni, $password);

    if ($exito) {
        $mensaje = "✅ Usuario registrado correctamente. <a href='login.php'>Iniciar sesión</a>";
        $claseMensaje = "mensaje-exito";
    } else {
        $mensaje = "❌ Hubo un error al registrar el usuario.";
        $claseMensaje = "mensaje-error";
    }
}
?>
<?php if (!empty($mensaje)): ?>
    <div id="mensaje" class="<?php echo $claseMensaje; ?>">
        <?php echo $mensaje; ?>
    </div>
<?php endif; ?>

<!-- Form -->
<style>
    .mensaje-exito {
        background-color: #d4edda;
        color: #155724;
        padding: 10px 15px;
        border: 1px solid #c3e6cb;
        border-radius: 4px;
        margin-bottom: 15px;
        text-align: center;
        font-weight: bold;
    }

    .mensaje-error {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px 15px;
        border: 1px solid #f5c6cb;
        border-radius: 4px;
        margin-bottom: 15px;
        text-align: center;
        font-weight: bold;
    }
</style>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-light bg-light px-4">
    <a class="navbar-brand" href="../index.php">
        <img src="../public/images/logo.png" width="40" class="d-inline-block align-top" alt="">
        Consultorio Salud Total
    </a>
</nav>

<div class="container mt-5" style="max-width: 500px;">
    <h3 class="text-center mb-4">Crear una cuenta</h3>
    <form action="register.php" method="POST">
        <div class="row g-2">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="row g-2">
            <div class="col-md-6 mb-3">
                <label class="form-label">Teléfono</label>
                <input type="text" class="form-control" name="telefono" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Registrarme</button>
        <div class="mt-3 text-center">
            <a href="login.php">¿Ya tenés cuenta? Iniciá sesión</a>
        </div>
    </form>
</div>

</body>
</html>
<script>
    setTimeout(function() {
        var mensaje = document.getElementById("mensaje");
        if (mensaje) {
            mensaje.style.display = "none";
        }
    }, 4000); // 4 segundos
</script>