<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header('Location: ../login.php');
}

include_once('../helpers/database.php');
$connection = connectDatabase();

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../src/inforway.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
  <?php
    // Inclua as informações da página atual
    if (isset($pageInfo)) {
        echo "<title>{$pageInfo['title']}</title>";
        echo "<meta name='description' content='{$pageInfo['description']}'>";
    } else {
        echo "<title>Inforway</title>";
        echo "<meta name='description' content='Bem-vindo ao Inforway'>";
    }
    ?>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="../index.php">
            Inforway | Início
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> <?= $_SESSION['user_name'] ?? 'Usuário' ?>
                    </a>
                    <ul class="dropdown-menu" style="background-color: #e25c0f;" aria-labelledby="navbarDropdown">
                  
            
                        <li><a class="dropdown-item" href="profile.php"><i class="fas fa-user"></i> Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                       
                        <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out"></i> Sair</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body>