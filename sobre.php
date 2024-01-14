<?php

$pageInfo = array(
 'title' => 'Sobre - Inforway',
 'description' => 'Saiba mais sobre Inforway.',
 'pageName' => 'sobre',
);

$pageName = $pageInfo['pageName'];
include_once(__DIR__ . '/components/public/header.php');
?>

<!-- Sobre -->

<main class="containers">
  <div class="card">
    <h1 class="text-center mt-3 p-2">
      Sobre
    </h1>
    <div class="paragrafos p-2">
      <p class="">
        Somos uma plataforma focada em proporcionar um experiência
        de aprendizado excepcional em tecnologia da Informação.<br>
        Em um cenário de constante evolução tecnológica, nossos cursos surgem
        como uma resposta dinámica às demandas crescentes a por profissionais capacitados
        na área da tecnologia. <br> Nosso programa educacional visa preparar individuos
        para os desafios do mundo digital. <br> Explore o nosso catálogo diversificado de cursos
        e mergulhe no que há de melhor para impulsionar a sua carreira.</p>
    </div>
  </div>

</main>


<main class="containers">
  <div class="card-equipe">
    <h1 class="mt-3 p-2">
      Equipe
    </h1>
    <div class="paragrafos2 p-2">
      <p class="">
        Central para o sucesso de nosso projeto é uma equipe dedicada e especializada.
        Contamos com profissionais experientes em hardware, desenvolvimento de sistemas,<br>
        e especialistas em diversas linguagens de programação.<br> Nossa equipe é apaixonada
        por compartilhar conhecimento<br> e orientar os alunos em sua jornada de aprendizado.
      </p>
    </div>
  </div>
</main>
<div class="imagex">
  <img src="src/img/HTMLCSSJAVA.jpeg" alt="imgequipe" class="w-50" style="box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);">
</div>

<?php
include_once(__DIR__ . '/components/public/footer.php');
?>