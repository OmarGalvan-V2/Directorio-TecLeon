<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Directorio Departamental De Profesores</title>
  <link rel="shortcut icon" href=<?= base_url() . "CSS/ITL.ico" ?>>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
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

    article a img {
      width: 100%;
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
  <div class="container text-white py-5">
    <div class="row no-gutters" style="border-radius:1rem; overflow:hidden;">
      <div class="col-12 col-sm-6 col-md-4">
        <article class="overflow-hidden position-relative">
          <a href=<?php if (isset($_SESSION)) : ?> "http://localhost/CopiaTec/Welcome/InterfazDCBAdm" <?php else : ?>"http://localhost/CopiaTec/Welcome/InterfazDCEA" <?php endif; ?>>
            <img src=<?= base_url() . "images/ImgCienciasBasicas.jpg" ?>>
            <div class="position-absolute d-flex justify-content-center align-items-center p-4">
              <p class="text-center">DEPARTAMENTO DE CIENCIAS BÁSICAS</p>
            </div>
          </a>
        </article>
      </div>
      <div class="col-12 col-sm-6 col-md-4">
        <article class="overflow-hidden position-relative">
          <a href=<?php if (isset($_SESSION)) : ?>"http://localhost/CopiaTec/Welcome/InterfazDCEAAdm" <?php else : ?> "http://localhost/CopiaTec/Welcome/InterfazDCEA" <?php endif; ?>>
            <img src=<?= base_url() . "images/ImgEconomico.jpeg" ?>>
            <div class="position-absolute d-flex justify-content-center align-items-center p-4">
              <p class="text-center">DEPARTAMENTO DE CIENCIAS ECONÓMICO ADMINISTRATIVAS</p>
            </div>
          </a>
        </article>
      </div>
      <div class="col-12 col-sm-6 col-md-4">
        <article class="overflow-hidden position-relative">
          <a href=<?php if (isset($_SESSION)) : ?>"http://localhost/CopiaTec/Welcome/InterfazDILAdm" <?php else : ?>"http://localhost/CopiaTec/Welcome/InterfazDIL" <?php endif; ?>>
            <img src=<?= base_url() . "images/ImgIndustrialyLogistica.jpeg" ?>>
            <div class="position-absolute d-flex justify-content-center align-items-center p-4">
              <p class="text-center">DEPARTAMENTO DE INDUSTRIAL Y LOGISTICA</p>
            </div>
          </a>
        </article>
      </div>
      <div class="col-12 col-sm-6 col-md-4">
        <article class="overflow-hidden position-relative">
          <a href=<?php if (isset($_SESSION)) : ?>"http://localhost/CopiaTec/Welcome/InterfazDMMAdm" <?php else : ?>"http://localhost/CopiaTec/Welcome/InterfazDMM" <?php endif; ?>>
            <img src=<?= base_url() . "images/ImgMetalMecanica.jpeg" ?>>
            <div class="position-absolute d-flex justify-content-center align-items-center p-4">
              <p class="text-center">DEPARTAMENTO DE METAL MECANICA</p>
            </div>
          </a>
        </article>
      </div>
      <div class="col-12 col-sm-6 col-md-4">
        <article class="overflow-hidden position-relative">
          <a href=<?php if (isset($_SESSION)) : ?>"http://localhost/CopiaTec/Welcome/InterfazDSAdm"<?php else : ?>"http://localhost/CopiaTec/Welcome/InterfazDS" <?php endif; ?>>
            <img src=<?= base_url() . "images/ImgSistemasComputacionales.jpeg" ?>>
            <div class="position-absolute d-flex justify-content-center align-items-center p-4">
              <p class="text-center">DEPARTAMENTO DE SISTEMAS Y COMPUTACION</p>
            </div>
          </a>
      </div>
      <div class="col-12 col-sm-6 col-md-4">
        <article class="overflow-hidden position-relative">
          <a href=<?php if (isset($_SESSION)) : ?>"http://localhost/CopiaTec/Welcome/InterfazPOSAdm" <?php else : ?>"http://localhost/CopiaTec/Welcome/InterfazPOS" <?php endif; ?>>
            <img src=<?= base_url() . "images/ImgPosgrado.jpeg" ?>>
            <div class="position-absolute d-flex justify-content-center align-items-center p-4">
              <p class="text-center">DEPARTAMENTO DE POSGRADO</p>
            </div>
          </a>
        </article>
      </div>
    </div>
  </div>
</body>

</html>