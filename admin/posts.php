<?php
include_once('../components/admin/header.php');
include_once('../helpers/database.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background: #333;
            color: white;
            padding: 10px;
            text-align: center;
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
            cursor: pointer; /* Adiciona cursor ao elemento para indicar que é clicável */
        }

        .module-card img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 8px 8px 0 0;
        }

        .module-card-content {
            padding: 10px;
        }

        .module-card h3 {
            margin: 0;
            color: #007bff; /* Cor azul destacada */
            font-size: 16px; /* Tamanho de fonte aumentado */
            font-weight: bold; /* Texto em negrito para destaque */
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
    
    <!-- Conteúdo dos Módulos -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $course_id = $_GET['id'];
        $query = "SELECT * FROM modules WHERE course_id='$course_id'";
        $results = mysqli_query($connection, $query);
        $modules = array();
        if (mysqli_num_rows($results) > 0) {
            $modules = mysqli_fetch_all($results, MYSQLI_ASSOC);
        }
    }
    ?>

    <div class="slick-container">
        <div class="module-container">
            <!-- Verifica se $modules está definido e não é nulo antes do loop -->
            <?php if (!empty($modules)) : ?>
                <!-- Loop pelos módulos -->
                <?php foreach ($modules as $module) : ?>
                    <div class="module-card" onclick="redirectToAula(<?php echo $module['module_id']; ?>)">
                        <div class="dropdown-container">
                            <button class="dropdown-btn" onclick="toggleDropdown(event, 'dropdownMenu-<?php echo $module['module_id']; ?>')">Ações</button>
                            <ul class="dropdown-menu" id="dropdownMenu-<?php echo $module['module_id']; ?>">
                                <li>
                                    <a class="dropdown-item" href="#" onclick="confirm('Você realmente deseja apagar esse módulo?') ? window.location.href='requests/request_delete_module.php?id=<?php echo $module['module_id']; ?>' : ''">
                                        <i class="bi bi-trash-fill"></i> Excluir
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="edit_module.php?id=<?php echo $module['module_id']; ?>">
                                        <i class="bi bi-sliders"></i> Editar
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <img src="<?php echo $module['thumbnail_url']; ?>" alt="<?php echo $module['title']; ?>">
                        <div class="module-card-content">
                            <h3><?php echo $module['title']; ?></h3>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Nenhum módulo encontrado.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Botão Adicionar Módulo -->
    <div class="add-module-button">
        <a href="create_module.php?id=<?php echo $course_id; ?>">Adicionar Módulo</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
    $(document).ready(function(){
        $('.module-container').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 4, // Altere para o mesmo valor que slidesToShow para carregar todos de uma vez
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

    window.onclick = function (event) {
        var dropdowns = document.getElementsByClassName('dropdown-menu');
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.style.display === 'block' && !openDropdown.contains(event.target)) {
                openDropdown.style.display = 'none';
            }
        }
    };
</script>

    <?php include_once('../components/admin/footer.php'); ?>
</body>
</html>
