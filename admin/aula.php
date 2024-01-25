<?php
$pageInfo = array(
    'title' => 'Listagem de Banners da Pagina Inicial',
    'description' => 'Visualize e gerencie as imagens da pagina inicial.',
    'pageName' => 'banners',
);

include_once('../components/admin/header.php');
include_once('../helpers/database.php');

$connection = connectDatabase();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $module_id = $_GET["id"];
}

$query = "SELECT * FROM modules WHERE module_id='$module_id'";
$result = mysqli_query($connection, $query);

if ($result) {
    $module = mysqli_fetch_assoc($result);
}
?>
<p><?php echo $module['title'] ?></p>
<iframe src="<?php echo"https://www.youtube.com/embed/". $module['video_url']; ?> " frameborder="0"></iframe>
    <p><?php echo $module['description'] ?></p>

<?php
$currentPage = 'aula';
include_once('../components/admin/footer.php');
?>
