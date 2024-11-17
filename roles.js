// Función para cargar los datos del archivo roles.json
async function cargarRoles() {
    try {
      // Fetch para leer el archivo JSON
      const respuesta = await fetch('roles.json');
      const data = await respuesta.json();
      return data.usuarios; // Retorna la lista de usuarios
    } catch (error) {
      console.error('Error cargando roles:', error);
      return [];
    }
  }
  
  // Función para validar el acceso de un usuario a un recurso
  async function validarAcceso(correo, recurso) {
    const usuarios = await cargarRoles(); // Cargar los roles desde el JSON
  
    // Buscar el usuario por correo
    const usuario = usuarios.find(user => user.correo === correo);
  
    if (!usuario) {
      console.log('Usuario no encontrado');
      return false; // Usuario no existe
    }
  
    // Verificar si el usuario tiene acceso al recurso
    const tieneAcceso = usuario.accesos.includes(recurso);
  
    if (tieneAcceso) {
      console.log(`Acceso concedido al recurso: ${recurso}`);
      return true; // Tiene acceso
    } else {
      console.log(`Acceso denegado al recurso: ${recurso}`);
      return false; // No tiene acceso
    }
  }
  