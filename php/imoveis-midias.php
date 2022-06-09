<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/imoveis-midias.css">
    <title>Visualizar Documentações - ImobiBrasil</title>
</head>
<body>
<center>



<?php

$cnx = new mysqli('localhost', 'root', '', 'imobiliaria');

$id = $_GET["imo_id"];

echo "<h1>Documentações da Residência de ID $id</h1><br>";
echo"<form method='post' action=''>";  
echo"<input type='text' name='pesquisa' class='pesquisa'  placeholder='Pesquise o tipo do documento aqui!'>";
echo"<input type='submit' name='bt' class='botao' value='Pesquisar'>";
echo "</form>";
echo "<a class='imoveis-anexar' id='imoveis-anexar' href='../php/midias-cadastro.php'>Anexar Documentos</a><br><br>";

if(isset($_POST['bt'])){
    $pesquisa = $_POST['pesquisa'];
    if($pesquisa == ''){
        $sql = "SELECT * FROM midias WHERE imo_id = $id ";
    }else
    $sql = "SELECT * FROM midias WHERE mid_tipo LIKE \"%$pesquisa%\" ";
}else
$sql = "SELECT * FROM midias WHERE imo_id = $id ";

$result = mysqli_query($cnx, $sql);

while($obj = mysqli_fetch_array($result)){

    $id_midia = $obj[0];
    $id_imovel = $obj[1];
    $tipo = $obj[2];
    $local = $obj[4];
    $titulo = $obj[3];
    $data = $obj[5];
    $email = $obj[6];
    





    echo "<form method='post' action='../php/midias-alterar.php'>";
    echo "<h1>$tipo</h1><br>";
    echo "ID MIDIA<br><input type='number' name='id_midia' value='$id_midia' readonly><br>";
    echo "ID IMOVÉL<br><input type='number' name='id_imovel' value='$id_imovel' readonly><br>";
    echo "Título<br><input type='text' name='titulo' value='$titulo'><br>";
    echo "Tipo da documentação<br><input type='text' name='tipo' value='$tipo'><br>";
    echo "Data de inclusão<br><input type='date' name='data' value='$data' readonly><br>";
    echo "Local do Arquivo<br><input type='text' name='local' value='$local'><br>";
    echo "Email do Remetente<br><input type='text' name='email' value='$email'><br><br><br>";
    echo "<a href='midias-excluir.php?mid_id=$id_midia' class='deletar'>Deletar</a>";
    echo "<input type='submit' value='Alterar' class='alterar' href='midias-alterar.php?mid_id=$id_midia'></form><br><br>";
    echo "<img src='$local' class='midia-arquivo'><br><br><br><br>";


}
    


?>
</center>
</body>
</html>