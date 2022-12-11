<?php
include "conexion.php";
if(!empty($_POST["addfactura"]) && isset($_POST['addfactura'])){
    if(!empty($_POST["id_cliente"]) && !empty($_POST["id_producto"]) && !empty($_POST["cantidad"]) && !empty($_POST["descripcion"])){
        $id_cliente=$_POST["id_cliente"];
        $id_producto=$_POST["id_producto"];
        $cantidad=$_POST["cantidad"];
        $descripcion=$_POST["descripcion"]; 
        $sql = "INSERT  INTO facturas (id_cliente, id_producto, cantidad, descripcion) 
                VALUES ($id_cliente, '{$id_producto}', '{$cantidad}', ${descripcion}')";

        if ($conex->query($sql) === TRUE) {
            $last_id = $conex->insert_id;
            $data = [
                "mensaje" => "El archivo fue creado con el id: ".$last_id ,
                "id" => $last_id
            ];
            echo json_encode($data);
        }
    }else{
        echo "ta algun campo vacio paisano";
    }
}

?>