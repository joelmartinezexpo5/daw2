<?php
$peliculas = ["Inception", "Titanic", "Matrix", "Gladiator", "Avatar", "Toy Story", "Interstellar", "Frozen", "Up", "Joker"];
$imagenes = [
    "Inception" => "/images/inception.jpg",
    "Titanic" => "/images/titanic.jpg",
    "Matrix" => "/images/matrix.jpg",
    "Gladiator" => "/images/gladiator.jpg",
    "Avatar" => "/images/avatar.jpg",
    "Toy Story" => "/images/toystory.jpg",
    "Interstellar" => "/images/interstellar.jpg",
    "Frozen" => "/images/frozen.jpg",
    "Up" => "/images/up.jpg",
    "Joker" => "/images/joker.jpg"
];

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
    echo "Películas encontradas: " . count($resultado) . "<ul>";
    foreach ($resultado as $pelicula) {
        $imagen = $imagenes[$pelicula];
        echo "<li>$pelicula <img src='$imagen' alt='$pelicula' width='100'></li>";
    }
    echo "</ul>";
} else {
    echo "No se encontraron películas.";
}
?>
