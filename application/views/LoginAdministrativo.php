<?php include('Header.php'); ?>
<!DOCTYPE html>
<html lang="es">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Directorio Tecnologico General</title>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <link rel="stylesheet" href=<?= base_url() . "CSS/InterfazLogin.css" ?>>
  <link rel="shortcut icon" href=<?= base_url() . "images/ITL.ico" ?>>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
</head>
<script>
  $(function() {
    let pet = $('#FormLogin').attr('action');
    let met = $('#FormLogin').attr('method');
    $('#FormLogin').validate({
      rules: {
        Usuario: {
          required: true
        },
        Password: {
          required: true
        }
      },
      messages: {
        Usuario: {
          required: 'Por favor, ingresa un usuario'
        },
        Password: {
          required: 'Por favor, ingresa una contraseña'
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
            if (!resp) {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La contraseña y/o usuario son incorrectos'
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
        });
      }
    });
  });
</script>

<body class="body">
  <main class="d-flex justify-content-center py-5">
    <div class='Sign-up'>
      <img class='img' style="border-radius:1rem;" src=<?= base_url() . "images/imgAdministrador.jpg" ?>>
      <p class="pSession">Bienvenido Administador</p>
      <form id="FormLogin" action=<?= base_url() . "Sesion/ValidandoDatos" ?> method="POST">
        <div class="mb-1">
          <input type="text" id="Usuario" name="Usuario" placeholder="Nombre De Usuario" required>
          <div class="invalid-feedback" style="text-align: center; color:whitesmoke;"></div>
        </div>
        <div>
          <input type="password" id="Password" name="Password" placeholder="Ingrese la contraseña" required>
          <div class="invalid-feedback" style="text-align: center; color: whitesmoke;"></div>
        </div>
        <div>
          <button type="submit">Iniciar Sesión</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>