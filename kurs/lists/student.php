<?php


$conn = mysqli_connect("localhost", "root", "", "users");
$query = $conn->query("SELECT * FROM theme");
while($theme = mysqli_fetch_assoc($query))
{
    $themes[] = $theme;
}
$student = $_GET['id'];

?>

<?php
include "../style/header.php";
?>


        <p>Выберите предме:</p>
        <?php foreach ($themes as $theme): ?>

                <p> <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-25-hover"  href = "../add/addDate.php?id=<?=$theme['id']?>&student=<?=$student?>"><?= $theme['name_theme'] ?>

                    </a></p>
                <hr>

        <?php endforeach; ?>

<?php
include "../style/footer.php";
?>