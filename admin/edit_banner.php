<?php
include_once('../components/admin/header.php');
include_once('../helpers/database.php');

$connection = connectDatabase();

$query = "SELECT * FROM courses";

$result = mysqli_query($connection, $query);


$post_id = $_GET['id'];
$user_level = $_SESSION['user_level'];
$connection = connectDatabase();

// Obtém os dados do post existente
$query = "SELECT banner_id FROM banners WHERE id = '$post_id'";
$result = mysqli_query($connection, $query);

// Verifica se o post existe
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $existing_title = $row['title'];
    $existing_content = $row['content'];
    $existing_image = $row['image_banner'];
} else {
    // Se o post não existir, redirecione para uma página de erro ou para a lista de posts
    header("Location: ../404.php");
    exit();
}

// Informações da página
$pageInfo = array(
    'title' => 'Editar Postagem',
    'description' => 'Edite sua postagem existente.',
    'pageName' => 'edit_post',
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
        <div class="card mt-3">
    <div class="card-body">
        <form action="requests/request_create_banner.php" method="post" enctype="multipart/form-data">
        <label for="imagem">Escolha uma imagem:</label>
    <input type="file" id="image_banner" name="image_banner" accept="image/*" onchange="preverImagem()">
    
                        <div id="preview-container" style="display: none;">
                           <p>Pré-visualização da imagem:</p>
                           <img id="imagem-preview" alt="Pré-visualização da imagem" style="max-width: 300px;">
                        </div>
            
            <div class="form-group">
                <label for="courses">Cursos</label>
                <select name="course_id" id="courses">
                    <?php foreach ($banners as $banner) : ?>
                        <option value="<?php echo $banner["course_id"]; ?>"><?php echo $banner["name_course"] ?></option>
                    <?php endforeach; ?>
                    
                </select>
            </div>

            <button type="submit" class="btn btn-primary">criar banner</button>
        </form>
    </div>
</div>
    </div>
</main>

<script>
    function preverImagem() {
        var input = document.getElementById('image_banner');
        var previewContainer = document.getElementById('preview-container');
        var imagemPreview = document.getElementById('imagem-preview');

        if (input.files && input.files[0]) {
            var leitor = new FileReader();

            leitor.onload = function (e) {
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

