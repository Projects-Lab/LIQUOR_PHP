<?php
include('conexion.php');

if(isset($_POST['submit'])){
    if(preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_cliente"])
     && preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["apellido_cliente"]) 
     && preg_match('/^[()\-0-9 ]+$/',$_POST["telefono_cliente"]) ){
        $nombre_cliente = $_POST['nombre_cliente'];
        $apellido_cliente = $_POST['apellido_cliente'];
        $telefono_cliente = $_POST['telefono_cliente'];

        
        $insert_sql = "INSERT INTO clientes(nombre_cliente, apellido_cliente, telefono_cliente) VALUES ('$nombre_cliente', '$apellido_cliente', '$telefono_cliente')";
        $resultado = mysqli_query($conex,$insert_sql);

        if($resultado){
            echo'<script>

                alert("DATOS GUARDADOS CORRECTAMENTE");
                window.location = "clientes.php";

            </script>';
        }




    }else{
        echo'<script>

        alert("LOS DATOS NO PUEDEN IR VACIOS NI LLEVAR CARACTERES ESPECIALES");
        window.location = "clientes.php";
      
      </script>';
    }

}



?>