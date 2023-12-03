<?php
$conn = mysqli_connect("localhost", "root", "", "users");

if(isset($_POST['students']) && is_array($_POST['students'])){
    $students = $_POST['students'];
    // Теперь $students - это массив с данными студентов
    foreach ($students as $student) {
        $groupName = $student['groupName'];
        $name = $student['name'];
        $surname = $student['surname'];
        $lastname = $student['lastname'];

        // Добавляем данные в массив
        $data[] = array(
            'groupName'=> $groupName,
            'name' => $name,
            'surname' => $surname,
            'lastname' => $lastname
        );
    }

       $name_group = $data[sizeof($data)-1]['groupName'];

        $conn->query("INSERT INTO groups SET name_group= '$name_group' ");
        $lastId = mysqli_insert_id($conn);
        //echo $lastId;

        //var_dump($query);
    foreach ($data as $finalArr){
        $name = $finalArr['name'];
        $surname = $finalArr['surname'];
        $lastname = $finalArr['lastname'];
        $query = $conn->query("INSERT INTO students SET name= '$name' , surname= '$surname', lastname='$lastname', id_groups= $lastId");

    }


    // Выводим данные в формате JSON
    //var_dump($data);
    exit(); // Важно завершить выполнение скрипта после отправки данных
}