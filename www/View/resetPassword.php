<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container col-3 bg-light">
        <h2 class="row justify-content-center mt-3">Enter OTP</h2>
        <form action="../Controller/CheckOTP.php" method="post">
            <div class="mb-3 mt-3">
                <label for="otp">OTP</label>
                <input class="form-control" type="text" name="otp" id="otp" required>
            </div>
            <div class="mb-3 mt-3 btn-group">
                <input class="btn btn-outline-primary" type="submit" name="check_otp" value="Check OTP">
                <button class="btn btn-outline-danger" type="button" onclick="window.location.href='../View/home.php'">Cancel</button>
            </div>
        </form>
    </div>
</body>

</html>