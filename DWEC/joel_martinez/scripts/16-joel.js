/**
 * 16-Envuelve el ejercicio anterior en una función autoinvocada. 
 */

(function() {
    // Array para almacenar trabajadores
    let trabajadores = [];

    // Función para generar el código de trabajador automáticamente
    function generarCodigoTrabajador() {
        let ultimoCodigo = trabajadores.length > 0 ? trabajadores[trabajadores.length - 1].codigo : "E00";
        let numero = parseInt(ultimoCodigo.substring(1)) + 1;
        return `E${numero.toString().padStart(2, '0')}`;
    }

    // Función para crear un trabajador
    function crearTrabajador() {
        let nombre = prompt("Introduce el nombre del trabajador:");
        let categoria = parseInt(prompt("Introduce la categoría del trabajador (1, 2 o 3):"));
        while (![1, 2, 3].includes(categoria)) {
            categoria = parseInt(prompt("Categoría no válida. Introduce 1, 2 o 3:"));
        }
        let contratacion = parseInt(prompt("Introduce el año de contratación (Ej: 2015):"));
        while (isNaN(contratacion) || contratacion > new Date().getFullYear()) {
            contratacion = parseInt(prompt("Año de contratación no válido. Introduce un año correcto:"));
        }

        let trabajador = {
            codigo: generarCodigoTrabajador(),
            nombre: nombre,
            categoria: categoria,
            contratacion: contratacion
        };

        trabajadores.push(trabajador);
        alert("Trabajador creado correctamente.");
    }

    // Función para listar los trabajadores
    function listarTrabajadores() {
        if (trabajadores.length === 0) {
            console.log("No hay trabajadores registrados.");
            return;
        }
        console.log("Listado de trabajadores:");
        trabajadores.forEach(trabajador => {
            console.log(`${trabajador.codigo} - Nombre: ${trabajador.nombre}, Categoría: ${trabajador.categoria}, Contratación: ${trabajador.contratacion}`);
        });
    }

    // Función para borrar un trabajador
    function borrarTrabajador() {
        let codigo = prompt("Introduce el código del trabajador a borrar:");
        let trabajador = trabajadores.find(t => t.codigo === codigo);
        if (!trabajador) {
            alert("Trabajador no encontrado.");
            return;
        }
        let confirmar = confirm(`¿Estás seguro de que quieres borrar a ${trabajador.nombre}?`);
        if (confirmar) {
            trabajadores = trabajadores.filter(t => t.codigo !== codigo);
            alert("Trabajador borrado correctamente.");
        }
    }

    // Función para modificar un trabajador
    function modificarTrabajador() {
        let codigo = prompt("Introduce el código del trabajador a modificar:");
        let trabajador = trabajadores.find(t => t.codigo === codigo);
        if (!trabajador) {
            alert("Trabajador no encontrado.");
            return;
        }

        let nuevoNombre = prompt(`Introduce el nuevo nombre (actual: ${trabajador.nombre}):`, trabajador.nombre);
        let nuevaCategoria = parseInt(prompt(`Introduce la nueva categoría (actual: ${trabajador.categoria}):`, trabajador.categoria));
        while (![1, 2, 3].includes(nuevaCategoria)) {
            nuevaCategoria = parseInt(prompt("Categoría no válida. Introduce 1, 2 o 3:", trabajador.categoria));
        }
        let nuevaContratacion = parseInt(prompt(`Introduce el nuevo año de contratación (actual: ${trabajador.contratacion}):`, trabajador.contratacion));
        while (isNaN(nuevaContratacion) || nuevaContratacion > new Date().getFullYear()) {
            nuevaContratacion = parseInt(prompt("Año de contratación no válido. Introduce un año correcto:", trabajador.contratacion));
        }

        trabajador.nombre = nuevoNombre;
        trabajador.categoria = nuevaCategoria;
        trabajador.contratacion = nuevaContratacion;
        alert("Trabajador modificado correctamente.");
    }

    // Función para calcular nóminas
    function calcularNominas() {
        if (trabajadores.length === 0) {
            console.log("No hay trabajadores registrados.");
            return;
        }

        let totalPorCategoria = { 1: 0, 2: 0, 3: 0 };
        let totalGeneral = 0;

        trabajadores.sort((a, b) => a.categoria - b.categoria);

        console.log("Listado de nóminas:");
        trabajadores.forEach(trabajador => {
            let salarioBase = trabajador.categoria === 1 ? 1100 : trabajador.categoria === 2 ? 1400 : 1900;
            let antiguedad = new Date().getFullYear() - trabajador.contratacion;
            let salario = salarioBase + salarioBase * (0.04 * antiguedad);
            totalPorCategoria[trabajador.categoria] += salario;
            totalGeneral += salario;

            console.log(`${trabajador.codigo} - ${trabajador.nombre}, Categoría: ${trabajador.categoria}, Antigüedad: ${antiguedad} años, Salario: ${salario.toFixed(2)}€`);
        });

        console.log("Resumen de nóminas por categoría:");
        Object.keys(totalPorCategoria).forEach(categoria => {
            console.log(`Categoría ${categoria}: ${totalPorCategoria[categoria].toFixed(2)}€`);
        });

        console.log(`Total de nóminas de la empresa: ${totalGeneral.toFixed(2)}€`);
    }

    // Menú principal
    function menu() {
        let opcion;
        do {
            opcion = parseInt(prompt(`Gestión de Personal\n1. Listar trabajadores\n2. Crear trabajador\n3. Borrar trabajador\n4. Modificar trabajador\n5. Calcular nóminas\n6. Salir\nElige una opción:`));
            switch (opcion) {
                case 1:
                    listarTrabajadores();
                    break;
                case 2:
                    crearTrabajador();
                    break;
                case 3:
                    borrarTrabajador();
                    break;
                case 4:
                    modificarTrabajador();
                    break;
                case 5:
                    calcularNominas();
                    break;
                case 6:
                    alert("Saliendo del programa...");
                    break;
                default:
                    alert("Opción no válida.");
            }
        } while (opcion !== 6);
    }

    // Iniciar el menú
    menu();

})();
