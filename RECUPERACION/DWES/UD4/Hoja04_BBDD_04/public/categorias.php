<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/FuncionesBD.php';

$categorias = getCategorias();
$productos = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categoria'])) {
    $idCategoria = (int)$_POST['categoria'];
    $productos = getProductosPorCategoria($idCategoria);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos por Categoría</title>
</head>
<body>
    <h1>Filtrar Productos por Categoría</h1>
    <form method="POST">
        <select name="categoria">
            <?php foreach ($categorias as $cat): ?>
                <option value="<?= $cat['id'] ?>" <?= (isset($idCategoria) && $idCategoria == $cat['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cat['nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Filtrar</button>
    </form>

    <?php if (!empty($productos)): ?>
        <h2>Productos en la Categoría Seleccionada</h2>
        <?php foreach ($productos as $producto): ?>
            <p><?= $producto ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
