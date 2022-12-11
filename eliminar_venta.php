<?php
include('conexion.php');
$id = $_GET['id'];
$eliminar = "DELETE FROM ventas WHERE id = '$id'";
$delete = $conex->query($eliminar);


echo'<script>

alert("PRODUCTO ELIMINADO ELIMINADO CORRECTAMENTE");
window.location = "facturacion.php";

</script>';
$conex->close();

?>