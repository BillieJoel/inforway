<?php
include_once('../components/admin/header.php');


$pageInfo = array(
  'title' => 'Pagina inicial - Inforway',
  'description' => 'Seja bem-vindo(a) ao Inforway.',
  'pageName' => 'index',
);

$pageName = $pageInfo['pageName'];
?>

<footer class="w3-footer w3-blue w3-center w3-padding-16">
<section id="blog" class="blog py-5">
    <div class="container">
      <h2 class="text-center mb-4">cursos</h2>
      <div class="row">
<div class="col-md-2 mb-4">
          <div class="card2 ">
            <img src="src/img/12-min.png" class="card-img-top" alt="Bóbó de Camarão">
            <div class="card-body">
              <h5 class="card-title">
                php
              </h5>
              
             
            </div>
          </div>
        </div>

        <div class="col-md-2 mb-4">
          <div class="card2">
            <img src="src/img/12-min.png" class="card-img-top" alt="Bolo de Cenoura">
            <div class="card-body">
              <h5 class="card-title">
                Bolo de Cenoura
              </h5>
            
              
            </div>
          </div>
        </div>

        <div class="col-md-2 mb-4">
          <div class="card2 ">
            <img src="src/img/12-min.png" class="card-img-top" alt="Farinha de Mandioca">
            <div class="card-body">
              <h5 class="card-title">
                Farinha de Mandioca
              </h5>
             
             
            </div>
          </div>
        </div>

        <div class="col-md-2 mb-4">
          <div class="card2 ">
            <img src="src/img/12-min.png" class="card-img-top" alt="Arroz de Pato">
            <div class="card-body">
              <h5 class="card-title">
                Arroz de Pato
              </h5>
              
             
            </div>
          </div>
        </div>

        <div class="col-md-2 mb-4">
          <div class="card2">
            <img src="src/img/12-min.png" class="card-img-top" alt="Sopa de Legumes">
            <div class="card-body">
              <h5 class="card-title">
                Sopa de Legumes
              </h5>
             
             
            </div>
          </div>
        </div>
        <div class="col-md-2 mb-4">
          <div class="card2">
            <img src="src/img/12-min.png" class="card-img-top" alt="Sopa de Legumes">
            <div class="card-body">
              <h5 class="card-title">
                Sopa de Legumes
              </h5>
             
             
            </div>
          </div>
        </div>

      </div>
      <div class="text-center mt-4">
        <a href="todas-as-postagens.html" class="btn btn-lg btn-outline-primary">Ver Todas as Postagens</a>
      </div>
    </div>
  </section>
  </div>
  


<?php
$currentPage = 'index';
include_once('../components/admin/footer.php');
?>