<?php

// conexion a la base de datos

$conexion = mysqli_connect("localhost", "root", "", "sitiopeak");


// buscar el sabor con mejor promedio de la semana

$consulta = "SELECT
                sabores.nombre,
                sabores.linea,
                sabores.descripcion,
                sabores.imagen,
                AVG(calificaciones.puntuacion) AS promedio

             FROM sabores

             INNER JOIN calificaciones
             ON sabores.id_sabor = calificaciones.id_sabor

             WHERE YEARWEEK(calificaciones.fecha, 1) = YEARWEEK(CURDATE(), 1)

             GROUP BY
                sabores.id_sabor,
                sabores.nombre,
                sabores.linea,
                sabores.descripcion,
                sabores.imagen

             ORDER BY promedio DESC, COUNT(*) DESC, sabores.id_sabor ASC

             LIMIT 1";


$resultado = mysqli_query($conexion, $consulta);


// guardar los datos del ganador

$peakSemana = mysqli_fetch_assoc($resultado);

?>
