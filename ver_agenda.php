<?php
  session_start();

  if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'administrador') {
      echo '
          <script>
              alert("No tienes permisos para acceder a esta página");
              window.location = "registro.php";
          </script>
      ';
      session_destroy();
      die();
  }
  include ('php/conexion_be.php');
  // Consulta para obtener las clases reservadas
    $sql_reservas = "SELECT usuarios.id AS usuario_id, usuarios.nombre_completo AS usuario, clases_tipo.clases AS entrenamiento, sedes.sedes AS sede, dias.dias AS dia, horas.horas AS hora 
      FROM reservas_clase
      INNER JOIN usuarios ON reservas_clase.correo = usuarios.correo
      INNER JOIN clases_tipo ON reservas_clase.id_clases = clases_tipo.id
      INNER JOIN sedes ON reservas_clase.id_sedes = sedes.id
      INNER JOIN dias ON reservas_clase.id_dias = dias.id
      INNER JOIN horas ON reservas_clase.id_horas = horas.id
    ";
  
    $resultado_reservas = $conexion->query($sql_reservas);
  
    if (!$resultado_reservas) {
      echo "Error en la consulta: " . $conexion->error;
      die();
    }

    $sql_entrenamientos = "SELECT usuarios.id AS usuario_id, usuarios.nombre_completo AS usuario, agendamientos.hora AS hora, dias.dias AS dia, entrenadores.nombre AS entrenador, tipo_entrenamiento.nombre AS tipo_entrenamiento
    FROM agendamientos
    INNER JOIN usuarios ON agendamientos.usuario_id = usuarios.id
    INNER JOIN dias ON agendamientos.dia_id = dias.id
    INNER JOIN entrenadores ON agendamientos.entrenador_id = entrenadores.id
    INNER JOIN tipo_entrenamiento ON agendamientos.tipo_entrenamiento = tipo_entrenamiento.id
";

$resultado_entrenamientos = $conexion->query($sql_entrenamientos);

if (!$resultado_entrenamientos) {
    echo "Error en la consulta de entrenamientos personalizados: " . $conexion->error;
    die();
}
    
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver Entrenamientos</title>
  <link rel="stylesheet" href="veragenda.css">
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

<div class="container">
  <!-- Contenedor principal -->
  <div class="content-wrapper">
    <!-- Menú lateral -->
    <aside class="sidebar">
      <h2>Menú</h2>
      <ul>
        <li>
          <a href="#" data-section="clases-reservadas" class="menu-item active">
            Clases reservadas
          </a>
        </li>
        <li>
          <a href="#" data-section="entrenamientos-personalizados" class="menu-item">
            Entrenamientos personalizados
          </a>
        </li>
        
      </ul>
    </aside>

    <!-- Contenido dinámico -->
    <main class="content">
      <!-- Clases Reservadas -->
      <section id="clases-reservadas" class="content-section active">
        <h2>Clases Reservadas</h2>
        <table class = "table">
            
                <tr>
                    <th><p>ID</p></th>
                    <th><p>Usuario</p></th>
                    <th><p>Tipo de entrenamiento</p></th>
                    <th><p>Sede</p></th>
                    <th><p>Dia</p></th>
                    <th><p>Hora</p></th>
                </tr>
            
            
              <?php while ($reserva = $resultado_reservas->fetch_assoc()){
                 ?>
                  <tr>
                    <td><p><?php echo $reserva['usuario_id']; ?></p></td>
                    <td><p><?php echo $reserva['usuario']; ?></p></td>
                    <td><p><?php echo $reserva['entrenamiento']; ?></p></td>
                    <td><p><?php echo $reserva['sede']; ?></p></td>
                    <td><p><?php echo $reserva['dia']; ?></p></td>
                    <td><p><?php echo $reserva['hora']; ?></p></td>
                  </tr> 
                <?php
              }
              ?> 

        </table>
      </section>

      <!-- Entrenamientos Personalizados -->
      <section id="entrenamientos-personalizados" class="content-section active">
        <h2>Entrenamientos Personalizados</h2>
        <table class = "table">
            
                <tr>
                    <th><p>ID</p></th>
                    <th><p>Usuario</p></th>
                    <th><p>Entrenador</p></th>
                    <th><p>Tipo de entrenamiento</p></th>
                    <th><p>Dia</p></th>
                    <th><p>Hora</p></th>
                </tr>
              <?php while ($entrenamiento = $resultado_entrenamientos->fetch_assoc()): ?>
                <tr>
                    <td><p><?php echo $entrenamiento['usuario_id']; ?></p></td>
                    <td><p><?php echo $entrenamiento['usuario']; ?></p></td>
                    <td><p><?php echo $entrenamiento['entrenador']; ?></p></td>
                    <td><p><?php echo $entrenamiento['tipo_entrenamiento']; ?></p></td>
                    <td><p><?php echo $entrenamiento['dia']; ?></p></td>
                    <td><p><?php echo $entrenamiento['hora']; ?></p></td>
                </tr>
    <?php endwhile; ?>
              
              
        
      </section>
    </main>
  </div>
</div>


  <script>
    // Lógica para mostrar/ocultar secciones dinámicamente
    document.querySelectorAll('.menu-item').forEach(item => {
      item.addEventListener('click', event => {
        event.preventDefault();

        // Cambiar el contenido activo
        document.querySelectorAll('.content-section').forEach(section => {
          section.classList.remove('active');
        });
        const sectionId = event.target.getAttribute('data-section');
        if (sectionId) {
          document.getElementById(sectionId).classList.add('active');
        }

        // Cambiar el estado activo del menú
        document.querySelectorAll('.menu-item').forEach(link => {
          link.classList.remove('active');
        });
        event.target.classList.add('active');
      });
      
    });
  </script>

<!-- Footer -->

</body>
</html>
