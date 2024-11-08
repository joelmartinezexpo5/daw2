export default Utilidades;

class Utilidades{
    static serializarFactura(facturaOBJ){
        return JSON.stringify(facturaOBJ);
    }

    static deserializarFactura(facturaJSON){
        return JSON.parse(facturaJSON);
    }
}