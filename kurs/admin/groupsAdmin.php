<?php
include "../style/header.php";
?>

<?php
if($_SESSION['role'] != 2){
    header("location:../lists/groups.php");
}
require_once '../service/GroupController.php';
$manager = new GroupController("localhost", "root", "", "users");
if (isset($_GET['delete'])) {
    $manager->delete("groups", $_GET['delete']);
}
$conn = mysqli_connect("localhost", "root", "", "users");
$query = $conn->query("SELECT * FROM groups");
while($group = mysqli_fetch_assoc($query))
{
    $groups[] = $group;
}
?>
    <a href="admin.php" class="link-dark link-offset-2 link-underline-opacity-0 "><h1><-</h1></a>


<?php if(empty($groups)) {
    echo 'Пока что пусто'; }
else { ?>
    <?php foreach ($groups as $group): ?>
        <form action="" >
            <p><?= $group['name_group'] ?></a></p>
            <a href="editGroupsAdmin.php?id=<?= $group['id']?>" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover">Редактировать</a>
            <a href="?delete=<?= $group['id']?>" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover">Удалить</a>
            <a href="addStudent.php?group=<?= $group['id']?>" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover">Добавить студента</a>
            <hr>
        </form>
    <?php endforeach; ?>
<?php  } ?>