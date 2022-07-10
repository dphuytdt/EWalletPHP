<?php

    require '../Model/AcceptTransfer.php';
    ob_start();
    session_start();    

 ?>
<html>
<head>
    <title>Manage Transfer</title>

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
        <a href="../View/home.php" class="btn btn-outline-primary mx-2 mt-2">Back</a>
    </div>
    <h3>Transfer List Wait For Accept</h3>
    <table>
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Money</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
       <tbody>
            <?php foreach($result as $account): ?>
                <tr>
                    <form action="../Model/AcceptTransfer.php?transfer=<?php echo $account['id'];?>" method="post">
                        <td><?php echo $account['username']; ?></td>
                        <td><?php echo $account['amount']; ?></td>
                        <td><?php echo $account['date']; ?></td>
                        <td><input type="submit" name="accept" value="Accept Trade" class="profile-button"></td>
                        <td><input type="submit" name="deny" value="Deny Trade" class="profile-button"></td>
                    </form>
                </tr>
            <?php endforeach; ?>    
       </tbody>
    </table>
    <h3>Transfer List Accepted</h3>
    <table>
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Money</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
       <tbody>
            <?php foreach($result2 as $account): ?>
                <tr>
                    <form  action="../View/anAccountDetail.php?username=<?php echo $account['username']?>" method="post">
                        <td><?php echo $account['username']; ?></td>
                        <td><?php echo $account['amount']; ?></td>
                        <td><?php echo $account['date']; ?></td>
                        <td><input type="submit" name="view" value="View" class="profile-button btn btn-outline-secondary fw-bold"></td>
                    </form>
                </tr>
            <?php endforeach; ?>    
       </tbody>
    </table>

    <h3>Transfer List Denied</h3>
    <table>
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Money</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
       <tbody>
            <?php foreach($result1 as $account): ?>
                <tr>
                <form  action="../View/anAccountDetail.php?username=<?php echo $account['username']?>" method="post">
                        <td><?php echo $account['username']; ?></td>
                        <td><?php echo $account['amount']; ?></td>
                        <td><?php echo $account['date']; ?></td>
                        <td><input type="submit" name="view" value="View" class="profile-button btn btn-outline-secondary fw-bold"></td>
                    </form>
                </tr>
            <?php endforeach; ?>    
       </tbody>
    </table>

</body>
</html>