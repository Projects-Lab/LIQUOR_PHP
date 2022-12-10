<!-- component -->
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
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

        <form action="registrar_producto.php" method="post" class=" rounded flex justify-center items-center flex-col shadow-md">
            <p class="mb-2 text-3xl text-gray-600">Crear Productos</p>

            <select name="proveedor" id="countries" class=" mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Escoge un Proveedor</option>

                            <?php
                                include('conexion.php');
                                $consult = "SELECT * FROM proveedor";
                                $result = $conex->query($consult);
                             ?>    

                        <?php while($row = $result->fetch_assoc()){ ?>

                            <option value="<?php echo $row['id']?>"><?php echo $row['nombre_proveedor']?></option>


                        <?php }?>
                
            </select>

            <select name="categoria" id="countries" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected >Escoge una Categoria</option>

                    <?php
                                include('conexion.php');
                                $consult = "SELECT * FROM categoria";
                                $result = $conex->query($consult);
                             ?>    

                        <?php while($row = $result->fetch_assoc()){ ?>

                            <option value="<?php echo $row['id']?>"><?php echo $row['nombre_categoria']?></option>


                        <?php }?>
                
            </select>
            <div class="flex my-2 mx-4 md:mx-2 border-b-2 border-gray-700 hover:border-green-800">
                <input class="text-center w-full py-2 pl-2 md:pl-8 border-0 focus:outline-none" placeholder="Producto" type="text" required name="producto">
            </div>
            <div class="flex my-2 mx-4 md:mx-2 border-b-2 border-gray-700 hover:border-green-800">
                <input class="text-center w-full py-2 pl-2 md:pl-8 border-0 focus:outline-none" placeholder="Descripcion" type="text" required name="descripcion">
            </div>
           
            <div class="flex my-2 mx-4 md:mx-2 border-b-2 border-gray-700 hover:border-green-800">
                <input class="text-center w-full py-2 pl-2 md:pl-8 border-0 focus:outline-none" placeholder="Precio" type="number" required name="precio">
            </div>
            <button class="my-3 text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-800 dark:focus:ring-green-900" id="login" type="submit" name="submit"><span>Crear</span></button>

        </form>


        <div>
            <!-- component -->
            <!-- Table -->
            <div class="w-full max-w-3xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                    <h2 class="text-center text-2xl font-semibold text-gray-800">Listado de Productos</h2>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Proveedor</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Categoria</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Nombre</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Descripcion</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Precio</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Acciones</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                            <?php
                                include('conexion.php');
                                $consult = "SELECT * FROM productos p INNER JOIN categoria c ON p.categoria_id =c.id INNER JOIN proveedor pr ON 
                                p.id_proveedor=pr.id";
                            
                                $result = $conex->query($consult);
                             ?>  

                            <?php while($row = $result->fetch_assoc()){ ?>

                                <tr>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="font-medium text-gray-800">  <?php echo $row['nombre_proveedor']; ?> </div>
                                        </div>
                                    </td>

                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="font-medium text-gray-800">  <?php echo $row['nombre_categoria']; ?> </div>
                                        </div>
                                    </td>

                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="font-medium text-gray-800">  <?php echo $row['nombre_producto']; ?> </div>
                                        </div>
                                    </td>

                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="font-medium text-gray-800">  <?php echo  $row['descripcion_producto']; ?> </div>
                                        </div>
                                    </td>

                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left font-medium text-green-500"> <?php echo '$'. $row['precio']; ?> </div>
                                    </td>

                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-lg text-center">
                                            <a href="editar_producto.php?id=<?php echo $row['id'];?>" class="bg-blue-500 p-1 text-white hover:shadow-lg text-xs font-thin">Editar</a>
                                            <a href="eliminar_producto.php?id=<?php echo $row['id'];?>" class="bg-red-500 p-1 text-white hover:shadow-lg text-xs font-thin">Borrar</a>
                                        </div>
                                    </td>


                                </tr>



                                <?php }?>
                              
                                
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