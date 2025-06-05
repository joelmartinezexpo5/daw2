document.addEventListener('DOMContentLoaded', () => {
    const desplegable = document.getElementById('desplegable');
    const cabecera = document.getElementById('cabecera');
    const opciones = [
        document.getElementById('opcion1'),
        document.getElementById('opcion2'),
        document.getElementById('opcion3')
    ];

    // Alternar desplegable al hacer clic en la cabecera
    cabecera.addEventListener('click', () => {
        desplegable.classList.toggle('activo');
    });

    // Manejar la selección de opciones
    opciones.forEach(opcion => {
        opcion.addEventListener('click', () => {
            cabecera.textContent = opcion.textContent;
            desplegable.classList.remove('activo');
        });
    });

    // Cerrar desplegable al hacer clic fuera
    document.addEventListener('click', (e) => {
        if (!desplegable.contains(e.target)) {
            desplegable.classList.remove('activo');
        }
    });
});