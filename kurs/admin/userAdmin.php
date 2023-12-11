<?php
include "../style/header.php";
?>

<?php
if($_SESSION['role'] != 2){
    header("location:../lists/groups.php");
}
require_once '../service/UserController.php';
$manager = new UserController("localhost", "root", "", "users");
if (isset($_GET['delete'])) {
    $manager->delete("user", $_GET['delete']);
}
$conn = mysqli_connect("localhost", "root", "", "users");
$query = $conn->query("SELECT * FROM user");
while($user = mysqli_fetch_assoc($query))
{
    $users[] = $user;
}
?>
    <a href="admin.php" class="link-dark link-offset-2 link-underline-opacity-0 "><h1><-</h1></a>


<?php if(empty($users)) {
    echo 'Пока что пусто'; }
else { ?>
    <?php foreach ($users as $user): ?>
        <form action="" >
            <p>Логин пользователя : <?= $user['login'] ?></a></p>
            <a href="editUserAdmin.php?id=<?= $user['id']?>" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover">Редактировать</a>
            <a href="?delete=<?= $user['id']?>" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover">Удалить</a>
            <hr>
        </form>
    <?php endforeach; ?>
<?php  } ?>