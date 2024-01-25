<?php
include_once('../components/admin/header.php');
include_once('../helpers/database.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $course_id = $_GET['id'];
}
?>

<div class="card mt-3">
    <div class="card-body">
        <form action="requests/request_create_module.php?id=<?php echo $course_id ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="videoUrl">URL do Vídeo</label>
                <input type="text" class="form-control" id="videoUrl" name="videoUrl" placeholder="Cole a URL do vídeo" onchange="preverMiniatura()">
            </div>

            <div class="form-group">
                <label for="thumbnailPreview">Pré-visualização da Thumbnail</label>
                <img style="width: 250px;" id="thumbnailPreview" class="img-fluid mb-3">
                <!-- Adiciona campos ocultos para armazenar o código do vídeo e a URL da miniatura -->
                <input type="hidden" id="videoCode" name="videoCode">
                <input type="hidden" id="thumbnailUrl" name="thumbnailUrl">
            </div>

            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Crie seu título">
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea class="form-control" id="description" rows="3" name="description" placeholder="Adicione uma descrição"></textarea>
            </div>

            <button type="submit" class="btn btn-success mt-2">Publicar</button>
        </form>
    </div>
</div>

<script>
    function preverMiniatura() {
        var videoUrl = document.getElementById('videoUrl').value;
        var videoId = extrairVideoId(videoUrl);
            document.getElementById('videoCode').value = videoUrl // Armazena a URL da miniatura
            
            

        if (videoId) {
            var thumbnailUrl = 'https://img.youtube.com/vi/' + videoId + '/maxresdefault.jpg';
            document.getElementById('thumbnailPreview').src = thumbnailUrl;
            document.getElementById('thumbnailUrl').value = thumbnailUrl; // Armazena a URL da miniatura
            
            
            document.getElementById('videoCode').value = videoId; // Armazena o código do vídeo
        } else {
            alert('URL do vídeo inválida');
        }
    }

    function extrairVideoId(url) {
        var match = url.match(/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/);
        return (match && match[1]) || null;
    }
</script>

<?php
include_once('../components/admin/footer.php');
?>
