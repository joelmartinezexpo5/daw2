const baseUrl = "http://localhost:8000";
const headers = { "Content-Type": "application/json" };

async function obtenerAlumnos() {
    try {
        const respuesta = await fetch(`${baseUrl}/alumnos`);
        const data = await respuesta.json();

        if (data.detail) {
            throw new Error(`Datos inválidos: ${JSON.stringify(data.detail)}`);
        }
        return data;
    } catch (e) {        
        console.log(e);
        throw e;
    }
}

async function obtenerAlumno(id) {
    try {
        const respuesta = await fetch(`${baseUrl}/alumnos/${id}`);
        const data = await respuesta.json();

        if (data.detail) {
            throw new Error(`Datos inválidos: ${JSON.stringify(data.detail)}`);
        }
        return data;
    } catch (e) {
        console.log(e);
        throw e;
    }
}

async function crearAlumno(nuevoAlumno) {
    try {
        const respuesta = await fetch(`${baseUrl}/alumnos`, {
            method: "POST",
            headers,
            body: JSON.stringify(nuevoAlumno),
        });

        const data = await respuesta.json();
        if (data.detail) {
            throw new Error(`Datos inválidos: \n${JSON.stringify(data.detail)}`);
        }
        return data;
    } catch (e) {
        console.log(e);
        throw e;
    }
}

async function actualizarAlumno(alumno) {
    try {
        const respuesta = await fetch(`${baseUrl}/alumnos/${alumno.alumnoId}`, {
            method: "PUT",
            headers,
            body: JSON.stringify(alumno),
        });

        const data = await respuesta.json();
        if (data.detail) {
            throw new Error(`Datos inválidos: \n${JSON.stringify(data.detail)}`);
        }
        return data;
    } catch (e) {
        console.log(e);
        throw e;
    }
}

async function eliminarAlumno(id) {
    try {
        const respuesta = await fetch(`${baseUrl}/alumnos/${id}`, {
            method: "DELETE",
            headers,
        });

        const data = await respuesta.json();
        if (data.detail) {
            throw new Error(`Datos inválidos: ${JSON.stringify(data.detail)}`);
        }
        return data;
    } catch (e) {
        console.log(e);
        throw e;
    }
}

export {
    obtenerAlumnos,
    obtenerAlumno,
    crearAlumno,
    actualizarAlumno,
    eliminarAlumno
};
