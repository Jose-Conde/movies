<?php

class DB{

    /**
    *
    * Connection & Credentials
    *
    **/
    private $server = "localhost";
    private $db_name = "movies";
    private $user_name = "root";
    private $user_password = "";
    public $conn;
 
    /**
    *
    * Database Connection
    *
    **/
    public function get_connection(){

        $con = mysqli_connect($this->server, $this->user_name, $this->user_password, $this->db_name) or die("Error connecting to database: " . mysqli_connect_error());

        if (mysqli_connect_errno()) {
            printf("Error connecting to database: %s\n", mysqli_connect_error());
            exit();
        } else {
            $this->conn = $con;
        }
        return $this->conn;
    }
}

?>