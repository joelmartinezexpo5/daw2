'use strict'

const $inventario = (function(){
    let datos = [
        { equipoId: 1, aula: "A1", estado: "operativo", tipo: "sobremesa" },
        { equipoId: 2, aula: "A2", estado: "averiado", tipo: "portátil" },
        { equipoId: 3, aula: "A1", estado: "pendiente revisión", tipo: "sobremesa" },
        { equipoId: 4, aula: "A3", estado: "operativo", tipo: "portátil" },
        { equipoId: 5, aula: "A2", estado: "averiado", tipo: "sobremesa" },
        { equipoId: 6, aula: "A4", estado: "operativo", tipo: "sobremesa" },
        { equipoId: 7, aula: "A1", estado: "operativo", tipo: "portátil" },
        { equipoId: 8, aula: "A3", estado: "pendiente revisión", tipo: "sobremesa" },
        { equipoId: 9, aula: "A2", estado: "averiado", tipo: "portátil" },
        { equipoId: 10, aula: "A4", estado: "operativo", tipo: "portátil" },
        { equipoId: 11, aula: "A1", estado: "averiado", tipo: "sobremesa" },
        { equipoId: 12, aula: "A3", estado: "operativo", tipo: "sobremesa" },
        { equipoId: 13, aula: "A2", estado: "pendiente revisión", tipo: "sobremesa" },
        { equipoId: 14, aula: "A4", estado: "averiado", tipo: "portátil" },
        { equipoId: 15, aula: "A3", estado: "operativo", tipo: "portátil" }
    ]

    function imprimirEquiposAveriadosPorAula(){
        let resultado = datos.filter(dato => dato.estado === 'averiado');
        let resultadoOrdenado = resultado.sort((a,b) => {return a.aula.localeCompare(b.aula)});
        return resultadoOrdenado
    }

    function eliminarEquipo(id){
        let equipos = datos.filter(dato => dato.equipoId !== id);
        datos = equipos;
        return datos;
    }

    function agregarEquipo(aula, estado, tipo){
        let id= datos.length === 0 ? 1:++datos.length

        let nuevoEquipo = {
            equipoId: id,
            aula: aula,
            estado:estado,
            tipo:tipo
        }

        datos.push(nuevoEquipo);

        console.log(datos)
    }

    function filtrarPorTipo(tipo){
        let resultado = datos.filter(dato => dato.tipo === tipo);
        return resultado;
    }

    function estadisticasPorTipo(tipo){
        let filtro = datos.filter(dato => dato.tipo === tipo);
        let averiadoPorTipo = filtro.filter(dato => dato.estado === 'averiado')

        let estadisticasPorTipo = [
            {
                tipo:tipo,
                total:filtro.length,
                averiados:averiadoPorTipo.length
            }
        ];

        return estadisticasPorTipo;
    }

    function serializar(json){
        return JSON.stringify(json);
    }

    function deserializar(cadenaJSON){
        return JSON.parse(cadenaJSON);
    }

    return{
        imprimirEquiposAveriadosPorAula,
        eliminarEquipo,
        agregarEquipo,
        filtrarPorTipo,
        estadisticasPorTipo,
        serializar,
        deserializar
    }
})();

console.log($inventario.eliminarEquipo(8))
console.log($inventario.imprimirEquiposAveriadosPorAula());
console.log($inventario.filtrarPorTipo('sobremesa'));
console.log($inventario.estadisticasPorTipo('portátil'))
console.log($inventario.agregarEquipo('A1','operativo', 'sobremesa'));