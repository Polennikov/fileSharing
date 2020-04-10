
<section >
    <div class="ContentSection">
        <form method="post" action="./../public/methods/Login.php" class="Content">
            <h3>Логин</h3>
            <input type="log" name="log" id="log" style="<?php
                   if ($_SESSION['warLog']==1)
                   { echo 'border: 1px solid #ff0d1e'; }
                   ?>">
            <h3>Пароль</h3>
            <input type="password" name="pass" id="pass" style="<?php
                   if ($_SESSION['warPass']==1)
                   { echo 'border: 1px solid #ff0d1e'; }
                   ?>">
            <?
            if($_SESSION['warLog']==0 && $_SESSION['warPass']==1){
                $N=$_COOKIE['login'];
                $pathUp="../public/remindPassword.php?email=$N";
                echo "<a href='$pathUp'>Забыли пароль?</a>";
            }
            ?>
            <div>
                <input type="submit" name="Ok" value="ОК" class="button7"></input>
                <input type="submit" name="close" value="Закрыть" class="button7"></input>
            </div>
        </form>
    </div>
</section>
<script type='text/javascript'>
    $("#log").attr("value", '<?php echo $_COOKIE['login'];?>');
    $("#pass").attr("value", '<?php echo $_COOKIE['password']?>');
</script>


