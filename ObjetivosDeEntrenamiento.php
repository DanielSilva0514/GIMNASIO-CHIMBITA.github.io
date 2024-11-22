<?php
    require_once 'php/validar_sesion.php';
    require_once 'validar_rol.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Programa de Entrenamiento</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style-objetivosdeentrenamiento.css">
</head>

<body>

    <div class="container">
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

        <!-- Main Content -->
        <!-- Section: Bajar de Peso -->
        <section class="section">
            <section class="s-home" id="bajar">

                <h3 class="section-title" >BAJAR DE PESO </h3>
            </section>
            <p class="section-description">La pérdida de peso exitosa no es una solución única para todos; un
                enfoque personalizado te asegura que cada ejercicio y plan nutricional esté diseñado específicamente
                para tus necesidades y metas, maximizando resultados y garantizando un progreso sostenible.</p>
            <div class="main-content"></div>
            <h2 class="benefits-title">BENEFICIOS DEL PROGRAMA</h2>

            <div class="benefits">
                <div class="benefit-item">
                    <h3 class="benefit-title">QUEMA DE CALORIAS EFICIENTE</h3>
                    <p class="benefit-description">Rutinas diseñadas para maximizar la quema de calorías en cada sesión.
                    </p>
                </div>
                <img class="benefit-image" src="img/image 32.png" alt="Quema de Calorías">
            </div>

            <div class="benefits">
                <div class="benefit-item">
                    <h3 class="benefit-title">PLAN NUTRICIONAL PERSONALIZADO</h3>
                    <p class="benefit-description">Guía y asesoramiento en alimentación para acompañar tu entrenamiento.
                    </p>
                </div>
                <img class="benefit-image" src="img/image 35.png" alt="Plan Nutricional">
            </div>

            <div class="benefits">
                <div class="benefit-item">
                    <h3 class="benefit-title">SEGUIMIENTO Y MOTIVACIÓN</h3>
                    <p class="benefit-description">Entrenadores dedicados que monitorean tu progreso y te mantienen
                        motivado.</p>
                </div>
                <img class="benefit-image" src="img/image 36.png" alt="Seguimiento">
            </div>

            <div class="call-to-action">
                <h2 class="cta-title">AGENDA TU ENTRENAMIENTO</h2>
                <a href="Trainers.php" class="button">RESERVA YA</a>
            </div>
        </section>

        <!-- Section: Ganar Masa Muscular -->
        <section class="section">
            <section class="s-home" id="masa">
                <h3 class="section-title">GANAR MASA MUSCULAR</h3>
            </section>
            <p class="section-description">Un enfoque personalizado es esencial para ganar masa muscular de manera
                efectiva, adaptando las rutinas y la nutrición a tus necesidades específicas, maximizando resultados
                y minimizando riesgos.</p>
            <h2 class="benefits-title">BENEFICIOS DEL PROGRAMA</h2>

            <div class="benefits">
                <div class="benefit-item">
                    <h3 class="benefit-title">AUMENTO DE LA FUERZA Y RESISTENCIA</h3>
                    <p class="benefit-description">Te permite levantar pesos más pesados y realizar actividades
                        físicas con mayor facilidad.</p>
                </div>
                <img class="benefit-image" src="img/image 33.png" alt="Aumento de la Fuerza">
            </div>

            <div class="benefits">
                <div class="benefit-item">
                    <h3 class="benefit-title">MEJORA DE LA POSTURA Y EQUILIBRIO</h3>
                    <p class="benefit-description">Fortalecen los músculos estabilizadores, mejorando la postura y
                        ayudando a prevenir lesiones.</p>
                </div>
                <img class="benefit-image" src="img/image 38.png" alt="Mejora de la Postura">
            </div>

            <div class="benefits">
                <div class="benefit-item">
                    <h3 class="benefit-title">TRANSFORMACIÓN FISICA Y ESTETICA</h3>
                    <p class="benefit-description">Tu cuerpo se vuelve más definido y tonificado, logrando una
                        apariencia más atlética y saludable.</p>
                </div>
                <img class="benefit-image" src="img/image 37.png" alt="Transformación Fisica">
            </div>

            <div class="call-to-action">
                <h2 class="cta-title">AGENDA TU ENTRENAMIENTO</h2>
                <a href="Trainers.php" class="button">RESERVA YA</a>
            </div>
        </section>

        <!-- Section: Entrenamiento Cardiovascular -->
        <section class="section">
            <section class="s-home" id="cardio">
                <h3 class="section-title">ENTRENAMIENTO CARDIOVASCULAR</h3>
            </section>
            <p class="section-description">Un enfoque personalizado es crucial para alcanzar tus objetivos de manera
                efectiva y segura. Adaptamos cada sesión a tus necesidades individuales, maximizando resultados y
                minimizando riesgos.</p>

            <h2 class="benefits-title">BENEFICIOS DEL PROGRAMA</h2>

            <div class="benefits">
                <div class="benefit-item">
                    <h3 class="benefit-title">MEJORA LA SALUD DEL CORAZÓN</h3>
                    <p class="benefit-description">Fortalece el corazón, mejora la circulación sanguínea y reduce el
                        riesgo de enfermedades.</p>
                </div>
                <img class="benefit-image" src="img/image 40.png" alt="Salud del Corazón">
            </div>

            <div class="benefits">
                <div class="benefit-item">
                    <h3 class="benefit-title">AUMENTA LA RESISTENCIA</h3>
                    <p class="benefit-description">Aumenta tu capacidad aeróbica, permitiéndote realizar actividades
                        físicas con mayor facilidad y durante más tiempo.</p>
                </div>
                <img class="benefit-image" src="img/image 34.png" alt="Aumenta la Resistencia">
            </div>

            <div class="benefits">
                <div class="benefit-item">
                    <h3 class="benefit-title">QUEMA DE CALORÍAS</h3>
                    <p class="benefit-description">Ayuda a quemar calorías de manera efectiva, contribuyendo al control
                        de peso y a la reducción de grasa corporal.</p>
                </div>
                <img class="benefit-image" src="img/image 39.jpg" alt="Quema de Calorías">
            </div>

            <div class="call-to-action">
                <h2 class="cta-title">AGENDA TU ENTRENAMIENTO</h2>
                <a href="Trainers.php" class="button">RESERVA YA</a>
            </div>
        </section>
    </div>
    <script>
        const menu = document.getElementById('menu');
        const navbar = document.querySelector('.navbar');

        menu.addEventListener('click', () => {
            navbar.classList.toggle('active');
        });
    </script>
        <script>
            AOS.init({
              offset:300,
              duration:1400,
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