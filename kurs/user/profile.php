<?php
include "../style/header.php";
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "users");
$userId = $_SESSION['user'];
$query = $conn->query("SELECT * FROM user WHERE id = $userId ");
$user = mysqli_fetch_assoc($query);

?>

    <p>пароль пользователя <?php echo $user['password']; ?></p> 
    <p>Login пользователя <?php echo $user['login']; ?></p>

<?php
include "../style/footer.php";
?>