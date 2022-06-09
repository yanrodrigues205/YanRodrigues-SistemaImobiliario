<?php
$cnx = new mysqli('localhost', 'root', '', 'imobiliaria');


$id_midia = $_GET['mid_id'];

$sql= "DELETE FROM midias WHERE  mid_id = $id_midia";

mysqli_query($cnx, $sql);

    header("location:../php/index.php");


?>