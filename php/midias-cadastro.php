<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../css/midias-cadastro.css'> 
    <title>Cadastro de Mídias - ImobiBrasil</title>
</head>
<body><center>


<?php

$cnx = new mysqli('localhost', 'root', '', 'imobiliaria');

if(isset($_POST['bt'])){

$nome = $_POST['mid_nome'];
$email = $_POST['mid_email'];
$id_imovel = $_POST['imo_number'];



if(isset($_POST['escritura'])){
    $tipo = "Escritura";
    $local = "../documentos/escrituras/";
}
if(isset($_POST['planta'])){
    $tipo = "Panta-Baixa";
    $local = "../documentos/planta-baixa/";
}
if(isset($_POST['comprovante'])){
    $tipo = "Comprovante de Locação";
    $local ="../documentos/comprovante/";
}

if(isset($_FILES['file'])){

    $arquivo = $_FILES['file']['name'];
    $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));

    $novo_nome = $nome . "." . $extensao;

    $loc = $local . $novo_nome;

    $sql = "INSERT INTO midias(mid_id, imo_id, mid_tipo, mid_titulo, mid_caminho, mid_data_up, mid_email_user) VALUES ('', '$id_imovel', '$tipo', '$nome', '$loc', NOW(), '$email')";
    
    move_uploaded_file($_FILES['file']['tmp_name'], $local . $novo_nome);

    if(mysqli_query($cnx, $sql)){
        echo "<a class='midia-sucesso'>Esta midia foi cadastrada com sucesso!</a>";
    }else{
        echo "<a class='midia-erro'>Midia não foi cadastrada!</a>";
    }
}
}
?>
<form method="post" action="" enctype="multipart/form-data">
<h1>Cadastro de Mídias - ImobiBrasil</h1> <br>
    <input type="text" name="mid_nome" placeholder="Digite o nome do Arquivo!" required><br><br>
    <input type="text" name="mid_email" placeholder="Digite seu Email!" required><br><br>
    Digite o ID do Imóvel a Anexar!<br>
    <input type="number" name="imo_number" placeholder="" required><br><br>
    Tipo de Documento<br>
    <input type="checkbox" name="escritura">Escritura<br>
    <input type="checkbox" name="planta">Planta-Baixa<br>
    <input type="checkbox" name="comprovante">Comprovante de Locação<br><br>
    <input type="file" name="file" required><br><br>
   
    <input type="submit" name="bt" value="Cadastrar!">

</form>
<a href='../php/index.php' class='pag-inicial'>Página Inicial</a>

</center>
</body>
</html>