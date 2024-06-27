<?php
include '../configuration/connection.php';

$uName          = $_POST['uName'];
$uEmail         = $_POST['uEmail'];
$uContact       = $_POST['uContact'];
$uPassword      = md5(CHIPHER . $_POST['uPass']);
$uConfirm      = md5(CHIPHER . $_POST['uConfmpass']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($uName != "" && $uEmail != "" && $uContact != "" && $uPassword != "") {
        $select    = "SELECT * FROM `ces_users` WHERE `user_email` = '" . $uEmail . "'";
        $exeSel    = mysqli_query($connect, $select);
        $getRecord = mysqli_fetch_array($exeSel);

        if (!empty($getRecord)) {
            echo json_encode(array("status" => "error", "message" => "Oops!! Email Address is already exist, please retry with another Email."));
        }
        
        if ($uPassword == $uConfirm) {
            $sqlQuery   = "INSERT INTO `ces_users` SET `user_name` = '$uName',
                                                        `user_email` = '$uEmail',
                                                        `user_mobile` = '$uContact',
                                                        `user_password` = '$uPassword'";
            mysqli_query($connect, $sqlQuery);
            $id = mysqli_insert_id($connect);
            $key = md5($id . CHIPHER . time());
            $update = "UPDATE `ces_users` SET  `user_encryptkey`= '" . $key . "'WHERE `user_id`='" . $id . "'";
            $updateexe =  mysqli_query($connect, $update);
            echo json_encode(array("status" => "success", "message" => "Registration Successfull."));
        }else{
            echo json_encode(array("status" => "error", "message" => "Password And Confirm Password is not matched."));
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "Please fill all the blanks !!"));
    }
}
?>