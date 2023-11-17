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
                    <h3 class="text-center">Sign Up</h3>
                </div>
                <div class="card-body">
                    <form id="register" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email<b class="text-danger">*</b></label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
                            <span class="text-danger field_error" id="email_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password<b class="text-danger">*</b></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                            <span class="text-danger field_error" id="password_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="conf_password" class="form-label">Confirm Password<b class="text-danger">*</b></label>
                            <input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="Enter confirm password">
                            <span class="text-danger field_error" id="conf_password_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Photo<b class="text-danger">*</b></label>
                            <input type="file" name="image" id="image" accept="image/*">
                            <div>
                                <small>Note: (Only JPG & PNG files are allowed)</small>
                            </div>
                            <span class="text-danger field_error" id="image_error"></span>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </div>
                        <span class="text-danger field_error" id="common_error"></span>
                        <span class="text-success" id="success_message"></span>
                    </form>
                    <div class="text-center mt-3">Have an account? <a class="text-decoration-none" href="user_login">Sign in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
require_once 'components/footer.php';
?>