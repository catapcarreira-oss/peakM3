<?php include("peakSemana.php"); ?>

<?php
session_start();

// COMPROBAR SI EL USUARIO INICIO SESION
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

// PEAK DE LA SEMANA
include("peakSemana.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEAK</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Joti+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="estilos.css?v=2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
</head>

<body>

    <header>
        
<nav class="navegacion">
    <ul>
        <li><a href="salir.php">CERRAR SESIÓN</a></li>
        <li><a href="index.php" class="activo">INICIO</a></li>
        <li><a href="sabores.php">SABORES</a></li>
    </ul>

    <a href="index.php" class="logo">PEAK</a>

    <ul>
        <li><a href="ranking.php">RANKING</a></li>
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

    <main>
        <!-- HERO -->
        <section class="hero">
            <img src="img-/hero-inicio.png"
                 alt="Helados PEAK"
                 class="hero-imagen">
            <h1>SABOR A OTRO NIVEL</h1>
            <p class="bajada-hero">
                PROTEÍNA · PLANT-BASED · INGREDIENTES SIMPLES Y FRESCOS
            </p>
            <a href="sabores.php" class="boton">
                DESCUBRÍ LOS SABORES
            </a>
        </section>

        <!-- SOBRE PEAK -->
        <section class="sobre-peak">
            <div class="fondo-derretido">
                <div class="contenido-sobre">
                    <div class="bochas-izquierda">
                        <img src="img-/bocha3.png"
                             alt="Helado de vainilla"
                             class="bocha">
                        <img src="img-/bocha2.png"
                             alt="Helado de pistacho"
                             class="bocha">
                    </div>
                    <p class="texto-sobre">
                        En <strong>PEAK</strong> creemos que comer mejor no
                        significa disfrutar menos. Por eso creamos helados
                        que combinan sabor, nutrición e ingredientes simples,
                        para que elegir lo que te hace bien también sea elegir
                        lo que realmente tenés ganas de comer.
                    </p>
                    <div class="bochas-derecha">
                        <img src="img-/bocha4.png"
                             alt="Helado de cookies"
                             class="bocha">
                        <img src="img-/bocha1.png"
                             alt="Helado de chocolate"
                             class="bocha">
                    </div>
                </div>
            </div>
        </section>

        <!-- PRODUCTOS -->
        <section class="productos">
            <h2>PROBÁ TU PRÓXIMO FAVORITO</h2>
            <p class="subtitulo">
                Un sabor para cada PEAK
            </p>
            <a href="sabores.php" class="boton boton-chico">
                VER TODOS
            </a>
            <div class="contenedor-productos">
                <article class="producto">
                    <img src="img-/chocolate-brownie-pro.png"
                         alt="Chocolate Brownie PRO">
                    <h3>Chocolate Brownie</h3>
                    <p>PRO · Alto en proteína</p>
                </article>
                <article class="producto">
                    <img src="img-/pistachio-plant.png"
                         alt="Pistachio PLANT">
                    <h3>Pistachio</h3>
                    <p>PLANT · Base vegetal</p>
                </article>
                <article class="producto">
                    <img src="img-/bananapeanut-plant.png"
                         alt="Banana Peanut PLANT">
                    <h3>Banana Peanut</h3>
                    <p>PLANT · Base vegetal</p>
                </article>
                <article class="producto">
                    <img src="img-/strawberry-cream.png"
                         alt="Strawberry Cream PURE">
                    <h3>Strawberry Cream</h3>
                    <p>PURE · Ingredientes frescos</p>
                </article>
            </div>
        </section>

        <!-- FRANJA DE COLORES -->
        <img src="img-/franja-colores.png"
             alt=""
             class="franja-colores">

        <!-- PEAK DE LA SEMANA -->
        <section class="peak-semana">
            <?php if ($peakSemana) { ?>
                <div class="peak-semana-imagen">
                    <img
                        src="<?php echo $peakSemana['imagen']; ?>"
                        alt="<?php echo $peakSemana['nombre']; ?>">
                </div>
                <div class="peak-semana-texto">
                    <h2>
                        EL PEAK DE LA SEMANA<br>
                        VOTADO POR USTEDES
                    </h2>
                    <p>
                        <?php echo $peakSemana['nombre']; ?>
                        <?php echo $peakSemana['linea']; ?>
                        es el favorito de esta semana.
                        <?php echo $peakSemana['descripcion']; ?>
                        Elegido por la comunidad PEAK a través
                        de sus puntuaciones.
                    </p>
                    <p class="estrellas">
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
                    </p>
                    <a href="sabores.php" class="boton boton-chico">
                        VER SABOR
                    </a>
                </div>
            <?php } else { ?>
                <div class="peak-semana-imagen">
                    <img
                        src="img-/chocolate-brownie-pro.png"
                        alt="Chocolate Brownie PRO">
                </div>
                <div class="peak-semana-texto">
                    <h2>
                        EL PEAK DE LA SEMANA<br>
                        VOTADO POR USTEDES
                    </h2>
                    <p>
                        ¡Todavía no hay calificaciones esta semana!
                        Votá tu sabor favorito para elegir al próximo PEAK.
                    </p>
                    <p class="estrellas">
                        ☆ ☆ ☆ ☆ ☆
                    </p>
                    <a href="ranking.php" class="boton boton-chico">
                        CALIFICAR
                    </a>
                </div>
            <?php } ?>
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