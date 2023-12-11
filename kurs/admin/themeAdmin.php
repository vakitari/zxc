<?php
include "../style/header.php";
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "users");
$query = $conn->query("SELECT * FROM theme");
while($theme = mysqli_fetch_assoc($query))
{
    $themes[] = $theme;
}
if ($_SESSION['role'] != 2) {
    header("location:../lists/groups.php");
}

require_once '../service/ThemeController.php';
$manager = new ThemeController("localhost", "root", "", "users");
if (isset($_GET['delete'])) {
    $manager->delete("theme", $_GET['delete']);
    header('location:themeAdmin.php');
}



?>


    <a href="admin.php" class="link-dark link-offset-2 link-underline-opacity-0 "><h1><-</h1></a>

    <h4>Это список всех Предметов</h4><?php if(!$_SESSION['auth']) {
}
else { ?>
    <button type="button" onclick="location.href='../add/addGroup.php';" class="btn btn-outline-secondary col-2 mb-2">Добавить Премет</button>
<?php  } ?>
<?php if(empty($themes)) {
    echo 'Пока что пусто'; }
else { ?>
    <?php

    foreach ($themes as $theme): ?>
        <div>
            <form action="" >
                <p>ID: <?= $theme['id'] ?></p>
                <p>ФИО: <?= $theme['name_theme'] ?> </p>
                <a href="editPageAdmin.php?id=<?= $theme['id']?>" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover">Редактировать</a>
                <a href="?delete=<?= $theme['id']?>" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover">Удалить</a>
                <hr>
            </form>
        </div>
    <?php endforeach; ?>
<?php  } ?>

<?php
include "../style/footer.php";
?>