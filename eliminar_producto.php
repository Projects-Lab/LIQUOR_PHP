<?php
include('conexion.php');
$id = $_GET['id'];
$eliminar = "DELETE FROM productos WHERE id = '$id'";
$delete = $conex->query($eliminar);


echo'<script>

alert("PRODUCTO ELIMINADO ELIMINADO CORRECTAMENTE");
window.location = "productos.php";

</script>';
$conex->close();

?>