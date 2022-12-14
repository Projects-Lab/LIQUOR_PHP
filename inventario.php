<?php 
    session_start(); 
    if(!isset($_SESSION['usuario'])){
        header('Location: index.php');
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


    <section class="text-gray-600 body-font">
        <div class="container px-5 py-5 mx-auto">
            <div class="flex flex-wrap justify-center -m-4">
                <!--start here-->
                <div class="p-4 md:w-1/3">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                        <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://firebasestorage.googleapis.com/v0/b/thecaffeinecode.appspot.com/o/blog.jpg?alt=media&token=271cb624-94d4-468d-a14d-455377ba75c2" alt="blog cover" />
                        <div class="p-4">
                            <div class="flex items-center flex-wrap ">
                                <a href="categorias.php" class="text-green-800  md:mb-2 lg:mb-0">
                                    <p class="inline-flex items-center">Categorías
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="flex-col-reverse text-4xl ">
                        <div>
                            <a href="javascript: history.go(-1)">
                                <ion-icon name="arrow-undo-circle-outline"></ion-icon>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="p-4 md:w-1/3">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                        <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://firebasestorage.googleapis.com/v0/b/thecaffeinecode.appspot.com/o/blog.jpg?alt=media&token=271cb624-94d4-468d-a14d-455377ba75c2" alt="blog cover" />
                        <div class="p-4">
                            <div class="flex items-center flex-wrap ">
                                <a href="proveedores.php" class="text-green-800  md:mb-2 lg:mb-0">
                                    <p class="inline-flex items-center">Proveedores
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-4 md:w-1/3">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                        <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://firebasestorage.googleapis.com/v0/b/thecaffeinecode.appspot.com/o/blog.jpg?alt=media&token=271cb624-94d4-468d-a14d-455377ba75c2" alt="blog cover" />
                        <div class="p-4">
                            <div class="flex items-center text-center flex-wrap ">
                                <a href="productos.php" class="text-green-800  md:mb-2 lg:mb-0">
                                    <p class="inline-flex items-center">Productos
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end text-4xl ">
                        <div class="text-4xl flex space-x-4">
                        <a href="login.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><ion-icon name="exit-outline"></ion-icon></a>
                            
                        </div>
                    </div>
                </div>
                <!--End here-->
            </div>
        </div>
    </section>
    <?php
    include "scripts.php";
    ?>
</body>

</html>