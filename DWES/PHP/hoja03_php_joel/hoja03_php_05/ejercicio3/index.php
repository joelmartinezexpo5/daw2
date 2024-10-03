<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once 'Familia.php';
        require_once 'Urgencia.php';
        
        // Crear un array para almacenar médicos
        $medicos = [];
        
        // Añadir tres médicos de familia
        $medicos[] = new Familia('Dr. Pérez', 55, 'mañana', 120);
        $medicos[] = new Familia('Dra. García', 60, 'tarde', 150);
        $medicos[] = new Familia('Dr. López', 45, 'mañana', 90);
        
        // Añadir tres médicos de urgencia
        $medicos[] = new Urgencia('Dr. Torres', 65, 'tarde', 'Unidad de Traumatología');
        $medicos[] = new Urgencia('Dra. Martínez', 50, 'mañana', 'Unidad de Cardiología');
        $medicos[] = new Urgencia('Dr. Hernández', 70, 'tarde', 'Unidad de Cuidados Intensivos');
        
        // Mostrar todos los datos de los médicos de familia y urgencia
        echo "<h2>Datos de todos los médicos</h2>";
        foreach ($medicos as $medico) {
            $medico->mostrarDatos();
        }
        
        // Mostrar el número de médicos de urgencias de turno de tarde con más de 60 años
        $tarde_y_mayor_60 = 0;
        foreach ($medicos as $medico) {
            if ($medico instanceof Urgencia && $medico->getTurno() == 'tarde' && $medico->getEdad() > 60) {
                $tarde_y_mayor_60++;
            }
        }
        echo "<h2>Número de médicos de urgencias de turno de tarde con más de 60 años: $tarde_y_mayor_60</h2>";
        
        // Mostrar los datos de médicos de familia con un número de pacientes igual o superior a 100
        echo "<h2>Médicos de familia con más de 100 pacientes</h2>";
        foreach ($medicos as $medico) {
            if ($medico instanceof Familia && $medico->getNumPacientes() >= 100) {
                $medico->mostrarDatos();
            }
        }       
    ?>
</body>
</html>