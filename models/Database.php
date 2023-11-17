<?php

class Database
{
    private $server = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "nec_test";
    protected $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->server, $this->user, $this->pass, $this->db);
        if ($this->conn->connect_error) {
            throw new Exception("Connection failed: " . $this->conn->connect_error);
            exit();
        }
    }
}
