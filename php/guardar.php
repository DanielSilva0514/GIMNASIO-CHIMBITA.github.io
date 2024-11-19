<?php
    session_start();
    include 'conexion_be.php';

    $id_user = $_SESSION['usuario'];
    $idusuario="SELECT correo FROM usuarios WHERE correo = '$id_user'";
    $id_usuario=$conexion->query($idusuario);
    $row = $id_usuario->fetch_assoc();
    $correo = $row['correo'];

    $select_location = $_POST['select-location'];
    $select_day = $_POST['select-day'];
    $select_time = $_POST['select-time'];
    $select_clase = $_POST['select-clase'];

    
    
    $guardar_reserva = "INSERT INTO reservas_clase (id_clases,correo, id_sedes, id_dias, id_horas) VALUES ('$select_clase','$correo', '$select_location', '$select_day', '$select_time')";
    $ejectuar_guardar = mysqli_query($conexion, $guardar_reserva);
    header("location:../index.php");

?>