(function () {
    // Función para obtener la estructura del DOM en JSON
    function obtenerEstructuraJSON(nodo) {
        if (!nodo || !(nodo instanceof HTMLElement)) return null;

        return {
            etiqueta: nodo.tagName.toLowerCase(),
            texto: nodo.textContent.trim(),
            tieneId: !!nodo.id,
            lstClass: [...nodo.classList],
            lstData: Object.fromEntries(
                [...nodo.attributes].filter(attr => attr.name.startsWith("data-"))
                .map(attr => [attr.name, attr.value])
            ),
            lstHijos: [...nodo.children].map(obtenerEstructuraJSON)
        };
    }

    // Función para imprimir la ruta al nodo objetivo
    function imprimirEstructura(selector) {
        const nodo = document.querySelector(selector);
        if (!nodo) return `No se encontró el nodo con el selector "${selector}"`;

        let actual = nodo;
        const ruta = [];

        while (actual) {
            const etiqueta = actual.tagName.toLowerCase();
            const id = actual.id || "noid";
            const clases = actual.classList.length ? [...actual.classList].join(",") : "noclass";
            const texto = actual.textContent.trim() || "sincontenido";

            ruta.unshift(`${etiqueta}-${id}-${clases}-${texto}`);
            actual = actual.parentElement;
        }

        return ruta.join(" > ");
    }

    // Exponer las funciones
    window.domAnalizador = {
        obtenerEstructuraJSON: () => obtenerEstructuraJSON(document.body),
        imprimirEstructura
    };
})();
