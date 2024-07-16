<?php
require_once("../functions/Info_Role.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_submit'])) {
        $_POST['btn_submit'] ? $button_value = $_POST['btn_submit'] : $button_value = "materias";
        $_SESSION['TYPE_BUTTON'] = $button_value;

        if($_POST['btn_submit'] == "cerrar__session"){
            echo "<script> console.log('cierre de session') </script>";
            require_once("../functions/close_session.php");
        }
    }
} else{
    echo "<script> console.log('Mensaje si [boton no fue presionado]') </script>";
}
?>

<!-- NAV -->
<form action="main.php" method="post"class="nav__bar flex__row">
    <div class="container__logo flex__row">
        <span class="text__logo"> Sistema Escolar </span>
    </div>

    <ul class="nav__ul flex__row">
        
        <?php 
            if($user_name_role == "Alumno"){
        ?>
        <li><button class="btn__nav" type="submit" name="btn_submit" value="materias">Materias</button></li>
        <li><button class="btn__nav" type="submit" name="btn_submit" value="calificaciones">Calificaciones</button></li>
        <li><button class="btn__nav" type="submit" name="btn_submit" value="pagos">Pagos</button></li>
        <li>
            <button type="button" class="btn__modal__aside btn">Open modal</button>
        </li>
        <?php
            }else if($user_name_role == "Docente"){
            ?>
        <li><button class="btn__nav" type="submit" name="btn_submit" value="graficas">Grafica</button></li>
        <li><button class="btn__nav" type="submit" name="btn_submit" value="carreras">Carreras</button></li>
        <li><button class="btn__nav" type="submit" name="btn_submit" value="materias">Materias</button></li>
        <li><button class="btn__nav" type="submit" name="btn_submit" value="calificaciones">Calificaciones</button></li>
        <li><button class="btn__nav" type="submit" name="btn_submit" value="pagos">Pagos</button></li>
        <li>
            <button type="button" class="btn__modal__aside btn">Open modal</button>
        </li>
            <?php
            }
        ?>
    </ul>

    <div class="user__box flex__row">
        <i class="fa fa-user-circle" aria-hidden="true"></i>
        <span>
            <?php echo $_SESSION['correo']; ?>
        </span>
        <button class="container__dropdown__user" type="submit" name="btn_submit" value="cerrar__session">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span>Cerrar Sesion</span>
        </button>
    </div>  
</form>