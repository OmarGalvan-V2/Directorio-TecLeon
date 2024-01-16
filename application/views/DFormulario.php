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
    <script src="https://kit.fontawesome.com/c575c56047.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href=<?= base_url() . "images/OIP.ico" ?>>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(function() {
            $.validator.addMethod("noNumbers", function(value, element) {
                return this.optional(element) || /^[^\d]+$/.test(value);
            }, "No se permiten números en este campo");

            let pet = $('#FormR').attr('action');
            let met = $('#FormR').attr('method');
            $('#FormR').validate({
                rules: {
                    NombreDept: {
                        required: true,
                        noNumbers: true
                    },
                    JefeDept: {
                        required: true,
                        noNumbers: true
                    },
                    CorreoDept: {
                        required: true,
                        email: true,
                    }
                },
                messages: {
                    NombreDept: {
                        required: 'Por favor, ingresa el Nombre del departamento',
                        noNumbers: 'Por favor, No ingresar numeros en este campo'
                    },
                    JefeDept: {
                        required: 'Por favor, ingresa el Jefe Departamental',
                        noNumbers: 'Por favor, No ingresar numeros en este campo'
                    },
                    CorreoDept: {
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
                                    title: 'El Directivo departamental ha sido registrado correctamente!',
                                    text: 'Click para continuar!',
                                    icon: 'success'
                                }).then(() => {
                                    window.location.href = 'http://localhost/CopiaTec/Welcome/InterfazDDPAdm'
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
    </style>

</head>

<body>
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto" style="margin-top: 50px;">
        <div class="card2 card0 border-0">
            <div class="d-flex justify-content-center pb-5">
                <img src=<?= base_url() . "images/CapyDepartamental.jpg" ?> class="image rounded-circle" style="width:280px; transform: translateY(5%);">
            </div>
            <div>
                <div>
                    <div>
                        <form id="FormR" action=<?= base_url() . "CRUDEP/InsertarDatosDDD" ?> method="POST">

                            <div class="form-group col-sm-6 mx-auto" style="max-width: 380px; padding-bottom: 7px">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                        </svg>
                                    </div>
                                    <input type="text" class="form-control" id="NombreDept" name="NombreDept" placeholder="Nombre Departamental" value="<?php echo set_value('NombreDept'); ?>">
                                    <small class="invalid-feedback"></small>
                                </div>
                            </div>


                            <div class="form-group col-sm-6 mx-auto" style="max-width: 380px;  padding-bottom: 7px;">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                        </svg></div>
                                    <input type="text" class="form-control" id="JefeDept" name="JefeDept" placeholder="Jefe De Departamento" value="<?php echo set_value('JefeDept'); ?>">
                                    <small class="invalid-feedback"></small>
                                </div>
                            </div>


                            <div class="form-group col-sm-6 mx-auto" style="max-width: 380px;  padding-bottom: 7px;">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                            <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                                            <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                                        </svg></div>
                                    <input type="text" class="form-control" id="CorreoDept" name="CorreoDept" placeholder='Correo Del Departamento' value="<?php echo set_value('CorreoDept'); ?>" size="50">
                                    <small class="invalid-feedback"></small>
                                </div>
                            </div>

                            <br>

                            <div class="form-group col-sm-6 mx-auto" style="max-width: 380px;margin-top: -20px;  padding-bottom: 7px;">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                            <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
                                            <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1Zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3V1Z" />
                                        </svg></div>
                                    <select class="form-control" id="Edificio" name='Edificio'>
                                        <?php for ($i = 0; $i < count($Datos2); $i++) { ?>
                                            <option value="<?= $Datos2[$i]['ID'] ?>"><?= $Datos2[$i]['Edificio'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <br>

                            <div class='d-flex justify-content-center'>
                                <button type="submit" class="btn btn-outline-primary mx-5 Enviar"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill-check" viewBox="0 0 16 16">
                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                                    </svg>Registrar Directivo</button>

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