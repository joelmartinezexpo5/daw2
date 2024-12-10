export default class Tareas{
    #tareaId;

    constructor(tareaId, titulo, prioridad, fechaRegistro, fechaLimite, descripcion, responsable, completada){
        this.#tareaId=tareaId;
        this.titulo= titulo;
        this.prioridad=prioridad;
        this.fechaRegistro=fechaRegistro;
        this.fechaLimite=fechaLimite;
        this.descripcion=descripcion;
        this.responsable=responsable;
        this.completada=completada
    }

    get tareaId(){
        return this.#tareaId;
    }

    generarHTMLPropiedades(){
        return `<h3>Crear/Editar tarea</h3>
                <form action="" data-componente="propiedades">
        <input type="hidden" name="tareaId" value="${this.tareaId}">
        <div>
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" value="${this.titulo}">
        </div>
        <div>
            <label for="prioridad">Prioridad:</label>
            <input type="text" name="prioridad" value="${this.prioridad}">
        </div>
        <div>
            <label for="fechaRegistro">Prioridad:</label>
            <input type="date" name="fechaRegistro" value="${this.fechaRegistro}">
        </div>
        <div>
            <label for="fechaLimite">Fecha Limite:</label>
            <input type="date" name="fechaLimite" value="${this.fechaLimite}">
        </div>
        <div>
            <label for="descripcion">Fecha Limite:</label>
            <input type="text" name="descripcion" value="${this.descripcion}">
        </div>
        <div>
            <label for="responsable">Fecha Limite:</label>
            <input type="text" name="responsable" value="${this.responsable}">
        </div>
        <div>
            <label for="completada">Fecha Limite:</label>
            <input type="checkbox" name="completada">
        </div>

        <div>
            <button type="submit">Guardar</button>
        </div>
    </form>

        `
    }
}