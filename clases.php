<?php
    
    require_once 'php/validar_sesion.php';
    require_once 'validar_rol.php';
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases - Gym</title>
    <link rel="stylesheet" href="style-clases.css">
</head>
<body>
    <!-- Header -->
    <header>
    
        <div class='bx bx-menu' id="menu"></div>  
        <ul class="navbar">    
            <li><a href="index.php#inicio">INICIO</a></li>
            <li><a href="index.php">CLASES</a></li>
            <a href="index.php" class="logo"><span>Fitness</span>Plus</a>
            <li><a href="index.php#entrenamiento">ENTRENAMIENTO</a></li>
            <li><a href="usuarioperfil.php">PERFIL</a></li>
            <li><a href="php/cerrar_sesion.php">CERRAR SESION</a></li>
        </ul>
            

    </header>

    <section class="hero-section">
        <div class="hero-image" style="background-image: url('img/image\ 15.jpg');">
            <h1 class="hero-title">CLASES</h1>
        </div>
    </section>

    <section class="class-section">
        <!-- Clase CYCLA -->
        <div class="class-container">
            
            <div class="class-image">
                <img src="img/image 27.jpg" alt="Cycla Class">
            </div>
            <div class="class-info">
                <h2>CYCLA</h2>
                <p>45 MIN DE CARDIO</p>
                <p>Clases en las que la música es tu paisaje y la bici tu mejor aliado para recorrerlo. Una rumba asegurada. Enfocadas en trabajo cardiovascular.</p>
                <p class="highlight">¿QUÉ NECESITAS?</p>
                <p>Bicicleta</p>
                
                <!-- Botón Confirmar -->
                <div class="confirm-btn-container">
                    <a href="ReservaClase.php" class="confirm-btn">RESERVA YA</a>
                </div>
            </div>
        </div>

        <!-- Clase CARDIO -->
        <div class="class-container">
            <div class="class-image">
                <img src="img/image 28.jpg" alt="Cardio Class">
            </div>
            <div class="class-info">
                <h2>CARDIO</h2>
                <p>50 MIN: 50% DE FUERZA Y 50% DE CARDIO</p>
                <p>Clases en las que trabajarás 50% cardio en bandas y 50% fuerza en el piso. Aquí la música será tu oxígeno para impulsarte a dar un 100% y recargarte de la mejor energía.</p>
                <p class="highlight">¿QUÉ USAMOS?</p>
                <p>Una banda para correr y hacer trabajos de velocidad, trineo y paracaídas. También tendrás un bench con mancuernas, nudillos y más para tener el entrenamiento perfecto de fuerza.</p>
                <!-- Botón Confirmar -->
                <div class="confirm-btn-container">
                    <a href="ReservaClase.php" class="confirm-btn">RESERVA YA</a>
                </div>
            </div>
        </div>

        <!-- Clase MOVILITY -->
        <div class="class-container">
            <div class="class-image">
                <img src="img/image 29.jpg" alt="Movility Class">
            </div>
            <div class="class-info">
                <h2>MOVILITY</h2>
                <p>50 MINUTOS DE MOVILIDAD</p>
                <p>Clases enfocadas en movilidad, coordinación, equilibrio y elasticidad. Son el descanso perfecto para un Rockstar que no puede quedarse quieto. Están enfocadas en la recuperación muscular. Movilidad de alta intensidad + Vibración.</p>
                <p class="highlight">¿QUÉ USAMOS?</p>
                <p>Bandas de resistencia</p>
                <!-- Botón Confirmar -->
                <div class="confirm-btn-container">
                    <a href="ReservaClase.php" class="confirm-btn">RESERVA YA</a>
                </div>
            </div>
        </div>

        <!-- Clase REDUCE -->
        <div class="class-container">
            <div class="class-image">
                <img src="img/image 30.png" alt="Reduce Class">
            </div>
            <div class="class-info">
                <h2>REDUCE</h2>
                <p>50 MINUTOS DE TONIFICACIÓN</p>
                <p>Clases de fortalecimiento que mezclan diversas disciplinas como el funcional, pilates, barre y HIIT. En estas clases vas a poder sentir cada uno de tus músculos arder y eso te lo aseguramos. Enfocadas en fuerza y tono.</p>
                <p class="highlight">¿QUÉ USAMOS?</p>
                <p>Mancuernas, bandas</p>
                <!-- Botón Confirmar -->
                <div class="confirm-btn-container">
                    <a href="ReservaClase.php" class="confirm-btn">RESERVA YA</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section about">
                <h2><span>Fitness</span>Plus</h2>
                <p>
                    En FitnessPlus, ofrecemos entrenamiento de calidad para que puedas alcanzar tus objetivos de salud y fitness. ¡Únete a nosotros y comienza tu transformación hoy mismo!
                </p>
                <div class="contact">
                    <span><i class='bx bxs-phone'></i> +57 123 456 789</span>
                    <span><i class='bx bxs-envelope'></i> info@fitnessplus.com</span>
                </div>
                <div class="socials">
                    <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                    <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-linkedin-square'></i></a>
                </div>
            </div>
    
            <div class="footer-section links">
                <h2>Enlaces Rápidos</h2>
                <ul>
                    <li><a href="index.php#inicio">Inicio</a></li>
                    <li><a href="index.php#clases">Clases</a></li>
                    <li><a href="index.php#entrenamiento">Entrenamiento</a></li>
                    <li><a href="usuarioperfil.php">Perfil</a></li>
                </ul>
            </div>
    
            <div class="footer-section contact-form">
                <h2>Contáctanos</h2>
                <form action="#">
                    <input type="email" name="email" class="text-input contact-input" placeholder="Tu Email...">
                    <textarea rows="4" name="message" class="text-input contact-input" placeholder="Tu Mensaje..."></textarea>
                    <button type="submit" class="btn">Enviar</button>
                </form>
            </div>
        </div>
    
        <div class="footer-bottom">
            &copy; 2024 FitnessPlus | Todos los derechos reservados
        </div>
    </footer>
</div>

</body>
</html>
