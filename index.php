<?php
    
    require_once 'php/validar_sesion.php';
    require_once 'validar_rol.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Gimansio_Chimbita
    </title>
    <link rel="stylesheet" href="style-principal.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header>

        <div class='bx bx-menu' id="menu"></div>  
        <ul class="navbar">    
            <li><a href="index.php#inicio">INICIO</a></li>
            <li><a href="index.php#clases">CLASES</a></li>
            <a href="index.php" class="logo"><span>Fitness</span>Plus</a>
            <li><a href="index.php#entrenamiento">ENTRENAMIENTO</a></li>
            <li><a href="usuarioperfil.php">PERFIL</a></li>
            <li><a href="php/cerrar_sesion.php">CERRAR SESION</a></li>
        </ul>

    </header>

    <section class="home" id="inicio">
        <div class="home-content" data-aos="zoom-in">
            <h3>NOT A GYM</h3>
            <h3>A ROCKSTAR </h3>
            <h3>TEMPLE </h3>
            <a href="#entrenamiento" class="button">CONOCE MÁS</a>

        </div>
    </section>

    <section class="services" id="clases">
        <h2 class="heading" data-aos="zoom-in-down">NUESTRAS CLASES</h2>
        <div class="services-content" data-aos="zoom-in-up">
            <div class="row">
                <img src="img/cycla.png" alt="cycla">
                <h4>CYCLA</h4>
            </div>

            <div class="row">
                <img src="img/cardio.png" alt="cardio">
                <h4>CARDIO</h4>
            </div>

            <div class="row">
                <img src="img/reduce.png" alt="reduce">
                <h4>REDUCE</h4>
            </div>

            <div class="row">
                <img src="img/movility.png" alt="movilit">
                <h4>MOVILITY</h4>
            </div>
            <a href="clases.php" class="button">ÚNETE YA</a>
        </div>
    </section>
    <section class="train" id="entrenamiento">
        <div class="train-img" data-aos="zoom-in-down">
            <img src="img/personalizado.png" alt="personalizado" srcset="img/personalizado-small.png 480w, img/personalizado-medium.png 768w, img/personalizado.png 1024w">
        </div>

        <div class="train-content" data-aos="zoom-in-down">
            <h2 class="heading">ENTRENAMIENTO PERSONALIZADO</h2>

            <p>En nuestro gimnasio, ofrecemos entrenamiento personalizado para ayudarte a alcanzar tu objetivo, como
                bajar de peso, ganar masa muscular o mejorar tu resistencia cardiovascular. Nuestros entrenadores
                certificados diseñan un plan adaptado a tus necesidades, garantizando resultados efectivos y seguros.
            </p>
            <p>¡Empieza hoy tu transformación con nosotros!</p>

            <a href="ObjetivosDeEntrenamiento.html" class="button">CONOCE MÁS</a>
        </div>
    </section>

    <section class="plans" id="plans">
        <h2 class="heading" data-aos="zoom-in-down"> PLANES</h2>
        <div class="plans-content" data-aos="zoom-in-down">

            <div class="box">
                <h3>BÁSICO</h3>
                <h2><span>$65.000/mes</span></h2>
                <ul>
                    <li>Zona funcional</li>
                    <li>No pagas inscripción ni cuota de mantenimiento.</li>
                </ul>
                <a href="pagos.html">
                    Afíliate ahora
                    <i class='bx bx-right-arrow-alt'></i>
                </a>
            </div>


            <div class="box">
                <h3>VIP</h3>
                <h2><span>$80.000/mes</span></h2>
                <ul>
                    <li>Zona funcional.</li>
                    <li>Acceso a la zona VIP</li>
                    <li>Descuentos con marcas aliadas y beneficios especiales.</li>
                </ul>
                <a href="pagos.html">
                    Afíliate ahora
                    <i class='bx bx-right-arrow-alt'></i>
                </a>
            </div>


            <div class="box">
                <h3>PREMIUM</h3>
                <h2><span>$120.000/mes</span></h2>
                <ul>
                    <li>Zona de masajes.</li>
                    <li>Sin cláusula de permanencia.</li>
                    <li>Entrena gratis con un amigo</li>
                </ul>
                <a href="pagos.html">
                    Afíliate ahora
                    <i class='bx bx-right-arrow-alt'></i>
                </a>
            </div>

        </div>
    </section>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        offset:300,
        duration:1400,
      });
    </script>
    <script>
        const menu = document.getElementById('menu');
        const navbar = document.querySelector('.navbar');
        
        menu.addEventListener('click', () => {
            navbar.classList.toggle('active');
        });
        </script>

</body>
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
</html>