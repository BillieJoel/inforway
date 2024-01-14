<?php
session_start();

include_once('../../helpers/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_post["course_id"];
    $post_id = $_POST["id"];


    $connection = connectDatabase();

    
    // Verifica se uma nova imagem foi enviada
    if ($_FILES["image"]["size"] > 0) {
        // Processar o upload da nova imagem
        $targetDir = "../../src/img/receitas";  // Substitua pelo diretório correto
        $targetFile = $targetDir . basename($_FILES["image_banner"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Verificar se ocorreu algum erro durante o upload
        if ($_FILES["image_banner"]["error"] !== UPLOAD_ERR_OK) {
            $_SESSION['message'] = 'Erro no upload da imagem.';
            $_SESSION['message_type'] = 'danger';
        } else {
            // Se tudo estiver ok, tentar fazer o upload
            if (move_uploaded_file($_FILES["image_banner"]["tmp_name"], $targetFile)) {
                $image_path = "src/img/receitas" . basename($_FILES["image"]["name"]);
                // Atualizar os dados do post no banco de dados
                $query = "UPDATE banner SET course_id = '$course_id', image_banner = '$image_path' WHERE id = '$post_id'";
                if (mysqli_query($connection, $query)) {
                    $_SESSION['message'] = 'Post editado com sucesso.';
                    $_SESSION['message_type'] = 'success';
                } else {
                    $_SESSION['message'] = 'Erro ao editar o post.';
                    $_SESSION['message_type'] = 'danger';
                }
            } else {
                $_SESSION['message'] = 'Erro ao fazer upload da imagem.';
                $_SESSION['message_type'] = 'danger';
            }
        }
    } else {
        // Se nenhuma nova imagem foi enviada, apenas atualize os dados do post no banco de dados
        $query = "UPDATE banners SET course_id = '$course_id' WHERE id = '$post_id'";
        if (mysqli_query($connection, $query)) {
            $_SESSION['message'] = 'Post editado com sucesso.';
            $_SESSION['message_type'] = 'success';
        } else {
            $_SESSION['message'] = 'Erro ao editar o post.';
            $_SESSION['message_type'] = 'danger';
        }
    }

    // Redirecionar de volta para a página de edição ou para a lista de posts
    header("Location: ../edit_post.php?post_id=$post_id");
    exit();
}
?>
