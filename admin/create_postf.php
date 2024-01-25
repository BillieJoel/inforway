<?php
$pageInfo = array(
    'title' => 'Criar Publicação',
    'description' => 'Criar sua publicação.',
    'pageName' => 'create_post',
);

include_once('../helpers/database.php');

include_once('../components/admin/header.php');

$user_id = $_SESSION['user_id'];

$connection = connectDatabase();

?>

<main class="container py-5">
    <div class="row">
        <section class="col-md-9">
            <h2><?= $pageInfo['title'] ?></h2>
            <p><?= $pageInfo['description'] ?></p>
            <hr>
            <div class="card-alunos">
                <div class="card-body">
                    <?php if(isset($_SESSION['message'])){ ?>
                        <div class="alert alert-<?= $_SESSION['message_type'] ?>" role="alert">
                            <?php echo $_SESSION['message']; ?>
                        </div>
                    <?php unset($_SESSION['message']); } ?>
                    <form action="requests/request_create_postf.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Título da Postagem</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Insira o título da postagem">
                        </div>
                        <div class="form-group mb-3">
                            <label for="content">Conteúdo da Postagem</label>
                            <textarea style class="form-control" id="content" name="content" rows="6"
                                placeholder="Escreva o conteúdo da postagem"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Publicar</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</main>
<?php
$currentPage = 'create_post';
include_once('../components/admin/footer.php');
?>