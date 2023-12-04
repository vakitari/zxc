<?php 
        session_start();
		$_SESSION['error'] = ""; 
        $conn = mysqli_connect("localhost", "root", "", "users");
		$login = $_POST['login'];
		$password = $_POST['password'];
		$query = $conn->query("SELECT * FROM user WHERE login='$login' AND password='$password'");
         
        $user = mysqli_fetch_assoc($query);
		$_SESSION['user'] = $user['id'];
        $_SESSION['role'] = $user['id_role'];
		if (!empty($user)) {
			unset($_SESSION['error']);
			$_SESSION['auth'] = true;
			header("location:../lists/groups.php");
		} else {
			$_SESSION['auth'] = false;
			$_SESSION['error'] = "Ошибка! Пароль или логин введен неверно";
			header("location:../user/login.php");
		}

?>