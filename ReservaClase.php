<?php
    include ('php/conexion_be.php'); 
    require_once 'php/validar_sesion.php';
    require_once 'validar_rol.php';
    
    $id_user = $_SESSION['usuario'];

    $sedes = $conexion->query("SELECT * FROM sedes");
    $dias = $conexion->query("SELECT * FROM dias");
    $horas = $conexion->query("SELECT * FROM horas");
    $clases = $conexion->query("SELECT * FROM clases_tipo");
    

    

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reservas de clases</title>
        <link rel="stylesheet" href="style-ReservaClase.css">
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
            <form action="php/guardar.php" method="POST" class="reservations">
                

                <div class="titulo"><h3>Reservar Clase</h3></div>
                
                <!-- Botón para seleccionar la clase -->
                <div class="clase-selector">
                    <label for="select-clase">Seleccionar Clase:</label>
                    <select id="select-clase" name="select-clase" required>
                        <option value="">Seleccionar Clase</option>
                        <?php while ($clases_r = $clases->fetch_assoc()) { ?>
                            <option value="<?php echo $clases_r["id"] ?>"><?php echo $clases_r["clases"] ?></option>

                        <?php } ?>
                        
                        
                    </select>
                </div>

                <!-- Botón para seleccionar sede -->
                <div class="location-selector">
                    <label for="select-location">Seleccionar Sede:</label>
                    <select id="select-location" name="select-location" required>
                        <option value="">Seleccionar Sede</option>
                        <?php while ($sedes_r = $sedes->fetch_assoc()) { ?>
                            <option value="<?php echo $sedes_r["id"] ?>"><?php echo $sedes_r["sedes"] ?></option>

                        <?php } ?>
                        
                        
                    </select>
                </div>
                <!-- Seleccionar día -->
                <div class="day-selector">
                    <label for="select-day">Seleccionar Día:</label>
                    <select id="select-day" name="select-day" required>
                        
                        <option value="">Seleccionar Dia</option>
                        <?php while ($dias_r = $dias->fetch_assoc()) { ?>
                            <option value="<?php echo $dias_r["id"] ?>"><?php echo $dias_r["dias"] ?></option>

                        <?php } ?>
                    </select>
                </div>
                
                <!-- Selector de horas -->
                <div class="time-selector">
                    <label for="select-time">Seleccionar Hora:</label>
                    <select id="select-time" name="select-time" required>
                        
                        <option value="">Seleccionar Hora</option>
                        <?php while ($horas_r = $horas->fetch_assoc()) { ?>
                            <option value="<?php echo $horas_r["id"] ?>"><?php echo $horas_r["horas"] ?></option>

                        <?php } ?>
                    </select>
                </div>
                <!-- Mensaje de advertencia -->
        
                <div class="warning-message" style="display: none;">
                    <p style="color: red; font-size: 1.4rem;">Por favor, complete todos los campos antes de continuar.</p>
                </div>

                <!-- Botón para confirmar la reserva -->
                <div class="confirm-reservation">
                    <button type="submit" id="confirm-button" disabled>Confirmar Reserva</button>
                </div>
            </form>
        </main>
        <script>
            const confirmButton = document.getElementById('confirm-button');
            const warningMessage = document.querySelector('.warning-message');
        
            // Variables para los selects de sede, día y hora
            const selectLocation = document.getElementById('select-location');
            const selectDay = document.getElementById('select-day');
            const selectTime = document.getElementById('select-time');
        
            // Función para validar los datos
            function validateForm() {
                const locationSelected = selectLocation.value !== "";
                const daySelected = selectDay.value !== "";
                const timeSelected = selectTime.value !== "";
        
                // Si faltan datos, mostramos el mensaje de advertencia
                if (locationSelected && daySelected && timeSelected) {
                    confirmButton.disabled = false;
                    warningMessage.style.display = 'none'; // Ocultamos el mensaje de advertencia
                } else {
                    confirmButton.disabled = true;
                    warningMessage.style.display = 'block'; // Mostramos el mensaje de advertencia
                }
            }
        
            // Eventos para validar el formulario
            selectLocation.addEventListener('change', validateForm);
            selectDay.addEventListener('change', validateForm);
            selectTime.addEventListener('change', validateForm);
        
            // Confirmar reserva
            confirmButton.addEventListener('click', () => {
                if (selectLocation.value && selectDay.value && selectTime.value) {
                    alert(`Reserva confirmada`);
                    window.location.href = "pagina_de_confirmacion.html"; // Redirige a la página de confirmación
                }
            });
        
            // Inicialización del formulario
            validateForm(); // Aseguramos que el botón esté deshabilitado inicialmente
        </script>
        
        
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

</html>
