<?php
class GroupController {

    public function delete($table, $id) {
        $connection = new mysqli("localhost", "root", "", "users");
        $query = "DELETE FROM $table WHERE id = $id";
        $result = $connection->query($query);

        if (!$result) {
            die("Error deleting record: " . $this->connection->error);
        }
    }

    public function edit($name,$id) {
        $connection = new mysqli("localhost", "root", "", "users");
        $result = $connection->query("UPDATE groups SET name_group='$name' WHERE id='$id'");
        if (!$result) {
            die("Error editing record: " . $this->connection->error);
        }
    }
}