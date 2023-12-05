<?php
class UserController {

    public function delete($table, $id) {
        $connection = new mysqli("localhost", "root", "", "users");
        $query = "DELETE FROM $table WHERE id = $id";
        $result = $connection->query($query);

        if (!$result) {
            die("Error deleting record: " . $this->connection->error);
        }
    }

    public function edit($login, $password, $date_resp,$pas_conf,$date,$country,$mail, $id) {
        $connection = new mysqli("localhost", "root", "", "users");
        $result = $connection->query("UPDATE user SET login='$login', password='$password', date_resp='$date_resp', pas_conf = '$pas_conf',date = '$date', country = '$country', mail = '$mail' WHERE id='$id'");

        // привязка параметров к запросу


        if (!$result) {
            die("Error editing record: " . $this->connection->error);
        }
    }
}