/*A partir de la clase Persona, con la siguiente estructura:
•Campos: “nombre”, “nacimiento” (fecha) y “hobbies“(listade cadenas). 
•Propiedades: “edad” (get), computada a partir de nacimiento.
•Métodos: “Saludar”, devuelve la cadena “Hola, me llamo NOMBRE y me gusta LISTA_HOBBIES”.
Se pide:Define y prueba la clase “Persona” según los 3 formatos de definición de clases soportados por JS: 
objeto literal, función constructora y ES6.*/

//Objeto literal
const persona = {
    nombre: 'Joel',
    nacimiento: new Date('2002-07-26'),
    hobbies: ['leer', 'correr', 'programar'],
    get edad() {
        const hoy = new Date();
        let edad = hoy.getFullYear() - this.nacimiento.getFullYear();
        return edad;
    },
    saludar: function () {
        return `Hola, me llamo ${this.nombre} y me gusta ${this.hobbies}.`;
    }
};

console.log(persona.saludar());
console.log(persona.edad)

//Funcion constructora
function Persona(nombre, nacimiento, hobbies) {
    this.nombre = nombre;
    this.nacimiento = new Date(nacimiento);
    this.hobbies = hobbies;
    Object.defineProperty(this, "edad", {
        get() {
            const hoy = new Date();
            let edad = hoy.getFullYear() - this.nacimiento.getFullYear();
            return edad;
        }
    });
}

Object.prototype.saludar = function () {
    return `Hola, me llamo ${this.nombre} y me gusta ${this.hobbies}.`;
}

let p1 = new Persona("Joel",'2002-07-26',['escuchar muscica', 'futbol']);

console.log(p1.saludar());
console.log(p1.edad);


// Formato ES6
class PersonaES6 {
    constructor(nombre, nacimiento, hobbies) {
        this.nombre = nombre;
        this.nacimiento = new Date(nacimiento);
        this.hobbies = [hobbies];
    }

    get edad() {
        const hoy = new Date();
        let edad = hoy.getFullYear() - this.nacimiento.getFullYear();
        return edad;
    }

    saludar() {
        return `Hola, me llamo ${this.nombre} y me gusta ${this.hobbies}.`;
    }
}

const persona1 = new PersonaES6('Joel', '2002-07-26', 'escuchar musica')
console.log(persona1.saludar());
console.log(persona1.edad);