<?php
include('conexion.php');
$id = $_GET['id'];
$eliminar = "DELETE FROM clientes WHERE id = '$id'";

$delete = $conex->query($eliminar);


echo'<script>

alert("CLIENTE ELIMINADO ELIMINADO CORRECTAMENTE");
window.location = "clientes.php";

</script>';
$conex->close();

?>