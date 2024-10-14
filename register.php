<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="main-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="../ICSE/app.php">
                                <div class="mb-3">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="user_name">User Name</label>
                                    <input type="text" name="user_name" class="form-control" required>
                                </div>
                                <div class="mb-3">
    <label for="gender">Gender</label>
    <select name="genderId" class="form-control">
        <option value="0">Select Gender</option>
        <option value="1">Male</option>
        <option value="2">Female</option>
    </select>
</div>
<div class="mb-3">
    <label for="role">Role</label>
    <select name="roleId" class="form-control">
        <option value="0">Select Role</option>
        <option value="1">Admin</option>
        <option value="2">User</option>
    </select>
</div>

                                <div class="mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="register" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
