
<?php
include "../style/header.php";
?>
<?php
require_once '../service/UserController.php';
if ($_SESSION['role'] != 2) {
    header("location:../lists/groups.php");
}
$manager = new UserController("localhost", "root", "", "users");
$conn = mysqli_connect("localhost", "root", "", "users");
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM user WHERE id = '$id' ");
$user = mysqli_fetch_assoc($result);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $date_resp = $_POST['date_resp'];
    $pas_conf = $_POST['pas_conf'];
    $date = $_POST['date'];
    $country = $_POST['country'];
    $mail = $_POST['mail'];
    // вызов метода класса для редактирования записи
    $manager->edit($login, $password, $date_resp,$pas_conf,$date,$country,$mail,$id);
    header("location:userAdmin.php");

}
var_dump($user);
?>

<form method="post" action="">
    <label class="form-label mt-3" for="login" > Логин </label> <div class="d-flex flex-column justify-content-between">
        <input class="form-control mt-1 " name="login" value="<?= $user['login'] ?>" required maxlength="20" minlength="4" pattern ="^[a-zA-Z0-9]+$" title="Логин может стостоять только из цифр и лаинских букв."><?php
       /* if(!empty($_SESSION['error'])) {*/?>
            <p><?php /*=$_SESSION['error']*/?></p>
        <?php /* }unset($_SESSION['error']); */?></div>
    <label class="form-label mt-2" > Почта</label>
    <input class="form-control mt-1" type="text" value=" <?= $user['mail'] ?>" name="mail" required >
    <label class="form-label mt-3" for="date_resp"> Дата рождения</label>
    <input class="form-control mt-1 " value="<?= $user['date_resp'] ?>" type="date" name="date_resp" required>
    <label for="country" class="mt-2">Страна проживания:</label>
    <select class="form-select mt-2"  id="country" name="country">
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
    <input class="form-control mt-1" value="<?= $user['password'] ?>" name="password" type="password" required maxlength="20" minlength="2" pattern ="^[a-zA-Z0-9]+$" title="пароль может стостоять только из цифр и лаинских букв.">
    <label class="form-label mt-3" for="password"> Подтверждение нового пароля</label>
    <div class="d-flex flex-column justify-content-between">
        <input class="form-control mt-1" value="<?= $user['pas_conf'] ?>" name="pas_conf" type="password" required maxlength="20" minlength="2"><?php
        /*if(!empty($_SESSION['errorPass'])) {*/?>
            <p><?php /*=$_SESSION['errorPass']*/?></p>
        <?php /*}unset($_SESSION['errorPass']);*/ ?></div>


    <input type="submit" value="Редактировать">
</form>
<?php
include "../style/footer.php";
?>