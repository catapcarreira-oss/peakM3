<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro | PEAK</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Joti+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="estilos.css?v=2">
</head>

<body class="pagina-registro">

    <main class="registro">

        <!-- LADO IZQUIERDO -->

        <div class="registro-imagen">
            <img src="img-/img-login.png"
                 alt="Helados PEAK">
        </div>


        <!-- LADO DERECHO -->

        <div class="registro-contenido">

            <a href="index.php" class="logo logo-registro">
                PEAK
            </a>

            <div class="registro-titulo">

                <h1>BIENVENIDO!</h1>

                <p>
                    Registrate y disfrutá del helado más alto
                </p>

            </div>


            <!-- FORMULARIO -->

            <form action="recibirRegistro.php"
                  method="POST"
                  class="formulario-registro">


                <div class="campo-registro">

                    <input
                        type="text"
                        name="nombre"
                        placeholder="Nombre">

                </div>


                <div class="campo-registro">

                    <input
                        type="text"
                        name="apellido"
                        placeholder="Apellido">

                </div>


                <div class="campo-registro">

                    <input
                        type="email"
                        name="email"
                        placeholder="Email">

                </div>


                <div class="campo-registro">

                    <input
                        type="password"
                        name="password"
                        placeholder="Contraseña">

                </div>


                <input
                    type="submit"
                    class="boton-registro"
                    value="REGISTRARME">

            </form>


            <p class="ya-cuenta">
                ¿Ya tenés una cuenta?
                <a href="login.php">Iniciá sesión</a>
            </p>

        </div>

    </main>

</body>

</html>