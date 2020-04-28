<?php
session_start();
if (array_key_exists('main', $_POST)) {
    Header("Location: ./../index.php");
}
if (array_key_exists('autorization', $_POST)) {
    Header("Location: ./../autorization.php");
}
if (array_key_exists('out', $_POST)) {
    unset($_SESSION['id_autorization'], $_SESSION['name_users'], $_SESSION['role']);
    Header("Location: ./../index.php");
}
if (array_key_exists('upPoster', $_POST)) {
    Header("Location: ./../addPostForms.php");
}
if (array_key_exists('reg', $_POST)) {
    Header("Location: ./../registration.php");
}
