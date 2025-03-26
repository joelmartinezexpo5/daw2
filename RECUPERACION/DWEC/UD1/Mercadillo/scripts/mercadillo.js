'use strict'

const $negocio = (function(){
    const inventario = [];

    function agregarProducto(nombre,cantidad,precio,categoria){
        let productos = inventario.filter(producto => producto === nombre);

        if(productos.length > 0){
            alert("El producto ya existe");
            return;
        }

        inventario[nombre] = {
            cantidad: cantidad,
            precio: precio,
            categoria: categoria
        };

        console.log(inventario);
    }

    function eliminarProducto(nombre){

    }

    return {
        agregarProducto
    }
})();

$negocio.agregarProducto("pera", 2, 2, "fruta");