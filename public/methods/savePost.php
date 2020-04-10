<?php
require 'connect_Db.php';
require '../../lib/class/class_Posters.php';
$object = new Posters();
$object->setDbconn($dbconn);
$object->setPosters($_POST['title'],$_POST['coments'],$_SESSION['id_users']);
$object->setFilePosters($_SESSION['file']);
?>