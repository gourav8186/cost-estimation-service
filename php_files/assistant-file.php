<?php
include '../configuration/connection.php';

$uName      = $_POST['uName'];
$uEmail     = $_POST['uEmail'];
$umCompany  = $_POST['uCompany'];
$uIssue     = $_POST['uIssue'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($uName) && !empty($uEmail) && !empty($umCompany) && !empty($uIssue)) {

        $sqlQuery   = "INSERT INTO `ces_assistant` SET       a_name   = '$uName' ,
                                                            a_email     = '$uEmail',
                                                            a_mcompany    = '$umCompany',
                                                            a_issue      = '$uIssue'";
        mysqli_query($connect, $sqlQuery);
        $id = mysqli_insert_id($connect);
        $key = md5($id . CHIPHER . time());
        $update = "UPDATE `ces_assistant` SET  `a_encryptkey`= '" . $key . "'WHERE `a_id` ='" . $id . "'";
        $updateexe =  mysqli_query($connect, $update);
        echo json_encode(array("status" => "success", "message" => "Your issue has been sent successfully. Our team will email you to resolve the issue."));
    } else {
        echo json_encode(array("status" => "error", "message" => "Please fill all the blanks !!"));
    }
}
?>