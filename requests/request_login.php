<?php
// Iniciar a sessão
session_start();

include_once ('../helpers/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $email = $_POST["email"];
    $password = $_POST["password"];

    $connection = connectDatabase();

    // Usar prepared statements para proteger contra SQL injection
   
    $email = mysqli_real_escape_string($connection, $email);
    $password= mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE email = '$email' ";

    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0){
        // Transforma o resultado em um array associativo
        $row = mysqli_fetch_assoc($result);

        // Verifica se a senha digitada é a mesma do banco, que está criptografada
        if(password_verify($password, $row['password'])){

            // Armazenar o ID do usuário e o nome
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_level'] = $row['user_level'];

            // Redirecionar para o dashboard
            header("Location: ../admin/profile.php");
        }else{
            // Falar esta incorreta
            $_SESSION['login_error'] = 'Senha está incorreta';
            header("Location: ../login.php");
        }

    }else{
        $_SESSION['login_error'] = 'E-mail incorreto ou não existe';
        header("Location: ../login.php");
    }

    mysqli_close($connection);
}