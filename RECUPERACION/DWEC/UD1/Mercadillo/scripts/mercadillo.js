'use strict'

const $negocio = (function() {

    // Inventario inicial del negocio con productos, cada uno con su cantidad, precio y categoría
    const inventario = {
        "Manzana": {
            cantidad: 10,
            precio: 1.50,
            categoria: "Frutas"
        },
        "Leche": {
            cantidad: 5,
            precio: 2.30,
            categoria: "Lácteos"
        },
        "Pan": {
            cantidad: 20,
            precio: 1.00,
            categoria: "Panadería"
        }
    };

    // Función para agregar un nuevo producto al inventario
    function agregarProducto(nombre, cantidad, precio, categoria) {
        // Se verifica si el producto ya existe en el inventario
        if (nombre in inventario) {
            alert(`El producto "${nombre}" ya existe en el inventario.`);
            return false; // No se añade el producto si ya está en el inventario
        }

        // Si no existe, lo agrego al inventario
        inventario[nombre] = {
            cantidad: cantidad,
            precio: precio,
            categoria: categoria
        };
        return true; // Indico que se ha agregado el producto correctamente
    }

    // Función para eliminar un producto del inventario
    function eliminarProducto(nombre) {
        // Verifico si el producto no está en el inventario
        if (!(nombre in inventario)) {
            alert(`El producto "${nombre}" no existe en el inventario.`);
            return false; // Si no está, devuelve falso
        }
        
        // Confirmación de que el usuario quiere eliminar el producto
        if (confirm(`¿Estás seguro de eliminar "${nombre}" del inventario?`)) {
            delete inventario[nombre]; // Se elimina el producto del inventario
            return true; // El producto ha sido eliminado
        }
        return false; // Si el usuario cancela, no se hace nada nada
    }

    // Función para buscar un producto en el inventario
    function buscarProducto(nombre) {
        // Se verifica si el producto está en el inventario
        if (!(nombre in inventario)) {
            alert(`El producto "${nombre}" no existe en el inventario.`);
            return false; // Si no está, devuelve falso
        }
        return inventario[nombre]; // Si está, devuelve los detalles del producto
    }

    // Función para actualizar la cantidad de un producto en el inventario
    function actualizarInventario(nombre, cantidad) {
        // Se verifica si el producto está en el inventario
        if (!(nombre in inventario)) {
            alert(`El producto "${nombre}" no existe en el inventario.`);
            return false; // Si no está, falso
        }

        // Se suma la cantidad al producto
        inventario[nombre].cantidad += cantidad;

        // Si la cantidad es menor o igual a cero, se muestra un mensaje de agotado
        if (inventario[nombre].cantidad <= 0) {
            alert(`El stock de "${nombre}" se ha agotado.`);
            inventario[nombre].cantidad = 0; // La cantidad no puede ser negativa
        }
        return true; // Cantidad actualizada
    }

    // Función para ordenar los productos por precio de menor a mayor
    function ordenarProductosPorPrecio() {
        return Object.entries(inventario) 
            .toSorted((a, b) => a[1].precio - b[1].precio); // Ordenamos por el precio de cada producto
    }

    // Función para imprimir todo el inventario en un formato legible
    function imprimirInventario() {
        // Usamos Object.entries para recorrer el inventario y generar una lista de productos formateados
        return Object.entries(inventario)
            .map(([nombre, producto]) => {
                // Cada entrada se convierte en una cadena con el formato requerido
                return `${nombre} - Categoría: ${producto.categoria} - Cantidad: ${producto.cantidad} - Precio: $${producto.precio} - Total: $${(producto.cantidad * producto.precio).toFixed(2)}`;
            })
            .join('<br>'); // Unimos todas las cadenas de texto con un salto de línea (<br>)
    }

    // Función para filtrar productos por categoría
    function filtrarProductosPorCategoria(categoria) {}

    // Retornamos un objeto con las funciones que queremos exponer fuera del módulo
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

// Asociar eventos de botones a las funciones del negocio
document.getElementById('agregarBtn').addEventListener('click', function() {
    // Obtenemos los valores de los inputs del formulario
    const nombre = document.getElementById('nombre').value;
    const cantidad = document.getElementById('cantidad').value;
    const precio = document.getElementById('precio').value;
    const categoria = document.getElementById('categoria').value;

    // Llamamos a la función para agregar el producto al inventario
    $negocio.agregarProducto(nombre, cantidad, precio, categoria);
});

// Evento para ordenar los productos por precio y mostrar el resultado
document.getElementById('ordenarBtn').addEventListener('click', function() {
    // Obtenemos los productos ordenados por precio
    const resultado = $negocio.ordenarProductosPorPrecio();
    // Mostramos el resultado en la interfaz
    document.getElementById('output').innerHTML = 'Productos ordenados por precio: <br>' + resultado.join('<br>');
});

// Evento para imprimir el inventario completo
document.getElementById('imprimirBtn').addEventListener('click', function() {
    // Obtenemos el inventario en formato de texto
    const resultado = $negocio.imprimirInventario();
    // Mostramos el inventario en la interfaz
    document.getElementById('output').innerHTML = 'Inventario: <br>' + resultado;
});
