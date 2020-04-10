<?php
require 'methods/connect_Db.php';
require '../lib/class/class_Users.php';
require '../lib/class/class_Posters.php';
$objectUsers = new Users();
$objectPosters = new Posters();
$objectUsers->setDbconn($dbconn);
$objectPosters->setDbconn($dbconn);
$nameUsers=$objectUsers->getNameUsers(NULL,$_GET['id_users']);
if($nameUsers==0)
{
    $nameUsers=$_GET['id_users'];
}
require 'forms/header.php';
function utf8_urldecode($str) {
    $str = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode($str));
    return html_entity_decode($str,null,'UTF-8');;
}
$t = utf8_urldecode($_GET['title']);
//$t=urldecode($_GET['title']);
?>
    <section>
        <div class="ContentSection">
            <form method="post"  action="./../public/methods/updatePostAdminMethod.php" class="Content">
                <h3>Заголовок</h3>
                <input type="text" required name="title" id="title" value="<?echo $t?>" >
                <h3>Комментарий</h3>
                <textarea  type="text" required name="coments" id="coments" ><?echo $_GET['coments'];?></textarea>
                <h3>Пользователь</h3>
                <input type="text" name="name_users" value="<?echo $nameUsers; ?>" readonly>
                <h3>Дата добавления</h3>
                <input type="text" name="date_posters" value="<?echo $_GET['date_posters']; ?>" readonly>
                <h3>Номер ID</h3>
                <input type="text" name="id_posters" value="<?echo $_GET['id_posters']; ?>" readonly>
                <h3>Файлы: </h3>
                <?
                $rowFile = array_values($objectPosters->getFilePosters($_GET['id_posters']));
                foreach ($rowFile as $i){
                    echo $i[0];
                    echo '<br>';
                }
                ?>
                <div>
                    <input type="submit" name="updatePost"  value="Изменить" class="button7"></input>
                    <input type="submit" name="deletePost" value="Удалить пост" class="button7"></input>
                    <input type="submit" name="back" value="Назад" class="button7"></input>
                </div>
            </form>
        </div>
    </section>
<?php
require 'forms/footer.php';
?>



