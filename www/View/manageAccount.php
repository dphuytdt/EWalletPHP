<?php 
    require("../Model/ManageAccount.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage account</title>
    <style>
        table,tr, th,thead,tbody, td {
        border:1px solid black;
        padding: 0px 15px 3px 3px;
        margin-left: 10px;
    }
    .back a{
        text-decoration: none;
    }
    h2{
        padding-left: 10px;
    }
</style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="back">
        <a href="../View/home.php" class="btn btn-outline-primary mb-3 mt-2 mx-2">Back</a>
    </div>
    <h2>Accounts wait for active.</h2>
    <table>
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
       <tbody>
            <?php foreach($result2 as $account): 
                $param = "'" . $account['username'] . "','" . $account['email'] . "','" . $account['phone'] . "','" . $account['dob'] . "'," . $account['isActived'];
            ?>
            <tr>
                <form action="../Model/ActiveAccount.php?username=<?php echo $account['username']?>" method="post">
                    <td><?php echo $account['username']; ?></td>
                    <td><?php echo $account['email']; ?></td>
                    <td>Waiting for activation</td>
                    <td>
                        <a onclick="showDetail(<?php echo $param ?>)" class="dropdown-item" role="button" data-toggle="modal" data-target="#modal-detail-user">View</a>
                    </td>
                    <td><input type="submit" name="active" value="Active" class="profile-button btn btn-outline-success fw-bold"></td>
                    <td><input type="submit" name="deny" value="Deny" class="profile-button btn btn-outline-danger fw-bold"></td>
                </form>
            </tr>
            <?php endforeach; ?>    
       </tbody>
    </table>
    <h2>Accounts have been active.</h2>
    <table>
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
       <tbody>
            <?php foreach($result as $account): 
                 $param = "'" . $account['username'] . "','" . $account['email'] . "','" . $account['phone'] . "','" . $account['dob'] . "'," . $account['isActived'];
            ?>
                <form action="../View/anAccountDetail.php?username=<?php echo $account['username']?>" method="post">
                    <tr>
                        <td><?php echo $account['username']; ?></td>
                        <td><?php echo $account['email']; ?></td>
                        <td>Activated</td>
                        <!-- <td><input type="submit" name="view" value="View" class="profile-button"></td> -->
                        <td>
                            <a onclick="showDetail(<?php echo $param ?>)" class="dropdown-item" role="button" data-toggle="modal" data-target="#modal-detail-user">View</a>
                        </td>
                    </tr>
                </form>
            <?php endforeach; ?>    
       </tbody>
    </table>

  
    <h2>Accounts have been blocked.</h2>
    <table>
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
       <tbody>
            <?php foreach($result3 as $account): 
                 $param = "'" . $account['username'] . "','" . $account['email'] . "','" . $account['phone'] . "','" . $account['dob'] . "'," . $account['isActived'];
                ?>
                <form action="../Model/ActiveAccount.php?username=<?php echo $account['username']?>" method="post">
                    <td><?php echo $account['username']; ?></td>
                    <td><?php echo $account['email']; ?></td>
                    <td>Blocked</td>
                    <!-- <td><input type="submit" name="view" value="view" class="profile-button"></td> -->
                    <td>
                        <a onclick="showDetail(<?php echo $param ?>)" class="dropdown-item" role="button" data-toggle="modal" data-target="#modal-detail-user">View</a>
                    </td>
                    <td>
                        <input type="submit" name="unblock" value="Unblock" class="profile-button btn btn-outline-secondary fw-bold">
                    </td>
                </form>
            <?php endforeach; ?>    
       </tbody>
    </table>


    <h2>Accounts have been disabled.</h2>
    <table>
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
       <tbody>
            <?php foreach($result4 as $account): 
                 $param = "'" . $account['username'] . "','" . $account['email'] . "','" . $account['phone'] . "','" . $account['dob'] . "'," . $account['isActived'];
            ?>
                <form action="../View/anAccountDetail.php?username=<?php echo $account['username']?>" method="post">
                    <td><?php echo $account['username']; ?></td>
                    <td><?php echo $account['email']; ?></td>
                    <td>Disabled</td>
                    <!-- <td><input type="submit" name="view" value="view" class="profile-button"></td> -->
                    <td>
                        <a onclick="showDetail(<?php echo $param ?>)" class="dropdown-item" role="button" data-toggle="modal" data-target="#modal-detail-user">View</a>
                    </td>
                </form>
            <?php endforeach; ?>    
       </tbody>
    </table>

    <div class="modal fade" id="modal-detail-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">User Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Username</label><input id="username-modal" type="text" class="form-control" disabled></div>
                        <div class="col-md-6"><label class="labels">Email</label><input id="email-modal" type="text" class="form-control" disabled></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Phone Number</label><input id="phone-modal" type="text" class="form-control" disabled></div>
                        <div class="col-md-12"><label class="labels">Date of Birth</label></label><input id="dob-modal" type="text" class="form-control" disabled></div>
                        <div class="col-md-12"><label class="labels">Status</label></label><input id="status-modal" type="text" class="form-control" disabled></div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-modal" data-dismiss="modal">Close</button>
                        <button type="submit" id="confirm" class="btn btn-primary btn-modal">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../Resource/js/main.js"></script>
</body>
</html>