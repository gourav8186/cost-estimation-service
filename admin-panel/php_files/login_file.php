<?php
include '../../configuration/connection.php';

$uEmail = $_POST['uName'];
$uPassword = $_POST['uPassword'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($uEmail != "" && $uPassword != "") {
        $uPassword = md5(CHIPHER . $uPassword);
        $selQuery = "SELECT * FROM `ces_users` WHERE `user_email` ='$uEmail' AND `user_password` ='$uPassword'";
        $exe = mysqli_query($connect, $selQuery);
        if (mysqli_num_rows($exe) > 0) {
            $fetch = mysqli_fetch_array($exe);
            $status = $fetch['user_status'];
            if ($status == '1') {
                // session_start();
                $_SESSION['ADMINUSER'] = $fetch;
                echo json_encode(array("status" => "success", "message" => "Login Successfully , redirecting..."));
               
            } else {
                echo json_encode(array("status" => "error", "message" => "Sorry !! You do not have access to the master admin."));
            }
        } else {
            echo json_encode(array("status" => "error", "message" => "User Email or Password is not matched !!"));
        }
    }else{
        echo json_encode(array("status" => "error", "message" => "Please Enter Your Email and Password !!"));
    }
}
?>