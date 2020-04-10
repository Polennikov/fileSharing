<?php
session_start();
setcookie("login",$_POST['log'],0,'/');
setcookie("password",$_POST['pass'],0,'/');
require 'connect_Db.php';
require '../../lib/class/class_Users.php';
$object = new Users;
$object->setDbconn($dbconn);
    if(array_key_exists('Ok',$_POST)){

        $row=$object->getUsers($_POST['log']);
        if ($object->email!=NULL) {
            $_SESSION['warLog']=0;
        } else{
            $_SESSION['warLog']=1;
            goto a;
        }
        if (md5($_POST['pass'])==$object->password) {
            $_SESSION['warPass']=0;
        } else{
            $_SESSION['warPass']=1;
            goto a;
        }
        $_SESSION['id_users']=$object->id_users;
        $_SESSION['login']=$object->email;
        $_SESSION['name_users']=$object->name_users;
        $_SESSION['password']=$object->password;
        $_SESSION['role']=$object->role;
        setcookie("login",'',0,'/');
        setcookie("password",'',0,'/');
        $_SESSION['warLog']='';
        $_SESSION['warPass']='';
        $_SESSION['autorizationForms'] = 0;
        a:
        Header("Location: ./../index.php");
    }
    if(array_key_exists('close',$_POST)) {
        setcookie("login",'',0,'/');
        setcookie("password",'',0,'/');
        $_SESSION['warLog']='';
        $_SESSION['warPass']='';
        $_SESSION['autorizationForms'] = 0;
        Header("Location: ./../index.php");
    }
?>