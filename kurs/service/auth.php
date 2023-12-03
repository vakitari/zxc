<?php
session_start();
$_SESSION["auth"] = false;
header("location:../user/register.php");