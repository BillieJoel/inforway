<?php 
session_start();

if(!isset($_SESSION['user_id'])){
    header('Location: ../login.php');
}

include_once ('../../helpers/database.php');

$connection = connectDatabase();

$post_id = mysqli_real_escape_string($connection, $_POST['post_id']);
$comment = mysqli_real_escape_string($connection, $_POST['comment']);
$user_id = $_SESSION['user_id'];

$query = "INSERT INTO comments (post_id, user_id, content) VALUES ('$post_id', '$user_id', '$comment')";

if(mysqli_query($connection, $query)){
    $_SESSION['message'] = "Seu comentário foi publicado com sucesso";
    $_SESSION['message_type'] = "success";
    header("Location: ../../post.php?post_id=$post_id");
}