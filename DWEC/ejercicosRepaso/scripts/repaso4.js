function expresionEquilibrada(expresion) {
    let pila = [];
    const pares = { ')': '(', ']': '[', '}': '{' };
    
    for (let i = 0; i < expresion.length; i++) {
      let caracter = expresion[i];
      
      if (caracter === '(' || caracter === '[' || caracter === '{') {
        pila.push(caracter);
      } else if (caracter === ')' || caracter === ']' || caracter === '}') {
        if (pila.length === 0 || pila[pila.length - 1] !== pares[caracter]) {
          return false;
        }
        pila.pop(); // Eliminar el último elemento
      }
    }
    
    return pila.length === 0;
  }
  