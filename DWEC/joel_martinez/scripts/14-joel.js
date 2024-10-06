/**
 * 14-Crea un programa de gestión académica. 
 * Teniendo en cuenta: 
 * • El objeto JSON de tipo alumno tiene las propiedades “nombre” y “asignaturas”. 
 * • El objeto JSON de tipo asignatura tiene las propiedades “modulo” y “nota”.  
 * • Disponemos módulos de “DWEC”, “DIW”, “DWES” y “DAW”. 
 * Partiendo de un array de al menos 3 alumnos debidamente inicializados.  
 * Crea una función que reciba el array de alumnos y que para cada alumno añada las siguientes 
 * propiedades: 
 * • promociona, valor true si todos los módulos están aprobados, falso en caso contrario. 
 * • media, valor medio del expediente del alumno. 
 * Crea una función que reciba el array de alumnos modificado e imprima el listado de alumnos 
 * que promocionan con el formato “Índice-Nombre-Media”. 
 * Crea una función que reciba el array de alumnos modificados e imprima el listado de alumnos 
 * que no promocionan con el formato “Índice-Nombre-Pendientes:[pendiente1, pendiente2, etc..]”. 
 * Añade el código auxiliar necesario para probar la aplicación. 
 */

// Array inicial de alumnos
let alumnos = [
    {
        nombre: "Juan",
        asignaturas: [
            { modulo: "DWEC", nota: 8 },
            { modulo: "DIW", nota: 7 },
            { modulo: "DWES", nota: 6 },
            { modulo: "DAW", nota: 5 }
        ]
    },
    {
        nombre: "María",
        asignaturas: [
            { modulo: "DWEC", nota: 9 },
            { modulo: "DIW", nota: 4 },
            { modulo: "DWES", nota: 7 },
            { modulo: "DAW", nota: 6 }
        ]
    },
    {
        nombre: "Pedro",
        asignaturas: [
            { modulo: "DWEC", nota: 10 },
            { modulo: "DIW", nota: 10 },
            { modulo: "DWES", nota: 10 },
            { modulo: "DAW", nota: 10 }
        ]
    }
];

// Función para añadir las propiedades "promociona" y "media"
function procesarAlumnos(alumnos) {
    alumnos.forEach(alumno => {
        let todasAprobadas = true;
        let sumaNotas = 0;
        alumno.asignaturas.forEach(asignatura => {
            if (asignatura.nota < 5) {
                todasAprobadas = false;
            }
            sumaNotas += asignatura.nota;
        });

        alumno.media = (sumaNotas / alumno.asignaturas.length).toFixed(2);
        alumno.promociona = todasAprobadas;
    });
}

// Función para imprimir los alumnos que promocionan
function imprimirPromocionan(alumnos) {
    console.log("Alumnos que promocionan:");
    alumnos.forEach((alumno, index) => {
        if (alumno.promociona) {
            console.log(`${index + 1} - ${alumno.nombre} - Media: ${alumno.media}`);
        }
    });
}

// Función para imprimir los alumnos que no promocionan con sus asignaturas pendientes
function imprimirNoPromocionan(alumnos) {
    console.log("Alumnos que no promocionan:");
    alumnos.forEach((alumno, index) => {
        if (!alumno.promociona) {
            let pendientes = alumno.asignaturas
                .filter(asignatura => asignatura.nota < 5)
                .map(asignatura => asignatura.modulo);
            console.log(`${index + 1} - ${alumno.nombre} - Pendientes: [${pendientes.join(', ')}]`);
        }
    });
}

// Procesar los alumnos
procesarAlumnos(alumnos);

// Imprimir resultados
imprimirPromocionan(alumnos);
imprimirNoPromocionan(alumnos);
