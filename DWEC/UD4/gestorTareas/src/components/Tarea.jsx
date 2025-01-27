function Tarea({ tarea, onEliminar, onCambiarEstado }) {
    function handleEliminar() {
      if (window.confirm(`¿Seguro que deseas eliminar la tarea: ${tarea.nombre}?`)) {
        onEliminar(tarea.id);
      }
    }
  
    function handleCambiarEstado() {
      onCambiarEstado(tarea.id);
    }
  
    return (
      <>
        <h3>{tarea.nombre}</h3>
        <button onClick={handleCambiarEstado}>
          {tarea.estado === 'abierta' ? 'Cerrar' : 'Abrir'}
        </button>
        <button onClick={handleEliminar}>Eliminar</button>
      </>
    );
  }
  
  export default Tarea;
  