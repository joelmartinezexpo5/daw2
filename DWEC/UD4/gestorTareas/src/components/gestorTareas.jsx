import { useEffect, useState } from 'react';
import Tarea from './Tarea';
import { cargaTareas, guardarTareas } from '../core/LocalStorage';

function GestorTareas({ children }) {
    const [tareas, setTareas] = useState([]);
    const [nuevaTarea, setNuevaTarea] = useState('');
    const [filtro, setFiltro] = useState('abiertas');

    useEffect(() => {
        
    })
  
    function agregarTarea() {
      if (nuevaTarea.trim()) {
        setTareas([...tareas, { id: Date.now(), nombre: nuevaTarea, estado: 'abierta' }]);
        setNuevaTarea('');
      }
    }
  
    function eliminarTarea(id) {
        setTareas(tareas.filter(tarea => tarea.id !== id));
    }
  
    function cambiarEstadoTarea(id) {
      setTareas(
        tareas.map(tarea =>
          tarea.id === id ? { ...tarea, estado: tarea.estado === 'abierta' ? 'cerrada' : 'abierta' } : tarea
        )
      );
    }
  
    const tareasFiltradas = tareas.filter(tarea => filtro === 'todas' || tarea.estado === filtro);
  
    return (
      <>
        <h1>Gestor de Tareas</h1>
        <input 
          type="text" 
          value={nuevaTarea} 
          onChange={(e) => setNuevaTarea(e.target.value)} 
          placeholder="Nueva tarea..." 
        />
        <button onClick={agregarTarea}>Añadir Tarea</button>
        <div>
          <button onClick={() => setFiltro('todas')}>Todas</button>
          <button onClick={() => setFiltro('abierta')}>Abiertas</button>
          <button onClick={() => setFiltro('cerrada')}>Cerradas</button>
        </div>
        <ul>
          {tareasFiltradas.map(tarea => (
            <Tarea key={tarea.id} tarea={tarea} onEliminar={eliminarTarea} onCambiarEstado={cambiarEstadoTarea} />
          ))}
        </ul>
      </>
    );
  }
  
  export default GestorTareas;
