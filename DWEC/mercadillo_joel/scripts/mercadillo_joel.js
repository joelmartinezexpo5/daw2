'use strict'

const $negocio = (function () {
    let inventario = {
        
    };

    function agregarProducto(nombre, cantidad, precio, categoria) {
        if (inventario[nombre]) {
            alert("El producto ya existe");
        } else {
            inventario[nombre] = {
                cantidad: cantidad,
                precio: precio,
                categoria: categoria
            };
        }
        
    }

    function eliminarProducto(nombre) {
        if (!inventario[nombre]) {
            alert("Este producto no existe");
        } else {
            delete inventario[nombre];
        }
    }

    function buscarProducto(nombre) {
        if (inventario[nombre]) {
            return inventario[nombre];
        } else {
            alert("El producto no existe");
            return null;
        }
    }

    function actualizarInventario(nombre, cantidad) {
        if (inventario[nombre]) {
            inventario[nombre].cantidad += cantidad;
            if (inventario[nombre].cantidad <= 0) {
                alert("No hay stock, se necesita reponer");
            }
        } else {
            alert("El producto no existe");
        }
    }

    function ordenarProductoPorPrecio() {
        const productosOrdenados = Object.entries(inventario)
            .map(([nombre, producto]) => ({
                nombre,
                cantidad: producto.cantidad,
                precio: producto.precio,
                categoria: producto.categoria
            }))
            .sort((a, b) => a.precio - b.precio);

        return productosOrdenados;
    }

    function imprimirInventario() {
        return Object.entries(inventario).map(([nombre, producto]) => ({
            nombre,
            categoria: producto.categoria,
            cantidad: producto.cantidad,
            precio: producto.precio,
            total: producto.cantidad * producto.precio
        }));
    }

    function filtrarProductosPorCategoria(categoria) {
        return Object.entries(inventario)
          .filter(([, producto]) => producto.categoria === categoria)
          .map(([nombre, producto]) => ({ nombre, cantidad: producto.cantidad, precio: producto.precio }));
    }

    return{
        agregarProducto,
        eliminarProducto,
        buscarProducto,
        actualizarInventario,
        ordenarProductoPorPrecio,
        imprimirInventario,
        filtrarProductosPorCategoria
    }
})();

window.addEventListener('load', function() {

    const btnAgregar = document.getElementById('btnAgregar');
    const btnEliminar = document.getElementById('btnEliminar');
    const btnBuscar = document.getElementById('btnBuscar');
    const btnActualizar = document.getElementById('btnActualizar');
    const btnOrdenarPorPrecio = document.getElementById('btnOrdenarPorPrecio');
    const btnImprimirInventario = document.getElementById('btnImprimirInventario');
    const btnFiltrar = document.getElementById('btnFiltrar');

    btnAgregar.addEventListener('click', function() {
        const nombre = document.getElementById('nombreAgregar').value;
        const cantidad = parseInt(document.getElementById('cantidadAgregar').value);
        const precio = parseFloat(document.getElementById('precioAgregar').value);
        const categoria = document.getElementById('categoriaAgregar').value;

        if (!nombre || isNaN(cantidad) || isNaN(precio) || !categoria) {
            alert('Por favor, completa todos los campos correctamente');
            return;
        }

        $negocio.agregarProducto(nombre, cantidad, precio, categoria);

        
    });


    btnEliminar.addEventListener('click', function() {
        const nombre = document.getElementById('nombreEliminar').value;
        if (!nombre) {
            alert('Introduce un nombre de producto válido para eliminar.');
            return;
        }
        $negocio.eliminarProducto(nombre);
    });

    btnBuscar.addEventListener('click', function() {
        const nombre = document.getElementById('nombreBuscar').value;
        if (!nombre) {
            alert('Introduce un nombre de producto válido para buscar.');
            return;
        }
        const producto = $negocio.buscarProducto(nombre);
        console.log(producto);
    });

    btnActualizar.addEventListener('click', function() {
        const nombre = document.getElementById('nombreActualizar').value;
        const cantidad = parseInt(document.getElementById('cantidadActualizar').value);
        if (!nombre || isNaN(cantidad)) {
            alert('Introduce un nombre y cantidad válidos para actualizar.');
            return;
        }
        $negocio.actualizarInventario(nombre, cantidad);
    });

    btnOrdenarPorPrecio.addEventListener('click', function() {
        const productosOrdenados = $negocio.ordenarProductoPorPrecio();
        console.log(productosOrdenados);
    });

    btnImprimirInventario.addEventListener('click', function() {
        const inventario = $negocio.imprimirInventario();
        console.log(inventario);
    });

    btnFiltrar.addEventListener('click', function() {
        const categoria = document.getElementById('categoriaFiltrar').value;
        if (!categoria) {
            alert('Introduce una categoría válida para filtrar.');
            return;
        }
        const productosFiltrados = $negocio.filtrarProductosPorCategoria(categoria);
        console.log(productosFiltrados);
    });

});









      

    // agregarProducto('Manzanas', 10, 1.5, 'Frutas');
    // agregarProducto('Peras', 5, 2.0, 'Frutas');
    // agregarProducto('Naranjas', 8, 1.2, 'Frutas');

    // console.log(filtrarProductosPorCategoria('Frutas'));

    // eliminarProducto('Peras');

    // console.log(filtrarProductosPorCategoria('Frutas'));
    // // Llamar a la función ordenarProductoPorPrecio y mostrar el resultado
    // const productosOrdenados = ordenarProductoPorPrecio();
    // console.log("Productos ordenados por precio:", productosOrdenados);

    // // Llamar a la función imprimirInventario y mostrar el inventario
    // const inventarioImpreso = imprimirInventario();
    // console.log("Inventario completo:", inventarioImpreso);