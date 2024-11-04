function comprobarEstado(matriz) {
    // Verificar filas, columnas y diagonales
    for (let i = 0; i < 3; i++) {
      if (matriz[i][0] === matriz[i][1] && matriz[i][1] === matriz[i][2] && matriz[i][0] !== '') {
        return matriz[i][0];
      }
      if (matriz[0][i] === matriz[1][i] && matriz[1][i] === matriz[2][i] && matriz[0][i] !== '') {
        return matriz[0][i];
      }
    }
    if (matriz[0][0] === matriz[1][1] && matriz[1][1] === matriz[2][2] && matriz[0][0] !== '') {
      return matriz[0][0];
    }
    if (matriz[0][2] === matriz[1][1] && matriz[1][1] === matriz[2][0] && matriz[0][2] !== '') {
      return matriz[0][2];
    }
  
    // Comprobar si hay empate (ningún espacio vacío)
    for (let i = 0; i < 3; i++) {
      for (let j = 0; j < 3; j++) {
        if (matriz[i][j] === '') return '';
      }
    }
    return 'empate';
  }
  
  function ponerMaquina(matriz, ficha) {
    for (let i = 0; i < 3; i++) {
      for (let j = 0; j < 3; j++) {
        if (matriz[i][j] === '') {
          matriz[i][j] = ficha;
          if (comprobarEstado(matriz) === ficha) return;
          matriz[i][j] = '';
        }
      }
    }
    for (let i = 0; i < 3; i++) {
      for (let j = 0; j < 3; j++) {
        if (matriz[i][j] === '') {
          matriz[i][j] = ficha;
          return;
        }
      }
    }
  }
  
  function ponerHumano(matriz, x, y, ficha) {
    if (matriz[x][y] === '') {
      matriz[x][y] = ficha;
      return true;
    }
    return false;
  }
  
  function dibujarTablero(matriz) {
    let tablero = '';
    for (let i = 0; i < 3; i++) {
      for (let j = 0; j < 3; j++) {
        tablero += matriz[i][j] === '' ? ' ' : matriz[i][j];
        if (j < 2) tablero += ' | ';
      }
      if (i < 2) tablero += '\n---------\n';
    }
    console.log(tablero);
  }
  