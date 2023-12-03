<?php
include "../style/header.php";

?>
<?php

$conn = mysqli_connect("localhost", "root", "", "users");
$groupId = $_GET['id'];
$query = $conn->query("SELECT * FROM students where id_groups = '$groupId'");
$gr = $conn->query("SELECT * FROM groups where id = '$groupId'");
$group = mysqli_fetch_assoc($gr);
while($student = mysqli_fetch_assoc($query))
{
    $students[] = $student;
}

?>


<h2>Группа <?php echo $group['name_group'] ?> </h2>
            <?php foreach ($students as $student): ?>
                <div>
                    <form action="" >
                        <p>ID: <?= $student['id'] ?></p>
                        <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-25-hover" href = "student.php?id=<?=$student['id']?>"> <p>ФИО: <?= $student['surname'] ?> <?= $student['name'] ?> <?= $student['lastname'] ?></p></a>
                        <hr>
                    </form>
                </div>
            <?php endforeach; ?>


<?php
include "../style/footer.php";
?>
