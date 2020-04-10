<?php
session_start();
if(array_key_exists('back',$_POST))  {
    $_SESSION['countPost'] = NULL;
    Header("Location: ./../index.php");
}
if(array_key_exists('more',$_POST)) {
    $_SESSION['countPost'] = $_SESSION['countPost'] - 10;
    Header("Location: ./../index.php");
}