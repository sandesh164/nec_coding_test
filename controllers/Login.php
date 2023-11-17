<?php

require_once 'User.php';
$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $helper = new commonHelper();
    $errors = $helper->validateLoginCredentials($_POST);    //validate data
    if(empty($errors)){
        $response = $user->login($_POST['email'], $_POST['password']);
        $helper->getFormattedResponse(true, 200, $response);
        exit();
    }else{
        $helper->getFormattedResponse(false, 403, 'Validation failed', $errors);
        exit();
    }
}

