/**
 * 1-Crea un programa en el que crees 4 variables: 2 cadenas y 2 números, con los siguientes
valores: tu nombre, tu apellido, tu edad y tu año de nacimiento.
    Muestra en un alert las variables introducidas con formato clave valor en donde los
    valores cadena aparezcan envueltos entre comillas dobles y los valores numéricos
    entre comillas simples.
    Muestra en un alert tu nombre y apellidos separados por un salto de línea.
    Muestra en un alert la suma de las variables edad y año de nacimiento.
    Muestra en un alert la suma de todas las variables. 
 */

let nombre = 'Joel';
let apellido = 'Martinez';
let edad = 22;
let anioNacimiento = 2002;

alert('Mi nombre es ' + nombre);
alert('Mi apellido es ' + apellido);
alert('Mi edad es ' + edad);
alert('Mi año de nacimiento es ' + anioNacimiento);

alert(nombre + '\n' + apellido);

alert(edad + anioNacimiento);

alert(edad + anioNacimiento + nombre + apellido);
