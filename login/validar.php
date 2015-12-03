<?php
if(!isset($_SESSION))
{
    session_start();
}

if (!isset($_SESSION['login'])){
    header("location:form_login.php?=error1");
}
?>