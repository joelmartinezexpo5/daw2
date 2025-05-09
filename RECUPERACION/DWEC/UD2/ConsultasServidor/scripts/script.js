async function obtenerDatos() {
    try {
        const response = await fetch(
            "https://jsonplaceholder.typicode.com/users");
        if (!response.ok) {
            throw new Error(`Error HTTP: ${response.status}`);
        }
        const data = await response.json();
        console.log("Datos recibidos:", data);
    } catch (error) {
        console.error("Error al realizar la solicitud:", error.message);
    }
}
obtenerDatos();

