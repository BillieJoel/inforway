<?php
include_once('../helpers/database.php');
$connection = connectDatabase();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $course_id = $_GET['id'];
    $query2 = "SELECT * FROM courses WHERE course_id='$course_id'";
    $result = mysqli_query($connection, $query2);

    if (mysqli_num_rows($result) > 0) {
        $course = mysqli_fetch_assoc($result);
    } else {
        header('Location: login.php');
        exit;
    }
}

$pageInfo = array(
    'title' => 'Editar um Curso',
    'description' => 'Editar curso no sistema ' . $course['name_course'],
    'pageName' => 'create_course',
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
                    <form action="requests/request_edit_course.php?id=<?php echo $course_id; ?>" method="post" enctype="multipart/form-data">
                        <img id="imagem-preview" src="<?php echo "../" . $course['image_course'] ?>" class="img-fluid mb-3" width="300" onerror="substituirImagem(this)">
                        <div class="form-group">
                            <label for="title">Título do Curso</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $course['name_course']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="time">Carga Horária em Horas</label>
                            <input type="number" class="form-control" id="time" name="time" value="<?php echo $course['time_course']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="content">Descrição do Curso</label>
                            <textarea class="form-control" id="content" rows="5" required name="content"><?php echo $course['description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Imagem miniatura</label>
                            <input type="file" id="imagem" name="image_course" accept="image/*" onchange="preverImagem()">
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Publicar</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</main>

<script>
    function preverImagem() {
        var input = document.getElementById('imagem');
        var imagemPreview = document.getElementById('imagem-preview');

        if (input.files && input.files[0]) {
            var leitor = new FileReader();

            leitor.onload = function (e) {
                imagemPreview.src = e.target.result;
            };

            leitor.readAsDataURL(input.files[0]);
        }
    }

    function substituirImagem(imagem) {
        imagem.src = "../src/img/ERRO_404.png";
    }
</script>

<?php
$currentPage = 'new_post';
include_once('../components/admin/footer.php');
?>
