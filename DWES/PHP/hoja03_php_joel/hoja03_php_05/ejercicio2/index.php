<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Incluir las clases
        include 'Cuenta.php';
        include 'CuentaCorriente.php';
        include 'CuentaAhorro.php';

        // Crear un objeto de CuentaCorriente
        echo "<h2>Cuenta Corriente</h2>";
        $cuentaCorriente = new CuentaCorriente(12345, "Juan Pérez", 1000, 50);
        $cuentaCorriente->mostrar();
        $cuentaCorriente->ingreso(200);
        $cuentaCorriente->reintegro(100);
        $cuentaCorriente->reintegro(900); // Intentar reintegro que no se permite
        $cuentaCorriente->mostrar();

        // Crear un objeto de CuentaAhorro
        echo "<h2>Cuenta de Ahorro</h2>";
        $cuentaAhorro = new CuentaAhorro(67890, "Ana Gómez", 5000, 100, 5);
        $cuentaAhorro->mostrar();
        $cuentaAhorro->aplicaInteres();  // Aplicar intereses
        $cuentaAhorro->ingreso(500);     // Hacer un ingreso
        $cuentaAhorro->reintegro(200);   // Hacer un reintegro
        $cuentaAhorro->mostrar();
    ?>
</body>
</html>