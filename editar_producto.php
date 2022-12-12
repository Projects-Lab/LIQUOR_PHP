<?php

include('conexion.php');

//generar la consulta para los datos
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $consulta_productos= "SELECT 
            p.id as id_producto, 
            pr.nombre_proveedor as nombre_proveedor,
            pr.id as id_proveedor,
            c.nombre_categoria as nombre_categoria,
            c.id as codigo_categoria,
            p.nombre_producto as nombre_producto, 
            p.descripcion_producto as descripcion_producto, 
            p.precio as precio 
            FROM productos p 
            INNER JOIN categoria c ON p.categoria_id = c.id 
            INNER JOIN proveedor pr ON p.id_proveedor = pr.id 
            WHERE p.id = {$id}";
    $update = $conex->query($consulta_productos);
    $datos = $update->fetch_array();
}

if(isset($_POST['actualizar'])){
    $id = $_POST['id_producto'];
    $proveedor = $conex->real_escape_string($_POST['editar_proveedor']);
    $categoria = $conex->real_escape_string($_POST['editar_categoria']);
    $producto = $conex->real_escape_string($_POST['editar_producto']);
    $descripcion = $conex->real_escape_string($_POST['editar_descripcion']);
    $precio = $conex->real_escape_string($_POST['editar_precio']);

    $update = "UPDATE productos SET nombre_producto='$producto', descripcion_producto='$descripcion', 
    precio='$precio', categoria_id=$categoria, id_proveedor=$proveedor WHERE id = $id";
   
    $actualizar = $conex->query($update);
    echo'<script>
            alert("DATOS ACTUALIZADOS CORRECTAMENTE");
            window.location = "productos.php";
        </script>';
}

?>


<!-- component -->
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link href="https://unpkg.com/tailwindcss@2.2.4/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />
</head>

<body>

    <!-- component -->

    <?php
    include "navbar.php";
    ?>
    <div class="mt-12 flex flex-wrap justify-around ">

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"
            class=" rounded flex justify-center items-center flex-col shadow-md">
            <p class="mb-2 text-3xl text-gray-600">Editar Productos</p>
            <input type="text" name="id_producto" value="<?php echo $datos['id_producto']?>">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Proveedor</label>
            <select name="editar_proveedor" id="countries"
                class=" mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <option selected>Escoge un Proveedor</option>

                <?php
                    // include('conexion.php');
                    $consult = "SELECT * FROM proveedor";
                    $result = $conex->query($consult);
                ?>

                <?php while($row = $result->fetch_assoc()){ ?>

                <option <?php if($row['id'] == $datos['id_proveedor']) echo 'selected'?> value="<?php echo $row['id']?>"><?php echo $row['nombre_proveedor']?></option>


                <?php }?>




            </select>

            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
            <select name="editar_categoria" id="countries"
                class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <option selected>Escoge una Categoria</option>

                <?php
                                include('conexion.php');
                                $consult = "SELECT * FROM categoria";
                                $result = $conex->query($consult);
                             ?>

                <?php while($row = $result->fetch_assoc()){ ?>

                <option <?php if($row['id'] == $datos['codigo_categoria']) echo 'selected'?> value="<?php echo $row['id']?>"><?php echo $row['nombre_categoria']?></option>


                <?php }?>


            </select>


            <div class="flex my-2 mx-4 md:mx-2 border-b-2 border-gray-700 hover:border-green-800">
                <input class="text-center w-full py-2 pl-2 md:pl-8 border-0 focus:outline-none" placeholder="Producto"
                    type="text" required name="editar_producto" value="<?php echo $datos['nombre_producto']?>">
            </div>

            <div class="flex my-2 mx-4 md:mx-2 border-b-2 border-gray-700 hover:border-green-800">
                <input class="text-center w-full py-2 pl-2 md:pl-8 border-0 focus:outline-none"
                    placeholder="Descripcion" type="text" required name="editar_descripcion"
                    value="<?php echo $datos['descripcion_producto']?>">
            </div>

            <div class="flex my-2 mx-4 md:mx-2 border-b-2 border-gray-700 hover:border-green-800">
                <input class="text-center w-full py-2 pl-2 md:pl-8 border-0 focus:outline-none" placeholder="Precio"
                    type="number" required name="editar_precio" value="<?php echo $datos['precio']?>">
            </div>


            <button
                class="my-3 text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-800 dark:focus:ring-green-900"
                id="login" type="submit" name="actualizar"><span>Actualizar producto</span></button>
        </form>


        <div>

        </div>
        </section>
    </div>
    </div>
    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
</body>

</html>