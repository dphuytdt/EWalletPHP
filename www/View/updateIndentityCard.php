
<!DOCTYPE html>
<html>
    
<head>
    <title>Update Indentity Card</title>
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
       <br><br><br><br><br>
        <form action="../Controller/AdditionalInformation.php" enctype="multipart/form-data" method="post">
          <label>Image front Identity Card</label>
          <input type="file" name="image_front_id" placeholder="Image front Identity Card" required/>
          <label>Image back Identity Card</label>
          <input type="file" name="image_back_id" placeholder="Image back Identity Card" required />
          <input type="submit" name="resend" value="Resend"/>
    </form>
</body>
</html>


