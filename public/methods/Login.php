<?php
session_start();
require 'connect_Db.php';
require '../../lib/class/class_Users.php';
$object = new Users;
$object->setDbconn($dbconn);
try {
    if(array_key_exists('Ok',$_POST)){
        $object->getUsers($_POST['email']);
        if ($object->email != NULL) {
            $_SESSION['warEmail'] = 0;
            $_SESSION['email'] = $object->email;
        } else {
            $_SESSION['warEmail'] = 1;
            throw new Exception('Пользователя с данным логином не существует');
        }
        if (md5($_POST['pass']) == $object->password) {
            $_SESSION['warPass'] = 0;
            $_SESSION['password'] = $object->password;
        } else {
            $_SESSION['warPass'] = 1;
            throw new Exception('Неправильный пароль');
        }
        $_SESSION['id_autorization'] = $object->id_users;
        $_SESSION['name_users'] = $object->name_users;
        $_SESSION['role'] = $object->role;
        $_SESSION['autorizationForms'] = 0;
        Header("Location: ./../index.php");
    }
} catch (Exception $e) {
    $_SESSION['errorMessage']=$e->getMessage();
    Header("Location: ./../autorization.php");
}

