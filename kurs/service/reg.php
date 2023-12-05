<?php
session_start();



$conn = mysqli_connect("localhost", "root", "", "users");
$query = $conn->query("SELECT * FROM user");
$users =[];
while($user = mysqli_fetch_assoc($query))
{
    $users[] = $user;
}
foreach($users as $item){
	if($item['login'] == $_POST['login']){
		$_SESSION['error']="Такой логин уже существует";
		header("location:../user/register.php");
		exit();
	}
}
var_dump($_POST);
		$login = $_POST['login'];
		$password = $_POST['password'];
		$mail = $_POST['mail'];
		$date = $_POST['date_resp'];
		$conf = $_POST['pas_conf'];
		$country = $_POST['country'];
		

			if($password == $conf){
				$query = $conn->query("INSERT INTO user SET login= '$login' , password= '$password',mail = '$mail', date_resp = '$date' ,pas_conf = '$conf', id_role = 1, country = '$country' ");
				$_SESSION['auth'] = true;
                $userId = mysqli_insert_id($conn);
                $qRole = $conn->query("SELECT * FROM user");
                $role = mysqli_fetch_assoc($qRole);
                $_SESSION['user'] = $userId;
                $_SESSION['role'] = $role;

				header("location:../lists/groups.php");
			
			} else {
					
				$_SESSION['errorPass']="Пароль и подтверждение пароля должны совпадать";
				header("location:../user/register.php");
				
				}

?>