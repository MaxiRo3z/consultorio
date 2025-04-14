<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Consultorio Médico</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .hero {
      background: #e3f2fd;
      padding: 60px 0;
      text-align: center;
    }
    .section-title {
      margin-top: 60px;
      margin-bottom: 30px;
    }
    footer {
      margin-top: 60px;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">
        <img src="static/img/logo.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top me-2">
        Consultorio Médico
      </a>
      <div class="ms-auto">
        <a href="views\login.php" class="btn btn-outline-primary me-2">Iniciar sesión</a>
        <a href="views\register.php" class="btn btn-primary">Registrarse</a>
      </div>
    </div>
  </nav>

  <!-- Hero -->
  <section class="hero">
    <div class="container">
      <h1 class="display-5">Bienvenido al Consultorio Médico</h1>
      <p class="lead">Atención de calidad, compromiso con tu salud y profesionales de confianza.</p>
    </div>
  </section>

  <!-- Médicos -->
  <section class="container">
    <h2 class="section-title text-center">Nuestros Médicos</h2>
    <div class="row text-center">
      <div class="col-md-4 mb-4">
        <img src="static/img/medico1.jpg" class="rounded-circle mb-2" width="120" height="120" alt="Médico 1">
        <h5>Dr. Juan Pérez</h5>
        <p>Clínica Médica</p>
      </div>
      <div class="col-md-4 mb-4">
        <img src="static/img/medico2.jpg" class="rounded-circle mb-2" width="120" height="120" alt="Médico 2">
        <h5>Dra. Laura Martínez</h5>
        <p>Pediatría</p>
      </div>
      <div class="col-md-4 mb-4">
        <img src="static/img/medico3.jpg" class="rounded-circle mb-2" width="120" height="120" alt="Médico 3">
        <h5>Dr. Carlos Gómez</h5>
        <p>Dermatología</p>
      </div>
    </div>
  </section>

  <!-- Por qué elegirnos -->
  <section class="bg-light py-5">
    <div class="container">
      <h2 class="section-title text-center">¿Por qué elegirnos?</h2>
      <div class="row">
        <div class="col-md-4">
          <h5>✔ Atención personalizada</h5>
          <p>Nos enfocamos en tus necesidades individuales para ofrecerte la mejor atención.</p>
        </div>
        <div class="col-md-4">
          <h5>✔ Profesionales calificados</h5>
          <p>Contamos con un equipo médico con años de experiencia y formación continua.</p>
        </div>
        <div class="col-md-4">
          <h5>✔ Tecnología moderna</h5>
          <p>Utilizamos herramientas de última generación para un diagnóstico más preciso.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contacto -->
  <section class="container py-5">
    <h2 class="section-title text-center">Contacto</h2>
    <div class="row">
      <div class="col-md-6">
        <h5>Dirección:</h5>
        <p>Calle Salud 123, Ciudad Médica</p>

        <h5>Teléfono:</h5>
        <p>(011) 1234-5678</p>

        <h5>Email:</h5>
        <p>consultorio@salud.com</p>
      </div>
      <div class="col-md-6">
        <h5>Formulario de contacto:</h5>
        <form>
          <div class="mb-2">
            <input type="text" class="form-control" placeholder="Nombre">
          </div>
          <div class="mb-2">
            <input type="email" class="form-control" placeholder="Correo electrónico">
          </div>
          <div class="mb-2">
            <textarea class="form-control" placeholder="Mensaje" rows="3"></textarea>
          </div>
          <button class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-primary text-white text-center py-3">
    &copy; <?= date("Y") ?> Consultorio Médico. Todos los derechos reservados.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

