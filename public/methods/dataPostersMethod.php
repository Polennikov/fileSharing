<?php
$massPoster=array();
$massFilePoster=array();
require 'connect_Db.php';
require '../lib/class/class_Posters.php';
require '../lib/class/class_Users.php';
$object = new Posters();
$object->setDbconn($dbconn);
$massPoster=$object->readPosters();
$massFilePoster=$object->readFilePosters();
$objectUsers = new Users;
$objectUsers->setDbconn($dbconn);