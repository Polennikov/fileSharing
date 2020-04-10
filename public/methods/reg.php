<?php
session_start();
setcookie("name",$_POST['name'],0,'/');
setcookie("email",$_POST['email'],0,'/');
setcookie("phone",$_POST['phone'],0,'/');
setcookie("city",$_POST['city'],0,'/');
setcookie("pass",$_POST['pass'],0,'/');
require 'connect_Db.php';
require '../../lib/class/class_Users.php';
$object = new Users;
$object->setDbconn($dbconn);
if(array_key_exists('Ok',$_POST))  {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false && $object->getNameUsers($_POST['email'],NULL)==NULL) {
        setcookie("warEmail",0,0,'/');
    } else {
        setcookie("warEmail",1,0,'/');
        goto a;
    }

    if (preg_match('/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/', $_POST['phone'])) {
        setcookie("warPhone",0,0,'/');
    } else {
        setcookie("warPhone",1,0,'/');
        goto a;
    }

    if ( strlen($_POST['pass'])>=8 &&
        preg_match("#[A-Z]+#",$_POST['pass']) &&
        preg_match("#[a-z]+#",$_POST['pass']) &&
        preg_match("#[0-9]+#",$_POST['pass'])) {
        setcookie("warPass",0,0,'/');
    } else {
        setcookie("warPass",1,0,'/');
        goto a;
    }

    if ($_POST['pass']==$_POST['pass1']) {
        setcookie("warPass1",0,0,'/');
    } else {
        setcookie("warPass1",1,0,'/');
        goto a;
    }
    $kod = rand(1000, 9999);
    setcookie("kod",$kod,0,'/');
    $to = $_POST['email'];
    $subject = "Filegram";
    $message = "Код для дальнейшей регистрации: $kod";
    mail($to, $subject, $message);
    setcookie("warEmail",'',0,'/');
    setcookie("warPhone",'',0,'/');
    setcookie("warPass",'',0,'/');
    setcookie("warPass1",'',0,'/');
    a:
    Header("Location: ../registration.php");
}


