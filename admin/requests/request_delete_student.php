<?php
session_start();

include_once('../../helpers/database.php');

$user_id = $_GET['id'];
$connection = connectDatabase();
$root_dir = $_SERVER['DOCUMENT_ROOT'] . '/inforway';
$query = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($connection, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $image_path = $root_dir . '/' . $row['image_profile'];

        // Verifica se o arquivo existe antes de tentar excluí-lo
        if (file_exists($image_path)) {
            // Exclui o arquivo
            unlink($image_path);
        } else {
            // Se o arquivo não existir, você pode querer lidar com isso de alguma forma
            $_SESSION['message'] = "Aviso: O arquivo não foi encontrado.";
            $_SESSION['message_type'] = "warning";
            header("Location: ../banners.php");
            exit;
        }

if (mysqli_num_rows($result) > 0) {
    $delete_query = "DELETE FROM users WHERE id = '$user_id'";
    $delete_result = mysqli_query($connection, $delete_query);

    if ($delete_result) {
        $_SESSION['message'] = "O aluno foi deletado com sucesso.";
        $_SESSION['message_type'] = "success";
        header("Location: ../student.php");
    }
}}
?>