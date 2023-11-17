<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Registration and Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <?php
            $urlSegments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
            $firstSegment = current($urlSegments);  //to get first segment
            $http = "http://";
            if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']!='off')) {
                $http = "https://";
            }
            $base_url = $http . $_SERVER['HTTP_HOST']."/$firstSegment/";
        ?>
    </head>