
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión | PEAK</title>

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

            <a href="login.php" class="logo logo-registro">
                PEAK
            </a>

            <div class="registro-titulo">

                <h1>¡HOLA DE NUEVO!</h1>

                <p>
                    Iniciá sesión y seguí disfrutando de PEAK
                </p>

            </div>


            <!-- FORMULARIO LOGIN -->

            <form action="recibirLogin.php"
                  method="POST"
                  class="formulario-registro">


                <div class="campo-registro">

                    <input
                        type="email"
                        name="email"
                        placeholder="Email"
                        required>

                </div>


                <div class="campo-registro">

                    <input
                        type="password"
                        name="password"
                        placeholder="Contraseña"
                        required>

                </div>


                <input
                    type="submit"
                    class="boton-registro"
                    value="INICIAR SESIÓN">

            </form>


            <p class="ya-cuenta">
                ¿Todavía no tenés una cuenta?
                <a href="registro.php">Registrate</a>
            </p>

        </div>

    </main>

</body>

</html>
