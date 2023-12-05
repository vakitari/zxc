<?php
include "../style/header.php";
?>
<?php
if($_SESSION['role'] != 2){
    header("location:../lists/groups.php");
}
?>



    <div class="row d-flex justify-content-center text-center">
        <h4>Здраствуй админ! Здесь ты сможешь смотреть, редактировать и удалять все записи существующие в базе </h4>
        <div class="col-md-6 mx-auto">
            <div class="col-4 mx-auto d-flex flex-column">

                <button type="button" onclick="location.href='studentAdmin.php';" class="btn btn-info btn-lg mt-2 flex-grow-1">Студенты</button>
                <button type="button" onclick="location.href='groupsAdmin.php';" class="btn btn-info btn-lg mt-2 flex-grow-1">Группы</button>
                <button type="button" onclick="location.href='themeAdmin.php';" class="btn btn-info btn-lg mt-2 flex-grow-1">Предметы</button>
                <button type="button" onclick="location.href='userAdmin.php';" class="btn btn-info btn-lg mt-2 flex-grow-1">Пользователи</button>
            </div>
        </div>
    </div>
<?php
include "../style/footer.php";
?>