<?php
include_once('../components/admin/header.php');
$pageInfo = array(
    'title' => 'Pagina inicial - Inforway',
    'description' => 'Seja bem-vindo(a) ao Inforway.',
    'pageName' => 'posts.php',
  );
  
  $pageName = $pageInfo['pageName'];
?>
  <section class="col-md-9">
           
  <hr>
  <div class="card">
      <div class="card-body">
          <table class="table table-hover table-striped">
              <thead>
                
                  <tr>
                      <th>Imagem</th>
                      <th>professor</th>
                      <th>alunos</th>
                      <th>carga horaria</th>
                      <th>Data de criação</th>
                      <th>Curso</th>
                      <th>Ações</th>
                  </tr>

              </thead>
              <tbody>
                  
                      <tr>
                      <td><img src=" " alt="erro404" width="200" height="100"></td>
                          
                          <td><?php echo$professor?></td>
                          <td><?php echo$alunos?></td>
                          <td> <?php echo$time?></td>
                          <td><?php echo$date?></td>
                          <td><?php echo$course?></td>
                         
                          <td>
                          <li>
                                                    <a class="dropdown-item " href="#"
                                            onclick="confirm('Você realmente deseja apagar esse banner?') ? window.location.href='requests/request_delete_banner.php?id=<?php echo $banner['id']; ?> ' : ''">
                                            <i class="bi bi-trash-fill"></i>excluir</a>
                                                
                                          </li>
                                          <li>
                                                    <a class="dropdown-item " href="#"
                                            onclick="confirm('Você realmente deseja apagar esse banner?') ? window.location.href='requests/request_delete_banner.php?id=<?php echo $banner['id']; ?> ' : ''">
                                            <i class="bi bi-trash-fill"></i>editar</a>
                                                                                   </li>
                                         
                             
                          
                          </td>
                          
                           <a href="../admin/create_banner.php" class="btn btn-success my-2 my-sm-0 text-light">Adicionar novo banner </a>
                      </tr>
                 
                  
              </tbody>
          </table>
      </div>
  </div>
</section>
  ?>



<?php
$currentPage = 'posts';
include_once('../components/admin/footer.php');
?>