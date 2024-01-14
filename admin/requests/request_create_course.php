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



    
    $query2 = "SELECT * FROM courses";

    $result = mysqli_query($connection, $query2);
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $title=$_POST['title'];
        $content=$_POST['content'];
        $time=$_POST['time'];

        $imageDirectory = '../../src/image_courses/';
        $randomName = uniqid() . "_" . basename($_FILES['image_course']['name']);
        $title = mysqli_real_escape_string($connection, $title);
      $content = mysqli_real_escape_string($connection, $content);
      $time = mysqli_real_escape_string($connection, $time);
        // Verifique se o diretório de destino existe, se não, crie-o
        if (!file_exists($imageDirectory)) {
            mkdir($imageDirectory, 0777, true);
        }
       
       
       
        // Caminho completo para o arquivo no servidor
        $targetFilePath = $imageDirectory .  $randomName;
    
        // Mova o arquivo para o diretório de destino
        if (move_uploaded_file($_FILES['image_course']['tmp_name'], $targetFilePath)) {
            $image = 'src/image_courses/'.$randomName;
            $query = "INSERT INTO courses (image_course,description,name_course,time_course) VALUES ('$image','$content','$title','$time')";
            if (mysqli_query($connection, $query)){
                $_SESSION['message'] = "Imagem carregada com sucesso.";
                $_SESSION['message_type'] = "success";
                header("Location: ../courses.php");
                exit;
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
        }
    }




    ?>