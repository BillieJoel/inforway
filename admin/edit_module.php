<?php
include_once('../helpers/database.php');
$connection = connectDatabase();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $module_id = $_GET['id'];
    $query = "SELECT * FROM modules WHERE module_id='$module_id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Erro na consulta SQL: " . mysqli_error($connection));
    }

    $module = mysqli_fetch_assoc($result);
}

$pageInfo = array(
    'title' => 'Editar um módulo',
    'description' => 'Editar módulo no sistema',
    'pageName' => 'edit_module',
);

include_once('../components/admin/header.php');
?>

<!-- Conteúdo do dashboard -->
<main class="container py-5">
    <div class="row">
        <!-- Sidebar do dashboard -->
        <div class="col-md-3">
            <?php include_once('../components/admin/menu_sidebar.php'); ?>
        </div>
        <!-- Main do dashboard -->
        <section class="col-md-9">
            <h2><?= $pageInfo['title'] ?></h2>
            <p><?= $pageInfo['description'] ?></p>
            <hr>
            <div class="card-alunos">
                <div class="card-body">
                    <form action="requests/request_edit_module.php?id=<?php echo $module_id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <img style="width: 250px;" id="thumbnailPreview" src="<?php echo $module['thumbnail_url'] ?>" class="img-fluid mb-3">
                            <!-- Adiciona um campo oculto para armazenar a URL da miniatura -->
                            <input type="hidden" id="thumbnailUrl" name="thumbnailUrl">
                            <input type="hidden" id="videoCode" name="videoCode">
                        </div>

                        <label for="videoUrl">URL do Vídeo</label>
                        <input type="text" class="form-control" id="videoUrl" name="videoUrl" placeholder="<?Php echo $module['video_url'] ?>" onchange="preverMiniatura()">
                        
                        <div class="form-group">
                            <label for="title">Título do módulo</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $module['title']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="time">Data de Criação</label>
                            <input type="text" class="form-control" id="time" name="time" value="<?php echo date('d/m/Y H:i:s', strtotime($module['date_post'])); ?>">
                        </div>
                        <div class="form-group">
                            <label for="content">Descrição do Curso</label>
                            <textarea class="form-control" id="content" rows="5" required name="content"><?php echo $module['description']; ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-success mt-2">Publicar</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</main>

<script>
    // Essa função será chamada no carregamento da página para exibir a miniatura inicial
    window.onload = function() {
        preverMiniatura();
    };

    function preverMiniatura() {
        var videoUrl = document.getElementById('videoUrl').value;
        var videoId = extrairVideoId(videoUrl);
        document.getElementById('videoCode').value = videoId;


        if (videoId) {
            var thumbnailUrl = 'https://img.youtube.com/vi/' + videoId + '/maxresdefault.jpg';
            document.getElementById('thumbnailPreview').src = thumbnailUrl;
            document.getElementById('thumbnailUrl').value = thumbnailUrl;
        } 
    }

    function extrairVideoId(url) {
    var match = url.match(/[?&]v=([^&#]*)|youtu\.be\/([^&?]*)/);
    return match ? match[1] || match[2] : null;
}
</script>

<?php
$currentPage = 'new_post';
include_once('../components/admin/footer.php');
?>
