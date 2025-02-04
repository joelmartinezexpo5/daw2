document.addEventListener('DOMContentLoaded', function(){
    const botonModo = document.getElementById('modoBoton');
    const info = document.getElementById('info');
    const cuerpo = document.body;

    cuerpo.style.backgroundColor = 'white';
    cuerpo.style.color = 'black';
    botonModo.style.backgroundColor = 'black';
    botonModo.style.color = 'white';

    botonModo.addEventListener('click', function(){
        if(cuerpo.style.backgroundColor === 'white'){
            cuerpo.style.backgroundColor = 'black';
            cuerpo.style.color = 'white';
            botonModo.style.backgroundColor = 'white';
            botonModo.style.color = 'black';
            info.style.backgroundColor = 'purple';
        } else {
            cuerpo.style.backgroundColor = 'white';
            cuerpo.style.color = 'black';
            botonModo.style.backgroundColor = 'black';
            botonModo.style.color = 'white';
            info.style.backgroundColor = 'azure';
        }
    });
})

document.addEventListener('DOMContentLoaded', function(){
    const estado = document.getElementById('estado');
    const keyValue = document.getElementById('keyValue');
    const codeValue = document.getElementById('codeValue');

    document.addEventListener('keydown', function(event){
        estado.textContent = 'Pulsando';
        keyValue.textContent = event.key;
        codeValue.textContent = event.code;

        estado.style.color = 'green';
    });

    document.addEventListener('keyup', function(event){
        estado.textContent = 'Sin pulsar';
        keyValue.textContent = '-';
        codeValue.textContent = '-';
    });
})


document.addEventListener('DOMContentLoaded', function(){
    const estado = document.getElementById('estado');
    const botonInfo = document.getElementById('boton');
    const coordenadas = document.getElementById('coordenadas');
})