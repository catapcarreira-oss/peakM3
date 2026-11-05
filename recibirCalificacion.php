<?php
session_start();

// COMPROBAR SI EL USUARIO INICIO SESION

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Calificación | PEAK</title>

    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<?php

// CONEXION SERVIDOR MYSQL

$conexion = mysqli_connect("localhost", "root", "", "sitiopeak");

// RECIBIR DATOS DEL FORMULARIO

$id_sabor = $_POST['id_sabor'];
$puntuacion = $_POST['puntuacion'];

// COMPROBAR QUE LOS DATOS SEAN VALIDOS

if (filter_var($id_sabor, FILTER_VALIDATE_INT) &&
    filter_var($puntuacion, FILTER_VALIDATE_INT) &&
    $puntuacion >= 1 && $puntuacion <= 5) {

    // INSERTAR LA CALIFICACION EN LA TABLA

    $consulta = "INSERT INTO calificaciones (id_sabor, puntuacion)
                 VALUES ('$id_sabor', '$puntuacion')";

    $resultado = mysqli_query($conexion, $consulta);

} else {

    $resultado = false;

}

// COMPROBAR SI SE GUARDO LA CALIFICACION

if ($resultado) {

    echo '
    <div class="registro-exitoso">
        <div class="mensaje-registro">
            <h1>¡GRACIAS POR CALIFICAR!</h1>
            <p>Tu puntuación fue registrada correctamente.</p>
            <p class="subtexto">¡Gracias por ser parte de PEAK! 🍦</p>
            <a href="ranking.php">VOLVER AL RANKING</a>
        </div>
    </div>
    ';

} else {

    echo '
    <div class="registro-error">
        <div class="mensaje-registro">
            <h1>¡UPS!</h1>
            <p>No pudimos guardar tu calificación.</p>
            <p class="subtexto">Intentá nuevamente.</p>
            <a href="ranking.php">VOLVER A INTENTAR</a>
        </div>
    </div>
    ';

}

?>

</body>
</html>