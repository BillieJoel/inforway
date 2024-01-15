<?php
include_once('../components/admin/header.php');
include_once('../helpers/database.php');

$connection = connectDatabase();

$query = "SELECT * FROM courses";

$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    $banners = mysqli_fetch_all($result, MYSQLI_ASSOC);
}



    
?>

<div class="card mt-3">
    <div class="card-body">
        <form action="requests/request_create_banner.php" method="post" enctype="multipart/form-data">
        <label for="imagem">Escolha uma imagem:</label>
    <input type="file" id="image_banner" name="image_banner" accept="image/*" onchange="preverImagem()">
    
                        <div id="preview-container" style="display: none;">
                           <p>Pré-visualização da imagem:</p>
                           <img id="imagem-preview" alt="Pré-visualização da imagem" style="max-width: 300px;">
                        </div>
            
            <div class="form-group">
                <label for="courses">Cursos</label>
                <select name="course_id" id="courses">
                    <?php foreach ($banners as $banner) { ?>
                        <option value="<?php echo $banner["course_id"]; ?>"><?php echo $banner["name_course"]." id:".$banner["course_id"] ?></option>
                       
                    <?php } ?>
                     <option value="0"><?php echo "outro" ?></option>
                </select>
                
            </div>

            <button type="submit" class="btn btn-primary">criar banner</button>
        </form>
    </div>
</div>

<script>
    function preverImagem() {
        var input = document.getElementById('image_banner');
        var previewContainer = document.getElementById('preview-container');
        var imagemPreview = document.getElementById('imagem-preview');

        if (input.files && input.files[0]) {
            var leitor = new FileReader();

            leitor.onload = function (e) {
                imagemPreview.src = e.target.result;
                previewContainer.style.display = 'block';
            };

            leitor.readAsDataURL(input.files[0]);
        }
    }
</script>

<?php
include_once('../components/admin/footer.php');
?>
