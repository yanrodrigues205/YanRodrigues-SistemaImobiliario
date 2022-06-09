<?php
$cnx = new mysqli('localhost', 'root', '', 'imobiliaria');


$id = $_POST["id_midia"];
$nome = $_POST["titulo"];
$local = $_POST["local"];
$email = $_POST["email"];
$data = $_POST["data"];
$tipo = $_POST["tipo"];

$sql = "UPDATE `midias` SET  `mid_titulo`= '".$nome."', `mid_caminho` = '".$local."', `mid_tipo` = '".$tipo."', `mid_data_up` = '".$data."', `mid_email_user` = '".$email."'
 WHERE `mid_id`= '".$id."'";

if( mysqli_query($cnx, $sql)){
    echo"<script language='javascript' type='text/javascript'>
  alert('O Imovel de ID:$id foi alterado com sucesso!');
  window.history.back();
  </script>";
}




?>