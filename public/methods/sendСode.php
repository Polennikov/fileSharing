<?php
session_start();
require 'connect_Db.php';
require '../../lib/class/class_Users.php';
$object = new Users;
$object->setDbconn($dbconn);
if ($_SESSION['kod'] == $_POST['kod']) {
    $object->setUsers($_SESSION['email'], $_SESSION['name'], $_SESSION['city'], $_SESSION['pass'], $_SESSION['phone']);
    $_SESSION['autorizationForms'] = true;
    Header("Location: ../autorization.php");
} else {
    $_SESSION['warCode'] = 1;
    $_SESSION['errorMessage'] = 'Неверный код';
    Header("Location: ../registration.php");
}