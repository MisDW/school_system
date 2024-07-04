<?php
include("conexion.php");

if(isset($_POST["delete"])){
    $id = $_POST["id"];
    
    $sql = "DELETE FROM animales WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    ?>
        <script>
            alert('Publicacion eliminada...')
            setTimeout(() => {
                location.href = "Adopcion.php"
            }, 500);
        </script>
    <?php
}
?>