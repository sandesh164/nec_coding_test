<?php
require_once 'components/header.php';
session_start();
if(!isset($_SESSION['email'])){
    header("Location: user_login");
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Welcome, <?=$_SESSION['email']?></h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 text-center">
                        <div class="form-label">Your profile image</div>
                        <img src="<?=$base_url.'assets/images/'.$_SESSION['image']?>" alt="user-image" width="200" height="200">
                    </div>
                    <a href="logout" class="float-end">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once 'components/footer.php';
?>