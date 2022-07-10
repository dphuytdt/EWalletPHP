<?php
    ob_start();
    session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Change First Password</title>
    <link rel="icon" href="../Resource/image/change_pwd.png" type="image/icon type">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <h2 class="text-center text-secondary mt-5 mb-3">Change First Password</h2>
                <form action="../Controller/ChangeFirstPassword.php" method="post" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" name="new_password" id="new_password" placeholder="New password..." class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="new_password">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter your password..." class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="change_password" value="Change Password" class="btn btn-outline-success mr-2">
                        <button type="button" onclick="window.location.href='../View/home.php'" class="btn btn-outline-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>