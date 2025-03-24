<?php
$peliculas = ["Inception", "Titanic", "Matrix", "Gladiator", "Avatar", "Toy Story", "Interstellar", "Frozen", "Up", "Joker"];

$resultado = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $busqueda = strtolower($_POST["busqueda"]);
    foreach ($peliculas as $pelicula) {
        if (stripos($pelicula, $busqueda) !== false) {
            $resultado[] = $pelicula;
        }
    }
}
?>

<form method="POST">
    Buscar película: <input type="text" name="busqueda" required>
    <button type="submit">Buscar</button>
</form>

<?php
if (!empty($resultado)) {
    echo "Películas encontradas: <ul>";
    foreach ($resultado as $pelicula) {
        echo "<li>$pelicula</li>";
    }
    echo "</ul>";
} else {
    echo "No se encontraron películas.";
}
?>