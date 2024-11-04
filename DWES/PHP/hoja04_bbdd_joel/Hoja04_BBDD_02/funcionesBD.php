<?php
// funcionesBD.php
function conectar() {
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'dwes_02_libros';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Error en la conexión: " . $e->getMessage());
    }
}

function guardarLibro($titulo, $anio, $precio, $fecha) {
    $pdo = conectar();
    $sql = "INSERT INTO libros (titulo, anio_edicion, precio, fecha_adquisicion) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$titulo, $anio, $precio, $fecha]);
}

function obtenerLibros() {
    $pdo = conectar();
    $sql = "SELECT * FROM libros";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
