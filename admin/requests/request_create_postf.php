<?php
session_start();

include_once ('../../helpers/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $connection = connectDatabase();

    $title = $_POST['title'];
    $content = $_POST['content'];

        // Obtém o id usuário logado
        $user_id = $_SESSION['user_id'];

        $query = "INSERT INTO posts (user_id, title, content, views) VALUES ('$user_id', '$title', '$content', 0)";

        if(mysqli_query($connection, $query)){
            $_SESSION['message'] = "Sua postagem foi publicada com sucesso";
            $_SESSION['message_type'] = "success";
            header("Location: ../forumpost.php");
        }else{
            $_SESSION['message'] = "Ocorreu um erro ao cadastrar sua postagem";
            $_SESSION['message_type'] = "danger";
            header("Location: ../create_post.php");
        }
    }