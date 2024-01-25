<?php
include_once('../../helpers/database.php');
session_start();
$connection = connectDatabase();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $module_id = $_GET['id'];
    $title = $_POST['title'];
    $videoUrl = $_POST['videoCode'];
    $content = $_POST['content'];
    $thumbnailUrl = $_POST['thumbnailUrl'];

    // Verifica se a URL da miniatura não está vazia e atualiza se necessário
    if ($thumbnailUrl !== " ") {
        $query = "UPDATE modules SET thumbnail_url='$thumbnailUrl' WHERE module_id='$module_id'";
        $resultThumbnail = mysqli_query($connection, $query);

        if (!$resultThumbnail) {
            $_SESSION['message'] = "Erro ao atualizar a URL da miniatura: " . mysqli_error($connection);
            $_SESSION['message_type'] = "danger";
            header("Location: ../courses.php");
            exit();
        }
    }

    // Verifica se a URL do vídeo não está vazia e atualiza se necessário
    if ($videoUrl !== " ") {
        $query = "UPDATE modules SET video_url='$videoUrl' WHERE module_id='$module_id'";
        $resultVideo = mysqli_query($connection, $query);

        if (!$resultVideo) {
            $_SESSION['message'] = "Erro ao atualizar a URL do vídeo: " . mysqli_error($connection);
            $_SESSION['message_type'] = "danger";
            header("Location: ../courses.php");
            exit();
        }
    }

    // Atualiza o título e a descrição do módulo
    $query = "UPDATE modules SET title='$title', description='$content' WHERE module_id='$module_id'";
    $resultModule = mysqli_query($connection, $query);

    if ($resultModule) {
        $_SESSION['message'] = "Módulo atualizado com sucesso";
        $_SESSION['message_type'] = "success";
        header("Location: ../courses.php");
        exit();
    } else {
        $_SESSION['message'] = "Erro ao atualizar o módulo: " . mysqli_error($connection);
        $_SESSION['message_type'] = "danger";
        header("Location: ../courses.php");
        exit();
    }
}
?>
