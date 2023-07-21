<?php
class get_foxes {
    private $servername = "localhost";
    private $username = "root";
    private $password = "usbw";
    private $dbname = "jotihunt_db";


    function get_fox1(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "SELECT * FROM fox_spots WHERE name='Alpha'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        //create an array
            $techarray = array();
            while($row =mysqli_fetch_assoc($result)){
                $techarray[] = $row;
            }
            //echo json_encode($techarray);
        }
        $conn->close();
        return $techarray;
    }

    function get_fox2(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "SELECT * FROM fox_spots WHERE name='Bravo'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        //create an array
            $techarray = array();
            while($row =mysqli_fetch_assoc($result)){
                $techarray[] = $row;
            }
            //echo json_encode($techarray);
        }
        $conn->close();
        return $techarray;
    }

    function get_fox3(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "SELECT * FROM fox_spots WHERE name='Charlie'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        //create an array
            $techarray = array();
            while($row =mysqli_fetch_assoc($result)){
                $techarray[] = $row;
            }
            //echo json_encode($techarray);
        }
        $conn->close();
        return $techarray;
    }

    function get_fox4(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "SELECT * FROM fox_spots WHERE name='Delta'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        //create an array
            $techarray = array();
            while($row =mysqli_fetch_assoc($result)){
                $techarray[] = $row;
            }
            //echo json_encode($techarray);
        }
        $conn->close();
        return $techarray;
    }

    function get_fox5(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "SELECT * FROM fox_spots WHERE name='Echo'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        //create an array
            $techarray = array();
            while($row =mysqli_fetch_assoc($result)){
                $techarray[] = $row;
            }
            //echo json_encode($techarray);
        }
        $conn->close();
        return $techarray;
    }

    function get_all(){
        $total_foxes = array();

        $fox_1 = $this->get_fox1();
        $total_foxes[] = $fox_1;

        $fox_2 = $this->get_fox2();
        $total_foxes[] = $fox_2;

        $fox_3 = $this->get_fox3();
        $total_foxes[] = $fox_3;

        $fox_4 = $this->get_fox4();
        $total_foxes[] = $fox_4;

        $fox_5 = $this->get_fox5();
        $total_foxes[] = $fox_5;

        echo json_encode($total_foxes);
    }

    function print_table(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "SELECT * FROM fox_spots";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        //print_r($result->fetch_assoc());
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["spot_id"]. " - Name: " . $row["name"]. " - location_lat: " . $row["location_lat"]. " - location_long: " . $row["location_long"]. " - timestamp: " . $row["timestamp"]. " - hunt: " . $row["hunt"]. " - hunter_id: " . $row["hunter_id"]. "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    }
}

$foxes_class = new get_foxes();
$q = $_REQUEST["q"];

if ($q == "print_table") {
    $foxes_class->print_table();
}elseif ($q == "get_all") {
    $foxes_class->get_all();
}
?>