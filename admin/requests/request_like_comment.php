<?php
session_start();

$user_id = $_SESSION["user_id"];
$comment_id = $_POST["comment_id"];
$module_id=$_POST["module_id"];

$query = "INSERT INTO like (user_id, comment_id) VALUES ('$user_id', '$comment')";

        if(mysqli_query($connection, $query)){
            $_SESSION['message'] = "Seu like foi computado";
            $_SESSION['message_type'] = "success";
            header("Location: ../post.php?module_id=$module_id");
        }else{
            $_SESSION['message'] = "Ocorreu um erro ao computar seu like";
            $_SESSION['message_type'] = "danger";
            header("Location: ../post.php?module_id=$module_id");
        }
    



?>