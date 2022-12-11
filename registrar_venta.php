<?php
include('conexion.php');

if(isset($_POST["facturar"])){
    $cliente = $_POST['cliente'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $descripcion = $_POST['descripcion'];

    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["cliente"]) &&
    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["producto"]) &&	
    preg_match('/^[0-9.]+$/', $_POST["cantidad"]) && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcion"])){
        
        $sql = $insert_sql = "INSERT INTO ventas(cantidad, descripcion, id_cliente, id_producto) VALUES ('$cantidad', '$descripcion', '$cliente', '$producto')";

        $resultado = mysqli_query($conex,$sql);
        if($resultado){

            echo'<script>
                  
            alert("DATOS GUARDADOS CORRECTAMENTE");
            window.location = "facturacion.php";
          
          </script>';

        }else{

            echo'<script>
                  
            alert("¡ups, ha ocurrido un error!");
            window.location = "facturacion.php";
          
          </script>';

        }


    }

    
   

   
    
    
}

?>