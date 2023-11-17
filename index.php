<?php
$urlSegments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$lastSegment = end($urlSegments);  //to get last segment i.e. requested view page 
if (!file_exists("views/$lastSegment.php")) {
    header("Location: views/404");
}
header("Location: views/user_registration");
exit();