const baseUrl = "http://localhost:8000";
const headers = { "Content-Type": "application/json" };

async function obtenerEmpresas() {
    try {
        const respuesta = await fetch(`${baseUrl}/empresas`, {
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

async function obtenerEmpresa(id) {
    try {
        const respuesta = await fetch(`${baseUrl}/empresas/${id}`, {
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

async function crearEmpresa(nuevaEmpresa) {
    try {
        const respuesta = await fetch(`${baseUrl}/empresas`, {
            method: "POST",
            headers,
            body: JSON.stringify(nuevaEmpresa),
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

async function actualizarEmpresa(empresa) {
    try {
        const respuesta = await fetch(`${baseUrl}/empresas/${empresa.empresaId}`, {
            method: "PUT",
            headers,
            body: JSON.stringify(empresa),
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

async function eliminarEmpresa(id) {
    try {
        const respuesta = await fetch(`${baseUrl}/empresas/${id}`, {
            method: "DELETE",
            headers,
        });

        // Suponiendo que la API responde con JSON aunque sea solo un mensaje
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

export { obtenerEmpresas, obtenerEmpresa, crearEmpresa, actualizarEmpresa, eliminarEmpresa };
