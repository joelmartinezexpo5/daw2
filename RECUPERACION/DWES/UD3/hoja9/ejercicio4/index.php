<?php
$suma = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeros = $_POST["numeros"];
    $suma = array_sum($numeros);
}

?>

<form method="POST">
    <?php for ($i = 1; $i <= 10; $i++) : ?>
        Número <?= $i ?>: <input type="number" name="numeros[]" value="0"><br>
    <?php endfor; ?>
    <button type="submit">Sumar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "La suma total es: $suma";
}
?>