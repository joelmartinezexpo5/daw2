'use strict';

const $negocio = (function() {
    // Inventario inicial del negocio con productos, cada uno con su cantidad, precio y categoría
    const inventario = [
        { nombre: "Manzana", cantidad: 10, precio: 1.50, categoria: "Frutas" },
        { nombre: "Leche", cantidad: 5, precio: 2.30, categoria: "Lácteos" },
        { nombre: "Pan", cantidad: 20, precio: 1.00, categoria: "Panadería" }
    ];

    // Función para agregar un nuevo producto al inventario
    function agregarProducto(nombre, cantidad, precio, categoria) {
        for (let i = 0; i < inventario.length; i++) {
            if (inventario[i].nombre === nombre) {
                alert(`El producto "${nombre}" ya existe en el inventario.`);
                return false;
            }
        }
        inventario[inventario.length] = { nombre, cantidad: Number(cantidad), precio: Number(precio), categoria };
        return true;
    }

    // Función para eliminar un producto del inventario
    function eliminarProducto(nombre) {
        for (let i = 0; i < inventario.length; i++) {
            if (inventario[i].nombre === nombre) {
                for (let j = i; j < inventario.length - 1; j++) {
                    inventario[j] = inventario[j + 1];
                }
                inventario.length--;
                return true;
            }
        }
        return false;
    }

    // Función para buscar un producto en el inventario
    function buscarProducto(nombre) {
        for (let i = 0; i < inventario.length; i++) {
            if (inventario[i].nombre === nombre) {
                return inventario[i];
            }
        }
        return null;
    }

    // Función para actualizar la cantidad de un producto en el inventario
    function actualizarInventario(nombre, cantidad) {
        for (let i = 0; i < inventario.length; i++) {
            if (inventario[i].nombre === nombre) {
                inventario[i].cantidad += Number(cantidad);
                if (inventario[i].cantidad <= 0) {
                    alert(`El stock de "${nombre}" se ha agotado.`);
                    inventario[i].cantidad = 0;
                }
                return true;
            }
        }
        return false;
    }

    // Función para ordenar los productos por precio de menor a mayor
    function ordenarProductosPorPrecio() {
        let ordenado = inventario.slice();
        for (let i = 0; i < ordenado.length - 1; i++) {
            for (let j = i + 1; j < ordenado.length; j++) {
                if (ordenado[i].precio > ordenado[j].precio) {
                    let temp = ordenado[i];
                    ordenado[i] = ordenado[j];
                    ordenado[j] = temp;
                }
            }
        }
        let resultado = [];
        for (let i = 0; i < ordenado.length; i++) {
            resultado[i] = `${ordenado[i].nombre}: cantidad = ${ordenado[i].cantidad}, precio = ${ordenado[i].precio}, categoría = ${ordenado[i].categoria}`;
        }
        return resultado;
    }

    // Función para imprimir todo el inventario en un formato legible
    function imprimirInventario() {
        let resultado = "";
        for (let i = 0; i < inventario.length; i++) {
            resultado += `${inventario[i].nombre} - Categoría: ${inventario[i].categoria} - Cantidad: ${inventario[i].cantidad} - Precio: $${inventario[i].precio} - Total: $${(inventario[i].cantidad * inventario[i].precio).toFixed(2)} <button class="eliminarBtn" data-nombre="${inventario[i].nombre}">Eliminar</button> <button class="editarBtn" data-nombre="${inventario[i].nombre}">Editar</button><br>`;
        }
        return resultado;
    }

    // Función para filtrar productos por categoría
    function filtrarProductosPorCategoria(categoria) {
        let resultado = [];
        for (let i = 0; i < inventario.length; i++) {
            if (inventario[i].categoria === categoria) {
                resultado[resultado.length] = `${inventario[i].nombre}: cantidad = ${inventario[i].cantidad}, precio = ${inventario[i].precio}, categoría = ${inventario[i].categoria}`;
            }
        }
        return resultado;
    }

    return {
        agregarProducto,
        eliminarProducto,
        buscarProducto,
        actualizarInventario,
        ordenarProductosPorPrecio,
        imprimirInventario,
        filtrarProductosPorCategoria
    };
})();

// Eventos para interactuar con la interfaz

document.getElementById('agregarBtn').addEventListener('click', function() {
    const nombre = document.getElementById('nombre').value;
    const cantidad = Number(document.getElementById('cantidad').value);
    const precio = Number(document.getElementById('precio').value);
    const categoria = document.getElementById('categoria').value;

    if ($negocio.agregarProducto(nombre, cantidad, precio, categoria)) {
        alert("Producto agregado correctamente.");
    }
});

document.getElementById('ordenarBtn').addEventListener('click', function() {
    document.getElementById('output').innerHTML = 'Productos ordenados por precio: <br>' + $negocio.ordenarProductosPorPrecio().join('<br>');
});

document.getElementById('imprimirBtn').addEventListener('click', function() {
    document.getElementById('output').innerHTML = 'Inventario: <br>' + $negocio.imprimirInventario();
});

document.getElementById('filtrarBtn').addEventListener('click', function() {
    const categoria = document.getElementById('filtrar').value;
    document.getElementById('output').innerHTML = 'Productos filtrados por categoría: <br>' + $negocio.filtrarProductosPorCategoria(categoria).join('<br>');
});

document.getElementById('output').addEventListener('click', function(event) {
    if (event.target.classList.contains('eliminarBtn')) {
        const nombre = event.target.getAttribute('data-nombre');
        if ($negocio.eliminarProducto(nombre)) {
            document.getElementById('output').innerHTML = 'Inventario: <br>' + $negocio.imprimirInventario();
        }
    }
});
