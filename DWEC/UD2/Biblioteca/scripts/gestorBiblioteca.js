import Autor from "./Autor.js";
import Biblioteca from "./Biblioteca.js";
import Libro from "./Libro.js";
import datos from "./datos.js";

const $biblio = (function(){

    const autores = [];
    const libros = [];
    const bibliotecas = [];

    //Inicializacion de autores
    for (let i = 0; i < datos.autores.length; ++i) {
        const autor = datos.autores[i];
        autores.push(new Autor(autor.autorId, autor.nombre, autor.nacionalidad, autor.biografia, autor.libros));
    }

    //Inicializacion de libros
    for(let i = 0; i < datos.libros.length; ++i){
        const libro = datos.libros[i];
        libros.push(new Libro(libro.libroId, libro.titulo, libro.ISBN, libro.autorId, libro.bibliotecaId, libro.prestamos));
    }

    //Inicializacion de bibliotecas
    for(let i = 0; i < datos.bibliotecas.length; ++i){
        const biblioteca = datos.bibliotecas[i];
        bibliotecas.push(new Biblioteca(biblioteca.bibliotecaId, biblioteca.nombre, biblioteca.ubicacion));
    }

    //Generar listado de autores
    function generarHTMLListadoAutores(){
        let html = "";

        for (let i = 0; i < autores.length; ++i) {
            const autor = autores[i];
            html += autor.generarHTMLPropiedades();
        }
    
        document.querySelector("#app").innerHTML = html;
    }

    function generarHTMLListadoBibliotecas(){
        let html = "";

        for(let i = 0; i < bibliotecas.length; ++i){
            const biblioteca =  bibliotecas[i];
            html += biblioteca.generarHTMLPropiedades();
        }

        document.querySelector("#app").innerHTML = html;
    }

    function generarHTMLListadoLibros(){
        let html = "";

        for(let i = 0; i < libros.length; ++i){
            const libro = libros[i];
            html += libro.generarHTMLPropiedades();
        }

        document.querySelector("#app").innerHTML = html;
    }

    function buscarLibrosPorTitulo(titulo){
        const resultados = [];
        const tituloFormateado = titulo.toLowerCase();

        for(let i = 0; i < libros.length; ++i){
            const libro = libros[i];

            if(libro.titulo.toLowerCase().includes(tituloFormateado)){
                resultados.push(libro);
            }
        }

        return resultados;
    }

    function buscarLibrosPorAutor(autor){
        const resultados = [];
        const autorFormateado = autor.toLowerCase();

        for(let i = 0; i < autores.length; ++i){
            const autor = autores[i];

            if(autor.nombre.toLowerCase().includes(autorFormateado)){
                for(let j = 0; j < libros.length; ++j){
                    const libro = libros[j];
                    if(libro.autorID === autor.autorID){
                        resultados.push(libro);
                    }
                }
            }
        }
        return resultados;
    }

    function generarHTMLResultadoBuscador(busqueda, tipoBusqueda){
        resultados = [];

        if(tipoBusqueda === 'titulo'){
            resultados = buscarLibrosPorAutor(busqueda);
        }else if(tipoBusqueda === 'autor'){
            resultados = buscarLibrosPorTitulo(busqueda);
        }

        
    }

    return{
        generarHTMLListadoAutores,
        generarHTMLListadoBibliotecas,
        generarHTMLListadoLibros,
        buscarLibrosPorTitulo,
        buscarLibrosPorAutor
    }
})();

document.getElementById('listarAutores').addEventListener('click', function(){
    $biblio.generarHTMLListadoAutores();
});

document.getElementById('listarBibliotecas').addEventListener('click', function(){
    $biblio.generarHTMLListadoBibliotecas();
});

document.getElementById('listarLibros').addEventListener('click', function(){
    $biblio.generarHTMLListadoLibros();
})

