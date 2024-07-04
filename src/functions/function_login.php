<?php
include_once ("../conexion.php");
include_once ("../components/alert.php");


if (isset($_POST["btn-login"])) {
  
  $password = $_POST["password-log"];
  $email = $_POST["email-log"];
  $user_type = $_POST["user-type-log"];

  $sql = "SELECT `id`,`nombre`, `correo`, `contraseña`, `tipo_usuario` FROM `users` WHERE `correo` = '$email'";
  $result = mysqli_query($conn, $sql);

  if ($result -> num_rows > 0) {
    $row = $result->fetch_assoc();   
    $pass_check = password_verify($password, $row["contraseña"]);

    if ($pass_check && $user_type != "0" && $email === $row["correo"] && $user_type === $row["tipo_usuario"]) {
      session_start();
      $_SESSION['id'] = $row["id"];
      $_SESSION['nombre'] = $row["nombre"];
      $_SESSION['correo'] = $row["correo"];
      $_SESSION['tipo'] = $row["tipo_usuario"];
      header("Location: ../../main.php");
      exit();
    } else {
      ?>
        <script>
            alert('Upps... algo ingresaste mal.')
            location.href = "../login.php"
        </script>
      <?php
    }
    
    } else {
      ?>
        <script>
            alert('Este correo no esta registrado.')
            location.href = "../login.php"
        </script>
      <?php
    }
}
