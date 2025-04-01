const $yedra = (function () {
    let alumnos = [
        { nombre: "Ana", nota: 4, modulo: "DWEC", convocatorias: 2 },
        { nombre: "Luis", nota: 7, modulo: "DWES", convocatorias: 1 },
        { nombre: "María", nota: 5, modulo: "DWEC", convocatorias: 3 },
        { nombre: "Carlos", nota: 3, modulo: "DWES", convocatorias: 4 },
        { nombre: "Elena", nota: 8, modulo: "DWEC", convocatorias: 2 },
        { nombre: "Jorge", nota: 2, modulo: "DWES", convocatorias: 3 }
    ];

    function obtenerSuspensos() {
        return alumnos.filter(a => a.nota < 5)
                      .map(a => ({ nombre: a.nombre, nota: a.nota, modulo: a.modulo }))
                      .sort((a, b) => a.nombre.localeCompare(b.nombre));
    }

    function estadisticasPorModulo() {
        let modulos = {};
        
        alumnos.forEach(a => {
            if (!modulos[a.modulo]) {
                modulos[a.modulo] = { sumaNotas: 0, sumaConvocatorias: 0, cantidad: 0 };
            }
            modulos[a.modulo].sumaNotas += a.nota;
            modulos[a.modulo].sumaConvocatorias += a.convocatorias;
            modulos[a.modulo].cantidad++;
        });
        
        return Object.entries(modulos).map(([modulo, datos]) => ({
            modulo,
            notaMedia: (datos.sumaNotas / datos.cantidad).toFixed(2),
            convocatoriasMedia: (datos.sumaConvocatorias / datos.cantidad).toFixed(2)
        })).sort((a, b) => b.convocatoriasMedia - a.convocatoriasMedia);
    }

    function obtenerJSON() {
        return JSON.stringify(alumnos, null, 2);
    }

    function cargarJSON(cadena) {
        try {
            let nuevosDatos = JSON.parse(cadena);
            if (!Array.isArray(nuevosDatos)) throw new Error("El JSON no es un array válido.");
            alumnos = nuevosDatos;
            alert("Datos cargados correctamente.");
        } catch (error) {
            alert("Error al cargar JSON: " + error.message);
        }
    }

    alert("Alumnos suspensos:\n" + JSON.stringify(obtenerSuspensos(), null, 2));
    alert("Estadísticas por módulo:\n" + JSON.stringify(estadisticasPorModulo(), null, 2));
    alert("Datos en JSON:\n" + obtenerJSON());

    return { obtenerSuspensos, estadisticasPorModulo, obtenerJSON, cargarJSON };
})();
