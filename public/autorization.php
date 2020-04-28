<?php
session_start();
require 'forms/header.php';
?>
<section >
    <div class="ContentSection">
        <form method="post" action="./../public/methods/Login.php" class="Content">
            <h3>Логин</h3>
            <input type="text" name="email" id="email" required>
            <h3>Пароль</h3>
            <input type="password" name="pass" id="pass" required>
            <a href='../public/remindPassword.php'>Забыли пароль?</a>
            <div>
                <input type="submit" name="Ok" value="ОК" class="button7"></input>
            </div>
        </form>
       <div class="Content">
             <h3 class="errorMessage"> <? echo $_SESSION['errorMessage'] ; unset($_SESSION['errorMessage'])?> </h3>
       </div>
    </div>
</section>
<?php
require '../lib/style/styleError.php';
require 'forms/footer.php';


