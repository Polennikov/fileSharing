<?php
session_start();
require 'forms/header.php';
require 'methods/connect_Db.php';
require '../lib/class/class_Users.php';
require '../lib/class/class_Posters.php';
$objectUsers = new Users();
$objectPosters = new Posters();
$objectUsers->setDbconn($dbconn);
$objectPosters->setDbconn($dbconn);
$nameUsers = $objectUsers->getNameUsers(null, $_GET['id_users']);
$Posters = array_values($objectPosters->getOnePosters($_GET['id_poster']));
?>
<section>
    <div class="ContentSection">
        <form method="post" action="./../public/methods/updatePostAdminMethod.php" class="Content">
            <h3>Заголовок</h3>
            <input type="text" required name="title" id="title" value="<? echo $Posters[0]; ?>">
            <h3>Комментарий</h3>
            <textarea type="text" required name="coments" id="coments"><? echo $Posters[1]; ?></textarea>
            <h3>Пользователь</h3>
            <input type="text" name="name_users" value="<? echo $nameUsers; ?>" readonly>
            <h3>Дата добавления</h3>
            <input type="text" name="date_posters" value="<? echo $Posters[4] ?>" readonly>
            <h3>Номер ID</h3>
            <input type="text" name="id_posters" value="<? echo $_GET['id_poster'] ?>" readonly>
            <h3>Файлы: </h3>
            <?
            $rowFile = array_values($objectPosters->getFilePosters($_GET['id_poster']));
            foreach ($rowFile as $row) {
                echo $row[0];
                echo '<br>';
            }
            ?>
            <div>
                <input type="submit" name="updatePost" value="Изменить" class="button7"></input>
                <input type="submit" name="deletePost" value="Удалить пост" class="button7"></input>
                <input type="submit" name="back" value="Назад" class="button7"></input>
            </div>
        </form>
    </div>
</section>
<?php
require 'forms/footer.php';
?>



