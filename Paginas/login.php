<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../CSS/login.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body class="text-center">
  <a href='../index.html' class='closebtn' style="padding-top:-200px">&times;</a>
  <form class="form-signin" id="form_login" method="POST">
    <img class="mb-4" src="../IMGS/LOGOS/Logo_Principal.png" alt="" width="200" height="200">
    <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesión</h1>
    <label for="inputUser" class="sr-only">Nombre de usuario</label>
    <input type="text" id="inputUser" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
    <p>
    <div></div>
    </p>
    <label for="inputPassword" class="sr-only">Contraseña</label>
    <input type="password" id="inputPassword" name="clave" class="form-control" placeholder="Contraseña" required>
    <br>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" id="form_logi">Iniciar Sesión</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
    <div id="msg_error" class="alert alert-danger" role="alert" style="display: none">Error, el usuario o la contraseña son incorrectos</div>
  </form>

  <script src="../JS/login.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>