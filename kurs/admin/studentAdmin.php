<?php
include "../style/header.php";
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "users");
$query = $conn->query("SELECT * FROM students");
while($student = mysqli_fetch_assoc($query))
{
    $students[] = $student;
}

if ($_SESSION['role'] != 2) {
    header("location:../lists/groups.php");
}

require_once '../service/StudentController.php';
$manager = new StudentController("localhost", "root", "", "users");
if (isset($_GET['delete'])) {


        $manager->delete("students", $_GET['delete']);
        header("location:studentAdmin.php");


}



?>


    <a href="admin.php" class="link-dark link-offset-2 link-underline-opacity-0 "><h1><-</h1></a>

    <h4>Это список всех студентов</h4>
<?php if(empty($students)) {
    echo 'Пока что пусто'; }
else { ?>
    <?php

    foreach ($students as $student): ?>
        <div>
            <form action="" >
                <p>ID: <?= $student['id'] ?></p>
                <p>ФИО: <?= $student['surname'] ?> <?= $student['name'] ?> <?= $student['lastname'] ?></p>
                <a href="editPageAdmin.php?id=<?= $student['id']?>" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover">Редактировать</a>
                <a href="?delete=<?= $student['id']?>" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover">Удалить</a>
                <hr>
            </form>
        </div>
    <?php endforeach; ?>
<?php  } ?>

<?php
include "../style/footer.php";
?>