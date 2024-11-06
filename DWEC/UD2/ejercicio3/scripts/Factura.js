/**
 * Ejercicio 3.La estructura básica de una “Factura” se compone de:
 * Campos: •“clienteNIF”.•“fecha”, fechasin la hora.•“hora”, fecha sólo con la hora y minutos.
 * •“pagada”,booleano.•“líneas” (lista), colección de detalles de la factura.Propiedades: 
 * •“importeTotal” (get), devuelve el importe agregado de las líneas de factura.•“numeroArticulos” (get), 
 * devuelve el número de líneas de factura.Métodos: •“imprimirFactura()”, devuelve una cadena formateada 
 * con la información de la factura, cabecera con los datos básicos y la lista con las líneas de la factura.
 * •“agregarLinea(concepto, cantidad, precio)”, añade una nueva línea al final de “líneas”.•“eliminarLínea()”, 
 * elimina la última línea de “líneas”.La estructura “Línea” de factura se compone de:Campos:•“concepto”•“cantidad”, 
 * entero.•“precioUnitario”, real.Clase “Utilidades”, se compone de:Métodos:•“serializarFactura(facturaOBJ)”, 
 * estático, recibe un objeto de tipo Factura y devuelve la cadena JSON serializada.•“deserializararFactura(facturaJSON)”, 
 * estático, recibe una cadena JSON y devuelve el objeto Factura equivalente.Se pide:Crea un formulario en el que 
 * poder probar lo anterior, su estructura será la siguiente.Un formulario para introducir “clienteNIF”, 
 * “fecha”, “hora” y “pagada”, con un botón “Actualizar” que guarde el valor de los campos en la factura.Un formulario 
 * para gestionar las líneas de factura, contará con los campos “concepto”, “cantidad” y “precio”, y los botones correspondientes 
 * para agregar línea y para eliminar línea.Un formulario para gestionar la serialización y deserialización. 
 * Incluirá campo dos campos de texto, “entrada” para indicar una cadena JSON de entrada. Y “salida” para devolver el objeto 
 * factura serializado en formato JSON. Y los botones correspondientes para lanzar estás funcionalidades.
 * Un bloque “impresión” en el que se imprimirá la factura. El contenido se actualizará al modificarse algún 
 * elemento de factura (es decir, al pulsar alguno de los botones definidos previamente).No seas cutre, 
 * da un maquetado y formato mínimos al formulario,NOTA:te recuerdo que JSON.parse() tiene un tercer parámetromuy útil.
 */

class Factura{
    constructor(clienteNIF, fecha, hora, pagada, lineas){
        this.clienteNIF = clienteNIF;
        this.fecha = new Date();
        this.hora = hora;
        this.pagada = pagada;
        this.lineas = lineas;
    }
}