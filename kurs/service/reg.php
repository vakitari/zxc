<?php
session_start();



$conn = mysqli_connect("localhost", "root", "", "users");
	if (!empty($_POST['password']) and !empty($_POST['login'])) {
		$login = $_POST['login'];
		$password = $_POST['password'];
		$query = $conn->query("INSERT INTO user SET login= '$login' , password= '$password' ");
		header("location:../user/login.php");
	}else{
           
        $_SESSION['error']="заполни все поля";
        header("location:../user/register.php");
       
    }
?>