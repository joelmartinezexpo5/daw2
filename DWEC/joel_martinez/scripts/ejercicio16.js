let contador = 2;
let trabajadores = [
    {codigo: "E01", nombre: "Joel", categoria: "1", contratacion: 2021}
    {codigo: "E02", nombre: "Martin", categoria: "2", contratacion: 2019}
];

function listarTrabajadores(listaTrab){
    for(let i = 0; i <= listaTrab.length; ++i){
        console.log(`codigo:${listaTrab[i].codigo}, trabajador: ${listaTrab[i]}, categoria: ${listaTrab[i].categaoria}, contratacion: ${listaTrab[i].contratacion}`);
    }
}

function crearTrabajador(codigo, nombre, categoria, contratacion) {
    trabajadores[contador] = { codigo, nombre, categoria, contratacion };
    contador++;
}

function eliminarTrabajador(trabajadores) {
    let codigo = prompt('Introduce el código del trabajador a eliminar:');
    
    for (let i = 0; i < trabajadores.length; ++i) {
        if (trabajadores[i] && trabajadores[i].codigo === codigo) {
            let nombre = trabajadores[i].nombre;
            let confirmacion = confirm(`¿Está seguro de que desea eliminar al trabajador ${nombre} con código ${codigo}?`);
            
            if (confirmacion) {
                trabajadores[i] = undefined;
                alert(`El trabajador con código ${codigo} ha sido eliminado.`);
            }
            break;
        }
    }
}


function modificarTrabajador(trabajadores){
    let codigo = prompt('Introduce el codigo del trabajador');
    let trabajadorEncontrado
    for(let i = 0; i < trabajadores.length; ++i){
        if(trabajadores.codigo === codigo){
            trabajadorEncontrado = trabajadores[i];
            break;
        }
    }
    let nuevoNombre = prompt('Introduce el nombre del trabajador');
    let nuevaCategoria = prompt('Introduce la categoria del trabajador');
    let nuevaContratacion = prompt('Introduce la contratacion del trabajador');

    trabajadores.nombre=nuevoNombre;
    trabajadores.categoria=nuevaCategoria;
    trabajadores.contratacion=nuevaContratacion;
    alert('Trabajador modificado')
}

function calcularNomina(){

}