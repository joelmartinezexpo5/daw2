import Linea from "./Linea.js";
import Factura from "./Factura.js";

class Utilidades{
    static serializarFactura(facturaOBJ){
        return JSON.stringify(facturaOBJ);
    }

    static deserializarFactura(facturaJSON){
        return JSON.parse(facturaJSON);
    }
}
export {Utilidades, serializarFactura, deserializarFactura };