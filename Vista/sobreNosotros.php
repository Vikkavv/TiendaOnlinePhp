<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sobre nosotros</title>
    <link rel="stylesheet" href="Assets/styles.css" />
</head>

<body>
    <div class="containerNosotros">
        <div>
            <nav>
                <div>
                    <?php
                    $class = "hidden";
                    $nombre = "";
                    $apellido = "";
                    if (isset($_SESSION['cliente'])) {
                        $class = "";
                        $nombre = $_SESSION['cliente']->getNombre();
                        $apellido = $_SESSION['cliente']->getApellido();
                    }
                    print '<p class="' . $class . '">¡Bienvenido ' . $nombre . ' ' . $apellido . '!</p>'
                        ?>

                </div>
                <div>
                    <a href="inicioSesion.php">Iniciar Sesión</a>
                    <a href="registro.php">Registrarse</a>
                    <?php
                    print '<a class="' . $class . '" href="trastienda.php">Trastienda</a>';
                    ?>
                    <a href="carrito.php"><img src="Assets/img/carrito.png" alt="icono carrito de la compra"></a>
                </div>
            </nav>
            <h1 class="xxl center marginTop">¿Quienes somos?</h1>
            <div class="container">
                <p>
                    En Tienda Online, nuestra misión es ofrecerte una experiencia de
                    compra única, sencilla y segura desde la comodidad de tu hogar. Este
                    proyecto nació de la pasión por la tecnología y el comercio digital, y
                    ha sido creado con dedicación y esfuerzo por un equipo de dos personas
                    que comparten una misma visión: hacer del e-commerce algo accesible
                    para todos.
                </p>
                <p>
                    Ambos desarrolladores hemos puesto nuestro conocimiento y creatividad
                    en cada detalle de esta página web, desde su diseño intuitivo hasta la
                    funcionalidad que permite gestionar productos y clientes de manera
                    eficiente. Nuestra meta es garantizar que encuentres lo que necesitas
                    de forma rápida y confiable, mientras te ofrecemos un entorno moderno
                    y agradable para explorar.
                </p>
                <p>
                    Nos enorgullece no solo el resultado final, sino también el proceso
                    que nos llevó hasta aquí: largas jornadas de aprendizaje, resolución
                    de retos y, sobre todo, el deseo constante de mejorar. Para nosotros,
                    cada clic y cada visita son un paso más en nuestro sueño de convertir
                    esta tienda en un referente en su sector.
                </p>
                <p>
                    Gracias por confiar en nuestro proyecto. Si tienes alguna sugerencia,
                    comentario o simplemente quieres saludarnos, no dudes en visitar la
                    sección de Contacto. ¡Estamos aquí para ayudarte!
                </p>
            </div>

        </div>
    </div>

    <div class="footer">
        <div>
            <h3>Información de contacto</h3>
            <ul>
                <li>Avenida de la Paz 45, Getafe</li>
                <li> +34 123 456 789</li>
                <li>soporte@tiendaonline.com</li>
            </ul>
        </div>
        <div>
            <h3>Políticas</h3>
            <ul>
                <li><a href="#">Política de privacidad</a></li>
                <li><a href="#">Términos y condiciones</a></li>
                <li><a href="#">Política de devoluciones o reembolsos</a></li>
            </ul>
        </div>
        <div>
            <h3>Enlaces rápidos</h3>
            <ul>
                <li><a href="gestionCliente.php">Gestión de clientes</a></li>
                <li><a href="gestionProducto.php">Gestión de productos</a></li>
                <li><a href="carrito.php">Carrito</a></li>
            </ul>
        </div>
        <div>
            <h3>Misceláneo</h3>
            <ul>
                <li><a href="sobreNosotros.php">Sobre nosotros</a></li>
                <li><a href="#">Trabaja con nosotros</a></li>
                <li class="hidden">a</li>
            </ul>
        </div>
    </div>
</body>

</html>