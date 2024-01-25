<?php
$pageInfo = array(
    'title' => 'Meu Perfil',
    'description' => 'Visualize e gerencie suas informações de perfil.',
    'pageName' => 'profile',
);
include_once('../helpers/database.php');
    $connection = connectDatabase();
include_once('../components/admin/header.php');

$user_id = $_SESSION['user_id'];

// Busca as informações do usuário logado no banco de dados
$query = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($connection, $query);

// Verifica se a consulta retornou algum resultado
if (mysqli_num_rows($result) > 0) {
    // Transforma o resultado em um array associativo
    $user = mysqli_fetch_assoc($result);

    // Atribui os valores do array às variáveis
    $name = $user['user_name'];
    $email = $user['email'];
    $about = $user['about'];
    $image = $user['image_profile'];
} else {
    // Redireciona para a página de login
    header('Location: ../login.php');
    exit;
}


?>

<!-- Conteúdo da página de perfil -->

<main class="container py-5">
    <div class="row">
        <!-- Sidebar do dashboard -->
        <div class="col-md-3">
            <?php
            include_once('../components/admin/menu_sidebar.php');
            ?>
        </div>
        <!-- Informações do perfil -->
        <div class="col-md-9">
        <div class="row">
            <section class="col-md-4">
                <div class="card-profile">
                    <div class="card-body">
                        <?php
                        // Verifica se a imagem do perfil contém o valor src 
                        // (ou seja, se o usuário já fez upload de uma imagem)

              
                        ?>
                        <img id="imagem-preview" src="<?php echo"../". $image?>" class="img-fluid mb-3" onerror="substituirImagem(this)">
                           
                        
                      
                        <h5>
                            <?php echo $name ?>
                        </h5>
                        <p>
                            <?php echo $about ?>
                        </p>
                        <p>
                            <?php echo $email ?>
                        </p>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="card-body-profile">
                        <form action="requests/request_edit_profile.php" method="post" enctype="multipart/form-data">
                            <?php if (isset($_SESSION['login_error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $_SESSION['login_error']; ?>
                                </div>
                            <?php unset($_SESSION['login_error']);
                            } ?>
                            <div class="form-group">
                                <label for="image">Foto de Perfil</label>
                                <input type="file" id="imagem" name="image_profile" accept="image/*" onchange="preverImagem()">
                               
                            </div>
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" id="name" name="user_name" placeholder="<?php echo $name ?>">
                            </div>
                            <div class="form-group">
                                <label for="about">Sobre</label>
                                <textarea class="form-control" id="about" rows="3" name="about" placeholder="<?php echo $about ?>"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="email">Endereço de Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo $email ?>"  >
                            </div>
                            <div class="form-group">
                                <label for="password">Nova Senha</label>
                                <input type="password" class="form-control" id="password" name="password_new">
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Confirme a Nova Senha</label>
                                <input type="password" class="form-control" id="password-confirm" name="password_new_2">
                            </div>

                            <button type="submit" class="btn btn-prf">Salvar Alterações</button>
                        </form>
                    </div>
                </div>
            </section>

        </div>
</main>

<?php
$currentPage = 'index';
include_once('../components/admin/footer.php');
?>
<script>
    function preverImagem() {
        var input = document.getElementById('imagem');
        var previewContainer = document.getElementById('preview-container');
        var imagemPreview = document.getElementById('imagem-preview');

        if (input.files && input.files[0]) {
            var leitor = new FileReader();

            leitor.onload = function (e) {
                imagemPreview.src = e.target.result;
                previewContainer.style.display = 'block';
            };

            leitor.readAsDataURL(input.files[0]);
        }
    }

    function substituirImagem(imagem) {
        imagem.src = "../src/img/ERRO_404.png";
    }
</script>