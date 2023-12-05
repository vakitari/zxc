
<?php
include "../style/header.php";


?>
<?php

$conn = mysqli_connect("localhost", "root", "", "users");
$student = $_GET['student'];
$theme = $_GET['id'];
$query = $conn->query("SELECT * FROM posesh where id_theme = '$theme' and id_student = '$student'");
$poseshenie = [];
while($posesh = mysqli_fetch_assoc($query))
{
    $poseshenie[] = $posesh;
}
if (!empty($_SESSION['errDate'])){
    echo $_SESSION['errDate'];
}


?>
<h1>Добавьте дату</h1>
        <form action="../service/date.php" method="post">
            <div class="col-2 mt-2">
                <input name="date" type="date"></div>
            <p class="mt-2">Присутствовал в этот день?</p>
            <div class="col-2">
            <select class="form-select" name="presence" id="cars">
                <option value="1">Да</option>
                <option value="0">Нет</option>

            </select>
            </div>
                <input type="submit" class="btn btn-success mt-3">
            <input type="hidden" name="id_student" value="<?=$student?>">
            <input type="hidden" name="id_theme" value="<?=$theme?>">
        </form>

<?php foreach($poseshenie as $posesh): ?>

     <p class="mt-2">Дата: <?= $posesh['data'] ?> Присутствие: <?php if($posesh["presence"] != 0){ echo "был";} else{ echo "Не было"; }?> </p>
     <hr>
     <?php endforeach; ?>
    


<?php
include "../style/footer.php";
?>