document.addEventListener("DOMContentLoaded", () => {

    const colorFondo = ["orange", "red", "blue", "green", "yellow"];
    const colorTexto = ["white", "black", "white", "black", "white"];
    let index = 0;
    document.addEventListener("mouseup", () => {
        index = (index + 1) % colorFondo.length;
        document.body.style.backgroundColor = colorFondo[index];
        document.body.style.color = colorTexto[index];
    });
});