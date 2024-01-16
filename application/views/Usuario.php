<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directorio Tecnologico General</title>
    <link rel="shortcut icon" href=<?= base_url() . "images/ITL.ico" ?>>
    <link rel="stylesheet" href="<?= base_url() . "CSS/Cuerpo.css" ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        article a {
            color: inherit;
        }

        article a:hover {
            color: white;
        }

        article a:hover div {
            transform: scaleY(1);
        }

        article div {
            bottom: 0;
            transform: scaleY(0);
            transition-duration: .25s;
            transform-origin: bottom;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, .75);
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-6 d-flex flex-column align-items-center">
                <article class="overflow-hidden position-relative" style="border-radius:1rem; overflow:hidden;">
                    <a href=<?php if (isset($_SESSION)) : ?>"http://localhost/CopiaTec/Welcome/InterfazProfesoradoAdm" <?php else : ?> "http://localhost/CopiaTec/Welcome/InterfazProfesorado" <?php endif; ?>>
                        <img style="width: 300px;" src=<?= base_url() . "images/ImgProfesorado.jpeg" ?>>
                        <div class="position-absolute d-flex justify-content-center align-items-center p-4">
                            <p class="text-center"> Directivo Profesorado</p>
                        </div>
                    </a>
                </article>
            </div>
            <div class="col-12 col-md-6 d-flex flex-column align-items-center">
                <article class="overflow-hidden position-relative" style="border-radius:1rem; overflow:hidden;">
                    <a href=<?php if (isset($_SESSION)) : ?>"http://localhost/CopiaTec/Welcome/InterfazDDPAdm" <?php else : ?> "http://localhost/CopiaTec/Welcome/InterfazDDP" <?php endif; ?>>
                        <img style="width: 300px;" src=<?= base_url() . "images/ImgDirectivo.jpeg" ?>>
                        <div class="position-absolute d-flex justify-content-center align-items-center p-4">
                            <p class="text-center">Directivos Departamentales</p>
                        </div>
                    </a>
                </article>
            </div>
        </div>
    </div>
</body>

</html>