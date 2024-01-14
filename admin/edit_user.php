<?php
$pageInfo = array(
    'title' => 'Editar Aluno Existente',
    'description' => 'Edite o aluno no sistema',
    'pageName' => 'edit_student',
);

include_once('../components/admin/header.php');

if ($_SESSION['user_level'] != 'admin'){
    if (!isset($_SESSION['user_id'])){
        
    }
     header('Location: ../../login.php');
        exit;
   

        
}


$connection = connectDatabase();

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
                    <form action="requests/request_edit_student.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Insira o nome">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Insira o email">
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Insira a senha">
                        </div>

                        <label for="lang">Language</label>
                        <select name="user_level" id="lang">
                            <option value="javascript">comum</option>
                            <option value="admin">admin</option>
                            <option value="teacher">professor</option>

                        </select>

                        <button type="submit" class="btn btn-success mt-2">Publicar</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</main>

<?php
$currentPage = 'edit_user';
include_once('../components/admin/footer.php');
?>