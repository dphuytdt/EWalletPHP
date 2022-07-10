<!DOCTYPE html>
<html>

<head>
    <title>Forgot password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container col-3 bg-light">
        <h2 class="row justify-content-center mt-3">Reset your password</h2>
        <form action="../Controller/CheckUser.php" method="post">
            <div class="mb-3 mt-3">
                <label for="email">Email</label>
                <input class="form-control" type="text" name="email" id="email" placeholder="Enter your email address..."
                    required>
            </div>
            <div class="mb-3 mt-3 btn-group">
                <input class="btn btn-outline-primary" type="submit" name="verified" value="Verified">
                <button class="btn btn-outline-danger" type="button"
                    onclick="window.location.href='../View/login.php'">Cancel</button>
            </div>
        </form>
    </div>
</body>

</html>