<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href=<?= base_url() . "CSS/InterfazUsuario.css" ?>>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href=<?= base_url() . "CSS/Cuerpo.css" ?>>
    <script src="https://kit.fontawesome.com/c575c56047.js" crossorigin="anonymous"></script>


    <script>
        $(function() {
            $('#EliminarDato').click(function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            })
        })
    </script>
</head>

<body>
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
                                        <span>ID: <?= $Resultado[$i]['ID'] ?></span><br>
                                        <span>Edificio: <?= $Resultado[$i]['Edificio'] ?></span><br>
                                        <span>Cubiculo: <?= $Resultado[$i]['Cubiculo'] ?></span><br>
                                        <span>Horario: <?= $Resultado[$i]['Turno'] ?></span>
                                    </p>
                                    <a href="mailto:<?= $Resultado[$i]['Correo'] ?>" target="_blank">
                                        <?= $Resultado[$i]['Correo'] ?>
                                    </a>
                                </div>j
                                <div class="card-footer">
                                    <a class="btn btn-info" href=<?= base_url() . "Welcome/ActualizarDatos?id=" . $Resultado[$i]['ID']  ?> role="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                                        </svg> Editar
                                    </a>
                                    <a class="btn btn-danger" id="EliminarDato" href=<?= base_url(), 'CRUDEP/Eliminar?id=' . $Resultado[$i]['ID'] ?> role="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-dash-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z" />
                                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        </svg> Eliminar
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>