<?php
include "../style/header.php";
?>




    <div class="mt-2"><?php
        if (!empty($_SESSION['error'])) {
            echo $_SESSION['error'];
        }

        ?></div>
        <div class="col-lg-3 mt-3">
            <label class="form-label mt-3" >  <h3> Авторизация</h3></label>

            <form action="../service/log.php" method="POST">
                <label class="form-label mt-3" for="password"> Пароль</label>
                <input class="form-control mt-1 " name="login">
                <label class="form-label mt-3" for="password"> Пароль</label>
                <input class="form-control mt-1" name="password" type="password">
                <?php
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < 5; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                ?>
                <h1 style="background-color: blue;color: red;user-select: none; text-align: center" class="mt-2"><?= $randomString?></h1>
                <input class="form-control mt-1" type="text" placeholder="Введите текст выше" required>
                <input class="form-control mt-2" type="submit">
            </form>
        </div>

<?php
include "../style/footer.php";
?>