<?php
session_start();

// CONEXION SERVIDOR MYSQL

$conexion = mysqli_connect("localhost", "root", "", "sitiopeak");

// RECIBIR DATOS DEL FORMULARIO

$email = $_POST['email'];
$password = $_POST['password'];

// BUSCAR USUARIO EN LA BASE DE DATOS

$consulta = "SELECT * FROM usuarios WHERE email = ? AND password = ?";

$preparar = mysqli_prepare($conexion, $consulta);

mysqli_stmt_bind_param($preparar, "ss", $email, $password);

mysqli_stmt_execute($preparar);

$resultado = mysqli_stmt_get_result($preparar);

// COMPROBAR SI EXISTE EL USUARIO

if (mysqli_num_rows($resultado) > 0) {

    $usuario = mysqli_fetch_assoc($resultado);

    // CREAR SESION

    session_regenerate_id(true);

    $_SESSION['id_usuario'] = $usuario['id_usuarios'];
    $_SESSION['nombre'] = $usuario['nombre'];

}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión | PEAK</title>

    <link rel="stylesheet" href="estilos.css">

</head>

<body>

<?php

// COMPROBAR SI EL INICIO DE SESION FUE CORRECTO

if (mysqli_num_rows($resultado) > 0) {

    echo '
    <div class="registro-exitoso">
        <div class="mensaje-registro">
            <h1>¡HOLA DE NUEVO!</h1>
            <p>Iniciaste sesión correctamente.</p>
            <p class="subtexto">¡Qué bueno tenerte de vuelta en PEAK! 🍦</p>
            <a href="index.php">IR AL INICIO</a>
        </div>
    </div>';

} else {

    echo '
    <div class="registro-error">
        <div class="mensaje-registro">
            <h1>¡UPS!</h1>
            <p>No pudimos iniciar tu sesión.</p>
            <p class="subtexto">El email o la contraseña son incorrectos.</p>
            <a href="login.php">VOLVER A INTENTAR</a>
        </div>
    </div>';

}

?>

</body>
</html>