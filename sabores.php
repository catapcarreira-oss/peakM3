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

    <title>PEAK | Sabores</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Joti+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="estilos.css?v=4">
</head>

<body>

    <header>
        <nav class="navegacion">
    <ul>
        <li><a href="salir.php">CERRAR SESIÓN</a></li>
        <li><a href="index.php">INICIO</a></li>
        <li><a href="sabores.php" class="activo">SABORES</a></li>
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

        <!-- HERO SABORES -->
        <section class="hero-sabores">
            <h1>ENCONTRÁ TU PEAK</h1>
            <p>
                Tres líneas. Distintas formas de<br>
                llegar al sabor más alto.
            </p>
            <img src="img-/hero-sabores.png"
                 alt="Todos los sabores de helados PEAK">
        </section>

        <!-- FONDO DERRETIDO -->
        <div class="fondo-lineas-sabores">

            <!-- LINEA PRO -->
            <section class="linea-sabores linea-pro">
                <div class="contenido-linea">
                    <h2>LÍNEA PRO</h2>

                    <p class="descripcion-linea">
                        Nuestra línea con alto contenido de proteína y una base cremosa clásica.
                        Para cuando querés un helado que siga siendo helado, pero te dé un poco más.
                    </p>

                    <div class="grid-sabores">
                        <article class="sabor">
                            <img src="img-/chocolate-brownie-pro.png"
                                 alt="Chocolate Brownie PRO">
                            <h3>Chocolate Brownie</h3>
                            <p>PRO · Alto en proteína</p>
                        </article>

                        <article class="sabor">
                            <img src="img-/cookiesandcream-pro.png"
                                 alt="Cookies & Cream PRO">
                            <h3>Cookies & Cream</h3>
                            <p>PRO · Alto en proteína</p>
                        </article>

                        <article class="sabor">
                            <img src="img-/vainilla-pro.png"
                                 alt="Vainilla PRO">
                            <h3>Vainilla</h3>
                            <p>PRO · Alto en proteína</p>
                        </article>

                        <article class="sabor">
                            <img src="img-/dulcedeleche-pro.png"
                                 alt="Dulce de Leche PRO">
                            <h3>Dulce de Leche</h3>
                            <p>PRO · Alto en proteína</p>
                        </article>
                    </div>
                </div>
            </section>

            <!-- LINEA PLANT -->
            <section class="linea-sabores linea-plant">
                <div class="contenido-linea">
                    <h2>LÍNEA PLANT</h2>

                    <p class="descripcion-linea">
                        Alternativas de origen vegetal elaboradas con bases como avena,
                        coco o almendra, sin dejar de lado la textura y el disfrute.
                    </p>

                    <div class="grid-sabores">
                        <article class="sabor">
                            <img src="img-/oatlate-plant.png"
                                 alt="Oat Latte PLANT">
                            <h3>Oat Latte</h3>
                            <p>PLANT · Base vegetal</p>
                        </article>

                        <article class="sabor">
                            <img src="img-/pistachio-plant.png"
                                 alt="Pistachio PLANT">
                            <h3>Pistachio</h3>
                            <p>PLANT · Base vegetal</p>
                        </article>

                        <article class="sabor">
                            <img src="img-/bananapeanut-plant.png"
                                 alt="Banana Peanut PLANT">
                            <h3>Banana Peanut</h3>
                            <p>PLANT · Base vegetal</p>
                        </article>

                        <article class="sabor">
                            <img src="img-/coconut-plant.png"
                                 alt="Coconut PLANT">
                            <h3>Coconut</h3>
                            <p>PLANT · Base vegetal</p>
                        </article>
                    </div>
                </div>
            </section>

            <!-- LINEA PURE -->
            <section class="linea-sabores linea-pure">
                <div class="contenido-linea">
                    <h2>LÍNEA PURE</h2>

                    <p class="descripcion-linea">
                        Helados elaborados a partir de ingredientes simples y naturales,
                        con sabores donde la fruta también puede ser protagonista.
                    </p>

                    <div class="grid-sabores">
                        <article class="sabor">
                            <img src="img-/cherry-pure.png"
                                 alt="Cherry PURE">
                            <h3>Cherry</h3>
                            <p>PURE · Ingredientes frescos</p>
                        </article>

                        <article class="sabor">
                            <img src="img-/Lemon-pure.png"
                                 alt="Lemon PURE">
                            <h3>Lemon</h3>
                            <p>PURE · Ingredientes frescos</p>
                        </article>

                        <article class="sabor">
                            <img src="img-/blueberry.png"
                                 alt="Blueberry PURE">
                            <h3>Blueberry</h3>
                            <p>PURE · Ingredientes frescos</p>
                        </article>

                        <article class="sabor">
                            <img src="img-/strawberry-cream.png"
                                 alt="Strawberry Cream PURE">
                            <h3>Strawberry Cream</h3>
                            <p>PURE · Ingredientes frescos</p>
                        </article>
                    </div>
                </div>
            </section>

        </div>
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
                <a href="index.php" class="logo-footer">PEAK</a>
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