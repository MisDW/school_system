<?php
  include("conexion.php");
  session_start();
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

        </div>
    </nav>
    <div class="container">

      <div class="card my-3">
        <div class="card-header bg-success text-light shadow"><?php echo $_SESSION["usuario"]; ?> ¿Buscas refugios para tus mascotas?</div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <p>Pueden encargarse de tus mascotas</p>
            <footer class="blockquote-footer">Utiliza nuestro nuevo FILTRO!</footer>
          </blockquote>
        </div>
      </div>

      <div class="container shadow p-4 my-3 rounded">
          <?php     
            $sqlMunicipio = "SELECT municipio_refugio FROM refugioscercanos GROUP BY municipio_refugio";
            $resMunicipio = mysqli_query($conn, $sqlMunicipio);
          ?>

          <!--Botons Select de Municipios -->
          <form class="input-group mb-3" method="post" action="Refugios.php">
            <span class="input-group-text" id="basic-addon2">Municipios: </span>
            <select class="form-select" aria-label="Default select example" name="municipio_refugio" required>
            <?php
              while ($row = mysqli_fetch_assoc($resMunicipio)) {
            ?>
              <option value="<?php echo $row["municipio_refugio"]; ?>"><?php echo $row["municipio_refugio"]; ?></option>
              <?php
                }
              ?>
            </select>
            <button type="submit" name="mostrar" class="btn btn-outline-primary"> Mostrar</button>
          </form>

          <!-- Boton search  Nombre de refugios-->
          <form method="post" action="Refugios.php" >
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon2">Nombre de refugio</span>
              <input type="text" name="nombre_refugio" placeholder="Refugios" required class="form-control">
              <button type="submit" name="buscar" class="btn btn-outline-primary">Buscar</button>
            </div>
          </form>
          
      </div>
      
      <table class="table table-striped">
          <thead>
            <tr>
              <th>Refugio</th>
              <th>Direccion</th>
              <th>Municipio</th>
              <th>CP</th>
              <th>Telefono</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>

      <?php
      $resBuscar = null; 
      if (isset($_POST["mostrar"])) {
        $municipio_refugio = $_POST["municipio_refugio"];

        $sqlBuscar = "SELECT * FROM refugioscercanos WHERE municipio_refugio = '$municipio_refugio'";
        $resBuscar = mysqli_query($conn, $sqlBuscar);
        while($row = mysqli_fetch_assoc($resBuscar)){
          ?>
            <tr>
                <td><?php echo $row["nombre_refugio"]; ?></td>
                <td><?php echo $row["direccion_refugio"]; ?></td>
                <td><?php echo $row["municipio_refugio"]; ?></td>
                <td><?php echo $row["codigo_postal"]; ?></td>
                <td><?php echo $row["telefono"]; ?></td>
                <td><button class="btn btn-primary">Ver mas</button></td>
              </tr>
          <?php
      }}
      
      // Buscar con el nombre de algun refugio   consulta $resNombreRef
      $resNombreRef = null;
      if(isset($_POST["buscar"])) {
        $nombre_refugio = $_POST["nombre_refugio"];

        $sqlNombreRef= "SELECT * FROM refugioscercanos WHERE nombre_refugio = '$nombre_refugio'";
        $resNombreRef = mysqli_query($conn, $sqlNombreRef);
    
        while($row = mysqli_fetch_assoc($resNombreRef)){
              ?>

              <tr>
                <td><?php echo $row["nombre_refugio"]; ?></td>
                <td><?php echo $row["direccion_refugio"]; ?></td>
                <td><?php echo $row["municipio_refugio"]; ?></td>
                <td><?php echo $row["codigo_postal"]; ?></td>
                <td><?php echo $row["telefono"]; ?></td>
                <td><button class="btn btn-primary">Ver mas</button></td>
              </tr>

              <?php
            }}
          ?>
          </tbody>
        </table>
    </div>

  </body>
</html>