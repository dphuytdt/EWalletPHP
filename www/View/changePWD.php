<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <meta charset="utf-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script   script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Resource/css/style.css">
    <script src="../Resource/js/main.js"></script>
</head>
<body>
    <?php
        require 'layout/header.php';
    ?>
    <br><br><br><br><br><br><br><br>
    <!-- <h1>Change Password</h1>
    <form action="../Controller/ChangePWD.php" method="post">
        <label for="old_password">Old Password</label>
        <input type="password" name="old_password" id="old_password" required>
        <label for="new_password">New Password</label>
        <input type="password" name="new_password" id="new_password" required>
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
        <input type="submit" name="changePassword" value="Change Password">
        <button type="button" onclick="window.location.href='../View/home.php'">Cancel</button> -->

        <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="../Controller/ChangePWD.php" method="POST">
                <div class="form-group">
                    <label for="">Old Password</label>
                    <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Enter Old Password" required >
                   
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password" required>
                </div>
                <div class="form-group">
                   
                    <input type="submit" class="form-control" name="changePassword" placeholder="Change Password" >
                    <div class="back">
                        <br>
                        <a href="../View/home.php" class="btn btn-primary">Back</a>
                    </div>
                </div>
                </form>
        </div>
    </div>
    </form>
</body>
</html>

