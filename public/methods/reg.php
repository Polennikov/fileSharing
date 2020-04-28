<?php
session_start();
$_SESSION['name'] = $_POST['name'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['city'] = $_POST['city'];
$_SESSION['pass'] = $_POST['pass'];
require 'connect_Db.php';
require '../../lib/class/class_Users.php';
$object = new Users;
$object->setDbconn($dbconn);
try {
    if (array_key_exists('Ok', $_POST)) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false && $object->getNameUsers($_POST['email'],
                null) == null) {
            $_SESSION['warEmail'] = 0;
        } else {
            $_SESSION['warEmail'] = 1;
            throw new Exception('Такой логин уже существует или не соответствует требованию');
        }
        if (preg_match('/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/', $_POST['phone'])) {
            $_SESSION['warPhone'] = 0;
        } else {
            $_SESSION['warPhone'] = 1;
            throw new Exception('Некорректный номер');
        }
        if (strlen($_POST['pass']) >= 8 && preg_match("#[A-Z]+#", $_POST['pass']) &&
            preg_match("#[a-z]+#", $_POST['pass']) && preg_match("#[0-9]+#", $_POST['pass'])) {
            $_SESSION['warPass'] = 0;
        } else {
            $_SESSION['warPass'] = 1;
            throw new Exception('Пароль не соответствует требованиям');
        }
        if ($_POST['pass'] == $_POST['passBy']) {
            $_SESSION['warPassBy'] = 0;
        } else {
            $_SESSION['warPassBy'] = 1;
            throw new Exception('Пароли не совпадают');
        }
        $kod = rand(1000, 9999);
        $_SESSION['kod'] = $kod;
        $to = $_POST['email'];
        $subject = "Filegram";
        $message = "Код для дальнейшей регистрации: $kod";
        mail($to, $subject, $message);
        $_SESSION['errorMessage'] = 'Код отправлен на почту';
        Header("Location: ../registration.php");
    }
} catch (Exception $e) {
    $_SESSION['errorMessage'] = $e->getMessage();
    Header("Location: ../registration.php");
}



