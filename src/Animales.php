<?php
  include("conexion.php");
  session_start();
  if (isset($_SESSION['usuario']) == false) {header("location: login.php");}
?>

<!doctype html>
<html lang="sp">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Huellas Globales - Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
  </head>
  <body>

    <!--Encabezado-->
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="../main.php">
          <img src="../img/logoOnly.png" alt="Logo" width="100" height="100" class="d-inline-block align-text-top">
            Huellas Globales
          </a>
          <ul class="nav justify-content-end">
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="login.php">Usuario</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="Adopcion.php">Poner en Adopcion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="Animales.php">Adopta Ahora!</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="Refugios.php">Refugios Cercanos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="Productos.php">Productos</a>
            </li>
          </ul>
        </div>
    </nav>

    <div class="container">

    <div class="card my-3">
      <div class="card-header bg-success text-light shadow"><?php echo $_SESSION["usuario"]; ?> ¿Buscas a un buen amigo...?</div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <p>Utiliza los filtros y mira cual se acopla mas a ti</p>
          <footer class="blockquote-footer">Utiliza nuestro nuevo FILTRO!</footer>
        </blockquote>
      </div>
    </div>

    <form class="container shadow p-4 my-3 rounded" method="post" action="Animales.php">
        <?php     
          $sqlAnimales= "SELECT animal FROM animales GROUP BY animal";
          $resAnimales = mysqli_query($conn, $sqlAnimales);

          $sqlEdad= "SELECT edad FROM animales GROUP BY edad";
          $resEdad = mysqli_query($conn, $sqlEdad);

          $sqlTamaño = "SELECT tamaño FROM animales GROUP BY tamaño";
          $resTamaño = mysqli_query($conn, $sqlTamaño);

          $sqlUbicacion = "SELECT Municipio_animal FROM animales GROUP BY Municipio_animal";
          $resUbicacion = mysqli_query($conn, $sqlUbicacion);
        ?>


        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon2">Animal</span>
          <select class="form-select" aria-label="Default select example" name="tipo_pet" required>
          <?php
            while ($row = mysqli_fetch_assoc($resAnimales)) {
          ?>
            <option value="<?php echo $row["animal"]; ?>"><?php echo $row["animal"]; ?></option>
            <?php
              }
            ?>
          </select>

          <span class="input-group-text" id="basic-addon2">Edad</span>
          <select class="form-select" aria-label="Default select example" name="edad_pet" required>
            <?php
              while ($row = mysqli_fetch_assoc($resEdad)) {
            ?>
              <option value="<?php echo $row["edad"]; ?>"><?php echo $row["edad"]; ?></option>
              <?php
                }
              ?>
          </select>
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon2">Tamaño</span>
          <select class="form-select" aria-label="Default select example" name="tamaño_pet" required>
            <?php
                while ($row = mysqli_fetch_assoc($resTamaño)) {
              ?>
                <option value="<?php echo $row["tamaño"]; ?>"><?php echo $row["tamaño"]; ?></option>
                <?php
                  }
                ?>
          </select>

          <span class="input-group-text" id="basic-addon2">Ubicacion</span>
          <select class="form-select" aria-label="Default select example" name="ubicacion_pet" required>
            <?php
                while ($row = mysqli_fetch_assoc($resUbicacion)) {
              ?>
                <option value="<?php echo $row["Municipio_animal"]; ?>"><?php echo $row["Municipio_animal"]; ?></option>
                <?php
                  }
                ?>
          </select>
        </div>

        <div class="input-group justify-content-center">
          <button type="submit" name="filtro" class="btn btn-outline-primary">Filtrar</button>
        </div>
    </form>

  <?php
    $resFiltro = null; 
     if (isset($_POST["filtro"])) {
       $tipo_pet = $_POST["tipo_pet"];
       $edad_pet = $_POST["edad_pet"];
       $tamaño_pet = $_POST["tamaño_pet"];
       $ubicacion_pet = $_POST["ubicacion_pet"];

       $sqlFiltro = "SELECT * FROM animales WHERE animal = '$tipo_pet' && edad = '$edad_pet' || animal = '$tipo_pet' && tamaño = '$tamaño_pet' ||animal = '$tipo_pet' &&  Municipio_animal = '$ubicacion_pet'";
       $resFiltro = mysqli_query($conn, $sqlFiltro);
     }
    ?>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Animal</th>
            <th>Raza</th>
            <th>Edad</th>
            <th>Tamaño</th>
            <th>Ubicacio</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
        <?php
          if($resFiltro){
          while($row = mysqli_fetch_assoc($resFiltro)){
            ?>

            <tr>
              <td><?php echo $row["nombre"]; ?></td>
              <td><?php echo $row["animal"]; ?></td>
              <td><?php echo $row["raza"]; ?></td>
              <td><?php echo $row["edad"]; ?></td>
              <td><?php echo $row["tamaño"]; ?></td>
              <td><?php echo $row["Municipio_animal"]; ?></td>
              <td><button class="btn btn-primary">Adoptar</button></td>
            </tr>

            <?php
          }}else{
            ?>
            <tr>
              <td><?php echo " -- "; ?></td>
              <td><?php echo " -- "; ?></td>
              <td><?php echo " -- "; ?></td>
              <td><?php echo " -- "; ?></td>
              <td><?php echo " -- "; ?></td>
              <td><?php echo " -- "; ?></td>
              <td><button class="btn btn-primary">Adoptar</button></td>
            </tr>

            <?php
          }
        ?>
        </tbody>
      </table>

    </div>

  </body>
</html>