<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('CSS/DCB.css') ?>">
    <link rel="stylesheet" href="<?= base_url('CSS/Cuerpo.css') ?>">

</head>

<body>
</body>
<?php for ($i = 0; $i < 1; $i++) { ?>
    <h1 class="text-white mt-4 text-center letrero"><?= $Resultado[$i]['Departamentos'] ?></h1>
<?php } ?>
<div class="container py-5">
    <div class="row">
        <?php for ($i = 0; $i < count($Resultado); $i++) {
            $id = $Resultado[$i]['ID']
        ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="accordion cristal" id="accordion<?= $id ?>">

                    <article class="card border-0">
                        <header class="card-header text-truncate border-0" id="heading<?= $id ?>">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left text-white" type="button" data-toggle="collapse" data-target="#collapse<?= $id ?>" aria-expanded="false" aria-controls="collapse<?= $id ?>">
                                    <?= $Resultado[$i]['Apellido'] ?> <?= $Resultado[$i]['Nombre']  ?>
                                </button>
                            </h2>
                        </header>
                        <div id="collapse<?= $id ?>" class="collapse" aria-labelledby="heading<?= $id ?>" data-parent="#accordion<?= $id ?>">
                            <div class="card-body">
                                <p class="card-text text-white">
                                    <span>Edificio: <?= $Resultado[$i]['Edificio'] ?></span><br>
                                    <span>Cubiculo: <?= $Resultado[$i]['Cubiculo'] ?></span><br>
                                    <span>Horario: <?= $Resultado[$i]['Turno'] ?></span>
                                </p>
                                <a href="mailto:<?= $Resultado[$i]['Correo'] ?>" target="_blank">
                                    <?= $Resultado[$i]['Correo'] ?>
                                </a>
                                <button type="button" class="btn btn-outline-light mt-1 btn-block" data-toggle="modal" data-target="#exampleModal">
                                    Agendar cita
                                </button>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agendar cita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputNumControl">Número de control</label>
                        <input type="text" class="form-control" id="exampleInputNumControl">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPropuesta">Propuesta de horario</label>
                        <input type="text" class="form-control" id="examplePropuesta">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </div>
</div>

</html>