document.addEventListener('DOMContentLoaded', () => {
    const boton = document.getElementById('abrir-articulo');
    const articulo = document.getElementById('articulo');
    const alineacion = document.getElementById('botones');

    boton.addEventListener('click', () => {
        if (articulo.style.display === 'none') {
            articulo.style.display = 'block';
            boton.textContent = 'Mostrar menos';
            alineacion.style.display = 'block';
        } else {
            articulo.style.display = 'none';
            boton.textContent = 'Mostrar más';
            alineacion.style.display = 'none';
        }
    });
});

function alinearTexto(alineacion) {
    document.querySelector('article').style.textAlign = alineacion;
}