<?php
$pageInfo = array(
    'title' => 'Criar um Novo Curso',
    'description' => 'Crie um novo curso no sistema',
    'pageName' => 'create_course',
);

include_once('../components/admin/header.php');
?>

<!-- Conteúdo do dashboard -->
<main class="container py-5">
    <div class="row">
        <!-- Sidebar do dashboard -->
        <div class="col-md-3">
            <?php
            include_once('../components/admin/menu_sidebar.php');
            ?>
        </div>
        <!-- Main do dashboard -->
        <section class="col-md-9">
            <h2><?= $pageInfo['title'] ?></h2>
            <p><?= $pageInfo['description'] ?></p>
            <hr>
            <div class="card-alunos">
                <div class="card-body">
                    <form action="requests/request_create_course.php" method="post" enctype="multipart/form-data">
                        <img id="imagem-preview" src="" class="img-fluid mb-3" width="300" onerror="substituirImagem(this)">
                        <div class="form-group">
                            <label for="title">Título do Curso</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Insira o título">
                        </div>
                        <div class="form-group">
                            <label for="title">carga horaria em horas</label>
                            <input type="number" class="form-control" id="time" name="time" placeholder="Insira a carga horaria em horas">
                        </div>
                        <div class="form-group">
                            <label for="content">Descrição do Curso</label>
                            <textarea class="form-control" id="content" rows="5" required name="content" placeholder="Insira a descrição"></textarea>
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
    } else {
        // Se nenhum arquivo for selecionado, exibe a imagem de 404
        imagemPreview.src = "../src/img/ERRO_404.png";
    }
}

</script>
<?php
$currentPage = 'new_post';
include_once('../components/admin/footer.php');
?>