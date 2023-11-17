<?php

require_once '../models/Database.php';
require_once '../helpers/common_helper.php';
session_start();

class User extends Database
{
    private $db;
    private $response;
    public function __construct() {
        $this->response = new commonHelper();
        try {
            $this->db = new Database();
        }catch (Exception $e){
            $this->response->getFormattedResponse(false, 504, $e->getMessage());
            exit();
        }
    }
    public function register($email, $password, $file)
    {
        // check if email already exists
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = $this->db->conn->query($query);

        if ($result->num_rows > 0) {
            $this->response->getFormattedResponse(false, 409, "Email already exists");
            exit();
        }
        $password = password_hash($password, PASSWORD_DEFAULT);     //encrypt password
        $imageExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $fileName= time() . '.' . $imageExtension;      //create unique filename based on timestamp
        $targetDir = "../assets/images/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $target_file = $targetDir . $fileName;
        //upload file here
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            $query = "INSERT INTO users (`email`, `password`, `image`) 
                        VALUES ('$email', '$password', '$fileName')";
            if ($this->db->conn->query($query) === TRUE) {
                $this->response->getFormattedResponse(true, 200, "Signed up successfully");
                exit();
            } else {
                $this->response->getFormattedResponse(false, 409, "Error: " . $this->conn->error);
                exit(); 
            }
        } else {
            $this->response->getFormattedResponse(false, 500, "File upload failed");
            exit();
        }
    }

    public function login($email, $password)
    {
        $sql = "SELECT id, email, password, image FROM users WHERE email='$email'";
        $result = $this->db->conn->query($sql);

        //check if user exists
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            //check if password matches
            if (password_verify($password, $row['password'])) {
                $_SESSION = [
                    'id' => $row['id'],
                    'email' => $email,
                    'image' => $row['image']
                ];
                $this->response->getFormattedResponse(true, 200, "Signed in successfully");
                exit();
            } else {
                $this->response->getFormattedResponse(false, 401, "Invalid password");
                exit();
            }
        } else {
            $this->response->getFormattedResponse(false, 404, "User not found");
            exit();
        }
    }
}

