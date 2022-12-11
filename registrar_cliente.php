<?php
include('conexion.php');

print_r($_POST);

if(isset($_POST["submit"])){
    if(preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"])){
        $nombre_cliente = $_POST["nombre"];


    } else{
        echo'<script>

        alert("El nombre del Cliente no puede llevar números ni caracteres especiales");

      </script>';
    }

    if(preg_match('/^[0-9]+$/', $_POST["apellido"])){
        $apellido_cliente = $_POST["apellido"];

    }else{
        echo'<script>

        alert("El apellido_cliente no puede llevar letras ni caracteres especiales");

      </script>';
    }
   
    if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["telefono"])){

        $telefono_cliente = $_POST["telefono"];


    }else{
        echo'<script>

        alert("El telefono_cliente no puede llevar caracteres especiales");

      </script>';
    }


    $insert_sql = "INSERT INTO clientes(nombre, apellido, telefono) VALUES ('$nombre_cliente','$apellido_cliente','$telefono_cliente')";
    $resultado = mysqli_query($conex,$insert_sql);

    if($resultado){

        echo'<script>

        alert("DATOS GUARDADOS CORRECTAMENTE");
        window.location = "clientes.php";

      </script>';

    }else{

        echo'<script>

        alert("¡ups, ha ocurrido un error!");

      </script>';

    }
}
?>