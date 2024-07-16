<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../../css/page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <!-- NAV -->
    <?php
        session_start();    
        require_once("../conexion.php");
        require_once("../components/nav.php");
        require_once("../functions/Info_Role.php"); 
    ?>

    <!-- MAIN -->
    <main class="main__page">
        <div class="box__content__division">

            <!-- CONTENEDOR 2 -->
            <!-- ASIDE IZQUIERDO --> 
            <aside class="aside">
                <?php
                require_once("../components/subject_name.php");
                ?>
            </aside>

            <!-- CONTENEDOR 1 -->
            <!-- SECTION DIVISION CONTENT USER -->
            <section class="container__user__content flex__col">

                <section class="section__welcome row flex__row">
                    <article class="article flex__row">
                    <!-- method="post" action="funcionFoto.php" enctype="multipart/form-data" -->
                        <div class="container_image_user">
                            <img src="../../img/perfil_img/foto2.jpg" alt="imagen de usuario" class="image__user">
                        </div>
                        <div class="container__text flex__column">
                            <h1 class="info__text__welcome parr afo"> Bienvenido! <?php echo $_SESSION['nombre'] ?> </h1>
                            <p class="info__text__welcome span"> tus datos como <?php 

                            echo  "'$user_name_role'";

                            ?> ya estan disponibles</p>
                        </div>
                    </article>

                    <article class="article row">
                        <img src="../../img/otros/hello.png" alt="bienvenida" class="image__welcome">
                    </article>
                </section>

                <!-- INFO DEL USUARIO -->
                <section class="container__components flex__col">
                    <?php
                    if ($_SESSION['TYPE_BUTTON'] == "pagos") {
                        // echo $_SESSION["TYPE_BUTTON"];
                        require_once("../components/pagos.php");

                    }else if($_SESSION["TYPE_BUTTON"] == "pagar"){
                        require_once("../components/pagar.php");

                    }else if ($_SESSION['TYPE_BUTTON'] == "materias") {
                        // echo $_SESSION["TYPE_BUTTON"];
                        require_once("../components/tabla_tareas.php");

                    }

                    //    require_once("../components/tabla_tareas.php");
                    //    require_once("../components/tabla_pagos_pendientes.php");
                    //    require_once("../components/pagos.php");
                    ?>
                </section>

            </section>
        </div>
    </main>


    <!-- FOOTER -->
    <?php
    require_once ("../components/footer.php");
    ?>


<script src="../../js/actions.js"></script>
</body>
</html>