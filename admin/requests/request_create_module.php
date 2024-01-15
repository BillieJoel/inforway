<?php
session_start();
include_once('../../helpers/database.php');

$connection = connectDatabase();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $tilte = $_POST['title'];
    $description = $_POST['description'];

    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $Description= mysqli_real_escape_string($connection, $_POST['Description']);
   
    $imageDirectory = '../../src/image_profile/';
    $randomName = uniqid() . "_" . basename($_FILES['image_module']['name']);
  
    if($_FILES['image_module']['size']>0){
    // Verifique se o diretório de destino existe, se não, crie-o
    if (!file_exists($imageDirectory)) {
        mkdir($imageDirectory, 0777, true);
    }
    $targetFilePath = $imageDirectory .  $randomName;

    if (move_uploaded_file($_FILES['image_module']['tmp_name'], $targetFilePath)) {
        $image = 'src/image_profile/'.$randomName;
        $query = "UPDATE modules set image_module='$image' WHERE user_id=$user_id";
        if (mysqli_query($connection, $query)){
            $_SESSION['message'] = "Imagem carregada com sucesso.";
            $_SESSION['message_type'] = "success";
           
        } else {
            $_SESSION['message'] = "Erro ao inserir no banco de dados: " . mysqli_error($connection);
            $_SESSION['message_type'] = "danger";
            header("Location: ../../erro404.php");
            exit;
        }
    } else {
        // Falha no upload
        $_SESSION['message'] = "Erro ao realizar o upload do arquivo.";
        $_SESSION['message_type'] = "danger";
        header("Location: ../../erro404.php");
        exit;
    }}
}


