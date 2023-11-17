<?php 
require_once 'components/header.php';
session_start();
if(isset($_SESSION['email'])){
    header("Location: home");
}
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Sign In</h3>
                </div>
                <div class="card-body">
                    <form id="login" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                            <span class="text-danger field_error" id="email_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                            <span class="text-danger field_error" id="password_error"></span>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Sign In</button>
                        </div>
                        <span class="text-danger field_error" id="common_error"></span>
                    </form>
                    <div class="text-center mt-3">Don't have an account? <a class="text-decoration-none" href="user_registration">Sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
require_once 'components/footer.php';
?>