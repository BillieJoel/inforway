<?php

// Informações da página para SEO
$pageInfo = array(
    'title' => 'Página não encontrada - Inforway',
    'description' => 'A página que você está procurando não foi encontrada.',
    'pageName' => '404',
);

$pageName = $pageInfo['pageName'];

// Inclui o cabeçalho da página
include_once(__DIR__ . '/components/public/header.php');
?>

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Ops! Página não encontrada</h2>
                    <p class="text-center">A página que você está procurando pode ter sido removida ou está temporariamente indisponível.</p>
                    <img src="css/Inforway/ERRO_404.png" alt="Erro 404" class="img-fluid d-block mx-auto">
                    <div class="text-center mt-3">
                        <a href="index.php" class="btn btn-color1">Voltar para a página inicial</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
// Inclui o rodapé da página
include_once(__DIR__ . '/components/public/footer.php');
?>