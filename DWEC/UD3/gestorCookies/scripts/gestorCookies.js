class GestorCookies {
    constructor() {
        this.defaultExpires = 20 * 24 * 60 * 60 * 1000; // 20 días en milisegundos
    }

    set(nombre, valor, opciones = {}) {
        let cookieStr = `${encodeURIComponent(nombre)}=${encodeURIComponent(valor)}`;
        if (opciones.path) {
            cookieStr += `; path=${opciones.path}`;
        }
        if (opciones.expires) {
            const fecha = new Date(opciones.expires).toUTCString();
            cookieStr += `; expires=${fecha}`;
        } else {
            const fechaDefault = new Date(Date.now() + this.defaultExpires).toUTCString();
            cookieStr += `; expires=${fechaDefault}`;
        }
        if (opciones['max-age']) {
            cookieStr += `; max-age=${opciones['max-age']}`;
        }
        document.cookie = cookieStr;
    }

    get(nombre) {
        const cookies = document.cookie.split('; ');
        for (const cookie of cookies) {
            const [key, value] = cookie.split('=');
            if (key === decodeURIComponent(nombre)) {
                return decodeURIComponent(value);
            }
        }
        return null;
    }

    delete(nombre) {
        this.set(nombre, '', { 'max-age': 0 });
    }

    deleteAll() {
        const cookies = document.cookie.split('; ');
        for (const cookie of cookies) {
            const [key] = cookie.split('=');
            this.delete(decodeURIComponent(key));
        }
    }

    renew(nombre, opciones = {}) {
        const valor = this.get(nombre);
        if (valor !== null) {
            this.set(nombre, valor, opciones);
        }
    }

    renewAll(opciones = {}) {
        const cookies = document.cookie.split('; ');
        for (const cookie of cookies) {
            const [key, value] = cookie.split('=');
            this.renew(decodeURIComponent(key), opciones);
        }
    }

    toString() {
        return document.cookie;
    }

    keys() {
        return document.cookie.split('; ').map(cookie => decodeURIComponent(cookie.split('=')[0]));
    }

    values() {
        return document.cookie.split('; ').map(cookie => decodeURIComponent(cookie.split('=')[1]));
    }

    entries() {
        return document.cookie.split('; ').map(cookie => {
            const [key, value] = cookie.split('=');
            return [decodeURIComponent(key), decodeURIComponent(value)];
        });
    }
}

// Pruebas de GestorCookies
function testGestorCookies() {
    const gestor = new GestorCookies();
    const output = document.getElementById('output');
    output.textContent = ''; // Limpiar el contenido previo

    // Crear cookies
    gestor.set('user', 'JohnDoe');
    gestor.set('theme', 'dark', { path: '/', expires: '2025-12-31T23:59:59Z' });

    // Obtener cookies
    output.textContent += `user: ${gestor.get('user')}\n`; // JohnDoe
    output.textContent += `theme: ${gestor.get('theme')}\n`; // dark

    // Eliminar una cookie
    gestor.delete('user');
    output.textContent += `user after delete: ${gestor.get('user')}\n`; // null

    // Renovar cookies
    gestor.renew('theme', { 'max-age': 3600 }); // Renovar por 1 hora

    // Obtener todas las claves, valores y pares
    output.textContent += `keys: ${JSON.stringify(gestor.keys())}\n`; // ['theme']
    output.textContent += `values: ${JSON.stringify(gestor.values())}\n`; // ['dark']
    output.textContent += `entries: ${JSON.stringify(gestor.entries())}\n`; // [['theme', 'dark']]

    // Convertir todas las cookies a cadena
    output.textContent += `toString: ${gestor.toString()}\n`;

    // Eliminar todas las cookies
    gestor.deleteAll();
    output.textContent += `toString after deleteAll: ${gestor.toString()}\n`; // ''
}
