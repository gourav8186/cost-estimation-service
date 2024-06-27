<?php
include '../../configuration/connection.php';


$userID = $_SESSION['ADMINUSER']['user_encryptkey'];
$currntPass = $_POST['crntPass'];
$newPass = $_POST['newPass'];
$confmPass = $_POST['confmPass'];

$currntPass = md5(CHIPHER . $currntPass);
$newPass = md5(CHIPHER . $newPass);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if($currntPass != "" || $newPass != "" || $confmPass != ""){
        $getUser = "SELECT * FROM `ces_users` WHERE `user_password` = '$currntPass' AND `user_encryptkey` = '$userID'";
        $getexe = mysqli_query($connect , $getUser);
        $fetch = mysqli_fetch_array($getexe);

        if($fetch){
            if(mysqli_num_rows($getexe) == '1'){
                if($newPass == $confmPass){
                    $upDate = "UPDATE `ces_users` SET `user_password` = '$newPass' WHERE `user_encryptkey` = '$userID'";
                    mysqli_query($connect , $upDate);
                    echo json_encode(array("status" => "success", "message" => "Change Password is Successfull.."));
                }else{
                    echo json_encode(array("status" => "error", "message" => "New Password And Confirm Password is not Matched."));
                }
            }
        }else{
            echo json_encode(array("status" => "error", "message" => "Current Password is wrong!!"));
        }
    }else{
        echo json_encode(array("status" => "error", "message" => "Please fill all the blanks !!"));

    }
}

?>