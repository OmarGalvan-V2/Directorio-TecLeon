$(function() {
    let pet = $('#FormR').attr('action');
    let met = $('#FormR').attr('method');
    $('#FormR').validate({
        rules: {
            NombreDept: {
                required: true
            },
            JefeDept: {
                required: true
            },
            CorreoDept:{
                required: true,
                email: true,
            }
        },
        messages: {
            NombreDept: {
                required: 'Por favor, ingresa el Nombre del departamento',
            },
            JefeDept: {
                required: 'Por favor, ingresa el Jefe Departamental',
            },
            CorreoDept:{
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
                            window.location.href = 'http://localhost/CopiaTec/Welcome/Administracion'
                        });
                    }
                }
            });
        }
    });
});
