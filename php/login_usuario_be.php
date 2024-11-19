<?php
include 'conexion_be.php';

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Ejecuta la consulta SQL para seleccionar todos los campos de usuarios y el valor del rol
$query = "SELECT usuarios.*, roles.rol 
          FROM usuarios 
          LEFT JOIN roles ON usuarios.rol_id = roles.id 
          WHERE usuarios.correo = '$correo' AND usuarios.contrasena = '$contrasena'";

$result = $conexion->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION['usuario'] = $correo;
    $_SESSION['rol'] = $row['rol'];

    // Redirige según el rol del usuario
    if ($row['rol'] == 'administrador') {
        header("Location: ../ver_agenda.php");
    } else {
        header("Location: ../index.php");
    }
    exit();
} else {
    echo '
        <script>
            alert("Usuario no encontrado, por favor verifique los datos introducidos");
            window.location="../registro.php";
        </script>';
    exit();
}
?>