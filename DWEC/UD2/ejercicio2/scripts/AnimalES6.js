// Función constructora Animal
function Animal(nombre) {
    this.nombre = nombre;
}

Animal.prototype.comer = function () {
    return `${this.nombre} está comiendo`;
};

Animal.prototype.dormir = function () {
    return `${this.nombre} está durmiendo`;
};

Animal.prototype.hacerRuido = function () {
    return `${this.nombre} hace un ruido genérico`;
};

// Función constructora Perro
function Perro(nombre) {
    Animal.call(this, nombre); // Llamamos al constructor de Animal
}

// Establecemos la herencia usando __proto__
Perro.prototype.__proto__ = Animal.prototype;

// Método específico de Perro
Perro.prototype.hacerRuido = function () {
    return `${this.nombre} hace guau`;
};

// Función constructora Gato
function Gato(nombre) {
    Animal.call(this, nombre); // Llamamos al constructor de Animal
}

// Establecemos la herencia usando __proto__
Gato.prototype.__proto__ = Animal.prototype;

// Método específico de Gato
Gato.prototype.hacerRuido = function () {
    return `${this.nombre} hace miau`;
}

// Pruebas del código
const perro = new Perro("Rex");
console.log(perro.comer());           // Rex está comiendo
console.log(perro.dormir());          // Rex está durmiendo
console.log(perro.hacerRuido());      // Rex hace guau

const gato = new Gato("Misu");
console.log(gato.comer());            // Misu está comiendo
console.log(gato.dormir());           // Misu está durmiendo
console.log(gato.hacerRuido());       // Misu hace miau

const animalGenerico = new Animal("Genérico");
console.log(animalGenerico.hacerRuido());  // Genérico hace un ruido genérico
