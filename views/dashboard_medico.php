<?php
session_start();
require_once '../config/conexion.php'; // Ajusta la ruta a tu conexión

$medico_id = $_SESSION['medico_id'] ?? null;

if (!$medico_id) {
    echo json_encode([]);
    exit;
}

$sql = "SELECT t.fecha, t.hora, t.estado, p.nombre AS paciente 
        FROM turnos t 
        LEFT JOIN pacientes p ON t.paciente_id = p.id 
        WHERE t.medico_id = ? 
        ORDER BY t.fecha, t.hora";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $medico_id);
$stmt->execute();
$result = $stmt->get_result();

$turnos = [];
while ($row = $result->fetch_assoc()) {
    $turnos[] = $row;
}

header('Content-Type: application/json');
echo json_encode($turnos);
?>
<?php
// Asegúrate de tener validación de sesión y que sea médico aquí
session_start();
$nombre = $_SESSION['nombre'] ?? 'Médico';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Médico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Consultorio</a>
            <div class="d-flex">
                <span class="navbar-text text-white me-3">Hola, Dr. <?php echo htmlspecialchars($nombre); ?></span>
                <a href="../logout.php" class="btn btn-light btn-sm">Cerrar sesión</a>
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <div class="container mt-4">
        <h2 class="mb-4">Panel de Control del Médico</h2>

        <!-- Formulario para cargar disponibilidad -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">Cargar Horario de Atención</div>
            <div class="card-body">
                <form action="../controllers/horarioController.php" method="POST">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Día</label>
                            <select class="form-select" name="dia" required>
                                <option value="">Seleccione...</option>
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miércoles">Miércoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Hora de Inicio</label>
                            <input type="time" name="hora_inicio" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Hora de Fin</label>
                            <input type="time" name="hora_fin" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Duración por turno (min)</label>
                            <input type="number" name="duracion" class="form-control" min="10" max="120" step="5" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Guardar Horario</button>
                </form>
            </div>
        </div>

        <!-- Lista de horarios cargados -->
        <div class="card">
            <div class="card-header bg-info text-white">Horarios Registrados</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Día</th>
                            <th>Desde</th>
                            <th>Hasta</th>
                            <th>Duración</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí vas a imprimir los horarios desde la BD -->
                        <tr>
                            <td colspan="4" class="text-center">Aún no hay horarios cargados.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header bg-secondary text-white">Turnos</div>
            <div class="card-body" id="contenedor-turnos">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Paciente</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-turnos">
                        <!-- Se llenará por JavaScript con fetch/AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
    function cargarTurnos() {
        fetch('../controllers/get_turnos.php')
            .then(res => res.json())
            .then(data => {
                const tabla = document.getElementById("tabla-turnos");
                tabla.innerHTML = "";

                if (data.length === 0) {
                    tabla.innerHTML = `<tr><td colspan="4" class="text-center">Sin turnos aún.</td></tr>`;
                    return;
                }

                data.forEach(turno => {
                    tabla.innerHTML += `
                        <tr>
                            <td>${turno.fecha}</td>
                            <td>${turno.hora}</td>
                            <td>${turno.paciente || 'Disponible'}</td>
                            <td>${turno.estado}</td>
                        </tr>
                    `;
                });
            });
    }

    // Cargar al inicio y cada 10 segundos
    cargarTurnos();
    setInterval(cargarTurnos, 10000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>