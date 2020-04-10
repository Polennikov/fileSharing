<?php
session_start();
if(array_key_exists('in',$_POST)) {
$_SESSION['autorizationForms'] = TRUE;
    Header("Location: ./../index.php");
}
if(array_key_exists('main',$_POST)) {
    $_SESSION['autorizationForms'] = 0;
    Header("Location: ./../index.php");

}
if(array_key_exists('out',$_POST)) {
    $_SESSION['id_users']=NULL;
    $_SESSION['login']=NULL;
    $_SESSION['name_users']=NULL;
    $_SESSION['password']=NULL;
    $_SESSION['role']=NULL;
    $_SESSION['addPostForms'] = 0;
    Header("Location: ./../index.php");
}
if(array_key_exists('upPoster',$_POST)) {
    $_SESSION['addPostForms'] = TRUE;
    Header("Location: ./../index.php");
}
