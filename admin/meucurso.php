<?php


// Informações da página
$pageInfo = array(
    'title' => 'Meus Cursos',
    'description' => 'Visualize seus cursos ativos.',
    'pageName' => 'mycourses',
);

// Inclusão do cabeçalho
include_once('../components/admin/header.php');

// Inclusão do arquivo de conexão com o banco de dados
include_once('../helpers/database.php');

// Obtendo o ID do usuário da sessão
$user_id = $_SESSION['user_id'];

// Conexão com o banco de dados
$connection = connectDatabase();

// Sanitizando a entrada do usuário
$user_id = mysqli_real_escape_string($connection, $user_id);

// Selecionando cursos comprados pelo usuário
$query_user = "SELECT * FROM students WHERE user_id = '$user_id'";
$result_users = mysqli_query($connection, $query_user);

$mycourses = array();

foreach ($result_users as $result_user) {
    $course_id = $result_user["course_id"];
    $query = "SELECT * FROM modules WHERE course_id='$course_id'";
    $results = mysqli_query($connection, $query);
    $modules = array();

    if (mysqli_num_rows($results) > 0) {
        $modules = mysqli_fetch_all($results, MYSQLI_ASSOC);
    }
?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Módulos - Seu Site</title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
        <style>
            body {
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }



            .slick-container {
                width: 80%;
                margin: 20px auto;
            }

            .module-card {
                position: relative;
                width: 200px;
                margin: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                overflow: hidden;
                background-color: white;
                cursor: pointer;
                /* Adiciona cursor ao elemento para indicar que é clicável */
            }

            .module-card img {
                width: 100%;

                border-radius: 8px 8px 0 0;
            }

            .module-card-content {
                padding: 10px;
            }

            .module-card h3 {
                margin: 0;
                color: #007bff;
                /* Cor azul destacada */
                font-size: 16px;
                /* Tamanho de fonte aumentado */
                font-weight: bold;
                /* Texto em negrito para destaque */
            }

            .title h3 {
                margin: 0;
    color: #007bff;
    font-size: 24px; /* Ajuste o tamanho da fonte conforme necessário */
    font-weight: bold;
    display: flex;
    justify-content: center;
    align-items: center;
            }

            .add-module-button {
                display: flex;
                justify-content: center;
                margin-top: 20px;
            }

            .add-module-button a {
                background-color: #007bff;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block; /* Evitar que o botão ocupe toda a largura */
}
            

            .dropdown-container {
                position: absolute;
                top: 5px;
                left: 5px;
            }

            .dropdown-btn {
                background-color: #007bff;
                color: white;
                padding: 5px 10px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .dropdown-menu {
                display: none;
                position: absolute;
                background-color: #fff;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                z-index: 1;
            }

            .dropdown-menu a {
                display: block;
                padding: 10px;
                text-decoration: none;
                color: #333;
            }
        </style>
    </head>

    <body>
        <!-- Cabeçalho -->

        <main class="container py-5 mb-2">
            <div class="row">
                <!-- Sidebar do dashboard -->
                <div class="col-md-3">
                    <?php include_once('../components/admin/menu_sidebar.php'); ?>
                </div>

                <div class="col-md-9 ">
                    <?php
                    $query_user = "SELECT * FROM courses WHERE course_id = $course_id";
                    $result_users = mysqli_query($connection, $query_user);

                    if ($result_users) {
                        $course_data = mysqli_fetch_assoc($result_users);
                    ?><div class="title">
                            <h3><?php echo $course_data["name_course"]; ?></h3>
                        </div>

                    <?php
                    } else {
                        // Tratar erros na consulta, se necessário
                        echo "Erro na consulta: " . mysqli_error($connection);
                    }


                    ?>
                    <div class="slick-container">
                        <div class="module-container">

                            <?php
                            if (!empty($modules)) :
                                // Loop pelos módulos
                                foreach ($modules as $module) :

                                    // Verificando se a consulta foi bem-sucedida

                            ?>
                                    <div class="module-card" onclick="redirectToAula(<?php echo $module['module_id']; ?>)">
                                        <img src="<?php echo $module['thumbnail_url']; ?>" alt="<?php echo $module['title']; ?>">
                                        <div class="module-card-content">
                                            <h3><?php echo $module['title']; ?></h3>
                                        </div>
                                    </div>
                            <?php
                                endforeach;
                            else :
                                echo "<p>Nenhum módulo encontrado.</p>";
                            endif;
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.module-container').slick({
                    infinite: true,
                    slidesToShow: 4,
                    slidesToScroll: 4,
                });
            });

            function redirectToAula(moduleId) {
                window.location.href = 'aula.php?id=' + moduleId;
            }

            function toggleDropdown(event, dropdownId) {
                event.stopPropagation();
                var dropdownMenu = document.getElementById(dropdownId);
                dropdownMenu.style.display = dropdownMenu.style.display === 'none' ? 'block' : 'none';
            }

            window.onclick = function(event) {
                var dropdowns = document.getElementsByClassName('dropdown-menu');
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.style.display === 'block' && !openDropdown.contains(event.target)) {
                        openDropdown.style.display = 'none';
                    }
                }
            };
        </script>
    </body>

    </html>
<?php
}

// Inclusão do rodapé

// Página atual
$currentPage = 'mycourses';

// Inclusão do rodapé
include_once('../components/admin/footer.php');
?>