
<?php
include "../style/header.php";
?>
<?php
require_once '../service/StudentController.php';
if ($_SESSION['role'] != 2) {
    header("location:../lists/groups.php");
}
$manager = new StudentController("localhost", "root", "", "users");
$conn = mysqli_connect("localhost", "root", "", "users");
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE id = '$id' ");
$student = mysqli_fetch_assoc($result);
$id_groups = $student['id_groups'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $lastname = $_POST['lastname'];
    // вызов метода класса для редактирования записи
    $manager->edit($name, $surname, $lastname,$id,$id_groups);
    header("location:studentAdmin.php");

}
?>

<form method="post" action="">
    <label for="name">Имя:</label>
    <input type="text" id="name" name="name" value="<?= $student['name'] ?>"><br>
    <label for="surname">Фамилия:</label>
    <input type="text" id="surname" name="surname" value="<?= $student['surname']?>"><br>
    <label for="lastname">Отчество:</label>
    <input type="text" id="lastname" name="lastname" value="<?= $student['lastname'] ?>"><br>
    <input type="submit" value="Редактировать">
</form>
<?php
include "../style/footer.php";
?>