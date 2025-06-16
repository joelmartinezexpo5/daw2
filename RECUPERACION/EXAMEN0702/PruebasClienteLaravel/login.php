<?php
session_start();

// Gestionar cierre de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'logout') {
    session_destroy();
    header('Location: obtener.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Formulario de inicio de sesión</title>
</head>

<body>
    <h1>Formulario de inicio de sesión</h1>

    <?php if (isset($_SESSION['token'])): ?>
        <p>Bienvenido, <?= htmlspecialchars($_SESSION['user']['name'] ?? 'Usuario') ?>.</p>

        <form method="post" style="margin-top: 1em;">
            <input type="hidden" name="action" value="logout" />
            <button type="submit">Cerrar sesión</button>
        </form>

    <?php else: ?>

        <form method="post">
            <label for="email">Email: <br />
                <input type="text" name="email" id="email" required /><br />
            </label>
            <label for="password">Password: <br />
                <input type="password" name="password" id="password" required /><br />
            </label>
            <button>Iniciar Sesión</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $usuario = [
                "email" => $email,
                "password" => $password
            ];

            $url_servicio = 'http://localhost:8000/api/login';
            $curl = curl_init($url_servicio);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($usuario));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Accept: application/json'
            ]);

            $respuesta_curl = curl_exec($curl);
            $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            $resultado = json_decode($respuesta_curl, true);

            curl_close($curl);

            if ($http_code !== 200) {
                echo "<h3>Error al iniciar sesión</h3>";
                echo "<pre>";
                print_r($resultado);
                echo "</pre>";
            } else {
                // Guardamos el token en sesión
                $_SESSION['token'] = $resultado['token'];
                $_SESSION['user'] = $resultado['user']; // opcional, para tener info de usuario

                // Redireccionamos a obtener.php
                header('Location: obtener.php');
                exit;
            }
        }
        ?>

    <?php endif; ?>
</body>

</html>
