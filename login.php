<?php
session_start();
error_reporting(0);
require('conexion.php');

if(isset($_POST['ingresar'])){
$recuperar_usuario = $conex->real_escape_string($_POST['usuario']);
$recuperar_pass = $conex->real_escape_string($_POST['pass']);

//GENERAR CONSULTA PARA TRAER DATOS DE LA BD
$consulta = "SELECT * FROM usuarios WHERE usuario='$recuperar_usuario' and pass='$recuperar_pass' ";
if($resultado = $conex->query($consulta)){
    while($row = $resultado->fetch_array()){
        $userok = $row['usuario'];
        $passok = $row['pass'];

    }
    $resultado -> close();

    }

    $conex->close();
    if(isset($recuperar_usuario) && isset($recuperar_pass)){
        if($recuperar_usuario == $userok && $recuperar_pass == $passok){
            $_SESSION['login'] = TRUE;
            $_SESSION['usuario'] = $usuario;
            header("location:index.php");

          

        }else{
            echo'<script>

            alert("USUARIO O CONTRASEÑA INCORRECTOS");
             window.location = "login.php";

            </script>';

        }
    }else{

    }



}









?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />
    <title>login </title>
   
</head>

<body>
    <div class="bg-yellow-50 ">
        <div class="w-screen h-screen flex justify-center items-center bg-yellow-50">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="p-10 bg-yellow-50 rounded flex justify-center items-center flex-col shadow-md" method="post">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-gray-600 mb-2" viewbox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                        clip-rule="evenodd" />
                </svg>
                <p class="mb-2 text-3xl text-gray-600">LIQUOR</p>
                <div class="flex my-2 mx-4 md:mx-2 border-b-2 border-gray-700 hover:border-green-800">
                    <input class="text-center w-full py-2 pl-2 md:pl-8 border-0 focus:outline-none" placeholder="Ingrese Su Usuario"
                        type="text" required name="usuario">
                </div>
                <div class="flex my-2 mx-4 md:mx-2 border-b-2 border-gray-700 hover:border-green-800">
                    <input class="text-center w-full py-2 pl-2 md:pl-8 border-0 focus:outline-none"
                        placeholder="Ingrese su Contraseña" type="password" required name="pass">
                </div>
                <button
                    class="my-3 text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-800 dark:focus:ring-green-900"
                    id="login" type="submit" name="ingresar"><span>Iniciar Sesion</span></button>
           
                    <p class="mb-2 text-xs text-gray-600">2022</p>
                </form>
        </div>
    </div>
   
    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
</body>

</html>