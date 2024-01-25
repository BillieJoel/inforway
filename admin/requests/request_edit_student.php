<?php
session_start();

include_once('../../helpers/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user_level = $_POST["level"];

    $connection = connectDatabase();

    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $query = "UPDATE users SET user_name = '$name', email = '$email', user_level = '$user_level'";

    if ($password != " ") {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query .= ", password = '$hashed_password'";
    }

    $query .= " WHERE user_id = '$user_id'";

    if (mysqli_query($connection, $query)) {
        $_SESSION['message'] = 'Usuário editado com sucesso.';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Erro ao editar o perfil do usuário.';
        $_SESSION['message_type'] = 'error';
    }

    header("Location: ../student.php");

    mysqli_close($connection);
}
?>
