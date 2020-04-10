
<?php require 'forms/header.php';?>
    <section>
        <div class="reg">
            <div class="ContentSection">
                <form method="post" action="./../public/methods/remindPasswordMethod.php" class="Content">
                    <h3>Email</h3>
                    <input type="text" required name="email" id="email" value="<?echo $_GET['email'];?>">
                    <h3>Новый пароль</h3>
                    <div>( Пароль дожен содержать цифры,<br>
                        заглавные и прописные буквы [A-z] <br>
                        и быть не менее 8 символов. )</div>
                    <input type="password" required name="pass" id="pass" style="<?php
                    if ($_GET['warPass']==1)
                    { echo 'border: 1px solid #ff0d1e'; }
                    ?>">
                    <h3>Поторите пароль</h3>
                    <input type="password" required name="pass1" id="pass1" style="<?php
                    if ($_GET['warPass1']==1)
                    { echo 'border: 1px solid #ff0d1e'; }
                    ?>">
                    <input type="submit" name="Ok"  value="Изменить" class="button7"></input>
                </form>
            </div>
        </div>
    </section>
<script type='text/javascript'>
    $("#pass").attr("value", '<?php echo $_GET['password'];?>');
</script>
<?php
require 'forms/footer.php';?>
