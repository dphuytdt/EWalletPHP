<?php
require_once 'Config.php';
ob_start();
session_start();
function showAlert($message, $href)
{
    echo "<script>
    alert('$message');
    window.location.href='$href';
    </script>";
}
if (isset($_POST['login'])) {
    //log in user and save session cookie
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == "" || $password == "") {
        showAlert("username or password cannot be null", '../View/login.php');
    } else {
    $sql = "SELECT * FROM __account WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    //check usernmae or password null
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['abnormal'] == 3) {
            showAlert("Account has been locked due to entering the wrong password many times, 
            please contact the administrator for support", '../View/login.php');
        } else {
            if ($row['abnormal'] == 3) {
                showAlert("Account has been locked due to entering the wrong password many times, please contact the administrator for support", '../View/login.php');
            } else {
                $_SESSION['username'] = $username;
                $sql1 = "UPDATE __account SET error = 0, abnormal = 0, timeblock = null WHERE username = '$username'";
                mysqli_query($conn, $sql1);
                if ($row['status'] == 1) {
                    //set cookie
                    setcookie('username', $username, time() + 3600);
                    //set session for log in
                    $href = '../View/home.php';
                } else {
                    $href = '../View/changeFirstPassword.php';
                }
                showAlert("Login successfully", $href);
            }
        }
    } else {
        //update error +1 after 1 time wrong
        $sql = "SELECT * FROM __account WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($row['abnormal'] == 3) {
                showAlert("Account has been locked due to entering the wrong password many times, please contact the administrator for support", '../View/login.php');
            }
            $error = $row['error'];
            $abnormal = $row['abnormal'];
            $timeblock = $row['timeblock'];
            $error = $error + 1;
            $timestamp = date("Y-m-d H:i:s");
            if ($abnormal != 1) {
                if ($abnormal == 0) {
                    if ($error < 3) {
                        $sql = "UPDATE __account SET error = '$error' WHERE username = '$username'";
                    } else {
                        $sql = "UPDATE __account SET error = 0, abnormal = 1, timeblock = '$timestamp' WHERE username = '$username'";
                    }
                } else if ($abnormal == 2) {
                    if ($error < 3) {
                        $sql = "UPDATE __account SET error = '$error' WHERE username = '$username'";
                    } else {
                        $sql = "UPDATE __account SET error = 0, abnormal = 3 WHERE username = '$username'";
                    }
                }
                $result = mysqli_query($conn, $sql);
                showAlert("Invalid username or password. You have " . (3 - $error) . " more attempts", '../View/login.php');
            } else {
                $timediff = strtotime($timestamp) - strtotime($timeblock);
                if ($timediff <= 60) {
                    showAlert('Your account has been blocked. Please try after ' . 60 - $timediff . ' seconds', '../View/login.php');
                    $result = mysqli_query($conn, $sql);
                } else {
                    $sql = "UPDATE __account SET error = 1, abnormal = 2, timeblock = null WHERE username = '$username'";
                    $result = mysqli_query($conn, $sql);
                    showAlert("Invalid username or password. You have " . (3 - $error) . " more attempts", '../View/login.php');
                }
            }
        }
    }
}


}