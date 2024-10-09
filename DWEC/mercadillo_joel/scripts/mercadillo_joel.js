'use strict'

let inventario={};

function agregarProducto(nombre,cantidad,precio,categoria){
    if(inventario[nombre]){
        alert("El producto ya existe");
    }else{
        inventario[nombre]={
            cantidad: cantidad,
            precio: precio,
            categoria: categoria
        }
    }
}

function eliminarProducto(nombre){
    if(!inventario[nombre]){
        alert("Este producto no existe");
    }else{
        delete(inventario[nombre]);
    }
}

function buscarProducto(nombre){
    if(inventario[nombre]){
        return inventario[nombre];
    }
}

function actualizarInventario(nombre, cantidad){
    if(inventario[nombre]){
        inventario[nombre].cantidad += cantidad;
        if(inventario[nombre].cantidad === 0){
            alert("No hay stock, se necesita reponer");
        }
    }
}

function ordenarProductoPorPrecio(){
    let resultado = inventario.entries().map(x, y => nombre = x, cantidad = y, precio = y, categoria = y);

    return inventario.sort((a, b) => a.precio - b.precio);
}

function imprimirInventario(){
    
}