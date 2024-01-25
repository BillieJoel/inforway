<?php
$pageInfo = array(
    'title' => 'Listagem de Banners da Página Inicial',
    'description' => 'Visualize e gerencie as imagens da página inicial.',
    'pageName' => 'banners',
);

include_once('../components/admin/header.php');
include_once('../helpers/database.php');

$connection = connectDatabase();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $module_id = $_GET["id"];
}

$query = "SELECT * FROM modules WHERE module_id='$module_id'";
$result = mysqli_query($connection, $query);

if ($result) {
    $module = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageInfo['title']; ?></title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .module-card {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .module-title {
            color: #007bff;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
        }

        .video-container iframe {
            position: absolute;
            width: 100%;
            height: 100%;
            border: 0;
        }

        .module-description {
            font-size: 18px;
            color: #555;
            line-height: 1.5; /* Espaçamento entre linhas para melhor legibilidade */
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="module-card">
    <h2 class="module-title"><?php echo $module['title'] ?></h2>
    <div class="video-container">
        <iframe width="560" height="315" src="<?php echo "https://www.youtube.com/embed/" . $module['video_url']; ?>" frameborder="0" allowfullscreen></iframe>
    </div>
    <p class="module-description"><?php echo $module['description'] ?></p>
</div>

<?php
$currentPage = 'aula';
include_once('../components/admin/footer.php');
?>

</body>
</html>
