<?php
$conn = mysqli_connect("localhost", "root", "", "users");


    $groupId = $_POST['groupId'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $lastname = $_POST['lastname'];
    $query = $conn->query("INSERT INTO students SET name= '$name' , surname= '$surname', lastname='$lastname', id_groups= '$groupId'");
    header("location:addStudent.php?group=$groupId");
