// function Hijo(props) {
//     return (
//         <>
//             <h2>Componente hijo</h2>
//             <p>Mensaje: {props.mensaje}</p>
//         </>
//     );
// }
// export default Hijo;

function Hijo({ mensaje, comunicarPadre }) {
    const handleClick = () => {
        comunicarPadre("¡Mejor mañana!");
    };
    return (
        <>
            <h2>Componente hijo</h2>
            <p>Mi padre me dice: {mensaje}</p>
            <button onClick={handleClick}>Pulsame</button>
        </>
    );
}
export default Hijo;

