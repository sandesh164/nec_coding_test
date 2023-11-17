<?php
class commonHelper{
    function getFormattedResponse($type, $code, $msg, $data=""){
        $response = [
            "type" => $type,
            "code" => $code,
            "message" => $msg,
            "data" => $data
        ];
        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    function validateUserData($data, $file)
    {
        $errors = [];

        if(empty($data['email'])){
            $errors['email'] = 'Email field cannot be empty';   
        }else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format';
        }else if (strlen($data['email']) > 100) {
            $errors['email'] = 'Email should contain maximum 100 characters';
        }
        
        // password validation (at least one special character and one number)
        if(empty($data['password'])){
            $errors['password'] = 'Password field cannot be empty';   
        }else if (!preg_match('/[0-9]/', $data['password']) || !preg_match('/[^A-Za-z0-9]/', $data['password'])) {
            $errors['password'] = 'Password should contain at least one number and one special character';
        }

        // confirm password validation
        if(empty($data['conf_password'])){
            $errors['conf_password'] = 'Confirm Password field cannot be empty';   
        }else if ($data['password'] != $data['conf_password']){
            $errors['conf_password'] = 'Password and confirm password do not match';   
        }

        // image file validation (png|jpg, max 5 MB)
        if(!empty($file['image']['name'])){
            $allowedExtensions = ['png', 'jpg'];
            $maxFileSize = 5 * 1024 * 1024; // 5 MB in bytes
            $imageExtension = strtolower(pathinfo($file['image']['name'], PATHINFO_EXTENSION));
            if (!in_array($imageExtension, $allowedExtensions)) {
                $errors['image'] = 'Only PNG and JPG files are allowed';
            }else if ($file['image']['size'] > $maxFileSize) {
                $errors['image'] = 'Image size should be at most 5 MB';
            }
        }else{
            $errors['image'] = 'Please select photo';   
        }

        return $errors;
    }

    function validateLoginCredentials($data)
    {
        $errors = [];

        if(empty($data['email'])){
            $errors['email'] = 'Email field cannot be empty';   
        }else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format';
        }
        
        // password validation (at least one special character and one number)
        if(empty($data['password'])){
            $errors['password'] = 'Password field cannot be empty';   
        }

        return $errors;
    }
}