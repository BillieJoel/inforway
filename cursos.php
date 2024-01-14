<?php

$pageInfo = array(
 'title' => 'Cadastro - Inforway',
 'description' => 'Cadastre-se no Inforway.',
 'pageName' => 'register',
);

$pageName = $pageInfo['pageName'];
include_once(__DIR__ . '/components/public/header.php');
?>

<!-- Sobre -->

<main class="container-curso">
  <div class="textcurso mb-5">
    <h1 class="mt-3">
      Cursos
    </h1>
  </div>
  <div class="row">
    <div class="card-curs col-md-4">
      <h4>
        Informática básica:<br>Word, Excel & Powerpoint
      </h4>
      <div class="cursoimg">
        <img class="curso-img mb-2" src="src/img/ICONS/INFORMÁTICA BÁSICA.png" alt="informaticabasica">
      </div>
      <p>
        A Informática básica te possibilita desenpenhar diferentes tarefas em diversos cargos.
        Dessa forma você aumenta as possibilidades no mercado de trabalho
      </p>
      <ul>
        <li>
          Com o Word, você pode criar qualquer tipo de documento que envolva textos, quadrinhos, revistas, panfletos,
          jornais, etc. Além disso, você pode enriquecer o seu documento, utilizando tabelas, gráficos, imagens, índices
          e muitos outros recursos.
        </li>
        <li>
          Quando se trata de planilhas eletrônicas, o Excel é, sem dúvida, um dos programas mais utilizados no mundo!
          Essa ferramenta é cheia de funcionalidades que facilitam muito o uso de cálculos matemáticos.
        </li>
        <li>
          Com o PowerPoint, você pode criar e gerenciar uma apresentação trabalhando com elementos gráficos
        </li>
      </ul>
      <div class="button mb-3">
        <?php
        if (!isset($_SESSION['user_id'])) {
        ?>
          <a type="button" class="btn btn-crs" href="login.php">Logar</a>
        <?php
        } else { ?>
          <a type="button" class="btn btn-crs" href="teladepagamento.php">Comprar</a>
        <?php
        }
        ?>
      </div>
    </div>
    <div class="card-curs col-md-4">
      <h4>
        HTML5, CSS & JAVASCRIPT:
      </h4>
      <div class="cursoimg">
        <img class="curso-img mb-2" src="src/img/ICONS/HTML5.png" alt="informaticabasica">
      </div>
      <p>
        Neste curso, você irá aprender os fundamentos para trabalhar com o desenvolvimento para a Web,
        aprendendo a usar HTML, CSS e JavaScript para criar sites e aplicativos da Web,
        que são utilizados nos aplicativos nativos e executados em seu navegador de Internet.
      </p>
      <ul>
        <li>
          Com o Word, você pode criar qualquer tipo de documento que envolva textos, quadrinhos, revistas, panfletos,
          jornais, etc. Além disso, você pode enriquecer o seu documento, utilizando tabelas, gráficos, imagens, índices
          e muitos outros recursos.
        </li>
        <li>
          Quando se trata de planilhas eletrônicas, o Excel é, sem dúvida, um dos programas mais utilizados no mundo!
          Essa ferramenta é cheia de funcionalidades que facilitam muito o uso de cálculos matemáticos.
        </li>
        <li>
          Com o PowerPoint, você pode criar e gerenciar uma apresentação trabalhando com elementos gráficos
        </li>
      </ul>
      <div class="button mb-3">
        <?php
        if (!isset($_SESSION['user_id'])) {
        ?>
          <a type="button" class="btn btn-crs" href="login.php">Logar</a>
        <?php
        } else { ?>
          <a type="button" class="btn btn-crs" href="teladepagamento.php">Comprar</a>
        <?php
        }
        ?>
      </div>
    </div>
    <div class="card-curs col-md-4">
      <h4>
        Java Script: Avançado
      </h4>
      <div class="cursoimg">
        <img class="curso-img mb-2" src="src/img/ICONS/JAVASCRIPT.png" alt="informaticabasica">
      </div>
      <p>
        Javascript avançado é um dos conhecimentos mais desejados pelas empresas,
        e elas estão literalmente disputando por profissionais que saibam usa-lo.
        Ainda assim muitas empresas têm dificuldades em encontrar pessoas qualificadas.</p>
      <ul>
        <li>
          Poderá criar aplicações web interativas e dinâmicas que podem ser acessadas por milhões de pessoas em todo o mundo</li>
        <li>
          JavaScript aprofundado
        </li>
        <li>
          Referências API Web, etc
        </li>
      </ul>
      <div class="button mb-3">
        <?php
        if (!isset($_SESSION['user_id'])) {
        ?>
          <a type="button" class="btn btn-crs" href="login.php">Logar</a>
        <?php
        } else { ?>
          <a type="button" class="btn btn-crs" href="teladepagamento.php">Comprar</a>
        <?php
        }
        ?>
      </div>
    </div>
    <div class="card-curs col-md-4 mt-5">
      <h4>
        Logica de programação: Iniciante
      </h4>
      <div class="cursoimg">
        <img class="curso-img mb-2" src="src/img/ICONS/LÓGICA DE PROGRAMAÇÃO.png" alt="informaticabasica">
      </div>
      <p>
        Neste curso, vamos apresentar conceitos de programação para você iniciar sua vida profissional em uma das áreas mais bem pagas atualmente,
        incluindo uma introdução ao desenvolvimento de projetos profissionais utilizando a linguagem de programação
        com o conceito de orientação a objetos por meio da lógica.
      </p>
      <p>
        O que você vai aprender:
      </p>
      <ul>
        <li>
          <strong>Algoritmos:</strong> Aprendizado sobre algoritmos, que são sequências de passos bem definidos para realizar uma tarefa ou resolver um problema.
        </li>
        <li>
          <strong>Variáveis e Tipos de Dados:</strong> Compreensão de como armazenar e manipular dados usando variáveis e tipos de dados, como inteiros, números de ponto flutuante, strings,
        </li>
        <li>
          <strong>Estruturas de Controle:</strong> Estudo de estruturas de controle de fluxo, incluindo condicionais (if, else) e loops (for, while), que controlam a execução de instruções com base em condições.
        </li>
      </ul>
      <div class="button mb-3">
        <?php
        if (!isset($_SESSION['user_id'])) {
        ?>
          <a type="button" class="btn btn-crs" href="login.php">Logar</a>
        <?php
        } else { ?>
          <a type="button" class="btn btn-crs" href="teladepagamento.php">Comprar</a>
        <?php
        }
        ?>
      </div>
    </div>
    <div class="card-curs col-md-4">
      <h4>
        Hardware:
      </h4>
      <div class="cursoimg">
        <img class="curso-img mb-2" src="src/img/ICONS/HARDWARE.png" alt="informaticabasica">
      </div>
      <p>
        Neste curso, você irá aprender todo fundamento tecnico para instalação e reparos de dispositivos
        de hardware e Software, e soluções de problemas mais comuns.
      </p>
      <p>
        O que você irá aprender:
      </p>
      <ul>
        <li>
          Manutenção preventiva e corretiva
        </li>
        <li>
          Bancada de teste com periféricos
        </li>
        <li>
          Formatação e instalação de sistemas
        </li>
        <li>
          Manutenção preventiva e corretiva
        </li>
        <li>
          E muito mais...
        </li>
      </ul>
      <div class="button mb-3">
        <?php
        if (!isset($_SESSION['user_id'])) {
        ?>
          <a type="button" class="btn btn-crs" href="login.php">Logar</a>
        <?php
        } else { ?>
          <a type="button" class="btn btn-crs" href="teladepagamento.php">Comprar</a>
        <?php
        }
        ?>
      </div>
    </div>
    <div class="card-curs col-md-4">
      <h4>
        PHP e PHP POO
      </h4>
      <div class="cursoimg">
        <img class="curso-img mb-2" src="src/img/ICONS/PHP POO.png" alt="informaticabasica">
      </div>
      <p>
        Aprenda a desenvolver explicação do web utilizando a função PHP.
        É um curso indicado para quem deseja iniciar um carreira na área de programação,
        com uma linguagem de facil aprendizagem. <br> A POO promove a reutilização de código, modularidade,
        legibilidade e manutenibilidade do código, sendo suportada pela linguagem PHP dentre outras.
      </p>
      <p>O que você vai aprender: </p>
      <ul>
        <li>
          Estrutura de codigo
        </li>
        <li>
          Interação com banco de dados
        </li>
        <li>
          Linguagem de marcação de conteúdo
        </li>
        <li>
          E muito mais...
        </li>
      </ul>
      <div class="button mb-3">
        <?php
        if (!isset($_SESSION['user_id'])) {
        ?>
          <a type="button" class="btn btn-crs" href="login.php">Logar</a>
        <?php
        } else { ?>
          <a type="button" class="btn btn-crs" href="teladepagamento.php">Comprar</a>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</main>


<?php
include_once(__DIR__ . '/components/public/footer.php');
?>