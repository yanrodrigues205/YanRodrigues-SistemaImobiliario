<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Imóveis - ImobiBrasil</title>
    <link rel="stylesheet" href="../css/imoveis-cadastro.css">
</head>
<body><center>
<a href="../php/index.php" class="voltar">Voltar</a><br>
<div class="tudo-cadastroimoveis">
 



<?php

$cnx = new mysqli('localhost', 'root', '', 'imobiliaria');



if(isset($_POST["acao"])){
    $titulo = $_POST["titulo"];
$desc = $_POST["desc"];
$preco = $_POST["preco"];

if(isset($_FILES['file'])){
    $arquivo = $_FILES["file"]["name"];
    $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION)); // PEGANDO A EXTENSÃO DO ARQUIVO SEMPRE EM MINUSCULO POR CAUSA DO (strtolower)
                                                                    // PEGANDO A EXTENSÃO DO ARQUIVO = SE É .pdf .word .png 
    $novo_nome = md5(time()).".".$extensao;
    $local = "../img/";

    $loc = $local . $novo_nome;

    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d'); 


    move_uploaded_file($_FILES['file']['tmp_name'], $local . $novo_nome);

    $sql = "INSERT INTO imoveis(imo_id, imo_titulo, imo_desc, imo_preco,  imo_img_local, imo_data_up)
     VALUES ('', '$titulo', '$desc', '$preco', '$loc', '$data')";

     if(mysqli_query($cnx, $sql)){

        echo "<a class='imovel-sucesso'>Imovel foi cadastrado com sucesso!</a>";
     }else{
        echo "<a class='imovel-erro'>Imovel não foi cadastrado!</a>";
     }
}
}
        

?>


<h1><i>Cadastro de Imóveis</i></h1><br>
<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="titulo" placeholder="Digite o Título" required><br><br>
    <input type="text" name="desc" placeholder="Digite a Descrição" required><br><br>
    <input type="number" name="preco" placeholder="Digite o Preço" required><br><br>
    <a class="foto-imovel"><br>Foto do Imóvel</a><br><input type="file" name="file" required/><br><br><br>

 
    <input type="submit" name="acao" value="Enviar"/>
</form>
</div>
</center>
</body>
</html>