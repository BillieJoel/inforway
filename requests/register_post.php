<?php

include_once ('../helpers/database.php');
$connection = connectDatabase();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpf = $_POST['cpf'];
    $date = $_POST['date'];
  
    
     
     
    

    // Usar prepared statements para proteger contra SQL injection
    $name = mysqli_real_escape_string($connection, $name);
    $email = mysqli_real_escape_string($connection, $email);
    $password= mysqli_real_escape_string($connection, $password);

    $cpf = mysqli_real_escape_string($connection, $cpf);
    $date = mysqli_real_escape_string($connection, $date);
   
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    $cpf_hashed = password_hash($cpf, PASSWORD_DEFAULT);
    
    
    $query_to_check = "SELECT * FROM users WHERE email = '$email'";
    $results_to_check = mysqli_query($connection, $query_to_check);
    if (strlen($cpf) == 11 && is_numeric($cpf) && is_numeric($date)) {
      if (mysqli_num_rows($results_to_check) > 0){
            $_SESSION['message'] = "O email fornecido já está em uso";
            $_SESSION['message_type'] = "danger";
            header("Location: ../register.php");
           
        }
    } else {
        $_SESSION['message'] = "Security alert";
        $_SESSION['message_type'] = "danger";
        header("Location: ../register.php");
        exit;
        
    





    
    $query = "INSERT INTO users (user_name, email, password, cpf, user_level,date_of_birth) VALUES ('$name', '$email', '$password_hashed', '$cpf_hashed', 'common','$date')";

    if(mysqli_query($connection, $query)) {
        // Configurar a sessão
        session_start();

        // Armazenar o ID do usuário na sessão
        $_SESSION['user_id'] = mysqli_insert_id($connection);

        // Outras informações que você pode querer armazenar na sessão
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_level'] = 'common';

        // Redirecionar para admin/profile.php
        header("Location: ../admin/profile.php");
        exit(); // Certifique-se de sair após o redirecionamento
    } else {
        // Em caso de erro, redirecione para uma página de erro ou forneça uma mensagem amigável
        header("Location: erro404.php");
        exit();
    }

    mysqli_close($connection);

}
}
?>