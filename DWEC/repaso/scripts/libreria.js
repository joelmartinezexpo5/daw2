const $libreria = (function () {
    let libros = {};

    function agregarLibro(nombre, cantidad, precio, genero, autor) {
        if (libros[nombre]) {
            alert('El libro ya existe');
        } else {
            libros[nombre] = {
                cantidad: cantidad,
                precio: precio,
                genero: genero,
                autor: autor
            }
        }
    }

    function eliminarLibro(nombre) {
        if (!libros[nombre]) {
            alert('El libro no existe');
        } else {
            delete libros[nombre];
        }
    }

    function buscarLibro(nombre) {
        return libros[nombre];
    }

    function actualizarInventario(nombre, cantidad) {
        libros[nombre].cantidad += cantidad;
        if (libros[nombre].cantidad <= 0) {
            alert('No hay stock')
        }
    }

    function ordenarLibrosPorPrecio(){
        const librosOrdenados = Object.entries(libros)
            .map(([nombre, producto]) => ({
                nombre,
                cantidad: producto.cantidad,
                precio: producto.precio,
                genero: producto.genero,
                autor: producto.autor
            }))
            .sort((a, b) => a.precio - b.precio);

        return librosOrdenados;
    }

    function imprimirInventario(){
        return Object.entries(libros).map(([nombre, producto]) => ({
            nombre,
            genero: producto.genero,
            autor: producto.autor,
            cantidad: producto.cantidad,
            precio: producto.precio,
            total: producto.cantidad * producto.precio
        }));
    }

    function filtrarLibrosPorGenero(){
        return Object.entries(inventario)
          .filter(([, producto]) => producto.categoria === categoria)
          .map(([nombre, producto]) => ({ nombre, cantidad: producto.cantidad, precio: producto.precio }));
    }

    return{
        agregarLibro,
        eliminarLibro,
        buscarLibro,
        actualizarInventario,
        ordenarLibrosPorPrecio,
        imprimirInventario,
        filtrarLibrosPorGenero
    }
})();

window.addEventListener('load', function(){

    const btnAgregar = document.getElementById('btnAgregar');
    const btnEliminar = document.getElementById('btnEliminar');
    const btnBuscar = document.getElementById('btnBuscar');
    const btnActualizar = document.getElementById('btnActualizar');
    const btnOrdenarPorPrecio = document.getElementById('btnOrdenarPorPrecio');
    const btnImprimirInventario = document.getElementById('btnImprimirInventario');
    const btnFiltrar = document.getElementById('btnFiltrar');

    btnAgregar.addEventListener('click', function(){
        const nombre = document.getElementById('nombreAgregar').value;
        const cantidad = parseInt(document.getElementById('cantidadAgregar').value);
        const precio = parseFloat(document.getElementById('precioAgregar').value);
        const genero = document.getElementById('generoAgregar').value;
        const autor = document.getElementById('autorAgregar').value;

        if(!nombre || isNaN(cantidad) || isNaN(precio) || !genero || !autor){
            alert("Rellena todos los campos");
            return;
        }

        $libreria.agregarLibro(nombre,cantidad,precio,genero,autor);
    })

    btnImprimirInventario.addEventListener('click', function(){
        const libros = $libreria.imprimirInventario();
        console.log(libros);
        alert(libros);
    });
});