<?php
session_start();
include_once('../../helpers/database.php');
    $connection = connectDatabase();

if ($_SESSION['user_level'] != 'admin'){
    if (!isset($_SESSION['user_id'])){
        
    }
     header('Location: ../../login.php');
        exit;
   

        
}



    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $course_id = $_POST["course_id"];
        $imageDirectory = '../../src/image_banners/';
        $randomName = uniqid() . "_" . basename($_FILES['image_banner']['name']);
        $targetFile =  $imageDirectory . $randomName;
        
        // Verifique se o diretório de destino existe, se não, crie-o
        if (!file_exists($imageDirectory)) {
            mkdir($imageDirectory, 0777, true);
        }
    
        // Nome original do arquivo
        $originalFileName = $_FILES['image_banner']['name'];
    
        // Caminho completo para o arquivo no servidor

    
        // Mova o arquivo para o diretório de destino
        if (move_uploaded_file($_FILES['image_banner']['tmp_name'], $targetFile)) {
            if($course_id!=0){
            $image = 'src/image_banners/'.$randomName;
            $query = "INSERT INTO banners (image_banner,course_id) VALUES ('$image','$course_id')";
            if (mysqli_query($connection, $query)) {
                $_SESSION['message'] = "Imagem carregada com sucesso.";
                $_SESSION['message_type'] = "success";
                header("Location: ../banners.php");
                exit;
            } else {
                $_SESSION['message'] = "Erro ao inserir no banco de dados: " . mysqli_error($connection);
                $_SESSION['message_type'] = "danger";
                header("Location: ../../erro404.php");
                exit;
            }
                
    
            }

        } else{
            // Falha no upload
            $_SESSION['message'] = "Erro ao realizar o upload do arquivo.";
            $_SESSION['message_type'] = "danger";
            header("Location: ../../erro404.php");
            exit;
        }
        
    }
    ?>