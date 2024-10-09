<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validador de IBAN</title>
</head>
<body>
    <h1>Validador de IBAN Español</h1>
    <form method="POST" action="">
        <label for="iban">Introduce el código IBAN:</label>
        <input type="text" id="iban" name="iban" required>
        <button type="submit">Validar</button>
    </form>

    <p><?= htmlspecialchars($resultado) ?></p>
</body>
</html>
