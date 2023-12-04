<?php
session_start();



$conn = mysqli_connect("localhost", "root", "", "users");
$query = $conn->query("SELECT * FROM user");

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
	if (!empty($_POST['password']) and !empty($_POST['login'])) {
		$login = $_POST['login'];
		$password = $_POST['password'];
		$mail = $_POST['mail'];
		$date = $_POST['date_resp'];
		$conf = $_POST['pas_conf'];
		if(strlen($login) < 6 || strlen($password) < 2){
			$_SESSION['error']="Пароль и логин должны содержать 6 и более символов";
			header("location:../user/register.php");
		} else {
			if($password == $conf){
				$query = $conn->query("INSERT INTO user SET login= '$login' , password= '$password',mail = '$mail', date_resp = '$date' ,pas_conf = '$conf' ");
				$_SESSION['auth'] = true;
				header("location:../lists/groups.php");
			
			} else {
					
				$_SESSION['error']="Пароль и подтверждение пароля должны совпадать";
				header("location:../user/register.php");
				
				}}
}else{
           
	$_SESSION['error']="заполни все поля";
	header("location:../user/register.php");
   
}
?>