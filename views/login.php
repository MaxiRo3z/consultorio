<?php
require_once __DIR__ . '/../controllers/auth_controller.php';

$mensaje = "";
$claseMensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $exito = loginUser($email, $password);

    if ($exito) {
        // Redirección correcta
        if ($_SESSION['es_admin']) {
            header("Location: dashboard_admin.php");
            exit;  // Es importante salir después de redirigir
        } elseif ($_SESSION['es_medico']) {
            header("Location: dashboard_medico.php");
            exit;
        } else {
            header("Location: dashboard_paciente.php");
            exit;
        }
    } else {
        $mensaje = "❌ Credenciales incorrectas.";
        $claseMensaje = "mensaje-error";
    }
}
?>
<?php if (!empty($mensaje)): ?>
    <div id="mensaje" class="<?php echo $claseMensaje; ?>">
        <?php echo $mensaje; ?>
    </div>
<?php endif; ?>
<!--Form-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-light bg-light px-4">
    <a class="navbar-brand" href="../index.php">
        <img src="../public/images/logo.png" width="40" class="d-inline-block align-top" alt="">
        Consultorio Salud Total
    </a>
</nav>

<div class="container mt-5" style="max-width: 400px;">
    <h3 class="text-center mb-4">Iniciar Sesión</h3>
    <form action="login.php" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        <div class="mt-3 text-center">
            <a href="register.php">¿No tenés cuenta? Registrate</a>
        </div>
    </form>
</div>

<!-- Bootstrap JS (opcional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    setTimeout(function() {
        var mensaje = document.getElementById("mensaje");
        if (mensaje) {
            mensaje.style.display = "none";
        }
    }, 4000);
</script>
</body>
</html>