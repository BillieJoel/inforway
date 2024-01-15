<?php
session_start();
include_once('../../helpers/database.php');
    $connection = connectDatabase();





    
    $query2 = "SELECT * FROM courses";
    $result = mysqli_query($connection, $query2);

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $title=$_POST['title'];
        $content=$_POST['content'];
        $time=$_POST['time'];
        
        $course_id = !empty($_GET["id"]) ? $_GET["id"] : "";
        
        $imageDirectory = '../../src/image_courses/';
        $randomName = uniqid() . "_" . basename($_FILES['image_course']['name']);
        $title = mysqli_real_escape_string($connection, $title);
      $content = mysqli_real_escape_string($connection, $content);
      $time = mysqli_real_escape_string($connection, $time);
        // Verifique se o diretório de destino existe, se não, crie-o
      
      
      
        if($_FILES['image_course']['size']>0){
        if (!file_exists($imageDirectory)) {
            mkdir($imageDirectory, 0777, true);
        }
        $targetFilePath = $imageDirectory .  $randomName;
        if (move_uploaded_file($_FILES['image_course']['tmp_name'], $targetFilePath)){
            $image = 'src/image_courses/'.$randomName;
            $query = "UPDATE courses SET image_course='$image'WHERE course_id='$course_id'";
            if (mysqli_query($connection, $query)){
                $_SESSION['message'] = "Atualização feita com sucesso..";
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
  if($time!=" "){
    $query = "UPDATE courses SET time_course ='$time'WHERE course_id='$course_id'";
    if (mysqli_query($connection, $query)){
        $_SESSION['message'] = "Atualização feita com sucesso.";
        $_SESSION['message_type'] = "success";
        header("Location: ../courses.php");
        exit;
    } else {
        $_SESSION['message'] = "Erro ao inserir no banco de dados: " . mysqli_error($connection);
        $_SESSION['message_type'] = "danger";
        header("Location: ../../erro404.php");
        exit;
    }
}
  if(!empty($title)){
    $query = "UPDATE courses SET name_course='$title'WHERE course_id='$course_id'";
    if (mysqli_query($connection, $query)){
        $_SESSION['message'] = "Atualização feita com sucesso.";
        $_SESSION['message_type'] = "success";
        header("Location: ../courses.php");
        exit;
    } else {
        $_SESSION['message'] = "Erro ao inserir no banco de dados: " . mysqli_error($connection);
        $_SESSION['message_type'] = "danger";
        header("Location: ../../erro404.php");
        exit;
    }
}
  if(!empty($content)){
    $query = "UPDATE courses SET description='$content'WHERE course_id='$course_id'";
    if (mysqli_query($connection, $query)){
        $_SESSION['message'] = "Atualização feita com sucesso.";
        $_SESSION['message_type'] = "success";
        header("Location: ../courses.php");
        exit;
    } else {
        $_SESSION['message'] = "Erro ao inserir no banco de dados: " . mysqli_error($connection);
        $_SESSION['message_type'] = "danger";
        header("Location: ../../erro404.php");
        exit;
    }
}

}


    ?>