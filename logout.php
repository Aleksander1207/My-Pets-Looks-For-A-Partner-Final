<?php

session_start();
unset($_SESSION['username']);
unset($_SESSION['access-token']);
session_destroy();
header("location:login.php");
exit();
?>