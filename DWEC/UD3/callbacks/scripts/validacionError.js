class validacionError extends Error {
    constructor(mensaje, campo){
        super(mensaje);
        this.campo = campo;
    }
}
export default validacionError;