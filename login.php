<?php

 $pageInfo = array(
  'title' => 'Login - Chef em Casa',
  'description' => 'Entre em contato com a equipe do Chef em Casa.',
  'pageName' => 'contact',
);

$pageName = $pageInfo['pageName'];

include_once(__DIR__ . '/components/public/header.php');
?>

<main class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="card-regi">
        <div class="card-body-reg">
          <h2 class="text-center mb-4">Bem-vindo de volta!</h2>

          <?php 
            if(isset($_SESSION['login_error'])){
          ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $_SESSION['login_error']; ?>
            </div>
            <?php unset($_SESSION['login_error']);
            } ?>
          <!-- Formulário de Login -->
          <form action="requests/request_login.php" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Senha</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-request btn-block">Entrar</button>
          </form>
          <div class="text-center mt-3">
            <p>Não tem uma conta? <a href="register.php">Cadastre-se aqui.</a></p>
          </div>
        </div>
        <div class="text-center mt-3">
          <a href="#">Esqueceu a senha?</a>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
  include_once(__DIR__ . '/components/public/footer.php');
?>