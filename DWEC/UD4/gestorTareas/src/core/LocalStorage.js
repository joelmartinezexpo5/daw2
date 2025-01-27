export async function cargaTareas(){
    const tareasGuardadas = localStorage.getItem('tareas');
    // Si no hay tareas da un array vacio
    return tareasGuardadas ? JSON.parse(tareasGuardadas) : [];
}

export async function guardarTareas(){
    localStorage.setItem('tareas', JSON.stringify(tareas));
}