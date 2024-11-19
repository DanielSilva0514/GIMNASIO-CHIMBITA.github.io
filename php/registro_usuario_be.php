<?php
include 'conexion_be.php';
session_start();

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Verificar que el correo no se repita en la base de datos
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");

if (mysqli_num_rows($verificar_correo) > 0) {
    echo '
    <script>
        alert("Este correo ya está registrado, intenta con otro diferente");
        window.location = "../registro.php";
    </script>
    ';
    exit();
}

// Insertar el usuario
$query = "INSERT INTO usuarios(nombre_completo, correo, contrasena) VALUES ('$nombre_completo', '$correo', '$contrasena')";
$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
    <script>
        alert("Usuario almacenado exitosamente");
        window.location = "../index.php";
    </script>
    ';
} else {
    die("Error en la consulta: " . mysqli_error($conexion));
}

mysqli_close($conexion);
?>