<?php

include_once ('../../helpers/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    $connection = connectDatabase();

    // Usar prepared statements para proteger contra SQL injection
    $name = mysqli_real_escape_string($connection, $name);
    $email = mysqli_real_escape_string($connection, $email);
    $password= mysqli_real_escape_string($connection, $password);


    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password_hashed')";

    if(mysqli_query($connection, $query)) {

        // Redirecionar para admin/index.php
        header("Location: ../student.php");
        exit(); // Certifique-se de sair após o redirecionamento
    } else {
        // Em caso de erro, redirecione para uma página de erro ou forneça uma mensagem amigável
        header("Location: erro404.php");
        exit();
    }
    
    mysqli_close($connection);
}
?>