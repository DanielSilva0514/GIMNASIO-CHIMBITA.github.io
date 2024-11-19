<?php
    
    include 'conexion_be.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $query="SELECT usuarios.*,roles.rol as rol FROM usuarios left join roles ON usuarios.rol_id = roles.id WHERE correo = '$correo' and contrasena = '$contrasena'";
    $result = $conexion->query($query);
    $row = $result->fetch_assoc();


    if($result->num_rows > 0){
        
        session_start();
        $_SESSION['usuario'] = $correo;
        $_SESSION['rol'] = $row['rol'];
        header("location:../index.php");}else{
            echo '
                <script>
                    alert("Usuario no encontrado, por favor verifique los datos introducidos");
                    window.location="../registro.php";
                </script>';
            header("location:../registro.php");
        }

    



?>