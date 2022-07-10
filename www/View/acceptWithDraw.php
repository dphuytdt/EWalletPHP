<?php

    require '../Model/AcceptWithDraw.php'
 ?>
<html>
<head>
    <title>Manage Withdraw</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        table,tr, th,thead,tbody, td {
            border: 1px solid black;
            padding: 0px 15px 3px 0px;
            text-align: center;
            margin-left: 10px;
        }

        td, th, h3{
            padding: 7px;
        }
    </style>
</head>
<body>
    <div class="back">
        <a href="../View/home.php" class="btn btn-outline-primary mt-2 mx-2">Back</a>
    </div>
    <h3>Withdraw List Wait For Accept</h3>
    <table>
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">CardNumber</th>
                <th scope="col">Money</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
       <tbody>
            <?php foreach($result as $account): ?>
                <tr>
                    <form action="../Model/AcceptWithDraw.php?withdraw=<?php echo $account['id'];?>"" method="post">
                        <td><?php echo $account['username']; ?></td>
                        <td><?php echo $account['cardnumber']; ?></td>
                        <td><?php echo $account['money']; ?></td>
                        <td><?php echo $account['date']; ?></td>
                        <td><input type="submit" name="accept" value="Accept Trade" class="profile-button btn btn-outline-success fw-bold"></td>
                        <td><input type="submit" name="deny" value="Deny Trade" class="profile-button btn btn-outline-danger fw-bold"></td>
                    </form>
                </tr>
            <?php endforeach; ?>    
       </tbody>
    </table>
    <h3>Withdraw List Accepted</h3>
    <table>
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">CardNumber</th>
                <th scope="col">Money</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
       <tbody>
            <?php foreach($result2 as $account): ?>
                <tr>
                    <form action="../Model/AcceptWithDraw.php?money=<?php echo $account['money']?>&username=<?php echo $account['username']?>" method="post">
                        <td><?php echo $account['username']; ?></td>
                        <td><?php echo $account['cardnumber']; ?></td>
                        <td><?php echo $account['money']; ?></td>
                        <td><?php echo $account['date']; ?></td>
                
                    </form>
                </tr>
            <?php endforeach; ?>    
       </tbody>
    </table>

    <h3>Withdraw List Denied</h3>
    <table>
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">CardNumber</th>
                <th scope="col">Money</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
       <tbody>
            <?php foreach($result1 as $account): ?>
                <tr>
                    <form action="../Model/AcceptWithDraw.php?money=<?php echo $account['money']?>&username=<?php echo $account['username']?>" method="post">
                        <td><?php echo $account['username']; ?></td>
                        <td><?php echo $account['cardnumber']; ?></td>
                        <td><?php echo $account['money']; ?></td>
                        <td><?php echo $account['date']; ?></td>
                
                    </form>
                </tr>
            <?php endforeach; ?>    
       </tbody>
    </table>

</body>
</html>