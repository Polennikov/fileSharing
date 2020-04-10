<?php
session_start();
require 'forms/header.php';
if($_SESSION['autorizationForms']==TRUE)
{
    require 'autorization.php';
}
if($_SESSION['addPostForms']==TRUE)
{
    require 'addPostForms.php';
}

require 'methods/dataPosters.php';

            require 'forms/footer.php';
            ?>

