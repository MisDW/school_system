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
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
  <!--Encabezado-->
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand text-light fs-5" href="../main.php">
        <img src="../img/logoOnly.png" alt="Logo" width="100px" height="100px" class="d-inline-block align-text-top">
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

  <main>

<!-- Modal -->
<div class="modal fade" id="modal_alert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 
    <div class="container">

      <div class="card my-3">
        <div class="card-header bg-success text-light shadow"><?php echo $_SESSION["usuario"]; ?> Comprar algo nunca fue tan facil</div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <p>Compra alimentos o articulos</p>
            <footer class="blockquote-footer">relacionados para tu mascota</footer>
          </blockquote>
        </div>
      </div>

    </div>

    <!-- Icono flotante de carrito -->
    <button class="btn btn-primary position-fixed start-50 bottom-0 m-3 z-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
      <span class="material-symbols-outlined">shopping_cart</span> <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary" id="cant_products">0<span class="visually-hidden">unread messages</span></span>
    </button>

    <!-- barra lateral de productos -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title text-center" id="offcanvasRightLabel">Productos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body carrito_card">
        <ol class="list-group list-group-numbered lista_carrito">
        </ol>
        <div class="total container text-center fs-4 my-3">0.0</div>
        <button class="btn btn-success w-100" id="btn_comprar">Comprar</button>
      </div>
    </div>

<!-- Contenedor de productos de mascotas -->
    <div class="album py-5 bg-body-tertiary">
      <div class="container">
<!-- Lista de productos en la tienda -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
        <!-- Producto 1 -->
        <!-- Puedes copiar desde la clase "col" hasta 👇 -->
          <div class="col">
            <div class="card shadow-sm">
              <img src="../img/Productos/Alimento 1.webp" height="250px" width="auto">
              <div class="card-body">
                <h5 class="card-title producto_name">Alimento 1</h5>
                <p class="cart-text producto_precio">$ 600</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="container d-grid gap-2">
                    <button class="btn btn-primary" id="detalles">Detalles</button>
                    <button class="btn btn-outline-secondary" id="producto">Agregar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- hasta aqui abajo ☝ -->
        <!-- Producto 2 -->
          <div class="col">
            <div class="card shadow-sm">
              <img src="../img/Productos/Alimento 2.webp" height="250px" width="auto">
              <div class="card-body">
                <h5 class="card-title producto_name">Alimento 2</h5>
                <p class="cart-text producto_precio">$ 650</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="container d-grid gap-2">
                    <button class="btn btn-primary" id="detalles">Detalles</button>
                    <button class="btn btn-outline-secondary" id="producto">Agregar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- Producto 3 -->
          <div class="col">
            <div class="card shadow-sm">
              <img src="../img/Productos/Alimento 3.jpg" height="250px" width="auto">
              <div class="card-body">
                <h5 class="card-title producto_name">Alimento 3</h5>
                <p class="cart-text producto_precio">$ 750</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="container d-grid gap-2">
                    <button class="btn btn-primary" id="detalles">Detalles</button>
                    <button class="btn btn-outline-secondary" id="producto">Agregar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- Producto 4 -->
          <div class="col">
            <div class="card shadow-sm">
              <img src="../img/Productos/alimento 4.png" height="250px" width="auto">
              <div class="card-body">
                <h5 class="card-title producto_name">Alimento 4</h5>
                <p class="cart-text producto_precio">$ 20</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="container d-grid gap-2">
                    <button class="btn btn-primary" id="detalles">Detalles</button>
                    <button class="btn btn-outline-secondary" id="producto">Agregar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- Producto 5 -->
          <div class="col">
            <div class="card shadow-sm">
              <img src="../img/Productos/collar 1.png" height="250px" width="auto">
              <div class="card-body">
                <h5 class="card-title producto_name">Collar 1</h5>
                <p class="cart-text producto_precio">$ 225</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="container d-grid gap-2">
                    <button class="btn btn-primary" id="detalles">Detalles</button>
                    <button class="btn btn-outline-secondary" id="producto">Agregar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- Producto 6 -->
          <div class="col">
            <div class="card shadow-sm">
              <img src="../img/Productos/collar 2.png" height="250px" width="auto">
              <div class="card-body">
                <h5 class="card-title producto_name">Collar 2</h5>
                <p class="cart-text producto_precio">$ 200</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="container d-grid gap-2">
                    <button class="btn btn-primary" id="detalles">Detalles</button>
                    <button class="btn btn-outline-secondary" id="producto">Agregar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- Producto 7 -->
          <div class="col">
            <div class="card shadow-sm">
              <img src="../img/Productos/collar 3.png" height="250px" width="auto">
              <div class="card-body">
                <h5 class="card-title producto_name">Collar 3</h5>
                <p class="cart-text producto_precio">$ 250</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="container d-grid gap-2">
                    <button class="btn btn-primary" id="detalles">Detalles</button>
                    <button class="btn btn-outline-secondary" id="producto">Agregar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- Producto 8 -->
          <div class="col">
            <div class="card shadow-sm">
              <img src="../img/Productos/juguete 1.png" height="250px" width="auto">
              <div class="card-body">
                <h5 class="card-title producto_name">Juguete 1</h5>
                <p class="cart-text producto_precio">$ 100</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="container d-grid gap-2">
                    <button class="btn btn-primary" id="detalles">Detalles</button>
                    <button class="btn btn-outline-secondary" id="producto">Agregar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- Producto 9 -->
          <div class="col">
            <div class="card shadow-sm">
              <img src="../img/Productos/juguete 2.png" height="250px" width="auto">
              <div class="card-body">
                <h5 class="card-title producto_name">Juguete 2</h5>
                <p class="cart-text producto_precio">$ 50</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="container d-grid gap-2">
                    <button class="btn btn-primary" id="detalles">Detalles</button>
                    <button class="btn btn-outline-secondary" id="producto">Agregar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- Producto 10 -->
          <div class="col">
            <div class="card shadow-sm">
              <img src="../img/Productos/juguete 3.png" height="250px" width="auto">
              <div class="card-body">
                <h5 class="card-title producto_name">Juguete 3</h5>
                <p class="cart-text producto_precio">$ 75</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="container d-grid gap-2">
                    <button class="btn btn-primary" id="detalles">Detalles</button>
                    <button class="btn btn-outline-secondary" id="producto">Agregar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

  </main>

  <script src="carrito.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>