<?php
include('conexion.php');

if(isset($_POST["submit"])){
    if(preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_proveedor"])){
        $nombre_proveedor = $_POST["nombre_proveedor"];


    } else{
        echo'<script>

        alert("El nombre del proveedor no puede llevar números ni caracteres especiales");

      </script>';
    }

    if(preg_match('/^[0-9]+$/', $_POST["rut_proveedor"])){
        $rut_proveedor = $_POST["rut_proveedor"];

    }else{
        echo'<script>

        alert("El rut del proveedor no puede llevar letras ni caracteres especiales");

      </script>';
    }
   
    if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email_proveedor"])){

        $email_proveedor = $_POST["email_proveedor"];


    }else{
        echo'<script>

        alert("El email del proveedor no puede llevar caracteres especiales");

      </script>';
    }


    $insert_sql = "INSERT INTO proveedor(rut_proveedor, nombre_proveedor, email_proveedor) VALUES ('$rut_proveedor','$nombre_proveedor','$email_proveedor')";
    $resultado = mysqli_query($conex,$insert_sql);

    if($resultado){

        echo'<script>

        alert("DATOS GUARDADOS CORRECTAMENTE");
        window.location = "proveedores.php";

      </script>';

    }else{

        echo'<script>

        alert("¡ups, ha ocurrido un error!");

      </script>';

    }
    

}






?>