<?php
include "../style/header.php";
?>
	<?php

	if(!empty($_SESSION['error']))
	{
	?>
	<p style="color:red;"><?=$_SESSION['error']?></p>

	<?php
	}
	unset($_SESSION['error']);
	?>

        <div class="col-lg-3 mt-3">
            <label class="form-label mt-3" > <h3> Регистация</h3></label>

            <form action="../service/reg.php" method="POST">
                <label class="form-label mt-3" for="password"> Пароль</label>
                <input class="form-control mt-1 " name="login">
                <label class="form-label mt-3" for="password"> Пароль</label>
                <input class="form-control mt-1" name="password" type="password">
                <input class="form-control mt-2" type="submit">
            </form>
        </div>

<?php
include "../style/footer.php";
?>