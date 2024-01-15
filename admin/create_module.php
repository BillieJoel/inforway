<?php
include_once('../components/admin/header.php');
include_once('../helpers/database.php');

$connection = connectDatabase();

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $course = $_GET['id'];
}

$query = "SELECT * FROM courses";

$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    $banners = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>

<div class="card mt-3">
    <div class="card-body">
        <form action="requests/request_create_module.php?id=<?php echo $course; ?>" method="post" enctype="multipart/form-data">
            <img style="width: 250px;" id="imagem-preview" src="" class="img-fluid mb-3" onerror="substituirImagem(this)">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <div class="form-group">
                <label for="name">Titulo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Crie seu titulo">
            </div>
            <div class="form-group">
                <label for="about">descrição</label>
                <textarea class="form-control" id="about" rows="3" name="description" placeholder="Adicione uma descrição"></textarea>
            </div>

            <div class="form-group">
                <label for="image">Foto de miniatura</label>
                <input type="file" id="imagem" name="image_tumbnail" accept="image/*" onchange="preverImagem()" required>
            </div>
            
            <button type="submit" class="btn btn-success mt-2">Publicar</button>
        </form>
    </div>
</div>

<script>
    function preverImagem() {
        var input = document.getElementById('imagem');
        var previewContainer = document.getElementById('preview-container');
        var imagemPreview = document.getElementById('imagem-preview');

        if (input.files && input.files[0]) {
            var leitor = new FileReader();

            leitor.onload = function(e) {
                imagemPreview.src = e.target.result;
                previewContainer.style.display = 'block';
            };

            leitor.readAsDataURL(input.files[0]);
        }
    }
</script>

<?php
include_once('../components/admin/footer.php');
?>
