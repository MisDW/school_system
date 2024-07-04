<?php
include_once ("conexion.php");
include_once ("./components/alert.php");


if(isset($_POST["btn-register"])){

  $name = $_POST["name-reg"];
  $password = $_POST["password-reg"];
  $email = $_POST["email-reg"];
  $user_type = $_POST["user-type-reg"];
  $password_hash = password_hash($password, PASSWORD_DEFAULT);

  // $sql = "INSERT INTO (nombre, correo, contraseña, tipo_usuario)  FROM users WHERE correo = '$email'";
  $sql = "INSERT INTO `users` (`nombre`, `correo`, `contraseña`, `tipo_usuario`) VALUES ('$name', '$email', '$password_hash', '$user_type')";
  $result = mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="sp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/estilos.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

  <title>Login Page</title>
</head>
<!-- style="background-color: #34d2a0; background-image: linear-gradient(90deg, #34d2a0 0%, #159093 100%);" -->
<body class="bg-purple">

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" action="login.php" method="post">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-center fs-5 fw-bold text-purple" id="exampleModalLabel">Registro</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="form-floating mb-2">
          <input type="text" class="form-control" name="name_reg" required placeholder="Escribe tu nombre">
          <label for="floatingInput">Nombre</label>
        </div>
        <div class="form-floating mb-2">
          <input type="email" class="form-control" name="email-reg" required placeholder="name@example.com">
          <label for="floatingInput">Correo Electronico</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" name="password-reg" required placeholder="Password">
          <label for="floatingPassword">Contraseña</label>
        </div>

        <select class="form-select mb-3" aria-label="Default select example" required name="user-type-reg">
          <option selected value="0">¿Que usuario eres?</option>
          <option value="2">Docente</option>
          <option value="3">Alumno</option>
          <option value="1">Admin</option>
        </select>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn bg-purple" name="btn-register">Registrar</button>
        </div>

      </form>
    </div>
  </div>

  <!-- SPINNER -->
  <div id="spinner-loading"
    class="bg-b position-fixed vw-100 vh-100 top-0 d-flex justify-content-center align-items-center m-0 p-0 z-1">
    <div class="spinner-border border-5 text-purple" style="width: 3rem; height: 3rem;" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>

  <!-- LOGIN -->
  <div class="container">
    <section
      class="row justify-content-center w-75 h-auto bg-light align-items-center position-relative mx-auto mt-5 rounded-4 overflow-hidden shadow">
      <article class="col-6 w-50 p-0 m-0 shadow">
        <nav class="p-2 text-center text-purple">Sistema Escolar</nav>
        <img class="w-100 h-100" src="../img/otros/presentacion-login.jpg">
      </article>

      <form id="form-login" class="col-6 d-grid" method="post" action="./functions/function_login.php">

        <p class="my-2 text-center fs-5 fw-bold text-purple">Login</p>
        <div class="form-floating mb-2">
          <input type="email" class="form-control" name="email-log" required placeholder="name@example.com">
          <label for="floatingInput">Correo Electronico</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" name="password-log" required placeholder="Password">
          <label for="floatingPassword">Contraseña</label>
        </div>
        <select class="form-select mb-3" aria-label="Default select example" required name="user-type-log">
          <option selected value="0">¿Que usuario eres?</option>
          <option value="2">Docente</option>
          <option value="3">Alumno</option>
          <option value="1">Admin</option>
        </select>

        <button type="submit" class="btn btn-dark px-5" type="submit" name="btn-login">Iniciar Sesion</button>

        <div class="d-flex justify-content-center text-center mt-4 pt-1">
          <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
          <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
          <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
        </div>
        <p class="mb-0 text-center text-dark mb-3 d-flex align-items-center justify-content-center ">¿No tienes cuenta?
          <!-- Button trigger modal -->
          <button type="submit" class="border-0 btn text-primary" id="cambio-modo" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            Registrate
          </button>
        </p>
      </form>
  </div>

  </section>
  </div>
  
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="../js/spinner.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>