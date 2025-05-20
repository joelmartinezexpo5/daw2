const baseUrl = 'http://localhost:8000';

const inputId = document.getElementById('libro-id')
const inputTitulo = document.getElementById('titulo');
const inputAutor = document.getElementById('autor');
const inputPublicacion = document.getElementById('publicacion');
const inputPrecio = document.getElementById('precio');
const selectTipo = document.getElementById('tipo');
const form = document.getElementById('form-libro');

export async function crearLibro(libro) {
    try {
        const response = await fetch(`${baseUrl}/libros`, {
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

export async function obtenerLibro(id) {
    try {
        const response = await fetch(`${baseUrl}/libros/${id}`);
        if (!response.ok) {
            throw new Error('Libro no encontrado');
        }
        return await response.json();
    } catch (error) {
        console.error('Error:', error);
        throw error;
    }
}

export async function actualizarLibro(id, libro) {
    try {
        const response = await fetch(`${baseUrl}/libros/actualizar/${id}`, {
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

const parametro = new URLSearchParams(window.location.search);
const id = parametro.get('id');
console.log(id);

if (id) {
    let libro = await obtenerLibro(id);
    console.log(libro)
    inputId.value = libro.id;
    inputTitulo.value = libro.titulo;
    inputAutor.value = libro.autor;
    inputPublicacion.value = libro.publicacion;
    inputPrecio.value = libro.precio;
    selectTipo.value = libro.tipo;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const libro = {
            id: inputId.value ? parseInt(inputId.value) : 0,
            titulo: inputTitulo.value.trim(),
            autor: inputAutor.value.trim(),
            publicacion: inputPublicacion.value,
            precio: parseFloat(inputPrecio.value),
            tipo: selectTipo.value,
        };

        try {
            if (inputId.value) {
                await actualizarLibro(libro.id, libro);
                alert('Libro actualizado');
            } else {
                await crearLibro(libro);
                alert('Libro creado');
            }
        } catch (error) {
            alert(error.message || 'Error al guardar el libro');
        }
    });
    
} else {

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const libro = {
            id: inputId.value ? parseInt(inputId.value) : 0,
            titulo: inputTitulo.value.trim(),
            autor: inputAutor.value.trim(),
            publicacion: inputPublicacion.value,
            precio: parseFloat(inputPrecio.value),
            tipo: selectTipo.value,
        };

        try {
            if (inputId.value) {
                await actualizarLibro(libro.id, libro);
                alert('Libro actualizado');
            } else {
                await crearLibro(libro);
                alert('Libro creado');
            }
        } catch (error) {
            alert(error.message || 'Error al guardar el libro');
        }
    });
}