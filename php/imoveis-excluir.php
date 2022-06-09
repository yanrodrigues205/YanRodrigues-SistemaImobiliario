<?php
$cnx = new mysqli('localhost', 'root', '', 'imobiliaria');
$id = $_GET["imo_id"];

$sql = "DELETE FROM imoveis WHERE imo_id = $id";

mysqli_query($cnx, $sql);

echo"<script language='javascript' type='text/javascript'>
alert('O Imovel de ID: $id foi excluido com sucesso!');
window.history.back();
</script>";

?>