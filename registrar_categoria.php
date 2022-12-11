<?php
include('conexion.php');

if (isset($_POST["submit"])) {
  if (preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_categoria"])) {
    $nombre_categoria = $_POST["nombre_categoria"];


    $insert_sql = "INSERT INTO categoria(nombre_categoria) VALUES ('$nombre_categoria')";
    $resultado = mysqli_query($conex, $insert_sql);

    if ($resultado) {

      echo '<script>

                alert("DATOS GUARDADOS CORRECTAMENTE");
                window.location = "categorias.php";

              </script>';
    } else {

      echo '<script>

              alert("¡ups, ha ocurrido un error!");

            </script>';
    }
  } else {
    echo '<script>

    alert("El nombre de la categoria no puede llevar caracteres especiales");
    window.location = "categorias.php";

  </script>';
  }
}
