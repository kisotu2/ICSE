<html>
    <?php 
    include('navbar.php');
    include('authentication.php');
    ?>
    <link rel="stylesheet" href="styles.css">
<div class = "main-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">
                        <form method = "post" action = "app.php">
                        <div class="mb-3">
                            <label for="">First Name</label>
                            <input type="text" name="fname" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email Address</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">User Name</label>
                            <input type="text" name="user_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Confirm Password</label>
                            <input type="text" name="confirm_password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="register_btn" class="btn btn">Submit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</html>