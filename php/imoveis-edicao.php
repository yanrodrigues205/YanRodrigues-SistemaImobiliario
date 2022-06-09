<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/imoveis-edicao.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Imóvel - ImobiBrasil</title>

    <center>
  
</head>
<body>

</body>
</html>
<?php
$cnx = new mysqli('localhost', 'root', '','imobiliaria');


$id = $_GET['imo_id'];
$sql = "SELECT * FROM imoveis  WHERE imo_id = $id ";

$result = mysqli_query($cnx, $sql);

while($obj = mysqli_fetch_array($result)){

$id = $obj[0];
$titulo = $obj[1];
$desc = $obj[2];
$preco = $obj[3];
$local = $obj[4];



echo "<form method='post' action='imoveis-alterar.php'>";
echo "<h1>Edição de Imóvel - ImobiBrasil</h1><br>";
echo "ID Imóvel<br><input type='text' value='$id' name='id' readonly><br>";
echo "Título<br><input type='text' value='$titulo' name='titulo'><br>";
echo "Descrição<br><input type='text' value='$desc' name='desc'><br>";
echo "Preço R$<br><input type='text' value='$preco' name='preco'><br>";
echo "Local da imagem<br><input type='text' value='$local' name='local'><br><br>";
echo "<input type='submit' name='bt' value='Alterar Imóvel'><br>";
echo "</form>";


mysqli_close($cnx);

}

?>
</center>