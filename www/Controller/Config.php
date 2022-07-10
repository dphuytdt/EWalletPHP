<?php 
    $conn = mysqli_connect("localhost","root","","account");
    //check connect
    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }
?>