<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href=<?= base_url() . "images/ITL.ico" ?>>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directorio Tecnologico General</title>
    <link rel="stylesheet" href=<?= base_url() . "slide/css/swiper.min.css" ?>>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href=<?= base_url() . "libs/fontawesome/css/fontawesome.css" ?> rel="stylesheet">
    <link href=<?= base_url() . "libs/fontawesome/css/brands.css" ?> rel="stylesheet">
    <link href=<?= base_url() . "libs/fontawesome/css/solid.css" ?> rel="stylesheet">
    <link rel="stylesheet" media="screen" href=<?= base_url('style/style.css') ?>>
    <link rel="stylesheet" media="screen" href=<?= base_url('style/sfia.css') ?>>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
</head>

<body>
    <!--Header - Menu -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1B396A;">
            <div class="container">
            <?php if (isset($_SESSION) > 0) : ?>
                <a href="/CopiaTec/Welcome/Administracion" class="navbar-brand text-white" style="background-color: #1B396A;">
                    <img src="<?= base_url() . 'images/OIP.png' ?>" alt="Logo del tec de león" width="64" height="64">
                    <span class="font-weight-bold">
                        Directorio Tecnológico
                    </span>
                </a>
                <?php else: ?>
                    <a href="/CopiaTec/Welcome/index" class="navbar-brand text-white" style="background-color: #1B396A;">
                    <img src="<?= base_url() . 'images/OIP.png' ?>" alt="Logo del tec de león" width="64" height="64">
                    <span class="font-weight-bold">
                        Directorio Tecnológico
                    </span>
                </a>
                <?php endif ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-white"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <?php if (isset($_SESSION) > 0) : ?>

                            <li class="nav-item active">
                                <a class="nav-link" href=<?= base_url() . "Welcome/InterfazProfesoradoAdm" ?>>Directivo profesorado</a>
                            </li>

                            <li class="nav-item active">
                                <a class="nav-link" href=<?= base_url() . "Welcome/RFormularioTec" ?>>Registrar Profesorado</a>
                            </li>

                            <li class="nav-item active">
                                <a class="nav-link" href=<?= base_url() . "Welcome/InterfazDDPAdm" ?>>Directivos departamentales</a>
                            </li>


                            <li class="nav-item active">
                                <a class="nav-link" href=<?= base_url() . "Welcome/DFormularioTec" ?>>Registrar Dir Dept</a>
                            </li>


                            <li class="nav-item active">
                                <a class="nav-link" id="CerrarSesionBtn" href=<?= base_url() . 'Sesion/CerrarSesion' ?>>Cerrar sesión</a>
                            </li>

                            <?php else : ?>
                            <li class="nav-item active">
                                <a class="nav-link" href=<?= base_url() . "Welcome/InterfazProfesorado" ?>>Directivo profesorado</a>
                            </li>

                            <li class="nav-item active">
                                <a class="nav-link" href=<?= base_url() . "Welcome/InterfazDDP" ?>>Directivos departamentales</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
        </nav>
    </header>

    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>