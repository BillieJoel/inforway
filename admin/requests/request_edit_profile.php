<?php
session_start();
include_once('../../helpers/database.php');

$connection = connectDatabase();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $about = $_POST['about'];
    $password_new = $_POST['password_new'];
    $password_new_2 = $_POST['password_new_2'];

    $user_name = mysqli_real_escape_string($connection, $_POST['user_name']);
    $password_new = mysqli_real_escape_string($connection, $_POST['password_new']);
    $password_new_2 = mysqli_real_escape_string($connection, $_POST['password_new_2']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $about = mysqli_real_escape_string($connection, $_POST['about']);
    $imageDirectory = '../../src/image_profile/';
    $randomName = uniqid() . "_" . basename($_FILES['image_profile']['name']);
  
    if($_FILES['image_profile']['size']>0){
    // Verifique se o diretório de destino existe, se não, crie-o
    if (!file_exists($imageDirectory)) {
        mkdir($imageDirectory, 0777, true);
    }

   
   
    // Caminho completo para o arquivo no servidor
    $targetFilePath = $imageDirectory .  $randomName;

    if (move_uploaded_file($_FILES['image_profile']['tmp_name'], $targetFilePath)) {
        $image = 'src/image_profile/'.$randomName;
        $query = "UPDATE users set image_profile='$image' WHERE user_id=$user_id";
        if (mysqli_query($connection, $query)){
            $_SESSION['message'] = "Imagem carregada com sucesso.";
            $_SESSION['message_type'] = "success";
           
        } else {
            $_SESSION['message'] = "Erro ao inserir no banco de dados: " . mysqli_error($connection);
            $_SESSION['message_type'] = "danger";
            header("Location: ../../erro404.php");
            exit;
        }
    } else {
        // Falha no upload
        $_SESSION['message'] = "Erro ao realizar o upload do arquivo.";
        $_SESSION['message_type'] = "danger";
        header("Location: ../../erro404.php");
        exit;
    }}
}


if ($password_new != '') {
    if ($password_new === $password_new_2) {

    $password_hashed = password_hash($password_new, PASSWORD_DEFAULT);
    $query = "UPDATE users SET password='$password_hashed' WHERE user_id=$user_id";
    if (mysqli_query($connection, $query)) {
      
    } 
}
echo "<p style='color: danger;'>as senhas não coincidem</p>";//
}

if($about!=''){
    $query = "UPDATE users SET  about='$about' WHERE user_id=$user_id";
    if (mysqli_query($connection, $query)) {
        $_SESSION['message'] = "about atualizado.";
        $_SESSION['message_type'] = "success";
       
}
}
if($user_name!=''){
    $query = "UPDATE users SET  user_name='$user_name' WHERE user_id=$user_id";
    if (mysqli_query($connection, $query)) {
        $_SESSION['message'] = "nome atualizado.";
        $_SESSION['message_type'] = "success";
       
}
}
if($email!=''){
    $query = "UPDATE users SET  email='$email' WHERE user_id=$user_id";
    if (mysqli_query($connection, $query)) {
        $_SESSION['message'] = "nome atualizado.";
        $_SESSION['message_type'] = "success";
        
}
 
}
    
else{
    echo "<p style='color: green;'>Dados atualizados com sucesso para o ID $user_id</p>";//
header("Location: ../profile.php");
exit;
}

?>
