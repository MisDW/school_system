<?php
    include("conexion.php");

        $nombre_pet = $_POST["nombre_pet"];
        $tipo_pet = $_POST["tipo_pet"];
        $raza_pet = $_POST["raza_pet"];
        $edad_pet = $_POST["edad_pet"];
        $tamaño_pet = $_POST["tamaño_pet"];
        $municipio_pet = $_POST["municipio_pet"];
        $telefono_pet = $_POST["telefono_pet"];

        $imagen = "";
    if(isset($_FILES["foto"])){
          $file = $_FILES["foto"];
          $nombre = $file["name"];
          $tipo = $file["type"];
          $ruta_provisional = $file["tmp_name"];
          $size = $file["size"];
          $dimensiones = getimagesize($ruta_provisional);
          $width = $dimensiones[0];
          $height = $dimensiones[1];
          $carpeta = "fotos/";

          if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif'){
            echo "Error, el archivo no es una imagen";
          }else if($size > 3*1024*1024){
            echo "Error, el tamaño maximo permitido es un 3mb";
          }else{
            $src = $carpeta.$nombre;
            move_uploaded_file($ruta_provisional, $src);
            $imagen = "fotos/".$nombre;
          }
        
        $sqlPost = "INSERT INTO animales(nombre, animal, raza, edad, tamaño, Municipio_animal, img_animal, telefono) VALUES('$nombre_pet', '$tipo_pet', '$raza_pet', '$edad_pet', '$tamaño_pet', '$municipio_pet', '$imagen', '$telefono_pet')";
        $resultPost = mysqli_query($conn, $sqlPost);

         ?>
            <script>
                window.alert('¡Ya esta Publicado!');
                setTimeout(() => {
                  window.location.href = "Adopcion.php";
                }, 1000);
            </script>
         <?php
      }
    ?>