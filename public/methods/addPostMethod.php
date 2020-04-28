<?php
session_start();
$_SESSION['title']=$_POST['title'];
$_SESSION['coments']=$_POST['coments'];
try {
    if(isset($_SESSION['id_autorization'])){
        require 'uploadFile.php';
        if ($_SESSION['warTypeFile'] == 1) {
            throw new Exception('Добавлен неккоректный файл');
        }
        require 'uploadPost.php';
        Header("Location: ./../index.php");
    } else {
        Header("Location: ./../autorization.php");
    }
}catch (Exception $e){
    $_SESSION['errorMessage']=$e->getMessage();
    Header("Location: ./../addPostForms.php");
}
