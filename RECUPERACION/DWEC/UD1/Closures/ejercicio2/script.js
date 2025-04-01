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

        return modulos;
    }

    return {
        obtenerSuspensos,
        obtenerEstadisticasPorModulo
    };
})();

console.log($yedra.obtenerSuspensos());
console.log($yedra.obtenerEstadisticasPorModulo());
