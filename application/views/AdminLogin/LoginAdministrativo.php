<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Directorio Tecnologico General</title>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href=<?= base_url("CSS/InterfazLogin.css") ?>>
  <link rel="shortcut icon" href=<?= base_url() . "CSS/ITL.ico" ?>>
</head>

<body class="body">
  <main class="d-flex justify-content-center py-5">
    <div class='Sign-up'>
      <img class='img' style="border-radius:1rem;" src=<?= base_url() . "images/imgAdministrador.jpg" ?>>
      <p class="pSession">Bienvenido Administador</p>
      <form id="FormLogin" action=<?= base_url() . "Sesion/ValidandoDatos" ?> method="POST">
        <div class="mb-1">
          <input type="text" id="Usuario" name="Usuario" placeholder="Nombre De Usuario" required>
          <div class="invalid-feedback" style="text-align: center; color:whitesmoke; font-family: 'Times New Roman', Times, serif;"></div>
        </div>
        <div>
          <input type="password" id="Password" name="Password" placeholder="Ingrese la contraseña" required>
          <div class="invalid-feedback" style="text-align: center; color: whitesmoke; font-family: 'Times New Roman', Times, serif;"></div>
        </div>
        <div>
          <button type="submit">Iniciar Sesión</button>
        </div>
      </form>
    </div>
  </main>
  <!--Script para validacion de formulario-->
  <?php $this->load->view('AdminLogin/LoginAdmin_js') ?>
</body>

</html>