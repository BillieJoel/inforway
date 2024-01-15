<?php
include_once('../components/admin/header.php');

$pageInfo = array(
  'title' => 'Página inicial - Inforway',
  'description' => 'Seja bem-vindo(a) ao Inforway.',
  'pageName' => 'posts.php',
);

include_once('../helpers/database.php');
$connection = connectDatabase();
$courses = array();
$teachers = array();
$user_id = $_SESSION["user_id"];

if ($_SESSION['user_level'] == "admin") {
  $query_courses = "SELECT * FROM courses";
  $result_courses = mysqli_query($connection, $query_courses);

  if (mysqli_num_rows($result_courses) > 0) {
    $courses = mysqli_fetch_all($result_courses, MYSQLI_ASSOC);

    $query_teachers = "SELECT * FROM teachers";
    $result_teachers = mysqli_query($connection, $query_teachers);

    if (mysqli_num_rows($result_teachers) > 0) {
      $teachers = mysqli_fetch_all($result_teachers, MYSQLI_ASSOC);
    } else {
      header("Location: ../erro404.php");
    }
  }
} else {
  $query_teachers = "SELECT * FROM teachers WHERE user_id = '$user_id'";
  $result_teachers = mysqli_query($connection, $query_teachers);

  if (mysqli_num_rows($result_teachers) > 0) {
    $teachers = mysqli_fetch_all($result_teachers, MYSQLI_ASSOC);

    foreach ($teachers as $teacher) {
      $course_ids[] = $teacher['course_id'];
    }

    if (!empty($course_ids)) {
      $course_ids_str = implode(',', $course_ids);
      $query_courses = "SELECT * FROM courses WHERE course_id IN ($course_ids_str)";
      $result_courses = mysqli_query($connection, $query_courses);

      if (mysqli_num_rows($result_courses) > 0) {
        $courses = mysqli_fetch_all($result_courses, MYSQLI_ASSOC);
      } else {
        header("Location: ../erro404.php");
      }
    }
  } else {
    header("Location: ../erro404.php");
  }
}

$query_users = "SELECT * FROM users";
$result_users = mysqli_query($connection, $query_users);

if (mysqli_num_rows($result_users) > 0) {
  $users = mysqli_fetch_all($result_users, MYSQLI_ASSOC);

  $pageName = $pageInfo['pageName'];
}
?>

<section class="col-md-9">
  <hr>

  <div class="card">
    <div class="card-body">
      <table class="table table-hover table-striped">
        <thead>
          <?php if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['message_type'] ?>" role="alert">
              <?php echo $_SESSION['message']; ?>
            </div>
            <?php unset($_SESSION['message']);
          endif; ?>
          <tr>
            <th>Imagem</th>
            <th>Professores</th>
            <th>Carga horária</th>
            <th>Data de criação</th>
            <th>Curso</th>
            <th>Id</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($courses as $course) : ?>
            <tr class="button-list" onclick="redirectPage('<?php echo $course['course_id']; ?>')">
              <td><img src="<?php echo "../" . $course['image_course']; ?>" alt="erro404" width="200" height="100"></td>
              <?php
              $teacherNames = array();
              foreach ($teachers as $teacher) {
                if ($course['course_id'] == $teacher['course_id']) {
                  foreach ($users as $user) {
                    if ($teacher['user_id'] == $user['user_id']) {
                      $teacherNames[] = $user['user_name'];
                    }
                  }
                }
              }
              ?>
              <td><?php echo implode(', ', $teacherNames); ?></td>
              <td><?php echo $course['time_course'] . "H" ?></td>
              <td><?php echo date('d/m/Y', strtotime($course['created_course'])); ?></td>
              <td><?php echo $course['name_course'] ?></td>
              <td><?php echo $course['course_id'] ?></td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="handleButtonClick(event)">
                    Ações
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                      <a class="dropdown-item" href="#" onclick="confirm('Você realmente deseja apagar esse curso?') ? window.location.href='requests/request_delete_course.php?id=<?php echo $course['course_id']; ?>' : ''">
                        <i class="bi bi-trash-fill"></i>excluir
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="edit_course.php?id=<?php echo $course['course_id']; ?>">
                        <i class="bi bi-sliders"></i>editar
                      </a>
                    </li>
                  </ul>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
          <a href="../admin/create_course.php" class="btn btn-success my-2 my-sm-0 text-light">Adicionar novo curso</a>
        </tbody>
      </table>
    </div>
  </div>
</section>

<script>
  function redirectPage(courseId) {
    window.location.href = "posts.php?id=" + courseId;
  }

  function handleButtonClick(event) {
    event.stopPropagation(); 
  }
</script>

<?php
$currentPage = 'posts';
include_once('../components/admin/footer.php');
?>
