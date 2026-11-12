# PEAK — Helados funcionales

## 1. Descripción del proyecto

PEAK es un sitio web desarrollado para la materia **Producción Digital II** de la Universidad de Palermo.

El proyecto consiste en una plataforma digital para una marca ficticia de helados funcionales, organizada en tres líneas de productos:

- **PRO:** helados con alto contenido proteico.
- **PLANT:** helados elaborados con base vegetal.
- **PURE:** helados de sabores frutales.

El objetivo del sitio es permitir que los usuarios conozcan los productos de la marca, interactúen con sus distintas secciones y participen mediante un sistema de calificaciones.

El sitio fue desarrollado utilizando **HTML, CSS, PHP y MySQL**, y se ejecuta en un servidor local mediante WAMPP.

## 2. Tecnologías utilizadas

- **HTML:** estructura y contenido de las páginas web.
- **CSS:** diseño visual, estilos y efectos de interacción.
- **PHP:** procesamiento de formularios, gestión de sesiones y conexión con la base de datos.
- **MySQL:** almacenamiento y consulta de información.
- **phpMyAdmin:** administración de la base de datos.
- **WAMPP:** entorno de servidor local que permite ejecutar Apache y MySQL.

## 3. Navegación por las vistas

El sitio está organizado en diferentes páginas PHP, conectadas mediante una barra de navegación.

### Inicio — `index.php`

Es la página principal del sitio. Presenta la identidad de PEAK, sus líneas de productos y la sección **PEAK de la semana**, donde se muestra automáticamente el sabor mejor calificado durante la semana actual.

### Sabores — `sabores.php`

Permite explorar los 12 sabores de la marca, organizados en las líneas PRO, PLANT y PURE.

Cada producto incluye su nombre, descripción e imagen correspondiente.

### Ranking — `ranking.php`

Permite a los usuarios calificar los sabores mediante un sistema de puntuación de 1 a 5 estrellas.

También presenta el sabor destacado de la semana, seleccionado a partir de las calificaciones registradas en la base de datos.

### Contacto — `contacto.php`

Contiene un formulario para que los usuarios puedan enviar consultas o mensajes.

### Registro — `registro.php`

Permite crear una cuenta mediante un formulario que solicita los datos del usuario.

### Inicio de sesión — `login.php`

Permite ingresar al sitio utilizando el correo electrónico y la contraseña registrados previamente.

## 4. Funcionamiento de los formularios

Los formularios del sitio utilizan el método **POST** para enviar información a los archivos PHP encargados de procesarla.

### Formulario de registro

1. El usuario ingresa sus datos en `registro.php`.
2. El formulario envía la información a `recibirRegistro.php` mediante POST.
3. PHP procesa los datos y los almacena en la tabla `usuarios` de MySQL.
4. Una vez completado el registro, se inicia una sesión para identificar al usuario.

### Formulario de inicio de sesión

1. El usuario ingresa su correo electrónico y contraseña en `login.php`.
2. Los datos se envían a `recibirLogin.php` mediante POST.
3. PHP consulta la tabla `usuarios` y verifica las credenciales ingresadas.
4. Si los datos son correctos, se crea una sesión y se permite el acceso a las páginas protegidas.

### Formulario de contacto

1. El usuario completa los campos del formulario en `contacto.php`.
2. La información se envía a `recibirContacto.php` mediante POST.
3. PHP procesa los datos y los almacena en la tabla `contacto`.
4. El sistema informa si el mensaje fue enviado correctamente o si ocurrió un error.

### Formulario de calificaciones

1. El usuario ingresa a `ranking.php`.
2. Selecciona el sabor que desea calificar.
3. Elige una puntuación de 1 a 5 estrellas.
4. El formulario envía el identificador del sabor y la puntuación a `recibirCalificacion.php` mediante POST.
5. PHP verifica que la puntuación sea válida.
6. Si los datos son correctos, se registra la calificación en MySQL.

Cada voto queda almacenado con el identificador del sabor, la puntuación y la fecha correspondiente.

## 5. Acceso a la zona segura mediante sesiones

PEAK utiliza **sesiones de PHP** para identificar a los usuarios y controlar el acceso a las páginas principales.

Cuando un usuario inicia sesión correctamente, PHP almacena información en la variable `$_SESSION`, incluyendo su identificador y nombre.

Las páginas protegidas verifican si existe una sesión activa antes de permitir el acceso.

La comprobación se realiza mediante el siguiente código:

```php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}
```

Si un visitante intenta ingresar directamente a una página protegida sin haber iniciado sesión, es redirigido automáticamente a `login.php`.

Una vez autenticado, el usuario puede navegar por las secciones habilitadas del sitio.

Además, la barra de navegación muestra un saludo personalizado utilizando el nombre almacenado en la sesión.

### Cierre de sesión

Para finalizar la sesión se utiliza el archivo `salir.php`.

Este archivo destruye la sesión activa y redirige al usuario a la página de inicio de sesión.

De esta manera, para volver a ingresar a las páginas protegidas, el usuario debe autenticarse nuevamente.

## 6. Base de datos

El sitio utiliza una base de datos MySQL denominada **`sitiopeak`**, administrada mediante phpMyAdmin.

La base de datos contiene cuatro tablas principales:

| Tabla | Descripción |
|---|---|
| `usuarios` | Almacena los datos de las cuentas registradas. |
| `contacto` | Guarda los mensajes enviados desde el formulario de contacto. |
| `sabores` | Contiene los 12 sabores, sus líneas, descripciones e imágenes. |
| `calificaciones` | Registra el sabor seleccionado, la puntuación y la fecha de cada voto. |

Las tablas `sabores` y `calificaciones` se vinculan mediante el campo `id_sabor`.

Esta vinculación permite identificar a qué producto pertenece cada calificación y utilizar los votos para realizar consultas SQL.

## 7. Sistema de calificaciones y PEAK de la semana

Una de las funcionalidades principales del proyecto es la selección automática del **PEAK de la semana**.

El archivo `peakSemana.php` realiza una consulta a la base de datos para determinar cuál es el sabor mejor calificado durante la semana actual.

El proceso consiste en:

1. Seleccionar las calificaciones registradas durante la semana actual.
2. Agrupar los votos según el identificador de cada sabor.
3. Calcular el promedio de puntuaciones utilizando `AVG()`.
4. Contabilizar la cantidad de votos mediante `COUNT()`.
5. Ordenar los sabores según su promedio de calificaciones.
6. En caso de empate, priorizar el sabor con mayor cantidad de votos.
7. Seleccionar el primer resultado mediante `LIMIT 1`.

El sabor seleccionado se muestra automáticamente en las páginas `index.php` y `ranking.php`.

Esto permite que el contenido destacado del sitio se actualice dinámicamente a partir de la participación de los usuarios, sin necesidad de modificar manualmente el código.

## 8. Ejecución del proyecto en un servidor local

Para ejecutar PEAK se necesita tener instalado **XAMPP**, que proporciona los servicios Apache y MySQL.

### Pasos para ejecutar el sitio

1. Abrir WAMPP e iniciar los servicios **Apache** y **MySQL**.
2. Colocar la carpeta del proyecto dentro del directorio `htdocs` de WAMPP.
3. Abrir phpMyAdmin desde `http://localhost/phpmyadmin`.
4. Crear una base de datos llamada `sitiopeak`.
5. Importar el archivo `.sql` del proyecto para generar las tablas y los datos de prueba.
6. Verificar que la configuración de conexión a MySQL coincida con el entorno local.
7. Abrir el navegador e ingresar a `http://localhost/PEAK/login.php`, ajustando la ruta según el nombre de la carpeta.
8. Registrarse o iniciar sesión para acceder a las funcionalidades del sitio.

## 9. Administración técnica

La administración de los datos del proyecto se realiza mediante **phpMyAdmin**.

Desde esta herramienta es posible:

- Consultar los usuarios registrados.
- Visualizar los mensajes recibidos mediante el formulario de contacto.
- Revisar y modificar la información de los sabores.
- Consultar las calificaciones almacenadas.
- Importar y exportar la base de datos.

PEAK no cuenta con un panel de administración propio. La gestión técnica se realiza directamente desde phpMyAdmin y los archivos del proyecto.

## 10. Conclusión

PEAK integra diseño web, programación PHP y gestión de bases de datos MySQL para desarrollar una experiencia digital funcional e interactiva.

La implementación de formularios, sesiones, consultas SQL y un sistema de calificaciones permitió conectar la interfaz visual con el procesamiento y almacenamiento de información.

De esta manera, el proyecto evolucionó desde una propuesta visual hacia un sitio web con funcionalidades dinámicas y participación de los usuarios.
