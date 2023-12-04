<?php
include "../style/header.php";
?>
<?php


$conn = mysqli_connect("localhost", "root", "", "users");
$query = $conn->query("SELECT * FROM groups");
while($group = mysqli_fetch_assoc($query))
{
    $groups[] = $group;
}
?>
<?php if(!$_SESSION['auth']) {
}
        else { ?>
<button type="button" onclick="location.href='../add/addGroup.php';" class="btn btn-outline-secondary col-2 mb-2">Добавить Группу</button>
<?php  } ?>
<div></div>
<?php if(empty($groups)) {
         echo 'Пока что пусто'; }
        else { ?>
<?php foreach ($groups as $group): ?>
    <form action="" >
        <p> <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-25-hover"  href = "students_list.php?id=<?=$group['id']?>"><?= $group['name_group'] ?>

            </a></p>
        <hr>
    </form>
<?php endforeach; ?>
<?php  } ?>

<?php
include "../style/footer.php";
?>
