<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro de Usuario</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="plantilla/dist/css/adminlte.min.css">

  <!-- CSS personalizado -->
  <style>
    body {
        background: linear-gradient(45deg, #F9796E, #02CBF7, #E7B1A5, #60E1F7, #C9F3FF);
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .login-container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .login-box {
        width: 400px;
        margin-left: 1cm; 
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
    }

    .login-image {
        width: 31%;
        height: auto;
        margin-top: 1cm;
    }

    .forgot-password {
        text-align: center;
        margin-top: 10px;
    }
  </style>

</head>
<body class="hold-transition login-page">
  <div class="login-container">
    <img src="img/Direpro.jpg" alt="Imagen" class="login-image">
    <div class="login-box">
      <div class="login-logo">
        <a href="../vista/index.html"><b>DIRE</b>PRO</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Restablecer Contraseña</p>

          <form action="procesar_recuperacion_contrasena.php" method="post">
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Correo Electrónico" name="email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <!-- Otros campos necesarios para el proceso de recuperación de contraseña -->

            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Enviar Código de Restablecimiento</button>
              </div>
            </div>
          </form>

          <p class="forgot-password">Te enviaremos un código de restablecimiento a tu correo.</p>
        </div>
        <p class="mb-0">
            ¿Ya tienes una cuenta? <a href="index.php" class="text-center">Iniciar sesión</a>
          </p>
        <!-- /.login-card-body -->
      </div>
    </div>
  </div>
  <!-- /.login-container -->

  <!-- jQuery -->
  <script src="../plantilla/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../plantilla/dist/js/adminlte.min.js"></script>
</body>
</html>
