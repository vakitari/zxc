
<?php
include "../style/header.php";


?>

<?php
if($_SESSION['role'] != 2){
    header("location:../lists/groups.php");
    exit();
}
$conn = mysqli_connect("localhost", "root", "", "users");
$group = $_GET['group'];
$query = $conn->query("SELECT * FROM students where id_groups = '$group'");
$student = [];
while($student = mysqli_fetch_assoc($query))
{
    $students[] = $student;
}
if (!empty($_SESSION['errDate'])){
    echo $_SESSION['errDate'];
}

?>
<a href="groupsAdmin.php" class="link-dark link-offset-2 link-underline-opacity-0 "><h1><-</h1></a>
<h1>Добавьте Студента</h1>
<form action="student.php" method="post">
    <div class="col-2 mt-2">
    <input name="name" type="text">
    <input name="surname" type="text">
    <input name="lastname" type="text">
    <input type="submit" class="btn btn-success mt-3">
    <input type="hidden" name="groupId" value="<?=$group?>">
    </div>
</form>

<?php foreach($students as $student): ?>

    <p class="mt-2">Фамилия: <?= $student['name'] ?>  </p>
    <hr>
<?php endforeach; ?>



<?php
include "../style/footer.php";
?>