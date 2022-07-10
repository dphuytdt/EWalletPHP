<?php
    require_once '../Controller/Config.php';
    ob_start();
    session_start();
    $sql = "SELECT * FROM __transactionhistory";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $transactiontype = $row['transactiontype'];
        $amount = $row['amount'];
        $executiontime = $row['executiontime'];
        $status = $row['status'];
        if($status == 1){
            $status = "Success";
        }else{
            $status = "Fail";
        }
    }



?>