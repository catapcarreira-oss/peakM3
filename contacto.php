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

    <title>Contacto | PEAK</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Joti+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="estilos.css?v=2">
</head>

<body>
    <header>
        
<nav class="navegacion">
    <ul>
        <li><a href="salir.php">CERRAR SESIÓN</a></li>
        <li><a href="index.php">INICIO</a></li>
        <li><a href="sabores.php">SABORES</a></li>
    </ul>

    <a href="index.php" class="logo">PEAK</a>

    <ul>
        <li><a href="ranking.php">RANKING</a></li>
        <li><a href="contacto.php" class="activo">CONTACTO</a></li>
        <li>
            <div class="usuario-nav">
                <span class="material-icons">person</span>
                <span class="nombre-usuario">HOLA, <?php echo strtoupper($_SESSION['nombre']); ?></span>
            </div>
        </li>
    </ul>
</nav>

    </header>

    <main>
        <section class="contacto">

            <!-- BOCHAS DECORATIVAS -->
            <img src="img-/bocha5.png"
                 alt=""
                 class="bocha-contacto bocha-contacto-1">
            <img src="img-/bocha6.png"
                 alt=""
                 class="bocha-contacto bocha-contacto-2">
            <img src="img-/bocha7.png"
                 alt=""
                 class="bocha-contacto bocha-contacto-3">
            <img src="img-/bocha8.png"
                 alt=""
                 class="bocha-contacto bocha-contacto-4">

            <!-- TEXTO -->
            <div class="contacto-encabezado">
                <h1>CONTACTANOS</h1>
                <p>
                    ¿Tenés alguna duda, sugerencia o querés contarnos<br>
                    qué te pareció tu PEAK? Escribinos, estamos para vos.
                </p>
            </div>

            <!-- FORMULARIO -->
            <form action="recibirContacto.php"
                  method="POST"
                  class="formulario-contacto">

                <div class="campo-contacto">
                    <input
                        type="text"
                        name="nombre"
                        placeholder="Nombre">
                </div>

                <div class="campo-contacto">
                    <input
                        type="email"
                        name="email"
                        placeholder="Email">
                </div>

                <div class="campo-contacto">
                    <textarea
                        name="mensaje"
                        placeholder="Mensaje"></textarea>
                </div>

                <input
                    type="submit"
                    class="boton-enviar"
                    value="ENVIAR">

            </form>
        </section>
    </main>

    <!-- FOOTER -->
    <footer>
        <img src="img-/montanas-footer.png"
             alt=""
             class="montanas-footer">

        <div class="footer-contenido">
            <nav class="footer-menu">
                <ul>
                    <li><a href="index.php">INICIO</a></li>
                    <li><a href="sabores.php">SABORES</a></li>
                    <li><a href="#">SOBRE</a></li>
                    <li><a href="contacto.php">CONTACTO</a></li>
                </ul>
            </nav>

            <div class="footer-centro">
                <a href="index.php" class="logo-footer">
                    PEAK
                </a>
                <p>Llevá el sabor más alto.</p>
                <img src="img-/gato-footer.png"
                     alt="Mascota PEAK">
            </div>

            <nav class="footer-menu">
                <ul>
                    <li><a href="sabores.php">PRO</a></li>
                    <li><a href="sabores.php">PLANT</a></li>
                    <li><a href="sabores.php">PURE</a></li>
                    <li><a href="ranking.php">ENCONTRÁ TU PEAK</a></li>
                </ul>
            </nav>
        </div>

        <p class="copyright">
            © 2026 PEAK · Buenos Aires, Argentina · Todos los derechos reservados
        </p>
    </footer>

</body>
</html>