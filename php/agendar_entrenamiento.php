<?php
session_start();
include('conexion_be.php');

// Verifica que la sesión contiene el correo del usuario
if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])) {
    die("Error: La sesión no contiene el correo del usuario.");
}

$id_user = $_SESSION['usuario'];
echo "Correo de usuario desde la sesión: " . $id_user;

// Consulta para obtener el ID del usuario basado en el correo
$query_usuario = "SELECT id FROM usuarios WHERE correo = '$id_user'";
$resultado = $conexion->query($query_usuario);

if (!$resultado) {
    die("Error en la consulta: " . $conexion->error); // Verifica errores en la consulta
}

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $usuario_id = $row['id'];
    echo "Usuario ID obtenido: $usuario_id"; // Depuración
} else {
    die("Error: No se encontró el usuario en la base de datos para el correo: $id_user");
}


$select_trainer = $_POST['select-trainer'];
$select_day = $_POST['select-day'];
$select_time = $_POST['select-time'];
$select_clase = $_POST['select-clase'];

// Depuración para verificar que se recibe el valor de entrenador correctamente
if (empty($select_trainer)) {
    echo "No se seleccionó un entrenador. El valor de 'entrenador' está vacío.";
    exit();
}

// Ahora insertamos los datos correctamente
$guardar_agendamiento = "INSERT INTO agendamientos (usuario_id, entrenador_id, dia_id, hora, tipo_entrenamiento) 
                         VALUES ('$usuario_id', '$select_trainer', '$select_day', '$select_time', '$select_clase')";
$ejectuar_guardar = mysqli_query($conexion, $guardar_agendamiento);

// Verificar si la inserción fue exitosa
if ($ejectuar_guardar) {
    header("Location: ../index.php?mensaje=Agendamiento+realizado+correctamente");
} else {
    header("Location: ../personal_trainer.php?mensaje=Error+al+agendar");
}
exit(); // Detenemos la ejecución después de la redirección
?>
