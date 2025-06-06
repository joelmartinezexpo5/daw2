const baseUrl = "http://localhost:8000";
const headers = { "Content-Type": "application/json" };

async function obtenerPracticas() {
    try {
        const respuesta = await fetch(`${baseUrl}/practicas`, {
            method: "GET",
            headers,
        });
        const data = await respuesta.json();

        if (data.detail) {
            throw new Error(`Datos invalidos: ${JSON.stringify(data.detail)}`);
        }
        return data;
    } catch (e) {        
        console.log(e);
        throw e;
    }
}

async function obtenerPractica(id) {
    try {
        const respuesta = await fetch(`${baseUrl}/practicas/${id}`, {
            method: "GET",
            headers,
        });
        const data = await respuesta.json();

        if (data.detail) {
            throw new Error(`Datos invalidos: ${JSON.stringify(data.detail)}`);
        }
        return data;
    } catch (e) {
        console.log(e);
        throw e;
    }
}

async function crearPractica(nuevaPractica) {
    try {
        const respuesta = await fetch(`${baseUrl}/practicas`, {
            method: "POST",
            headers,
            body: JSON.stringify(nuevaPractica),
        });

        const data = await respuesta.json();

        if (data.detail) {
            throw new Error(`Datos invalidos: \n${JSON.stringify(data.detail)}`);
        }
        return data;
    } catch (e) {
        console.log(e);
        throw e;
    }
}

async function actualizarPractica(practica) {
  try {
    const respuesta = await fetch(`${baseUrl}/practicas/${practica.practicaId}`, {
      method: "PUT",
      headers,
      body: JSON.stringify(practica),
    });

    const data = await respuesta.json();
    if (data.detail) {
      throw new Error(`Datos invalidos: \n${JSON.stringify(data.detail)}`);
    }
    return data;
  } catch (e) {
    console.log(e);
    throw e;
  }
}


async function eliminarPractica(id) {
    try {
        const respuesta = await fetch(`${baseUrl}/practicas/${id}`, {
            method: "DELETE",
            headers,
        });

        const data = await respuesta.json();

        if (data.detail) {
            throw new Error(`Datos invalidos: ${JSON.stringify(data.detail)}`);
        }
        return data;
    } catch (e) {
        console.log(e);
        throw e;
    }
}

export { obtenerPracticas, obtenerPractica, crearPractica, actualizarPractica, eliminarPractica };
