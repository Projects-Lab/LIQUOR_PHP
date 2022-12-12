<?php 
    session_start(); 
    if(!isset($_SESSION['usuario'])){
        header('Location: index.php');
    }
?>
<!-- component -->
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
    <script src="https://kit.fontawesome.com/8a4af9b6ef.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- component -->

    <?php
    include "navbar.php";
    include "conexion.php";
    ?>

    <div class="mt-12 flex flex-wrap justify-around ">
        <div class="flex-col-reverse text-4xl ">
            <div>
                <ion-icon name="help-circle-outline">
            </div>
            <div>
                <a href="javascript: history.go(-1)">
                    <ion-icon name="arrow-undo-circle-outline"></ion-icon>
                </a>
            </div>
        </div>
        <form action="registrar_venta.php" method="post" class=" w-80 rounded flex justify-center items-center flex-col shadow-md">
            <p class="my-4 text-2xl text-gray-600 font-bold ">Registrar Venta</p>

            <select id="countries" class=" mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="cliente">
                <option selected>Escoge un Cliente</option>
                <?php
                                include('conexion.php');
                                $consult = "SELECT * FROM clientes";
                                $result = $conex->query($consult);
                             ?>    

                        <?php while($row = $result->fetch_assoc()){ ?>

                            <option value="<?php echo $row['id']?>"><?php echo $row['nombre_cliente']?></option>


                        <?php }?>
               
            </select>

            <select id="countries" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="producto">
                <option selected>Escoge una Producto</option>
                <?php
                                include('conexion.php');
                                $consult = "SELECT * FROM productos";
                                $result = $conex->query($consult);
                             ?>    

                        <?php while($row = $result->fetch_assoc()){ ?>

                            <option value="<?php echo $row['id']?>"><?php echo $row['nombre_producto']?></option>


                        <?php }?>
               
            </select>
            <div class="flex my-2 mx-4 md:mx-2 border-b-2 border-gray-700 hover:border-green-800">
                <input class="text-center w-full py-2 pl-2 md:pl-8 border-0 focus:outline-none" placeholder="Cantidad" type="number" required name="cantidad">
            </div>
            <div class="flex my-2 mx-4 md:mx-2 border-b-2 border-gray-700 hover:border-green-800">
                <input class="text-center w-full py-2 pl-2 md:pl-8 border-0 focus:outline-none" placeholder="Descripcion" type="text" required name="descripcion">
            </div>
            <button class=" my-4 text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-800 dark:focus:ring-green-900" id="login" type="submit" name="facturar"><span>Registrar Venta</span></button>
        </form>



        <div>
            <div class="w-full max-w-3xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                    <p class="my-4 text-2xl text-gray-600 text-center font-bold">Registrar Ventas</p>

                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead class="text-md font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Cliente</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Producto</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Cantidad</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Descripcion</div>
                                    </th>
                                    <!-- Precio = Cantidad * Precio Unitario ----OPCIONAL No Obligatorio  -->
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Acciones</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                            <?php
                                include('conexion.php');
                                $consult = "SELECT
                                                v.id as id_venta,
                                                c.nombre_cliente as nombre_cliente,
                                                pr.nombre_producto as nombre_producto,
                                                v.cantidad as cantidad,
                                                v.descripcion as descripcion
                                            FROM ventas v
                                            INNER JOIN clientes c ON v.id_cliente = c.id
                                            INNER JOIN productos pr ON v.id_producto = pr.id;";
                                $result = $conex->query($consult);
                                ?>

                                <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="font-medium text-gray-800"><?php echo $row['nombre_cliente']; ?></div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="font-medium text-gray-800"><?php echo $row['nombre_producto']; ?></div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="font-medium text-gray-800"><?php echo $row['cantidad']; ?></div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left"><?php echo $row['descripcion']; ?></div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-lg text-center">
                                           
                                            <a href="eliminar_venta.php?id=<?php echo $row['id_venta'];?>" class="bg-red-500 px-1 text-white">
                                                <ion-icon name="trash-outline"></ion-icon>
                                            </a>
                                        </div>
                                    </td>
                                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-4xl flex space-x-4">
            <ion-icon name="exit-outline"></ion-icon>
        </div>
    </div>

    <?php
    include "scripts.php";
    ?>
</body>

</html>