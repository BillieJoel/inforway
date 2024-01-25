<?php
$pageInfo = array(
    'title' => 'Postagens do Forum',
    'description' => 'Visualize postagens do Fórum.',
    'pageName' => 'forumposts',
);

include_once('../components/admin/header.php');


$query = "SELECT 
    posts.id as post_id,
    posts.title as title,
    posts.content as content,
    posts.image as image,
    posts.created_at as created_at,
    users.user_name as user_name,
    users.about as user_about,
    users.image_profile as user_image
FROM posts
JOIN users ON users.user_id = posts.user_id";

$result = mysqli_query($connection, $query);

$posts = array();

if (mysqli_num_rows($result) > 0) {
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

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
            <a href="create_post.php" class="btn btn-success my-2 my-sm-0 text-light">
                Criar nova postagem
            </a>
            <hr>

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?>" role="alert">
                    <?php echo $_SESSION['message']; ?>
                </div>
            <?php unset($_SESSION['message']);
            } ?>

            <div class="card-alunos">
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Usuário</th>
                                <th>Título</th>
                                <th>Data de Publicação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($posts as $post) { ?>

                                <tr>
                                    <td>
                                    <?php
                                    // Verifica se a imagem do perfil contém o valor src 
                                    // (ou seja, se o usuário já fez upload de uma imagem)

                                    // Corrigido o caminho da imagem
                                    if (strpos($post['user_image'], 'src') !== false) {
                            
                                    ?>
                                        <img src="../<?php echo $post['user_image']; ?>" class="mr-3 img-fluid rounded-circle" style="width: 50px;" alt="<?php echo $post['user_name'] ?>">
                                    <?php } else { ?>
                                        <img src="<?php echo $post['user_image']; ?>" class="mr-3 img-fluid rounded-circle" style="width: 50px;" alt="<?php echo $post['user_name'] ?>">
                                    <?php } ?>
                                    </td>
                                    <td>
                                        <?php echo $post['user_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $post['title']; ?>
                                    </td>
                                    </td>
                                    <td>
                                        <?php echo date('d/m/Y', strtotime($post['created_at'])); ?>
                                    </td>
                                    <td>
                                        <a style="" href="../postf.php?post_id=<?php echo $post['post_id']; ?>" target="_blank">
                                            <i class="bi bi-eye-fill"></i>
                                            Ver no Fórum
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</main>

<?php
$currentPage = 'index';
include_once('../components/admin/footer.php');
?>