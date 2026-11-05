
<?php
session_start();

// CONEXION SERVIDOR MYSQL

$conexion = mysqli_connect("localhost", "root", "", "sitiopeak");

// RECIBIR DATOS DEL FORMULARIO

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];

// INSERTAR DATOS EN LA TABLA USUARIOS

$consulta = "INSERT INTO usuarios (nombre, apellido, email, password)
VALUES ('$nombre', '$apellido', '$email', '$password')";

$resultado = mysqli_query($conexion, $consulta);

// COMPROBAR SI SE GUARDARON LOS DATOS

if ($resultado) {

    // CREAR SESION

    session_regenerate_id(true);

    $_SESSION['id_usuario'] = mysqli_insert_id($conexion);
    $_SESSION['nombre'] = $nombre;

}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro | PEAK</title>

    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<?php

if ($resultado) {

    echo '
    <div class="registro-exitoso">
        <div class="mensaje-registro">
            <h1>¡BIENVENIDO A PEAK!</h1>
            <p>Tu cuenta fue creada correctamente.</p>
            <p class="subtexto">Ya sos parte de la comunidad PEAK 🍦</p>

            <a href="index.php">IR AL INICIO</a>
        </div>
    </div>
    ';

} else {

    echo '
    <div class="registro-error">
        <div class="mensaje-registro">
            <h1>¡UPS!</h1>
            <p>No pudimos crear tu cuenta.</p>
            <p class="subtexto">Revisá tus datos e intentá nuevamente.</p>

            <a href="registro.php">VOLVER A INTENTAR</a>
        </div>
    </div>
    ';
}

?>

</body>
</html>