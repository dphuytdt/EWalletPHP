<?php 
    require("../Model/ViewAccount.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>My Profile</title>
    <link rel="icon" href="../Resource/image/profile.png" type="image/icon type">
    <style>
    body {
        /* background: rgb(99, 39, 120) */
        /* background-image: url("6.png") */
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #682773
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back:hover {
        color: #682773;
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
    }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="back">
        <a href="../View/home.php" class="btn btn-outline-primary mt-2 mx-2">Back</a>
    </div>
    <div class="p-3 mb-2 bg-warning text-white">
        <form action="../Model/ViewAccount.php" method="post"></form>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                            class="rounded-circle mt-5" width="150px"
                            src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                            class="font-weight-bold"><?php echo $username ?></span><span
                            class="text-black-50"><?php echo $email ?></span><span> </span></div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-2 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-center text-secondary">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">

                            <div class="col-md-6"><label class="labels">Username</label><input type="text"
                                    class="form-control" placeholder="first name" value="<?php echo $username ?>"
                                    disabled>
                            </div>
                            <div class="col-md-6"><label class="labels">Email</label><input type="text"
                                    class="form-control" value="<?php echo $email ?>" placeholder="surname" disabled>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Phone Number</label><input type="text"
                                    class="form-control" placeholder="enter phone number" value="<?php echo $phone ?>"
                                    disabled></div>
                            <div class="col-md-12"><label class="labels">Date of Birth</label></label><input type="text"
                                    class="form-control" placeholder="enter address line 1" value="<?php echo $dob ?>"
                                    disabled></div>
                            <div class="col-md-12"><label class="labels">Status</label></label><input type="text"
                                    class="form-control" placeholder="enter address line 1"
                                    value="<?php echo $status ?>" disabled></div>

                        </div>
                        <div class="row mt-3">
                            <image src="<?php echo $image_front_id ?>"> </image>
                            <image src="<?php echo $image_back_id ?>"> </image>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
</body>

</html>