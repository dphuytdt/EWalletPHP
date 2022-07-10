
<!DOCTYPE html>
<html>
<head>
    <title>Transfer Money</title>
    <meta charset="utf-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script   script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Resource/css/style.css">
    <script src="../Resource/js/main.js"></script>
<body>
    <?php
        require 'layout/header.php';
    ?>
     <br><br><br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="../Controller/Transfer.php" method="POST">
                <div class="form-group">
                    <label for="">Account Transfer to</label>
                    <input type="text" class="form-control" name="account" placeholder="Enter username as account" required >
                   
                </div>
                <div class="form-group">
                    <label for="">Amount</label>
                    <input type="text" class="form-control" name="amount" placeholder="Enter amount" required>
                </div>
                <div class="form-group">
                   
                    <input type="submit" class="form-control" name="recharge" placeholder="Recharge" >
                    <div class="back">
                        <br>
                        <a href="../View/home.php" class="btn btn-primary">Back</a>
                    </div>
                </div>
                </form>
        </div>
    </div>
</body>
</html>