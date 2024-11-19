<?php
    include 'conexion_be.php';
    session_start();

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $query = "INSERT INTO usuarios(nombre_completo,correo,contrasena)VALUES('$nombre_completo','$correo','$contrasena')";

    // VERIFICAR QUE EL CORREO NO SE REPITA EN LA BASE DE DATOS

    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
        <script>
            alert("Este correo ya esta registrado, intenta con otro diferente");
            window.location="../registro.php";
        </script>
                    ';
        exit();
    }
    
    // Insertar el usuario
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");
    $ejecutar = mysqli_query($conexion,$query);

    if($ejecutar){
        echo '
            <script>
                alert("Usuario almacenado exitosamente");
                window.location="../index.php";
            </script>
        ';
    }else {
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    mysqli_close($conexion);
?>