<?php
include('conexion.php');
$id = $_GET['id'];
$eliminar = "DELETE FROM categoria WHERE id = '$id'";
$delete = $conex->query($eliminar);


echo'<script>

alert("CATEGORIA ELIMINADO CORRECTAMENTE");
window.location = "categorias.php";

</script>';
$conex->close();

?>