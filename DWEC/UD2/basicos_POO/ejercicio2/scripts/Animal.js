/**
 * Primera parteCrea una función constructora“Animal”que recibacomo parámetros el tipo 
 * y el nombre. Contamos con 3 tipos de animal: “animal”(genérico), “perro”y “gato”.
 * La clase contará con 3 métodos: •“comer”, devuelve la cadena “nombreestá comiendo”.
 * •“dormir”, devuelve la cadena “nombre está durmiendo”.•“hacerRuido”,devuelve una cadena 
 * distinta según el tipo, por ejemplo,para el tipo perro “nombre hace guau”.Codifícalode 
 * la manera más correcta posible.Segunda parteVuelve a codificar la clase Animal empleando 
 * herencia con el formato ES6.Opcional (aunque recomendado)Vuelve a codificar la primera 
 * parte empleando herencia en funciones constructoras, te recuerdoque hay una propiedad 
 * especial llamada “__proto__”(no confundir con “prototype”).Añade el código necesario para 
 * probar el código desarrollado, y no seas cutre borrando una parte para desarrollar la 
 * siguiente(crea varios ficheros .js).
 */

function Animal(tipo, nombre) {
    const tiposValidos = ['animal', 'perro', 'gato'];
    this.tipo = tiposValidos.includes(tipo) ? tipo : 'animal';
    this.nombre = nombre;
}

Animal.prototype.comer = function() {
    return `${this.nombre} está comiendo.`;
};

Animal.prototype.dormir = function() {
    return `${this.nombre} está durmiendo.`;
};

Animal.prototype.hacerRuido = function() {
    switch(this.tipo) {
        case 'perro':
            return `${this.nombre} hace guau`;
        case 'gato':
            return `${this.nombre} hace miau`;
        default:
            return `${this.nombre} hace ruido`;
    }
};

// Pruebas
let perro1 = new Animal('perro', 'Max');
console.log(perro1.comer());
console.log(perro1.dormir());
console.log(perro1.hacerRuido());

let gato1 = new Animal('gato', 'Lucas');
console.log(gato1.comer());
console.log(gato1.dormir());
console.log(gato1.hacerRuido());

let animal1 = new Animal('elefante', 'Marco');
console.log(animal1.comer());
console.log(animal1.dormir());
console.log(animal1.hacerRuido());
