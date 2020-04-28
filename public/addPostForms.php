<?php
session_start();
require 'forms/header.php';
?>
<section>
    <div class="ContentSection">
        <form method="post" class="Content" action="methods/addPostMethod.php" enctype="multipart/form-data">
            <h3>Заголовок</h3>
            <input type="text" name="title" id="title" required>
            <h3>Комментарий</h3>
            <textarea  type="text" name="coments" id="coments" required><?echo $_SESSION['coments']?></textarea>
            <input type="file" name="file[]" multiple>
            <input type="file" name="file[]" multiple>
            <input type="file" name="file[]" multiple>
            <div class="Content">
                <h3> <? echo $_SESSION['errorMessage']; unset($_SESSION['errorMessage'])?> </h3>
            </div>
            <div>
                <input type="submit" name="InsertPost" value="Отправить" class="button7">
            </div>
        </form>
    </div>
</section>
<?php
require '../lib/style/styleError.php';
require 'forms/footer.php';
?>