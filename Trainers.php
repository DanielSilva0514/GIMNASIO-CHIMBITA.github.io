<?php
    session_start();
    include ('php/conexion_be.php');
    require_once 'php/validar_sesion.php';
    require_once 'validar_rol.php';

    $id_user = $_SESSION['usuario'];

    $trainer = $conexion->query("SELECT * FROM entrenadores");
    $dias = $conexion->query("SELECT * FROM dias");
    
    $entrenamiento = $conexion->query("SELECT * FROM tipo_entrenamiento");
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Entrenamiento</title>
    <link rel="stylesheet" href="entrenadores.css">
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
  <section class="info-entrenadores">
            <div class="info-sede">
                <h2>Entrenamientos Personalizados</h2>
                <p>Los entrenamientos personalizados están disponibles únicamente en la <strong>Sede Norte</strong>. ¡Reserva tu horario con tu entrenador favorito!</p>
            </div>
            
            <div class="entrenadores-horarios">
                <!-- Entrenador A -->
                <div class="entrenador">
                    <div class="img"><img src="img/entrenadorA.png" alt="Foto del Entrenador A"></div>
                    <h3>Sofia Gomez</h3>
                    <p>Horarios disponibles:</p>
                    <ul>
                        <li>6:00 AM</li>
                        <li>8:00 AM</li>
                        <li>10:00 AM</li>
                        <li>12:00 PM</li>
                    </ul>
                </div>

                <!-- Entrenador B -->
                <div class="entrenador">
                    <div class="img"><img src="img/entrenadorB.png" alt="Foto del Entrenador B"></div>
                    <h3>Ivonne Cardozo</h3>
                    <p>Horarios disponibles:</p>
                    <ul>
                        <li>2:00 PM</li>
                        <li>4:00 PM</li>
                        <li>6:00 PM</li>
                    </ul>
                </div>
            </div>
</section>
        <form action="php/agendar_entrenamiento.php" method="POST" class="reservations">
            <div class="titulo"><h3>Reservar Entrenamiento</h3></div>

            <!-- Selector de entrenador -->
            <div class="trainer-selector">
                <label for="select-trainer">Selecciona un entrenador:</label>
                <select id="select-trainer" name="select-trainer" required>
                    <option value="">Selecciona...</option>
                    <?php while ($trainer_r = $trainer->fetch_assoc()) { ?>
                        <option value="<?php echo $trainer_r['id']; ?>">
                        <?php echo $trainer_r['nombre']; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <!-- Seleccionar día -->
            <div class="day-selector">
                <label for="select-day">Seleccionar Día:</label>
                <select id="select-day" name="select-day" required>
                    <option value="">Selecciona...</option>
                    <?php while ($dias_r = $dias->fetch_assoc()) { ?>
                        <option value="<?php echo $dias_r['id']; ?>">
                        <?php echo $dias_r['dias']; ?>
                    </option>
                <?php } ?>
                </select>
            </div>

            <!-- Selector de hora -->
            <div class="time-selector">
                <label for="select-time">Selecciona un horario:</label>
                <select id="select-time" name="select-time" required>
                    <option value="">Selecciona...</option>
                </select>
            </div>

            <!-- Selector de clase -->
            <div class="clase-selector">
                <label for="select-clase">Seleccionar Entrenamiento:</label>
                <select id="select-clase" name="select-clase" required>
                    <option value="">Selecciona...</option>
                    <?php while ($clases_r = $entrenamiento->fetch_assoc()) { ?>
                        <option value="<?php echo $clases_r['id']; ?>">
                        <?php echo $clases_r['nombre']; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <!-- Botón de envío -->
             <div class="confirm-reservation"><button type="submit" id="confirm-button" disabled>Confirmar Reserva</button>
             </div>
        </form>
    </main>
    <script>
        const trainerSelect = document.getElementById('select-trainer');
        const timeSelect = document.getElementById('select-time');
        const confirmButton = document.getElementById('confirm-button');

        // Desactivar botón si no se completa el formulario
        function toggleConfirmButton() {
            confirmButton.disabled = !(
                trainerSelect.value && 
                document.getElementById('select-day').value && 
                timeSelect.value
            );
        }

        trainerSelect.addEventListener('change', async function () {
            const entrenadorId = this.value;

            // Limpiar horarios previos
            timeSelect.innerHTML = '<option value="">Selecciona...</option>';

            if (!entrenadorId) return;

            try {
                const response = await fetch(`php/obtener_horarios.php?entrenador_id=${entrenadorId}`);
                const data = await response.json();

                if (data.horas.length > 0) {
                    data.horas.forEach(hora => {
                        const option = document.createElement('option');
                        option.value = hora;
                        option.textContent = hora;
                        timeSelect.appendChild(option);
                    });
                } else {
                    timeSelect.innerHTML = '<option value="">No hay horarios disponibles</option>';
                }
            } catch (error) {
                console.error('Error al obtener horarios:', error);
            }
        });

        document.querySelectorAll('select').forEach(select => {
            select.addEventListener('change', toggleConfirmButton);
        });
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