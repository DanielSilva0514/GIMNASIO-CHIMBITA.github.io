<?php
session_start();
$roles_permitidos = ['administrador', 'usuario'];

if(!array_key_exists('rol', $_SESSION) || !in_array($_SESSION['rol'], $roles_permitidos)){
    echo '
        <script>
            alert("No tienes permisos para acceder a esta pagina");
            window.location="registro.php";
        </script>
    ';
    session_destroy();
    die();
    
}
?>