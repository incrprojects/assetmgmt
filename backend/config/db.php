<?php
//$conn = mysqli_connect('localhost','root','','asset_mgmt_db') or die(mysqli_error());

?>
<?php

class Database {
    private $db_host = "localhost";
    // Change as required
    private $db_user = "root";
    // Change as required
    private $db_pass = "";
    // Change as required
    private $db_name = "asset_mgmt_db";
    // Change as required
    // Function to make connection to database
    public function connect() {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        return $connection;
    }

    public function disconnect($conn) {
        mysqli_close($conn);
    }
}

?>