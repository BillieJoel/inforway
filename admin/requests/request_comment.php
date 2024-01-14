<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('Location; ../login.php');
}

include_once ('../helpers/database.php');
$connection = connectDatabase();

if($_SERVER["REQUEST_METHOD"]="POST"){
$module_id = $_POST['module_id'];
$comment=$_POST["comment"];
$user_id = $_Session["id"];

    $comment= mysqli_real_escape_string($connection, $comment);

 $query = "INSERT INTO comments (user_id, comment, module_id) VALUES ('$user_id', '$comment', '$module_id')";

        if(mysqli_query($connection, $query)){
            $_SESSION['message'] = "Seu comentario foi publicada com sucesso";
            $_SESSION['message_type'] = "success";
            header("Location: ../post.php?module_id=$module_id");
        }else{
            $_SESSION['message'] = "Ocorreu um erro ao publicar seu comentario";
            $_SESSION['message_type'] = "danger";
            header("Location: ../post.php?module_id=$module_id");
        }
    }







?>