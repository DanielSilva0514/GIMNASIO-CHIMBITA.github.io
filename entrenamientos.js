async function cargarEntrenamientos() {
    try {
      const respuesta = await fetch('entrenamientos.json');
      const data = await respuesta.json();
      return data.entrenamientos;
    } catch (error) {
      console.error('Error cargando entrenamientos:', error);
      return [];
    }
  }
  
  async function mostrarEntrenamientos(correoUsuario) {
    const entrenamientos = await cargarEntrenamientos();
  
    // Filtrar entrenamientos asignados al usuario
    const entrenamientosUsuario = entrenamientos.filter(
      entrenamiento => entrenamiento.entrenador === correoUsuario
    );
  
    const contenidoDiv = document.getElementById('contenido');
  
    // Limpiar contenido anterior
    contenidoDiv.innerHTML = '';
  
    if (entrenamientosUsuario.length === 0) {
      contenidoDiv.innerHTML = '<p>No tienes entrenamientos agendados.</p>';
      return;
    }
  
    // Crear lista de entrenamientos
    const lista = document.createElement('ul');
    entrenamientosUsuario.forEach(entrenamiento => {
      const item = document.createElement('li');
      item.innerHTML = `
        <strong>Cliente:</strong> ${entrenamiento.cliente} <br>
        <strong>Fecha:</strong> ${entrenamiento.fecha} <br>
        <strong>Hora:</strong> ${entrenamiento.hora} <br>
        <strong>Actividad:</strong> ${entrenamiento.actividad}
      `;
      lista.appendChild(item);
    });
  
    contenidoDiv.appendChild(lista);
  }
  
  // Validar acceso y mostrar entrenamientos
  document.addEventListener('DOMContentLoaded', async () => {
    const correoUsuario = "danielentrenador@gmail.com"; // Reemplazar por el correo del usuario autenticado
    const recurso = "entrenamientos_agendados";
  
    const acceso = await validarAcceso(correoUsuario, recurso);
  
    if (acceso) {
      mostrarEntrenamientos(correoUsuario);
    } else {
      alert('No tienes permiso para acceder a esta sección.');
      window.location.href = 'index.html'; // Redirige al inicio
    }
  });
  