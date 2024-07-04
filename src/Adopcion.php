<?php
  include ("conexion.php");
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

    <div class="container">
    <div class="card my-3">
          <div class="card-header bg-success text-light shadow">Hola <?php echo $_SESSION["usuario"]; ?> ¡Pon en adopcion!</div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p>Ingresa sus datos aqui</p>
            </blockquote>
          </div>
        </div>

      <form class="container shadow p-4 my-3 rounded" method="post" action="funcionFoto.php" enctype="multipart/form-data">

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nombre</span>
            <input type="text" class="form-control" placeholder="Nombre de Mascota" aria-label="Username" aria-describedby="basic-addon1" name="nombre_pet" required>
            <span class="input-group-text" id="basic-addon2">Animal</span>
            <input type="text" class="form-control" placeholder="Tipo de animal" aria-label="Recipient's username" aria-describedby="basic-addon2" name="tipo_pet" required>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Raza</span>
            <input type="text" class="form-control" placeholder="Raza del animal" aria-label="Recipient's username" aria-describedby="basic-addon2" name="raza_pet" required>
            <span class="input-group-text" id="basic-addon2">Edad</span>
            <input type="text" class="form-control" placeholder="Edad del animal" aria-label="Recipient's username" aria-describedby="basic-addon2" name="edad_pet" required>
            <select class="form-select" aria-label="Default select example" name="tamaño_pet" required>
              <option selected>Tamaño</option>
              <option value="Pequeño">Pequeño</option>
              <option value="Mediano">Mediano</option>
              <option value="Grande">Grande</option>
              <option value="Largo">Largo</option>
              <option value="Corto">Corto</option>
            </select>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Municipio</span>
            <input type="text" class="form-control" placeholder="Ubicacion" aria-label="Recipient's username" aria-describedby="basic-addon2" name="municipio_pet" required>
            <span class="input-group-text" id="basic-addon2">Telefono</span>
            <input type="number" class="form-control" placeholder="000-000-000-0" aria-label="Recipient's username" aria-describedby="basic-addon2" name="telefono_pet" required>
          </div>

          <div class="mb-3">
            <input class="form-control" type="file" id="formFile" name="foto" required>
          </div>

          <div class="input-group justify-content-center">
            <button type="submit" name="post" class="btn btn-outline-primary">Publicar</button>
          </div>
    </form>
    </div>

    <div class="container py-5 shadow">
      <div class="row d-flex justify-content-center gap-3">
          
        <?php
            $sql = "SELECT * FROM animales ORDER BY id DESC";
            $result = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_assoc($result)) {
          ?>

        <div class="card col-auto shadow my-3" style="width:200px;">
        <form action="delete.php" method="post">
          <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
          <button name="delete" class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2" style="cursor:pointer;width:35px;height:35px;">X<span class="visually-hidden">unread messages</span></button>
        </form>
        <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-success">Disponible <span class="visually-hidden">unread messages</span></span>
</button>
          <div class="card-body">
            <img src="<?php echo $row["img_animal"] ?>" alt="mascota_img" class="w-100 rounded my-2 shadow" style="height:150px;">
            <h5 class="card-title text-success"><?php echo $row["animal"]; ?></h5>
            <p class="card-text"><b>Nombre: </b><?php echo $row["nombre"]; ?></p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><b> Raza:</b> <?php echo $row["raza"]; ?></li>
            <li class="list-group-item"><b>Edad: </b><?php echo $row["edad"]; ?></li>
            <li class="list-group-item"><b>Tamaño: </b><?php echo $row["tamaño"]; ?></li>
            <li class="list-group-item"><b>Ubicacion: </b><?php echo $row["Municipio_animal"]; ?></li>
            <li class="list-group-item"><b>Telefono: </b><?php echo $row["telefono"]; ?></li>
            <li class="list-group-item d-grid"><button class="btn btn-primary">Ver mas...</button></li>
          </ul>
        </div>
                <?php
              }
            ?>
      </div>
    </div>

  </body>
</html>