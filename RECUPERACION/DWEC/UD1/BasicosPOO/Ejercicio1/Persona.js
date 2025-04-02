//Objeto json
const persona = {
    nombre: 'Joel',
    edad: 22,
    hobbies: ['escuchar musica', 'jugar a futbol'],
    saludar: function(){
        console.log(`Hola me llamo ${this.nombre} y me gusta ${this.hobbies.join(' y ')}`);
    }
}

persona.saludar();

// Funcion constructora
function Persona(nombre, edad, hobbies){
    this.nombre = nombre;
    this.edad = edad;
    this.hobbies = hobbies;
    this.saludar = function(){
        console.log(`Hola me llamo ${this.nombre} y me gusta ${this.hobbies.join(' y ')}`)
    };
}

const persona1 = new Persona('Joel', 22, ['escuchar musica', 'jugar a futbol']);
persona1.saludar();

// Clase de ES6
class PersonaES6{
    constructor(nombre, edad, hobbies){
        this.nombre = nombre;
        this.edad = edad;
        this.hobbies = hobbies;
    }

    saludar(){
        console.log(`Hola me llamo ${this.nombre} y me gusta ${this.hobbies.join(' y ')}`);
    }
}

const persona2 = new PersonaES6('Joel', 22, ['escuchar musica', 'jugar a futbol']);
persona2.saludar();