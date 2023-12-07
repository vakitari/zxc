<?php
class ThemeController {

    public function delete($table, $id) {
        $connection = new mysqli("localhost", "root", "", "users");
        $result = $connection->query("DELETE FROM $table WHERE id ='$id'");
        if (!$result) {
            die("Error deleting record: " . $this->connection->error);
        }
    }

    public function edit($name, $surname, $lastname,$id,$id_groups) {
        $connection = new mysqli("localhost", "root", "", "users");
        $result = $connection->query("UPDATE students SET name='$name', surname='$surname', lastname='$lastname', id_groups = '$id_groups' WHERE id='$id'");
       
        if (!$result) {
            die("Error editing record: " . $this->connection->error);
        }
    }
}