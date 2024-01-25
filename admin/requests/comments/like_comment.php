<?php 
session_start();

if(!isset($_SESSION['user_id'])){
    header('Location: ../login.php');
}

include_once ('../../helpers/database.php');

$connection = connectDatabase();

$comment_id = mysqli_real_escape_string($connection, $_GET['comment_id']);
$post_id = mysqli_real_escape_string($connection, $_GET['post_id']);

$query = "INSERT INTO likes (comment_id, user_id) VALUES ('$comment_id', '$user_id')";

$result = mysqli_query($connection, $query);

if($result){
    header('Location: post.php?post_id=' . $post_id);
}