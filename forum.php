<?php

$pageInfo = array(
  'title' => 'Fórum - Inforway',
  'description' => 'Seja bem-vindo(a) ao Fórum - Inforway.',
  'pageName' => 'forum',
);

$pageName = $pageInfo['pageName'];
include_once('components/public/header.php');

include_once('helpers/database.php');

$connection = connectDatabase();

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

<main class="mt-5">

  <section class="col-md-9 mx-auto text-center">
    <h2><?= $pageInfo['title'] ?></h2>
    <p><?= $pageInfo['description'] ?></p>
    <?php
    if (!isset($_SESSION['user_id'])) {
    ?>
      <a type="button" class="btn btn-crs" href="login.php">Faça Login para criar uma Publicação</a>
    <?php
    } else { ?>
      <a href="admin/create_postf.php" class="btn btn-success my-2 my-sm-0 text-light">
        Criar nova publicação
      </a>
    <?php
    }
    ?>
    <hr>
    
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
          <tbody">

            <?php foreach ($posts as $post) { ?>

              <tr>
                <td>
                <img src="<?php echo $post['user_image']; ?>" alt="<?php echo $post['user_name']; ?>" class="mr-3 img-fluid rounded-circle" style="width: 50px;">
                </td>
                <td>
                  <?php echo $post['user_name']; ?>
                </td>
                <td>
                  <?php echo $post['title']; ?>
                </td>
                <td>
                  <?php echo date('d/m/Y', strtotime($post['created_at'])); ?>
                </td>
                <td>
                  <a style="" href="post.php?post_id=<?php echo $post['post_id']; ?>" target="_blank">
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


</main>


<?php
include_once('components/public/footer.php');
?>