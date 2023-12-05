<?php
session_start();
if(!isset($_SESSION['auth'])){
    $_SESSION['auth'] = false;
}
if(!isset($_SESSION['role'])){
    $_SESSION['role'] = 0;
}
$today = date("Y-m-d");

?>
<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Boo  tstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">

    <div class="container">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../lists/groups.php">Главная</a>
                </li>

                <!--<li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>-->
            </ul>
            <?php if($_SESSION['role'] == 2) { ?>
            <a class="nav-link active" aria-current="page" href="../admin/admin.php">админка</a>
            <?php } ?>
            <?php if (!$_SESSION["auth"]) {   ?>
            <button onclick="location.href='../user/login.php';" class="btn btn-secondary m-2">Вход</button>
            <a href="../user/register.php"><button class="btn btn-outline-secondary">Регистрация</button></a>
            <?php  }else{ ?>
                <button onclick="location.href='../service/auth.php';" class="btn btn-secondary m-2">Выход</button>
            <?php  }?>
</nav>
<div class="container">
    <div class="row">

