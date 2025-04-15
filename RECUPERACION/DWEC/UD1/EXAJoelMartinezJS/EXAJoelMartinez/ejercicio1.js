'use strict'

function calcularDevolucion(precioProducto){
    return function (importeEntregado){
        let cambioProducto = importeEntregado - precioProducto
        return cambioProducto
    }
}