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
            <?php if($_SESSION['user_level'] == 'admin'){ ?>
            <th>Ações</th>
            <?php }?>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($modules as $module) : ?>
            <tr class="button-list" onclick="redirectPage('<?php echo $module['module_id']; ?>')">
              <td>
                <img style="width: 150px;" id="imagem-preview"  src="<?php echo  $module['thumbnail_url'] ?>" class="img-fluid mb-3" onerror="substituirImagem(this)">
              </td>
              <td><?php echo $module['title'] ?></td>
              <td><?php echo $module['description'] ?></td>
              <td><?php echo $module['date_post'] ?></td>
            
              <?php if($_SESSION['user_level'] == 'admin'){ ?>
              <td>
              
              <div class="dropdown">
                  <button class="btn btn-sm btn-secondary module-action-button" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" onclick="handleButtonClick(event)">
                    Ações
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                      <a class="dropdown-item " href="../admin/edit_module.php?id=<?php echo $module['module_id']; ?>">
                        <i class="bi bi-sliders"></i>editar
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item " href="#" onclick="confirm('Você realmente deseja apagar esse modulo?') ? window.location.href='requests/request_delete_module.php?id=<?php echo $module['module_id']; ?>' : ''">
                        <i class="bi bi-trash-fill"></i>excluir
                      </a>
                    </li>

                  </ul>
                </div>
              
              </td>
               <?php } ?>
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
function redirectPage(courseId) {
    window.location.href = "aula.php?id=" + courseId;
}

function handleButtonClick(event) {
    event.stopPropagation();
}
</script>
