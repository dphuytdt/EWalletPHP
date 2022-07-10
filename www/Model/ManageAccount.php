<?php
    require_once '../Controller/Config.php';
    ob_start();
    session_start();
    //view account detail
    //get data in database
    $username = $_SESSION['username'];
    //select account is verified
    $sql = "SELECT * FROM __account where isActived = 1";
    $result = mysqli_query($conn,$sql);

    $sql2 = "SELECT * FROM __account where isActived = 0";
    $result2 = mysqli_query($conn,$sql2);

    //SELECT * FROM __account where abnormal = 3 sort by desc date
    $sql3 = "SELECT * FROM __account where abnormal = 3 order by timeblock desc";
    $result3 = mysqli_query($conn,$sql3);

    //select account isActived
    $sql4 = "SELECT * FROM __account where isActived = 2 order by datecreate desc";
    $result4 = mysqli_query($conn,$sql4);
?>