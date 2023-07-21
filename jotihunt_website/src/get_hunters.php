<?php
class get_hunters {
    private $servername = "localhost";
    private $username = "root";
    private $password = "usbw";
    private $dbname = "jotihunt_db";

    function get_all(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "SELECT * FROM hunters";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        //create an array
            $techarray = array();
            while($row =mysqli_fetch_assoc($result)){
                $techarray[] = $row;
            }
            echo json_encode($techarray);
        }
        $conn->close();
    }

    function print_hunter_table(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "SELECT * FROM hunters";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        //print_r($result->fetch_assoc());
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["hunter_id"]. " - Name: " . $row["name"]. " - number_persons: " . $row["number_persons"]. " - status: " . $row["status"]. " - last_location: " . $row["last_location"]. " - timestamp_last_location: " . $row["timestamp_last_location"]. " - number_hunts: " . $row["number_hunts"]. "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    }
}

$hunter_class = new get_hunters();
$q = $_REQUEST["q"];

if ($q == "print_table") {
    $hunter_class->print_hunter_table();
}elseif ($q == "get_all") {
    $hunter_class->get_all();
}
?>