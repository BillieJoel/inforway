<?php
session_start();

include_once ('../../helpers/database.php');

$module_id = $_GET['id'];
$user_level = $_SESSION['user_level'];
$connection = connectDatabase();
$root_dir = $_SERVER['DOCUMENT_ROOT'] . '/inforway';

if ($user_level == 'admin') {
  
        $delete_query = "DELETE FROM modules WHERE module_id = '$module_id'";
        $delete_result = mysqli_query($connection, $delete_query);

        if ($delete_result) {
            $_SESSION['message'] = "Seu modulo foi deletada com sucesso.";
            $_SESSION['message_type'] = "success";
            header("Location: ../courses.php");
        } else {
            $_SESSION['message'] = "Ocorreu um erro ao deletar o modulo. Tente novamente mais tarde.";
            $_SESSION['message_type'] = "danger";
            header("Location: ../courses.php");
        }
    } 
?>
