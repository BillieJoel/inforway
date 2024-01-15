<?php
include_once('../components/admin/header.php');
$pageInfo = array(
  'title' => 'Página inicial - Inforway',
  'description' => 'Seja bem-vindo(a) ao Inforway.',
  'pageName' => 'posts.php',
);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $course_id = $_GET['id'];
  $pageName = $pageInfo['pageName'];
  $query = "SELECT * FROM modules WHERE course_id='$course_id'";
  $results = mysqli_query($connection, $query);
  $modules = array();
  if (mysqli_num_rows($results) > 0) {
    $modules = mysqli_fetch_all($results, MYSQLI_ASSOC);
  }
}
?>

<section class="col-md-9">
  <hr>
  <div class="card">
    <div class="card-body">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th>Imagem</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Data de postagem</th>
            <th>Curso</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($modules as $module) : ?>
            <tr>
              <td>
                <img style="width: 150px;" id="imagem-preview"  src="<?php echo "../" . $module['tumb'] ?>" class="img-fluid mb-3" onerror="substituirImagem(this)">
              </td>
              <td><?php echo $module['title'] ?></td>
              <td><?php echo $module['description'] ?></td>
              <td><?php echo $module['date_post'] ?></td>
              <td><?php echo $course_id; ?></td> <!-- Aqui você precisa ajustar para obter o nome do curso, pois $course não está definido no código fornecido -->
              <td>
                <div class="dropdown">
                  <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Ações
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                      <a class="dropdown-item " href="#" onclick="confirm('Você realmente deseja apagar esse banner?') ? window.location.href='requests/request_delete_banner.php?id=<?php echo $banner['id']; ?>' : ''">
                        <i class="bi bi-sliders"></i>editar
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item " href="#" onclick="confirm('Você realmente deseja apagar esse banner?') ? window.location.href='requests/request_delete_banner.php?id=<?php echo $banner['id']; ?>' : ''">
                        <i class="bi bi-trash-fill"></i>excluir
                      </a>
                    </li>
                  </ul>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <a href="../admin/create_module.php?id=<?php echo $course_id; ?>" class="btn btn-success my-2 my-sm-0 text-light">Adicionar módulo ao curso </a>
    </div>
  </div>
</section>

<?php
$currentPage = 'posts';
include_once('../components/admin/footer.php');
?>

<script>
  function substituirImagem(imagem) {
    imagem.src = "../src/img/ERRO_404.png";
  }
</script>
