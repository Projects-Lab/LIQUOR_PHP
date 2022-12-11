<?php
include('conexion.php');

if(isset($_POST["submit"])){
    $proveedor = $_POST['proveedor'];
    $categoria = $_POST['categoria'];
    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["producto"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcion"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["precio"])){

                $producto = $_POST["producto"];
                $descripcion =  $_POST["descripcion"];
                $precio =  $_POST["precio"];

                $sql = $insert_sql = "INSERT INTO productos(nombre_producto, descripcion_producto, precio, categoria_id, id_proveedor) VALUES ('$producto', '$descripcion', '$precio', '$categoria', '$proveedor')";

                $resultado = mysqli_query($conex,$sql);

                if($resultado){

                    echo'<script>
                  
                    alert("DATOS GUARDADOS CORRECTAMENTE");
                    window.location = "productos.php";
                  
                  </script>';
                  
                  }else{
                  
                    echo'<script>
                  
                    alert("¡ups, ha ocurrido un error!");
                    window.location = "productos.php";
                  
                  </script>';
                  
                  }






        }else{
            echo'<script>

            alert("El producto no puede ir vacio ni  llevar caracteres especiales");
            window.location = "productos.php";
        
          </script>';
        }

   
   
   



}


?>