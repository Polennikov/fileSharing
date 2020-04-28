<?php
session_start();
require 'forms/header.php';
?>
<section>
    <div class="reg">
        <div class="ContentSection">
            <form method="post" action="./../public/methods/remindPasswordMethod.php" class="Content">
                <h3>Email</h3>
                <input type="text" required name="email" id="email" >
                <h3>Новый пароль</h3>
                <div>( Пароль дожен содержать цифры,<br>
                    заглавные и прописные буквы [A-z] <br>
                    и быть не менее 8 символов. )</div>
                <input type="password" required name="pass" id="pass" >
                <h3>Поторите пароль</h3>
                <input type="password" required name="passBy" id="pass1" ">
                <input type="submit" name="Ok"  value="Изменить" class="button7"></input>
            </form>
            <div class="Content">
                <h3 style="color: #ff0114;"> <? echo $_SESSION['errorMessage'] ; unset($_SESSION['errorMessage'])?> </h3>
            </div>
        </div>
    </div>
</section>
<?php
require '../lib/style/styleError.php';
require 'forms/footer.php';

