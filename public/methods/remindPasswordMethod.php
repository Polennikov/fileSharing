<?php
session_start();
if(array_key_exists('Ok',$_POST)){
    if ( strlen($_POST['pass'])>=8 &&
        preg_match("#[A-Z]+#",$_POST['pass']) &&
        preg_match("#[a-z]+#",$_POST['pass']) &&
        preg_match("#[0-9]+#",$_POST['pass'])) {
        $warPass=0;
    } else {
        $warPass=1;
        goto a;
    }
    if ($_POST['pass']==$_POST['pass1']) {
        $warPass1=0;
    } else {
        $warPass1=1;
        goto a;
    }
    require 'connect_Db.php';
    require '../../lib/class/class_Users.php';
    $object = new Users;
    $object->setDbconn($dbconn);
    $object->UpdatePasswordUsers(md5($_POST['pass1']),$_POST['email']);
    $_SESSION['autorizationForms'] = TRUE;
    Header("Location: ./../index.php");
    exit();
    a:
    $email=$_POST['email'];
    $password=$_POST['pass'];
    Header("Location: ../remindPassword.php?email=$email&warPass=$warPass&warPass1=$warPass1&password=$password");
}

