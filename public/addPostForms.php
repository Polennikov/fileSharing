<section>
    <div class="ContentSection">
        <form method="post" class="Content" action="methods/addPostMethod.php" enctype="multipart/form-data">
            <h3>Заголовок</h3>
            <input type="text" name="title" id="title" style="<?php
            if ($_SESSION['warTitle']==1)
            { echo 'border: 1px solid #ff0d1e'; }
            ?>">
            <h3>Комментарий</h3>
            <textarea  type="text" name="coments" id="coments" style="<?php
            if ($_SESSION['warComents']==1)
            { echo 'border: 1px solid #ff0d1e'; }
            ?>"><?echo $_COOKIE['coments'];?></textarea>
            <input type="file" name="file[]" multiple>
            <input type="file" name="file[]" multiple>
            <input type="file" name="file[]" multiple>
            <? if($_SESSION['warTypeFile']==1){
                echo '<h3 style="color: #ff0114;"> Неверный тип файла! </h3>';
            }?>
            <div>
                <input type="submit" name="InsertPost" value="Отправить" class="button7">
                <input type="submit" name="close" value="Закрыть" class="button7"></input>
            </div>
        </form>
    </div>
</section>
<script type='text/javascript'>
    $("#title").attr("value", '<?php echo $_COOKIE['title'];?>');
    $("#coments").attr("value", '<?php echo $_COOKIE['coments']?>');
</script>
