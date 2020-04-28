<?php
session_start();
if (isset($_SESSION['id_autorization']) && isset($_SESSION['role'])) {
    require 'connect_Db.php';
    require '../../lib/class/class_Posters.php';
    $object = new Posters;
    $object->setDbconn($dbconn);
    if (array_key_exists('updatePost', $_POST)) {
        $object->updatePosters($_POST['title'], $_POST['coments'], $_POST['id_posters']);
        header("Refresh:0; url=./../index.php");
    }
    if (array_key_exists('deletePost', $_POST)) {
        $rowFile = array_values($object->getFilePosters($_POST['id_posters']));
        foreach ($rowFile as $i) {
            $path = "../uploads/$i[0]";
            unlink($path);
        }
        $object->deletePosters($_POST['id_posters']);
        header("Refresh:0; url=./../index.php");
    }
    if (array_key_exists('back', $_POST)) {
        header("Refresh:0; url=./../index.php");
    }
} else {
    Header("Location: ./../autorization.php");
}

