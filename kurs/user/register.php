<?php
include "../style/header.php";


?>


        <div class="col-lg-3 mt-3">
            <label class="form-label mt-3" > <h3> Регистация</h3></label>

            <form action="../service/reg.php" method="POST">
                <label class="form-label mt-3" for="login"> Логин </label> <div class="d-flex flex-column justify-content-between">
                <input class="form-control mt-1 " name="login" required maxlength="20" minlength="4"><?php
                if(!empty($_SESSION['error'])) {?>
                <p><?=$_SESSION['error']?></p>
                <?php }unset($_SESSION['error']); ?></div>
                <label class="form-label mt-2" for="mail"> Почта</label>
                <input class="form-control mt-1" type="email" name="mail" required>
                <label class="form-label mt-3" for="date_resp"> Дата рождения</label>
                <input class="form-control mt-1 " type="date" name="date_resp" required>
                <label class="form-label mt-3" for="password"> Пароль</label>
                <input class="form-control mt-1" name="password" type="password" required maxlength="20" minlength="2">
                <label class="form-label mt-3" for="password"> Подтверждение</label>
                <div class="d-flex flex-column justify-content-between">
                <input class="form-control mt-1" name="pas_conf" type="password" required maxlength="20" minlength="2"><?php
                    if(!empty($_SESSION['errorPass'])) {?>
                    <p><?=$_SESSION['errorPass']?></p>
                    <?php }unset($_SESSION['errorPass']); ?></div>
                <input class="form-control mt-2" type="submit">
            </form>
        </div>

<?php
include "../style/footer.php";
?>