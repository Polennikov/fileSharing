<?php
$title=$_POST['title'];
$coments=$_POST['coments'];
$id_posters=$_POST['id_posters'];
require 'connect_Db.php';
require '../../lib/class/class_Posters.php';
$object = new Posters;
$object->setDbconn($dbconn);
if(array_key_exists('updatePost',$_POST))  {
    $object->updatePosters($_POST['title'],$_POST['coments'],$id_posters);
    header("Refresh:0; url=./../index.php");
    //header("Refresh:0; url=../updatePostAdmin.php?title=$title&coments=$coments&id_posters=$id_posters&id_users=$id_users&date_posters=$date_posters; " );
}
if(array_key_exists('deletePost',$_POST))  {

    $rowFile = array_values($object->getFilePosters($id_posters));
    foreach ($rowFile as $i){
        $path="../uploads/$i[0]";
        unlink($path);
    }
    $object->deletePosters($_POST['id_posters']);
    header("Refresh:0; url=./../index.php");
}
if(array_key_exists('back',$_POST))  {
    header("Refresh:0; url=./../index.php");
}
