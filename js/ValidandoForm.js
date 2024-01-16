
$(function() {
    let pet = $('#FormLogin').attr('action');
    let met = $('#FormLogin').attr('method');
    $('#FormLogin').on('submit', function(e) {
        e.preventDefault();
        let Usuario = $('#Usuario').val();
        let Password = $('#Password').val();
        if (Usuario.trim() == '' || Password.trim() == '') {
            // Si los campos están vacíos, muestra un mensaje de error al usuario
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, ingresa un usuario y contraseña',
            });
            return false;
        }
        $.ajax({
            url: pet,
            type: met,
            data: $('#FormLogin').serialize(),
            success: function(resp) {
                if (resp == "Error") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'La contraseña y/o usuario son incorrectos',
                    })
                } else {
                    Swal.fire({
                      title: 'Sesion Iniciada!',
                      text: 'Click para continuar!',
                      icon: 'success'
                    }).then(() => {
                      window.location.href = 'http://localhost/CopiaTec/Welcome/Administracion'
                    });
                  }
                  
            }
        })
    })
})
