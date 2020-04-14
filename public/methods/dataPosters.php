<?php
session_start();
$massPoster=array();
$massFilePoster=array();
require 'connect_Db.php';
require '../lib/class/class_Posters.php';
$object = new Posters();
$object->setDbconn($dbconn);
$countRowPosters=$object->countPosters();
if($_SESSION['countPost']==NULL||$_SESSION['countPost']>=$countRowPosters) {
    $_SESSION['countPost']=$countRowPosters;
}
if($_SESSION['countPost']<=10) {
$massPoster=$object->readPosters($countRowPosters,0);
} else{
    $massPoster=$object->readPosters($countRowPosters,$_SESSION['countPost']-10);
}
$massFilePoster=$object->readFilePosters();
require '../lib/class/class_Users.php';
$objectUsers = new Users;
$objectUsers->setDbconn($dbconn);
echo '
<section>
    <div class="ContentDataSection">
        <div class="DataSection">';
            foreach ($massPoster as $post)
            {
            echo '
             <div class="ContentDataBlock">
                <div class="DataBlock">';
                if($_SESSION['role']==TRUE){
                    echo "<div class='titleContent'>
                    <h2> <a class='linkPost' href='../public/updatePostAdmin.php?title=$post[0]&coments=$post[1]&id_posters=$post[2]&id_users=$post[3]&date_posters=$post[4]'>";
                    echo $post[0];
                    echo '</a>
                    </h2>
                </div>';
                }else{
                    echo '
                    <div class="titleContent">
                        <h2>';
                    echo $post[0];
                    echo '
                        </h2>
                    </div>';
                }
                echo '<div class="commentsContent">';
                echo $post[1];
                echo '</div>';
                echo '<br>';
                echo '<div>Файлы:</div>';
                foreach ($massFilePoster as $Filepost) {
                    if($post[2]==$Filepost[2]){
                        echo '<div >';
                        $pathUp="../public/methods/saveFilePost.php?filename=../uploads/$Filepost[0]";
                        echo "<a href='$pathUp'>$Filepost[0]</a>";
                        echo '</div>';
                    }
                }
                echo '<br>
                <div class="endPostContent">
                    <div>';
                    echo $post[4];
                    echo '</div>
                    <div>';
                    echo $objectUsers->getNameUsers(NULL,$post[3]);
                    echo '</div>
                   </div>
                </div>
             </div>';
            }
echo '
        </div >
    </div >
</section>
';
?>
<?php
echo '<div class="ContentDataSection">
<div class="DataSection">
<form method="post" action="./../public/methods/countDataPosters.php">
<input type="submit" name="back" value="Скрыть" class="button7"></input>';
echo "ещё ";
if(($_SESSION['countPost']-10)<0) {
    echo '0';
}else{
    echo $_SESSION['countPost']-10;
}
echo ' постов..&nbsp;&nbsp;&nbsp;';
echo '<input type="submit" name="more" value="Показать ещё" class="button7"></input>
</form> 
</div>
</div>';
?>
