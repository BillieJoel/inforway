<?php 
session_start();

if(!isset($_SESSION['user_id'])){
    header('Location: ../login.php');
}

include_once ('../../helpers/database.php');

$connection = connectDatabase();

$comment_id = mysqli_real_escape_string($connection, $_GET['comment_id']);
$post_id = mysqli_real_escape_string($connection, $_GET['post_id']);

$query = "DELETE FROM comments WHERE id = '$comment_id'";

if(mysqli_query($connection, $query)){
    $_SESSION['message'] = "Seu comentário foi excluído com sucesso";
    $_SESSION['message_type'] = "success";
    header("Location: ../../post.php?post_id=$post_id");
}