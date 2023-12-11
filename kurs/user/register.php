<?php
include "../style/header.php";


?>


        <div class="col-lg-3 mt-3">
            <label class="form-label mt-1" > <h3> Регистация</h3></label>

            <form action="../service/reg.php" method="POST">
                <label class="form-label mt-3" for="login" > Логин </label> <div class="d-flex flex-column justify-content-between">
                <input class="form-control mt-1 " name="login" required maxlength="20" minlength="4" pattern ="^[a-zA-Z0-9]+$" title="Логин может стостоять только из цифр и лаинских букв."><?php
                if(!empty($_SESSION['error'])) {?>
                <p><?=$_SESSION['error']?></p>
                <?php }unset($_SESSION['error']); ?></div>
                <label class="form-label mt-2" for="mail"> Почта</label>
                <input class="form-control mt-1" type="email" name="mail" required >
                <label class="form-label mt-3" for="date_resp"> Дата рождения</label>
                <input class="form-control mt-1 " type="date" name="date_resp" required>
                <label for="country" class="mt-2">Страна проживания:</label>
                <select class="form-select mt-2" id="country" name="country">
                    <option value="">Выберите страну</option>
                    <option value="china">Китай</option>
                    <option value="indonesia">Индонезия</option>
                    <option value="india">Индия</option>
                    <option value="pakistan">Пакистан</option>
                    <option value="brazil">Бразилия</option>
                    <option value="netherlands">Нидерланды</option>
                    <option value="bangladesh">Бангладеш</option>
                    <option value="russia">Россия</option>
                    <option value="mexico">Мексико</option>
                    <option value="nigeria">Нигерия</option>
                    <option value="british-virgin-islands">Британские Виргинские острова</option>
                    <option value="belgium">Бельгия</option>
                    <option value="germany">Германия</option>
                    <option value="saudi-arabia">Саудовская Аравия</option>
                    <option value="iran">Иран</option>
                    <option value="south-africa">Южная Африка</option>
                    <option value="jordan">Иордания</option>
                    <option value="philippines">Филиппины</option>
                    <option value="france">Франция</option>
                    <option value="italy">Италия</option>
                    <option value="tunisia">Тунис</option>
                    <option value="algeria">Алжир</option>
                    <option value="spain">Испания</option>
                    <option value="poland">Польша</option>
                    <option value="afghanistan">Афганистан</option>
                    <option value="sudan">Судан</option>
                    <option value="colombia">Колумбия</option>
                    <option value="uganda">Уганда</option>
                    <option value="argentina">Аргентина</option>
                    <option value="poland">Польша</option>
                </select>
                <label class="form-label mt-3" for="password"> Пароль</label>
                <input class="form-control mt-1" name="password" type="password" required maxlength="20" minlength="2" pattern ="^[a-zA-Z0-9]+$" title="пароль может стостоять только из цифр и лаинских букв.">
                <label class="form-label mt-3" for="password"> Подтверждение пароля</label>
                <div class="d-flex flex-column justify-content-between">
                <input class="form-control mt-1" name="pas_conf" type="password" required maxlength="20" minlength="2"><?php
                    if(!empty($_SESSION['errorPass'])) {?>
                    <p><?=$_SESSION['errorPass']?></p>
                    <?php }unset($_SESSION['errorPass']); ?></div>
                <?php
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < 5; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                ?>
                <h1 class="mt-2" style="background-color: blue;color: red;user-select: none; text-align: center"> <?= $randomString?> </h1>
                <input class="form-control mt-1" pattern="<?= $randomString?>" type="text" title="Чтобы подтвердить что вы не робот вы должны ввести текст который совподает с тем что выше" placeholder="Введите текст выше" required>

                <input class="form-control mt-2" type="submit">

            </form>
        </div>

<?php
include "../style/footer.php";
?>