
<?php
session_start();

// COMPROBAR SI EL USUARIO INICIO SESION
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

// PEAK DE LA SEMANA
include("peakSemana.php");

// SABORES PARA CALIFICAR
$sabores = array(
    array(1, "Chocolate Brownie", "chocolate-brownie-pro.png", false),
    array(2, "Cookies & Cream", "cookiesandcream-pro.png", false),
    array(3, "Vainilla", "vainilla-pro.png", false),
    array(4, "Dulce de Leche", "dulcedeleche-pro.png", false),
    array(5, "Oat Latte", "oatlate-plant.png", false),
    array(6, "Pistachio", "pistachio-plant.png", false),
    array(7, "Banana Peanut", "bananapeanut-plant.png", false),
    array(8, "Coconut", "coconut-plant.png", false),
    array(9, "Cherry", "cherry-pure.png", true),
    array(10, "Lemon", "Lemon-pure.png", true),
    array(11, "Blueberry", "blueberry.png", true),
    array(12, "Strawberry Cream", "strawberry-cream.png", true)
);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ranking | PEAK</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Joti+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="estilos.css?v=3">
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
        <li><a href="ranking.php" class="activo">RANKING</a></li>
        <li><a href="contacto.php">CONTACTO</a></li>
        <li>
            <div class="usuario-nav">
                <span class="material-icons">person</span>
                <span class="nombre-usuario">HOLA, <?php echo strtoupper($_SESSION['nombre']); ?></span>
            </div>
        </li>
    </ul>
</nav>

    </header>

    <main class="pagina-ranking">

        <!-- HERO RANKING -->
        <section class="ranking-hero">
            <img
                src="img-/hero-ranking.png"
                alt="Ranking de PEAK"
                class="ranking-hero-imagen">
        </section>

        <!-- FRANJA COLORES -->
        <div class="ranking-franja"></div>

        <!-- PEAK DE LA SEMANA -->
        <section class="ranking-semana">

            <?php if ($peakSemana) { ?>

                <div class="ranking-semana-producto">
                    <img
                        src="<?php echo $peakSemana['imagen']; ?>"
                        alt="<?php echo $peakSemana['nombre']; ?>"
                        class="ranking-semana-pote">
                </div>

                <div class="ranking-semana-info">
                    <h1>
                        EL PEAK DE LA SEMANA<br>
                        VOTADO POR USTEDES
                    </h1>

                    <p>
                        <?php echo $peakSemana['nombre']; ?>
                        <?php echo $peakSemana['linea']; ?>
                        es el favorito de esta semana.
                        <?php echo $peakSemana['descripcion']; ?>
                        Elegido por la comunidad PEAK a través
                        de sus puntuaciones.
                    </p>

                    <div class="ranking-estrellas-semana">
                        <?php
                        $estrellas = round($peakSemana['promedio']);

                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $estrellas) {
                                echo "★ ";
                            } else {
                                echo "☆ ";
                            }
                        }
                        ?>
                    </div>

                    <a href="sabores.php" class="ranking-boton">
                        VER SABOR
                    </a>
                </div>

            <?php } else { ?>

                <div class="ranking-semana-producto">
                    <img
                        src="img-/chocolate-brownie-pro.png"
                        alt="Chocolate Brownie PRO"
                        class="ranking-semana-pote">
                </div>

                <div class="ranking-semana-info">
                    <h1>
                        EL PEAK DE LA SEMANA<br>
                        VOTADO POR USTEDES
                    </h1>

                    <p>
                        ¡Todavía no hay calificaciones esta semana!
                        Votá tu sabor favorito para elegir al próximo PEAK.
                    </p>

                    <div class="ranking-estrellas-semana">
                        ☆ ☆ ☆ ☆ ☆
                    </div>

                    <a href="#calificar" class="ranking-boton">
                        CALIFICAR
                    </a>
                </div>

            <?php } ?>

        </section>

        <!-- CALIFICACIONES -->
        <section class="ranking-calificar" id="calificar">

            <div class="ranking-calificar-titulo">
                <h2>
                    ¿YA PROBASTE ALGUNO?<br>
                    CALIFICALO
                </h2>
            </div>

            <div class="ranking-productos">

                <?php foreach ($sabores as $sabor) { ?>

                    <article class="ranking-producto<?php if ($sabor[3]) { echo ' ranking-pure'; } ?>">

                        <img
                            src="img-/<?php echo $sabor[2]; ?>"
                            alt="<?php echo $sabor[1]; ?>">

                        <h3><?php echo $sabor[1]; ?></h3>

                        <form action="recibirCalificacion.php" method="POST">

                            <input
                                type="hidden"
                                name="id_sabor"
                                value="<?php echo $sabor[0]; ?>">

                            <div class="ranking-estrellas">

                                <?php for ($i = 5; $i >= 1; $i--) { ?>

                                    <input
                                        type="radio"
                                        name="puntuacion"
                                        id="s<?php echo $sabor[0]; ?>-e<?php echo $i; ?>"
                                        value="<?php echo $i; ?>"
                                        <?php if ($i == 5) { echo "required"; } ?>>

                                    <label for="s<?php echo $sabor[0]; ?>-e<?php echo $i; ?>">
                                        ★
                                    </label>

                                <?php } ?>

                            </div>

                            <input
                                type="submit"
                                class="boton-calificar"
                                value="CALIFICAR">

                        </form>

                    </article>

                <?php } ?>

            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer>
        <img
            src="img-/montanas-footer.png"
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

                <img
                    src="img-/gato-footer.png"
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