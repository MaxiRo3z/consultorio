<?php
// Verificamos si el usuario está logueado y es admin
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'admin') {
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../public/css/estilos.css"> <!-- tu CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <div class="d-flex">
      <a href="logout.php" class="btn btn-outline-light">Cerrar sesión</a>
    </div>
  </div>
</nav>

<!-- Contenido principal -->
<div class="container mt-5">
    <h1 class="mb-4">Bienvenido, <?php echo $_SESSION['usuario']; ?> 👋</h1>

    <div class="row">
        <!-- Gestión de usuarios -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h5 class="card-title">Usuarios</h5>
                    <p class="card-text">Ver, editar y eliminar usuarios.</p>
                    <a href="admin_usuarios.php" class="btn btn-primary">Gestionar</a>
                </div>
            </div>
        </div>

        <!-- Gestión de médicos -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h5 class="card-title">Médicos</h5>
                    <p class="card-text">Administrar médicos registrados.</p>
                    <a href="admin_medicos.php" class="btn btn-success">Gestionar</a>
                </div>
            </div>
        </div>

        <!-- Gestión de turnos -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h5 class="card-title">Turnos</h5>
                    <p class="card-text">Controlar turnos reservados.</p>
                    <a href="admin_turnos.php" class="btn btn-warning">Gestionar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Puedes agregar más secciones aquí -->

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>