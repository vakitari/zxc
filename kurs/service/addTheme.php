<?php 
$conn = mysqli_connect("localhost", "root", "", "users");

$name_theme = $_POST['name_theme'];
    $conn->query("INSERT INTO groups SET name_theme= '$name_theme' ");
    header("location:../admin/gruopsAdmin.php");
