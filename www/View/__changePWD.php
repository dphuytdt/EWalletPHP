<?php
    ob_start();
    session_start();
?>


<!DOCTYPE html>
<html>

<head>
    <title>Change Your Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container col-3">
        <h2 class="row justify-content-center mt-3">Set Your New Password</h2>
        <form action="../Controller/__ChangePWD.php" method="post">
            <div class="mb-3 mt-3">
                <label for="new_password">New Password</label>
                <input class="form-control" type="password" name="new_password" id="new_password"
                    placeholder="Enter your new password..." required>
            </div>
            <div class="mb-3 mt-3">
                <label for="new_password">Re-enter your new password</label>
                <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Re-enter your new password..." required>
            </div>
            <div class="mb-3 mt-3 btn-group">
                <input class="btn btn-outline-primary" type="submit" name="change_password" value="Change Password">
                <button class="btn btn-outline-danger" type="button" onclick="window.location.href='../View/home.php'">Cancel</button>
            </div>
        </form>
    </div>
</body>

</html>