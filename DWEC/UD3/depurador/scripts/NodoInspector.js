class NodoInspector {
    #nodoActual

    constructor(nodoInicial){
        this.#nodoActual=nodoInicial;
    }

    get esRaiz() {
        return this.#nodoActual === document.documentElement;
    }

    get esPrimerHijo() {
        return this.#nodoActual === this.#nodoActual.parentNode.firstElementChild;
    }

    get esUltimoHijo() {
        return this.#nodoActual === this.#nodoActual.parentNode.lastElementChild;
    }

    get tieneHijos(){
        return this.#nodoActual.children.length > 0;
    }

    obtenerInfo(){
        return {
            etiqueta: this.#nodoActual.tagName,
            id: this.#nodoActual.id || "No tiene Id",
            clases: this.#nodoActual.className || "No tiene clase",
            contenido: this.#nodoActual.textContent || "No tiene contenido"
        }
    }

    #actualizarNodo(nuevoSeleccionado){
        
    }
}

const nodo = new NodoInspector(document.querySelector('div'));
console.log(nodo);
console.log(nodo.obtenerInfo())
