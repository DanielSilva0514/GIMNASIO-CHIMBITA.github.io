<?php

    session_start();
    
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>
        Gimansio_Chimbita
    </title>
    <link rel="stylesheet" href="style-registro.css">
</head>

<body>
    <main>
        <div class="contenedor__todo">

            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesion para entrar</p>
                    <button id="btn__iniciar-sesion">Iniciar sesion</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aun no tienes una cuenta?</h3>
                    <p>Registrate para que puedas iniciar sesion</p>
                    <button id="btn__registrarse">Registrarse</button>
                </div>
            </div>

            
            <!--FORMULARIO LOGIN Y REGISTRO-->
            <div class="contenedor__login-register">

                <!--LOGIN-->
                <form action="php/login_usuario_be.php" method="POST" class="formulario__login">
                    <h2>Iniciar Sesion</h2>
                    <input type="text" placeholder="Correo Electronico" name="correo">
                    <input type="password" placeholder="Contrasena" name="contrasena">
                    <button>Entrar</button>
                </form>


                <!--REGISTRO-->
                <form action="php/registro_usuario_be.php" method="POST" class="formulario__register">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombre Completo" name="nombre_completo">
                    <input type="text" placeholder="Correo Electronico" name="correo">
                    <input type="password" placeholder="Contrasena" name="contrasena">
                    <button>Registrase</button>
                </form>
            </div>


        </div>
    </main>
    <script src="JS/script.js"></script>
</body>

</html>
