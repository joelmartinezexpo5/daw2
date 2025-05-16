const API_BASE_URL = 'http://localhost:8000';

export async function obtenerLibros() {
    try {
        const response = await fetch(`${API_BASE_URL}/libros`);
        if (!response.ok) {
            throw new Error('Error al obtener los libros');
        }
        return await response.json();
    } catch (error) {
        console.error('Error:', error);
        throw error;
    }
}

export async function obtenerLibro(id) {
    try {
        const response = await fetch(`${API_BASE_URL}/libros/${id}`);
        if (!response.ok) {
            throw new Error('Libro no encontrado');
        }
        return await response.json();
    } catch (error) {
        console.error('Error:', error);
        throw error;
    }
}

export async function crearLibro(libro) {
    try {
        const response = await fetch(`${API_BASE_URL}/libros`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(libro)
        });
        
        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.detail || 'Error al crear el libro');
        }
        return await response.json();
    } catch (error) {
        console.error('Error:', error);
        throw error;
    }
}

export async function actualizarLibro(id, libro) {
    try {
        const response = await fetch(`${API_BASE_URL}/libros/actualizar/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(libro)
        });
        
        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.detail || 'Error al actualizar el libro');
        }
        return await response.json();
    } catch (error) {
        console.error('Error:', error);
        throw error;
    }
}

export async function eliminarLibro(id) {
    try {
        const response = await fetch(`${API_BASE_URL}/libros/eliminar/${id}`, {
            method: 'POST'
        });
        
        if (!response.ok) {
            throw new Error('Error al eliminar el libro');
        }
        return true;
    } catch (error) {
        console.error('Error:', error);
        throw error;
    }
}