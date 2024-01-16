<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegistroDTG</title>
    <link rel="stylesheet" href=<?= base_url() . "CSS/Login.css" ?>>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href=<?= base_url() . "iamges/OIP.ico" ?>>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(function() {
            // Agregar regla de validación personalizada para no permitir números
            $.validator.addMethod("noNumbers", function(value, element) {
                return this.optional(element) || /^[^\d]+$/.test(value);
            }, "No se permiten números en este campo");

            let pet = $('#FormR').attr('action');
            let met = $('#FormR').attr('method');
            $('#FormR').validate({
                rules: {
                    Nombre: {
                        required: true,
                        noNumbers: true
                    },
                    Apellido: {
                        required: true,
                        noNumbers: true
                    },
                    Correo: {
                        required: true,
                        email: true,
                    }
                },
                messages: {
                    Nombre: {
                        required: 'Por favor, ingresa el nombre del profesor',
                        noNumbers: 'Por favor, No ingresar numeros dentro de este campo'
                    },
                    Apellido: {
                        required: 'Por favor, ingresa el apellido del profesor',
                        noNumbers: 'Por favor, No ingresar numeros dentro de este campo'
                    },
                    Correo: {
                        required: 'Por favor, ingresa un correo electronico',
                        email: 'El correo no es correcto'
                    }
                },
                errorPlacement: function(error, element) {
                    // Muestra los mensajes de error debajo de los campos correspondientes
                    error.appendTo(element.next('.invalid-feedback'));
                },
                highlight: function(element, errorClass, validClass) {
                    // Agrega la clase 'is-invalid' al campo de entrada si hay un error
                    $(element).addClass('is-invalid');
                },
                submitHandler: function(form) {
                    // Envía el formulario con AJAX si pasa la validación
                    $.ajax({
                        url: pet,
                        type: met,
                        data: $(form).serialize(),
                        success: function(resp) {
                            if (resp == 'Error') {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Favor De Llenar los datos solicitados'
                                })
                            } else {
                                Swal.fire({
                                    title: 'El Profesorado se ha actualizado Correctamente.!',
                                    text: 'Click para continuar!',
                                    icon: 'success'
                                }).then(() => {
                                    window.location.href = 'http://localhost/CopiaTec/Welcome/Administracion'
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>


    <style>
        body {
            /*Centra todos los elementos dentro del body*/
            height: auto;
            /*Establecemos la altura de los elementos dentro de nuestro body*/
            background-image: linear-gradient(135deg, #8B0000, #191970,
                    #DAA520);
            background-size: 500%;
            animation: fanimado 10s infinite;
            margin: 0;
            padding: 0;
        }

        .input-group-text {
            position: relative;
        }

        .invalid-feedback {
            position: absolute;
            bottom: -20px;
            left: 0;
            width: 100%;
            color: whitesmoke;
            text-align: center;
        }

        @keyframes fanimado {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0%, 50%;
            }
        }
    </style>


</head>

<body>
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto" style="margin-top: 50px;">
        <div class="card2 card0 border-0">
            <div class="d-flex justify-content-center pb-5">
                <img src=<?= base_url() . "images/CapyProfe.jpg" ?> class="image rounded-circle" style="width:300px">
            </div>
            <div>
                <div>
                    <div>
                        <form id="FormR" action="<?= base_url() ?>CRUDEP/Actualizar?id=<?= $Profesor[0]['ID'] ?>" method="POST">

                            <div class="form-group col-sm-6 mx-auto" style="max-width: 350px; padding-bottom: 7px;">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                        </svg>
                                    </div>
                                    <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre" value="<?= $Profesor[0]['Nombre'] ?>">
                                    <small class="invalid-feedback"></small>
                                </div>
                            </div>


                            <div class="form-group col-sm-6 mx-auto" style="max-width: 350px; padding-bottom: 7px;">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                        </svg></div>
                                    <input type="text" class="form-control" id="Apellido" name="Apellido" placeholder="Apellido" value="<?= $Profesor[0]['Apellido'] ?>">
                                    <small class="invalid-feedback"></small>
                                </div>
                            </div>


                            <div class="form-group col-sm-6 mx-auto" style="max-width: 350px; padding-bottom: 7px;">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                            <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                                            <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                                        </svg></div>
                                    <input type="text" class="form-control" id="Correo" name="Correo" placeholder='Correo' value="<?= $Profesor[0]['Correo'] ?>" size="50">
                                    <small class="invalid-feedback"></small>
                                </div>
                            </div>

                            <br>

                            <div class="form-group col-sm-6 mx-auto" style="max-width: 350px;margin-top: -20px;">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                            <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
                                            <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1Zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3V1Z" />
                                        </svg></div>
                                    <?php $departamento_seleccionado = $Profesor[0]['Edificio'] ?>
                                    <select class="form-control" id="Edificio" name='Edificio'>
                                        <?php for ($i = 0; $i < count($Edificio); $i++) { ?>
                                            <?php $seleccionado = ($Edificio[$i]['ID'] == $departamento_seleccionado) ? "selected" : ""; ?>
                                            <option value="<?= $Edificio[$i]['ID'] ?>" <?= $seleccionado ?>><?= $Edificio[$i]['Edificio'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-sm-6 mx-auto" style="max-width: 350px;">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                                            <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
                                            <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
                                        </svg></div>
                                    <input type="text" class="form-control" id="Cubiculo" name="Cubiculo" placeholder='Cubiculo' value="<?= $Profesor[0]['Cubiculo'] ?>" size="50">
                                </div>
                                <small id="Cubiculo" class="form-text text-muted"><?php echo form_error('Cubiculo'); ?></small>
                            </div>

                            <br>

                            <div class="form-group col-sm-6 mx-auto" style="max-width: 350px;margin-top: -20px;">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hourglass" viewBox="0 0 16 16">
                                            <path d="M2 1.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1-.5-.5zm2.5.5v1a3.5 3.5 0 0 0 1.989 3.158c.533.256 1.011.791 1.011 1.491v.702c0 .7-.478 1.235-1.011 1.491A3.5 3.5 0 0 0 4.5 13v1h7v-1a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351v-.702c0-.7.478-1.235 1.011-1.491A3.5 3.5 0 0 0 11.5 3V2h-7z" />
                                        </svg></div>
                                    <?php $departamento_seleccionado = $Profesor[0]['Turno'] ?>
                                    <select class="form-control" id="Turno" name='Turno'>
                                        <?php for ($i = 0; $i < count($Turno); $i++) { ?>
                                            <?php $seleccionado = ($Turno[$i]['ID'] == $departamento_seleccionado) ? "selected" : ""; ?>
                                            <option value="<?= $Turno[$i]['ID'] ?>" <?= $seleccionado ?>><?= $Turno[$i]['Turno'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <br>

                            <div class="form-group col-sm-6 mx-auto" style="max-width: 350px;margin-top: -20px;">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                            <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                        </svg></div>
                                    <?php $departamento_seleccionado = $Profesor[0]['Departamento'] ?>
                                    <select class="form-control" id="Departamento" name='Departamento'>
                                        <?php for ($i = 0; $i < count($Departamento); $i++) { ?>
                                            <?php $seleccionado = ($Departamento[$i]['ID'] == $departamento_seleccionado) ? "selected" : ""; ?>
                                            <option value="<?= $Departamento[$i]['ID'] ?>" <?= $seleccionado ?>><?= $Departamento[$i]['Departamentos'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>


                            <div class='d-flex justify-content-center'>
                                <button type="submit" class="btn btn-outline-primary mx-5 Enviar"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-fill-check" viewBox="0 0 16 16">
                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                                    </svg>Guardar Cambios</button>

                                <a class="btn btn-outline-danger mx-5" href=<?= base_url() . "Welcome/Administracion" ?> role="button"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-fill-slash" viewBox="0 0 16 16">
                                        <path d="M13.879 10.414a2.501 2.501 0 0 0-3.465 3.465l3.465-3.465Zm.707.707-3.465 3.465a2.501 2.501 0 0 0 3.465-3.465Zm-4.56-1.096a3.5 3.5 0 1 1 4.949 4.95 3.5 3.5 0 0 1-4.95-4.95ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                                    </svg>Cancelar Registro</a>
                            </div>
                    </div>

                    <br>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>