<?php
include "../style/header.php";


?>
<?php
if (!empty($_SESSION['errDate'])){
    echo $_SESSION['errDate'];
}
$student = $_GET['student'];
$theme = $_GET['id'];
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
<?php
include "../style/footer.php";
?>