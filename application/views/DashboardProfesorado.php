<?php include('header.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Profesorado</title>
    <link rel="ico" href="<?= base_url() . 'CSS/ITL.ico' ?>">
    <link rel="stylesheet" href="<?= base_url() . 'CSS/Cuerpo.css' ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class='col-lg-12 col-sm-6 ml-auto mr-auto '>
                <center class="pSession">
                    <h1><b>Dashboard Elsa Cuevas</b></h1>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <table class="table table-hover table-responsive-xl">
                    <thead style="color:blue">
                        <tr>
                            <th scope="col">ID-Ticket</th>
                            <th scope="col">Alumno</th>
                            <th scope="col">No.Control</th>
                            <th scope="col">Horario solicitado</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Manrique Galvan Omar Manuel</td>
                            <td>19240851</td>
                            <td>20/11/2023 - 9:00a.m</td>
                            <td><select class="custom-select">
                                    <option selected>Seleccione una opcion</option>
                                    <option value="1">Pendiente</option>
                                    <option value="2">Aceptar</option>
                                    <option value="3">Denegar</option>
                                </select></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary">Confirmar Solicitud</button>
            </div>
        </div>
    </div>
</body>

</html>

<?php include('footer.php') ?>