<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Valores del Array $_SERVER</h1>
        <table>
            <tr>
                <th>Nombre de Variable</th>
                <th>Valor</th>
            </tr>
            <?php
                foreach ($_SERVER as $key => $value) {
                    echo "<tr><td>$key</td><td>$value</td></tr>";
                }
            ?>
        </table>
</body>
</html>