<?php
session_start();
$_SESSION["showAdd"] = true;
header("location:../add/addGroup.php");
