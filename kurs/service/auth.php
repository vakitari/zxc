<?php
session_start();
$_SESSION["auth"] = false;
unset($_SESSION['role']);
header("location:../user/login.php");