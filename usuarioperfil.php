<?php
    
    include ('php/conexion_be.php');
    

    require_once 'php/validar_sesion.php';
    require_once 'validar_rol.php';

    $id_user = $_SESSION['usuario'];
    $sql="SELECT id,nombre_completo, correo FROM usuarios WHERE correo = '$id_user'";
    $resultado=$conexion->query($sql);
    $row = $resultado->fetch_assoc();

    // Consulta para unir las tablas y obtener datos de sedes, días y horas
    $reservaciones = "SELECT sedes.sedes AS sede, dias.dias AS dia, horas.horas AS hora, clases_tipo.clases AS entrenamiento
                        FROM reservas_clase 
                        INNER JOIN sedes ON reservas_clase.id_sedes = sedes.id
                        INNER JOIN dias ON reservas_clase.id_dias = dias.id
                        INNER JOIN horas ON reservas_clase.id_horas = horas.id
                        INNER JOIN clases_tipo ON reservas_clase.id_clases = clases_tipo.id
                        WHERE reservas_clase.correo = '$id_user'
    ";

    $resultado_reservaciones = $conexion->query($reservaciones);

    if (!$resultado_reservaciones) {
        echo "Error en la consulta: " . $conexion->error;
        die();
    }
    
    $entrenamiento_personalizado = "SELECT agendamientos.hora AS hora, dias.dias AS dia, entrenadores.nombre AS entrenador, tipo_entrenamiento.nombre AS tipo_entrenamiento
    FROM agendamientos
    INNER JOIN dias ON agendamientos.dia_id = dias.id
    INNER JOIN entrenadores ON agendamientos.entrenador_id = entrenadores.id
    INNER JOIN tipo_entrenamiento ON agendamientos.tipo_entrenamiento = tipo_entrenamiento.id
    WHERE agendamientos.usuario_id = (SELECT id FROM usuarios WHERE correo = '$id_user')
    LIMIT 1
    ";

    $resultado_entrenamiento = $conexion->query($entrenamiento_personalizado);

    if (!$resultado_entrenamiento) {
        echo "Error en la consulta de entrenamiento personalizado: " . $conexion->error;
        die();
    }
    // Si existe una fila de entrenamiento personalizado
    $entrenamiento = $resultado_entrenamiento->fetch_assoc();
                    
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil</title>
        <link rel="stylesheet" href="style-usuarioperfil.css">
    </head>

    <body>

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

        <main>
            <section class="content-left">
                <h2>Hola,</h2>
                <h2><?php echo ($row['nombre_completo']); ?></h2>
                <h2>Codigo:</h2>
                <h2><?php echo ($row['id']); ?></h2>
            </section>
    
            <section class="content-right">
                
    
                <div class="sub-sections">
                    <section class="sub-left">
                        <h2>Tus datos</h2>
                        <div class="user-data">
                            <div class="data-item">
                                <span class="data-label">Nombre completo:</span>
                                <span class="data-value"><?php echo ($row['nombre_completo']); ?></span>
                            </div>
                            <div class="data-item">
                                <span class="data-label">Correo electrónico:</span>
                                <span class="data-value"><?php echo ($row['correo']); ?></span>
                            </div>
                        </div>
                    </section>
    
                    <section class="sub-right">
                        
                        <!-- Dividir esta sección en dos -->
                        <div class="sub-right-top">
                            <h2>Entrenamiento personalizado</h2>
                            <?php if ($entrenamiento): ?>
                                <div class="plan-data">
                                    <div class="data-item">
                                        <span class="data-label">Entrenador:</span>
                                        <span class="data-value"><?php echo $entrenamiento['entrenador']; ?></span>
                                    </div>
                                    <div class="data-item">
                                        <span class="data-label">Tipo de entrenamiento:</span>
                                        <span class="data-value"><?php echo $entrenamiento['tipo_entrenamiento']; ?></span>
                                    </div>
                                    <div class="data-item">
                                        <span class="data-label">Día:</span>
                                        <span class="data-value"><?php echo $entrenamiento['dia']; ?></span>
                                    </div>
                                    <div class="data-item">
                                        <span class="data-label">Hora:</span>
                                        <span class="data-value"><?php echo $entrenamiento['hora']; ?></span>
                                    </div>
                                </div>
                            <?php else: ?>
                                <p>No tienes un entrenamiento personalizado reservado.</p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="sub-right-bottom">
                            <h2>Reservas de Clase</h2>
                            <div class="training-data">
                            <?php while ($reserva = $resultado_reservaciones->fetch_assoc()): ?>
                            <div class="data-item">
                                <span class="data-label">Tipo de entrenamiento :</span>
                                <span class="data-value"><?php echo $reserva['entrenamiento']; ?></span>
                            </div>
                            <div class="data-item">
                                <span class="data-label">Sede:</span>
                                <span class="data-value"><?php echo $reserva['sede']; ?></span>
                            </div>
                            <div class="data-item">
                                <span class="data-label">Día:</span>
                                <span class="data-value"><?php echo $reserva['dia']; ?></span>
                            </div>
                            <div class="data-item">
                                <span class="data-label">Hora:</span>
                                <span class="data-value"><?php echo $reserva['hora']; ?></span>
                            </div>
                        <?php endwhile; ?>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </main>
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
                    <li><a href="#inicio">Inicio</a></li>
                    <li><a href="#clases">Clases</a></li>
                    <li><a href="#entrenamiento">Entrenamiento</a></li>
                    <li><a href="register.html">Únete</a></li>
                    <li><a href="#plans">Planes</a></li>
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