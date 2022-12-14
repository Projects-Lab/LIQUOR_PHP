<!-- component -->
<?php

include('conexion.php');

//generar la consulta para los datos
$id = $_GET['id'];
$consulta_proveedor = "SELECT * FROM proveedor WHERE id = '$id'";
$update = $conex->query($consulta_proveedor);
$datos = $update->fetch_array();

if(isset($_POST['actualizar'])){
    $id = $_POST['id'];
    $n_proveedor = $conex-> real_escape_string($_POST['modificar_nombre_proveedor']);
    $r_proveedor = $conex -> real_escape_string($_POST['modificar_rut_proveedor']);
    $e_proveedor = $conex -> real_escape_string($_POST['modificar_email_proveedor']);

    //realizar la consulta para modificar los datos
    $actualiza = "UPDATE proveedor SET rut_proveedor = '$r_proveedor', nombre_proveedor = '$n_proveedor', email_proveedor = '$e_proveedor' WHERE id = '$id'";
    $actualizar = $conex->query($actualiza);

    echo'<script>

    alert("DATOS ACTUALIZADOS CORRECTAMENTE");
    window.location = "proveedores.php";

    </script>';

    


}

?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR PROVEEDOR</title>
    <link href="https://unpkg.com/tailwindcss@2.2.4/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />
</head>

<body>
        <?php

use LDAP\Result;

        include "navbar.php";
    ?>

<div class="mt-12 flex flex-wrap justify-around ">

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="rounded flex justify-center items-center flex-col   shadow-md" method="post">
                    <p class="mb-2 text-3xl text-gray-600">Actualizar Proveedor</p>
                    <div class="flex my-2 mx-4 md:mx-2 border-b-2 border-gray-700 hover:border-green-800">
                        <input type="hidden" name="id" value="<?php echo $datos['id'];?>">
                        <input class="text-center w-full py-2 pl-2 md:pl-8 border-0 focus:outline-none" placeholder="Proveedor" type="text" name="modificar_nombre_proveedor" required value="<?php echo $datos['nombre_proveedor'];?>">
                    </div>
                    <div class="flex my-2 mx-4 md:mx-2 border-b-2 border-gray-700 hover:border-green-800">
                        <input class="text-center w-full py-2 pl-2 md:pl-8 border-0 focus:outline-none" placeholder="RUT" type="text" name="modificar_rut_proveedor" required value="<?php echo $datos['rut_proveedor'];?>">
                    </div>
                    <div class="flex my-2 mx-4 md:mx-2 border-b-2 border-gray-700 hover:border-green-800">
                        <input class="text-center w-full py-2 pl-2 md:pl-8 border-0 focus:outline-none" placeholder="Correo" type="email"  name="modificar_email_proveedor" required value="<?php echo $datos['email_proveedor'];?>">
                    </div>
                    <button class="my-3 text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-800 dark:focus:ring-green-900" id="" type="submit" name="actualizar"><span>Actualizar proveedor</span></button>
                </form>
</div>

    <!-- component -->


  
    </div>
    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
</body>

</html>