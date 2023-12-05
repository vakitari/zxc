
<?php
include "../style/header.php";
?>
<?php
require_once '../service/GroupController.php';
if ($_SESSION['role'] != 2) {
    header("location:../lists/groups.php");
}

$manager = new GroupController("localhost", "root", "", "users");
$conn = mysqli_connect("localhost", "root", "", "users");
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM groups WHERE id = '$id' ");
$groups = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name_group'];

    // вызов метода класса для редактирования записи
    $manager->edit($name, $id);
    header("location:groupsAdmin.php");

}
?>

<form method="post" action="">
    <label for="name">Название группы:</label>
    <input type="text" id="name" name="name_group" value="<?= $groups['name_group'] ?>"><br>

    <input type="submit" value="Редактировать">
</form>
<?php
include "../style/footer.php";
?>