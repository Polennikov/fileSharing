<?php
session_start();
setcookie("title",$_POST['title'],0,'/');
setcookie("coments",$_POST['coments'],0,'/');
if(array_key_exists('InsertPost',$_POST)) {
    if ($_POST['title'] != NULL) {
        $_SESSION['warTitle']=0;
    } else {
        $_SESSION['warTitle']=1;
        goto a;
    }
    if ($_POST['coments'] != NULL) {
        $_SESSION['warComents']=0;
    } else {
        $_SESSION['warComents']=1;
        goto a;
    }
    require 'uploadFile.php';
    if($_SESSION['warTypeFile']==1)
    {
        goto a;
    }
    require 'savePost.php';
    $_SESSION['warTitle']=0;
    $_SESSION['warComents']=0;
    setcookie("title",'',0,'/');
    setcookie("coments",'',0,'/');
    $_SESSION['addPostForms'] = 0;
    $_SESSION['countPost']=NULL;
    Header("Location: ./../index.php");
    a:
    Header("Location: ./../index.php");

}
if(array_key_exists('close',$_POST)) {

    $_SESSION['addPostForms'] = 0;
    Header("Location: ./../index.php");

}
