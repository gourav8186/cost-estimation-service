<?php
include '../configuration/connection.php';

$uName          = $_POST['uName'];
$uHeading       = $_POST['uHeading'];
$uMessage       = $_POST['uMessage'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($uName) && !empty($uHeading) && !empty($uMessage)) {

        $sqlQuery   = "INSERT INTO `ces_feedback` SET `f_name`= '$uName',`f_heading`= '$uHeading',`f_message`= '$uMessage'";
        mysqli_query($connect, $sqlQuery);
        $id = mysqli_insert_id($connect);
        $key = md5($id . CHIPHER . time());
        $update = "UPDATE `ces_feedback` SET `f_encryptkey`= '" . $key . "'WHERE `f_id` ='" . $id . "'";
        $updateexe =  mysqli_query($connect, $update);
        echo json_encode(array("status" => "success", "message" => "Thank You For your Feedback."));
    } else {
        echo json_encode(array("status" => "error", "message" => "Please fill all the blanks !!"));
    }
}
?>
