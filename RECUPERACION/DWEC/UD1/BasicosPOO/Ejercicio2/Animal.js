//Funcion constructora
function Animal(tipo, nombre){
    this.tipo = tipo;
    this.nombre = nombre
    this.dormir = function(){
        console.log(`${this.nombre} esta durmiendo`);
    }
    this.comer = function(){
        console.log(`${this.nombre} esta comiendo`);
    }
    this.hacerRuido = function(){
        if(this.tipo === 'animal'){
            console.log(`${this.nombre} ha hecho un ruido`);
        }else if(this.tipo === 'gato'){
            console.log(`${this.nombre} hace miau`);
        }else if(this.tipo === 'perro'){
            console.log(`${this.nombre} hace guau`);
        }
    }
}

const animal1 = new Animal('animal', 'jhdfj');
animal1.comer();
animal1.dormir();
animal1.hacerRuido();

//Clase ES6
class AnimalES6{
    constructor(tipo, nombre){
        this.tipo = tipo;
        this.nombre = nombre;
    }

    dormir(){
        console.log(`${this.nombre} esta durmiendo`);
    }

    comer(){
        console.log(`${this.nombre} esta comiendo`);
    }

    hacerRuido(){
        if(this.tipo === 'animal'){
            console.log(`${this.nombre} ha hecho un ruido`);
        }else if(this.tipo === 'gato'){
            console.log(`${this.nombre} hace miau`);
        }else if(this.tipo === 'perro'){
            console.log(`${this.nombre} hace guau`);
        }
    }
}

const animal2 = new AnimalES6('gato', 'ejkre');
animal2.comer();
animal2.dormir();
animal2.hacerRuido();
