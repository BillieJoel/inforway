<?php
$pageInfo = array(
    'title' => 'Listagem de Usuários',
    'description' => 'Visualize e gerencie os usuários cadastrados no Inforway.',
    'pageName' => 'users',
);

include_once('../components/admin/header.php');

include_once('../helpers/database.php');

$connection = connectDatabase();

$query = "SELECT user_id, user_name, email, about, image_profile, user_level, create_date FROM users;";

$result = mysqli_query($connection, $query);

$users = array();

if (mysqli_num_rows($result) > 0) {
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
            <a href="create_student.php" class="btn btn-success my-2 my-sm-0 text-light">
                Adicionar novo usuário
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
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Nível</th>
                                <th>Data de Registro</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($users as $user) { ?>

                                <tr>
                                    <td>
                                        <?php echo $user['user_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $user['email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $user['user_level']; ?>
                                    </td>
                                    <td>
                                        <?php echo date('d/m/Y', strtotime($user['create_date'])); ?>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                Ações
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li>
                                                    <a class="dropdown-item" href="edit_student.php?id=<?= $user['user_id'] ?>"><i class="bi bi-pencil-square"></i>
                                                        Editar</a>
                                                </li>

                                                <li>
                                                    <a class="dropdown-item text-danger" href="requests/request_delete_student.php?id=<?= $user['user_id'] ?>"><i class="bi bi-trash-fill"></i>
                                                        Excluir</a>
                                                </li>
                                            </ul>
                                        </div>

                                    </td>
                                </tr>
                            <?php } ?>
                            <!-- Adicione mais linhas conforme necessário -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</main>

<?php
$currentPage = 'users';
include_once('../components/admin/footer.php');
?>