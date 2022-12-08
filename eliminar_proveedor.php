<?php
include('conexion.php');
$id = $_GET['id'];
$eliminar = "DELETE FROM proveedor WHERE id = '$id'";
$delete = $conex->query($eliminar);


echo'<script>

alert("PROVEEDOR ELIMINADO CORRECTAMENTE");
window.location = "proveedores.php";

</script>';
$conex->close();

?>