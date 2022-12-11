<!-- component -->
<?php

include('conexion.php');

//generar la consulta para los datos
$id = $_GET['id'];
$consulta_cliente = "SELECT * FROM clientes WHERE id = '$id'";
$update = $conex->query($consulta_cliente);
$datos = $update->fetch_array();

if(isset($_POST['actualizar'])){
    $id = $_POST['id'];
    $n_ciente = $conex-> real_escape_string($_POST['editar_nombre_cliente']);
    $a_cliente= $conex-> real_escape_string($_POST['editar_apellido_cliente']);
    $num_cliente = $conex-> real_escape_string($_POST['editar_telefono_cliente']);
    

    //realizar la consulta para modificar los datos
    $actualiza = "UPDATE clientes SET nombre_cliente = '$n_ciente', apellido_cliente = '$a_cliente', telefono_cliente = '$num_cliente' WHERE id = '$id'";
    $actualizar = $conex->query($actualiza);

    echo'<script>

    alert("DATOS ACTUALIZADOS CORRECTAMENTE");
    window.location = "clientes.php";

    </script>';

    


}


?>



<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@2.2.4/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />
</head>

<body>

    <!-- component -->

    <?php
    include "navbar.php";
    ?>
    <div class="mt-12 flex flex-wrap justify-around ">
    <div class="flex-col-reverse text-4xl ">
            <div>
                <a href="javascript: history.go(-1)">
                    <ion-icon name="arrow-undo-circle-outline"></ion-icon>
                </a>
            </div>
        </div>

        <form ction="<?php echo $_SERVER['PHP_SELF'];?>" class="w-80 rounded flex justify-center items-center flex-col shadow-md" method="post">
            <p class="mb-2 text-3xl text-gray-600">Actualizar Cliente</p>
            <div class="flex my-2 mx-4 md:mx-2 border-b-2 border-gray-700 hover:border-green-800">
                <input type="hidden" name="id" value="<?php echo $datos['id'];?>">
                <input class="text-center w-full py-2 pl-2 md:pl-8 border-0 focus:outline-none" placeholder="Nombre" type="text" name="editar_nombre_cliente" required value="<?php echo $datos['nombre_cliente'];?>">
            </div>
            <div class="flex my-2 mx-4 md:mx-2 border-b-2 border-gray-700 hover:border-green-800">
                 <input class="text-center w-full py-2 pl-2 md:pl-8 border-0 focus:outline-none" placeholder="Apellido" type="text" name="editar_apellido_cliente" required value="<?php echo $datos['apellido_cliente'];?>">
            </div>
            <div class="flex my-2 mx-4 md:mx-2 border-b-2 border-gray-700 hover:border-green-800">
                <input class="text-center w-full py-2 pl-2 md:pl-8 border-0 focus:outline-none" placeholder="Telefono" type="text" name="editar_telefono_cliente" required value="<?php echo $datos['telefono_cliente'];?>">
            </div>
            <button class="my-3 text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-800 dark:focus:ring-green-900" type="submit" name="actualizar"><span>Actualizar</span></button>
        </form>

        <div class="text-4xl flex space-x-4">
            <ion-icon name="exit-outline"></ion-icon>
        </div>

    </div>

    <?php
    include "scripts.php";
    ?>
</body>

</html>