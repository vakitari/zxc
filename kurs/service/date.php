<?php
$conn = mysqli_connect("localhost", "root", "", "users");
$date = $_POST['date'];
$presence = $_POST['presence'];
$student = $_POST['id_student'];
$theme = $_POST['id_theme'];
if (!empty($date)){
    $query = $conn->query("INSERT INTO posesh SET data= '$date' , presence= '$presence', id_student ='$student', id_theme = '$theme'  ");
}else{
    $_SESSION['errDate'] = 'Выберите дату';
}

header('location: ../add/addDate.php?id=' .$theme.'&student='.$student.'');