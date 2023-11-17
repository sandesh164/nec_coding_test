<?php

require_once 'User.php';
$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $helper = new commonHelper();
    $errors = $helper->validateUserData($_POST, $_FILES);       //validate data
    if(empty($errors)){
        $response = $user->register($_POST['email'], $_POST['password'], $_FILES['image']);
        $helper->getFormattedResponse(true, 200, $response);
        exit();
    }else{
        $helper->getFormattedResponse(false, 403, 'Validation failed', $errors);
        exit();
    }
}

