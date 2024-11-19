<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("location: ../registro.php");
        exit();
    }
?>