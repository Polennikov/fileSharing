<?php
session_start();
require 'connect_Db.php';
require '../../lib/class/class_Users.php';
$object = new Users;
$object->setDbconn($dbconn);

    if ($_COOKIE['kod'] == $_POST['kod']) {
        $object->setUsers($_COOKIE['email'],$_COOKIE['name'],$_COOKIE['city'],$_COOKIE['pass'],$_COOKIE['phone']);
        setcookie("kod", '',0,'/');
        setcookie("name",'',0,'/');
        setcookie("email",'',0,'/');
        setcookie("phone",'',0,'/');
        setcookie("city",'',0,'/');
        setcookie("pass",'',0,'/');
        setcookie("warCode",'',0,'/');
        $_SESSION['autorizationForms'] = TRUE;
        Header("Location: ../index.php");
    }
    else{
        setcookie("warCode",1,0,'/');
        //echo '<script type="text/javascript">alert("Неверный код, попробуйте еще раз")</script>';
        Header("Location: ../registration.php");
}