<?php
session_start();
require 'connect_Db.php';
require '../../lib/class/class_Users.php';
$object = new Users;
$object->setDbconn($dbconn);
try {
    if (array_key_exists('Ok', $_POST)) {
        $object->getUsers($_POST['email']);
        if ($object->email != null) {
            $_SESSION['warEmail'] = 0;
            $_SESSION['email'] = $object->email;
        } else {
            $_SESSION['warEmail'] = 1;
            throw new Exception('Пользователя с данным логином не существует');
        }
        if (strlen($_POST['pass']) >= 8 && preg_match("#[A-Z]+#", $_POST['pass']) && preg_match("#[a-z]+#",
                $_POST['pass']) && preg_match("#[0-9]+#", $_POST['pass'])) {
            $_SESSION['warPass'] = 0;
        } else {
            $_SESSION['warPass'] = 1;
            throw new Exception('Пароль не соответствует требованиям');
        }
        if ($_POST['pass'] == $_POST['passBy']) {
            $_SESSION['warPass'] = 0;
        } else {
            $_SESSION['warPass'] = 1;
            throw new Exception('Пароли не совпадают');
        }
        require 'connect_Db.php';
        require '../../lib/class/class_Users.php';
        $object = new Users;
        $object->setDbconn($dbconn);
        $object->UpdatePasswordUsers(md5($_POST['passBy']), $_POST['email']);
        $_SESSION['autorizationForms'] = true;
        Header("Location: ./../index.php");
    }
} catch (Exception $e) {
    $_SESSION['errorMessage'] = $e->getMessage();
    $email = $_POST['email'];
    Header("Location: ../remindPassword.php?email=$email");
}
