<?php
include "../style/header.php";
?>
<?php
if($_SESSION['role'] != 2){
    header("location:../lists/groups.php");
}
?>