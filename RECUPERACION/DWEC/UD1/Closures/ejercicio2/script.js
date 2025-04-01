const $yedra = (function () {
    let alumnos = [
        { nombre: "Ana", nota: 4, modulo: "DWEC", convocatorias: 2 },
        { nombre: "Luis", nota: 3, modulo: "DWES", convocatorias: 1 },
        { nombre: "María", nota: 5, modulo: "DWEC", convocatorias: 3 },
        { nombre: "Carlos", nota: 3, modulo: "DWES", convocatorias: 4 },
        { nombre: "Elena", nota: 8, modulo: "DWEC", convocatorias: 2 },
        { nombre: "Jorge", nota: 2, modulo: "DWES", convocatorias: 3 }
    ];

    function obtenerSuspensos() {
        return alumnos
            .filter(alumno => alumno.nota < 5)
            .sort((a, b) => a.nombre > b.nombre ? 1 : -1);
    }

    function obtenerEstadisticasPorModulo() {
        let modulos = {};

        alumnos.forEach(alumno => {
            if (!modulos[alumno.modulo]) {
                modulos[alumno.modulo] = { 
                    modulo: alumno.modulo,
                    sumaNotas: 0, 
                    sumaConvocatorias: 0, 
                    numAlumnos: 0 
                };
            }

            modulos[alumno.modulo].sumaNotas += alumno.nota;
            modulos[alumno.modulo].sumaConvocatorias += alumno.convocatorias;
            modulos[alumno.modulo].numAlumnos++;
        });

        for (let modulo in modulos) {
            modulos[modulo].notaMedia = (modulos[modulo].sumaNotas / modulos[modulo].numAlumnos).toFixed(2);
            modulos[modulo].convocatoriasMedia = (modulos[modulo].sumaConvocatorias / modulos[modulo].numAlumnos).toFixed(2);
        }

        return Object.values(modulos);
    }

    function obtenerJSON(){
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

    return {
        obtenerSuspensos,
        obtenerEstadisticasPorModulo,
        obtenerJSON,
        cargarJSON
    };
})();

console.log($yedra.obtenerSuspensos());
console.log($yedra.obtenerEstadisticasPorModulo());
console.log($yedra.obtenerJSON());
