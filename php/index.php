<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>Teste para ImobiBrasil - YanRodrigues</title>
</head>
<body>
    <center>
<header>
        <a href='https://www.imobibrasil.com.br/' class='imobi'><h1>Imobi<a class='brasil'>Brasil©</h1></a></a>
        <a class='creditos' href='https://www.linkedin.com/in/yan-pablo-rodrigues-54a661226/'>Desenvolvido por YanCode©</a>
        <a class="imoveis-doc" id="imoveis-doc" href="../php/imoveis-cadastro.php">Adicionar Residência</a>
        <a class="imoveis-anexar" id="imoveis-anexar" href="../php/midias-cadastro.php">Anexar Documentos</a>
</header>

<br><form action="" method="post">
        <input type="text" name="pesquisa" placeholder="Procurar Residência!"> 
        <input type="submit" name="enviar" value="Pesquisar">
</form><br>

<?php

$cnx = new mysqli('localhost', 'root', '', 'imobiliaria');


if(isset($_POST["pesquisa"])){
    $pesquisa = $_POST["pesquisa"];
    $sql = "SELECT * FROM imoveis WHERE imo_titulo LIKE \"%$pesquisa%\"";
}else{
    $sql = "SELECT * FROM imoveis";
}

$result = mysqli_query($cnx,$sql);

while($obj = mysqli_fetch_array($result)){

 $id = $obj[0];
 $titulo = $obj[1];
 $desc = $obj[2];
 $preco = $obj[3];
 $img_local = $obj[4];
 $data_up = $obj[5];
 



if($img_local != ''){
    echo "<br><img src='$img_local' class='img-imovel'>";
}

 echo "<div class='imoveis-info' id='imoveis-info'>";

 echo "<a class='imo-id'>ID $id</a><br>";
 echo "<a class='imo-preco'>R$ $preco,00</a><br>";
 echo "<a class='imo-titulo'>$titulo</a><br>";
 echo "<a class='imo-desc'>$desc<a><br>";
 echo "<a class='imo-data'>Data de envio($data_up)</a><br><br>";
 echo "<a href='imoveis-midias.php?imo_id=$id' class='visualizar'>Visualizar Documentação</a>";
 echo "<a href='imoveis-edicao.php?imo_id=$id' class='editar-res'>Editar Imóvel</a>";
 echo "<a href='imoveis-excluir.php?imo_id=$id' class='excluir-res'>Excluir Residência</a><br><br>";
 echo "</div>";
}

?>
</center>

</body>
</html>