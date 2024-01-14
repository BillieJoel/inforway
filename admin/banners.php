<?php

$pageInfo = array(
    'title' => 'Listagem de Banners da Pagina Inicial',
    'description' => 'Visualize e gerencie as imagens da pagina inicial.',
    'pageName' => 'banners',
);

include_once('../components/admin/header.php');

include_once('../helpers/database.php');

$connection = connectDatabase();

$query = "SELECT * FROM banners";

$result = mysqli_query($connection, $query);

$banners = array();

if (mysqli_num_rows($result) > 0) {
    $banners = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
            <a href="create_banner.php" class="btn btn-success my-2 my-sm-0 text-light">
                Adicionar uma nova imagem
            </a>
            <hr>

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?>" role="alert">
                    <?php echo $_SESSION['message']; ?>
                </div>
            <?php unset($_SESSION['message']);
            } ?>

<div class="col-md-9">
    
                    <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Imagem</th>
                                <th>Curso</th>
                                <th>Data de Registro</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($banners as $banner) { ?>

                                <tr>
                                    <td>
                                    <img src="../<?= $banner['image_banner']; ?>" alt="Imagem Existente" class="img-thumbnail mt-2"
                                style="max-width: 100px;">
                                    </td>
                                    <td>
                                    <?php 
                                       $course_id = $banner["course_id"];
                                       $query_course = "SELECT * FROM courses WHERE course_id = $course_id";
                                       $result_course = mysqli_query($connection, $query_course);
                                       
                                       if ($result_course) {
                                           // Verifica se há pelo menos uma linha retornada
                                           if (mysqli_num_rows($result_course) > 0) {
                                               // Obtém o primeiro resultado como um array associativo
                                               $course = mysqli_fetch_assoc($result_course);
                                               echo $course['name_course'];
                                           } else {
                                               echo "Curso não encontrado";
                                           }
                                       } else {
                                           // Tratar erro na consulta
                                           echo "Erro na consulta: " . mysqli_error($connection);
                                       }
                                        
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo date('d/m/Y', strtotime($banner['create_date'])); ?>
                                    </td>
                                    <td>
                                    <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                Ações
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                
                                                </li>

                                                <li>
                                                    <a class="dropdown-item " href="#"
                                            onclick="confirm('Você realmente deseja apagar esse curso?') ? window.location.href='requests/request_delete_banner.php?id=<?php echo $banner['id']; ?> ' : ''">
                                            <i class="bi bi-trash-fill"></i>excluir</a>
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
$currentPage = 'banners';
include_once('../components/admin/footer.php');
?>