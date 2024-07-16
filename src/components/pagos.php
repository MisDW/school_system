<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['payment_btn'])) {
        $_POST['payment_btn'] ? $button_value = $_POST['payment_btn'] : $button_value = "materias";
        $_SESSION['TYPE_BUTTON'] = $button_value;
        echo $_SESSION['TYPE_BUTTON'];
        header("Location: ../views/main.php");
        exit();
    }
} else{
    echo "<script> console.log('El usuario no realiza esta accion {Pagar}') </script>";
}
?>

<form action="main.php" method="post">
<header>
    <h1 class="title">PAGOS PENDIENTES</h1>
</header>
<table class="table">
    <thead>
        <td>Usuario</td>
        <td>Reinscripcion</td>
        <td>Colegiatura</td>
        <td>Fecha de Termino</td>
        <td>Acciones</td>
    </thead>
    <tbody>
        <tr>
            <td>Lalo</td>
            <td>$500</td>
            <td>$4500</td>
            <td>06/08/24</td>
            <td>
                <button class="see__more__btn btn" name="payment_btn" value="pagar">
                    Pagar
                </button>
            </td>
        </tr>
        <tr>
            <td>Lalo</td>
            <td>$500</td>
            <td>$4500</td>
            <td>06/07/24</td>
            <td>
                <button class="success__btn btn" name="payment_btn" value="pagar">
                    Completado
                </button>
            </td>
        </tr>
        <tr>
            <td>Lalo</td>
            <td>$500</td>
            <td>$4500</td>
            <td>06/06/24</td>
            <td>
                 <button class="success__btn btn" name="payment_btn" value="pagar">
                    Completado
                </button>
            </td>
        </tr>
        <tr>
            <td>Lalo</td>
            <td>$500</td>
            <td>$4500</td>
            <td>06/05/24</td>
            <td>
                <button class="success__btn btn" name="payment_btn" value="pagar">
                    Completado
                </button>
            </td>
        </tr>
    </tbody>
</table>
</form>