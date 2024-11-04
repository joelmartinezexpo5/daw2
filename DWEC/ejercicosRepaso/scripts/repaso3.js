// Diccionario para la conversión de texto a Morse y viceversa
const diccionarioMorse = {
    'A': '.-', 'B': '-...', 'C': '-.-.', 'D': '-..', 'E': '.', 'F': '..-.', 'G': '--.',
    'H': '....', 'I': '..', 'J': '.---', 'K': '-.-', 'L': '.-..', 'M': '--', 'N': '-.',
    'O': '---', 'P': '.--.', 'Q': '--.-', 'R': '.-.', 'S': '...', 'T': '-', 'U': '..-',
    'V': '...-', 'W': '.--', 'X': '-..-', 'Y': '-.--', 'Z': '--..', '1': '.----',
    '2': '..---', '3': '...--', '4': '....-', '5': '.....', '6': '-....', '7': '--...',
    '8': '---..', '9': '----.', '0': '-----', ' ': ' '
  };
  
  // Invertimos el diccionario para decodificar de Morse a texto
  const diccionarioMorseInverso = {};
  for (let clave in diccionarioMorse) {
    diccionarioMorseInverso[diccionarioMorse[clave]] = clave;
  }
  
  function codigoMorse(texto) {
    let esMorse = false;
    
    // Detectamos si el texto es código Morse
    for (let i = 0; i < texto.length; i++) {
      if (texto[i] === '.' || texto[i] === '-') {
        esMorse = true;
        break;
      }
    }
  
    if (esMorse) { // Decodificación de Morse a Texto
      let palabras = [];
      let palabraActual = "";
      let letraActual = "";
      
      for (let i = 0; i < texto.length; i++) {
        if (texto[i] === ' ' && letraActual) {
          palabraActual += diccionarioMorseInverso[letraActual];
          letraActual = "";
        } else if (texto[i] === ' ' && palabraActual) {
          palabras.push(palabraActual);
          palabraActual = "";
        } else if (texto[i] !== ' ') {
          letraActual += texto[i];
        }
      }
      
      if (letraActual) palabraActual += diccionarioMorseInverso[letraActual];
      if (palabraActual) palabras.push(palabraActual);
      
      // Unimos las palabras decodificadas con espacios
      let resultado = "";
      for (let i = 0; i < palabras.length; i++) {
        resultado += palabras[i];
        if (i < palabras.length - 1) resultado += " ";
      }
      
      return resultado;
      
    } else { // Codificación de Texto a Morse
      let resultado = "";
      let textoMayusculas = "";
      
      // Convertimos el texto a mayúsculas sin métodos nativos
      for (let i = 0; i < texto.length; i++) {
        let charCode = texto.charCodeAt(i);
        if (charCode >= 97 && charCode <= 122) {
          textoMayusculas += String.fromCharCode(charCode - 32);
        } else {
          textoMayusculas += texto[i];
        }
      }
      
      for (let i = 0; i < textoMayusculas.length; i++) {
        let letra = textoMayusculas[i];
        let morseChar = diccionarioMorse[letra];
        
        if (morseChar) {
          resultado += morseChar;
          if (i < textoMayusculas.length - 1) {
            resultado += " ";
          }
        }
      }
      
      return resultado;
    }
  }

  console.log(codigoMorse('SOS'));