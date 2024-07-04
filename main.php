<?php
include_once ("src/conexion.php");
session_start();
// <!-- GRAFIC CONTAINER CHART JS -->
$sql_count_students = "SELECT COUNT(*) AS total_students FROM users WHERE tipo_usuario = (SELECT id FROM role WHERE tipo_usuario = 'Alumno')";
$sql_count_teachers = "SELECT COUNT(*) AS total_teachers FROM users WHERE tipo_usuario = (SELECT id FROM role WHERE tipo_usuario = 'Docente')";
// $id_usuario = $_SESSION['id'];
// $sql_user = "SELECT nombre, correo, id FROM users WHERE id = $id_usuario";

// $res = mysqli_query($conn, $sql_user);
// if ($row = $res -> fetch_assoc()) {
//   echo $row["correo"];
// }

$res_student = mysqli_query($conn, $sql_count_students);
$res_teacher = mysqli_query($conn, $sql_count_teachers);

if ($res_student && $res_teacher) {
  $count_s = mysqli_fetch_assoc($res_student)['total_students'];
  $count_t = mysqli_fetch_assoc($res_teacher)['total_teachers'];
  ?>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Pasar los valores obtenidos a la función GraficPie
      GraficPie(<?php echo $count_t; ?>, <?php echo $count_s; ?>);
    });
  </script>
  <?php
} else {
  echo "Error en la consulta: " . mysqli_error($conn);
}
?>

<!doctype html>
<html lang="sp">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro Alumnos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

<div id="spinner-loading"
  class="bg-black position-fixed vw-100 vh-100 top-0 d-flex justify-content-center align-items-center m-0 p-0 z-1">
  <div class="spinner-border text-light" style="width: 3rem; height: 3rem;" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>


  <!-- Contenedor de pagina  -->
  <div class="row p-0 m-0 d-flex vh-100">
    <!-- Menu vertical -->
     <!-- COLUMNA 1  -->
    <ul class="col-2 nav d-flex flex-column bg-purple p-3 m-0 text-white d-none d-sm-block">
      
      <li class="nav-item"> 
        <h1 class="m-2 text-white"><span class="ps-3 d-none d-md-block">Dashboard</span></h1>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white my-4 d-flex align-items-center" aria-current="page" href="#">
          <i class="fa fa-bar-chart" aria-hidden="true"></i>
          <span class="ps-3 d-none d-md-block">Grafica</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white my-4 d-flex align-items-center" aria-current="page" href="#">
          <i class="fa fa-graduation-cap" aria-hidden="true"></i>
          <span class="ps-3 d-none d-md-block">Carreras</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white my-4 d-flex align-items-center" aria-current="page" href="#">
          <i class="fa fa-book" aria-hidden="true"></i>
          <span class="ps-3 d-none d-md-block">Materias</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white my-4 d-flex align-items-center" aria-current="page" href="#">
          <i class="fa fa-calendar-check" aria-hidden="true"></i>
          <span class="ps-3 d-none d-md-block">Calificaciones</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white my-4 d-flex align-items-center" aria-current="page" href="#">
          <i class="fa fa-credit-card" aria-hidden="true"></i>
          <span class="ps-3 d-none d-md-block">Pagos</span>
        </a>
      </li>
    </ul>

    <!-- Contenedor VIEW -->
     <!-- COLUMNA 2 -->
    <div class="col-12 col-sm-10 col-md-10 bg-danger bg-white p-0 m-0">

      <!-- NUEVOOOOOOOOOOOOOOOOO -->
      <nav class="navbar navbar-dark bg-purple sticky-top d-block d-sm-none">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>
      
      
            <div class="container-sm flex-sm-row flex-column">
                <div class="row flex-sm-row flex-column">
                  <div class="col-8 p-3">
                      <div class="bg-purple rounded d-flex p-3 w-100 h-100">
                        <div>
                          <h1>Hola! " <?php echo $_SESSION["nombre"];  ?> "</h1>  
                          <p>¡Queremos darte la Bienvenida! <strong>" <?php echo $_SESSION["nombre"];  ?> "</strong> a tu dashboard de administracion escolar</p>
                        </div>
                        <img class="img_hello" src="img/otros/hello.png" alt="">
                      </div>
                  </div>
                  <div class="col-3">
                    <div class="p-3 w-100 h-100">
                      <canvas id="myChart" class="container"></canvas>
                    </div>
                  </div>
                </div>    
                <div class="row flex-sm-row flex-column">
                  <div class="col">col 4</div>
                  <div class="col">col 5</div>
                  <div class="col">col 6</div>
                </div>
            </div>
          
          </div>
        </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
  <script src="js/chartJS.js"></script>
      <script src="js/spinner.js"></script>

      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>