<?php
include '../../configuration/connection.php';

$updateId = $_POST['update'];
$selectCompany    = $_POST['selectCompany'];
$selectModel      = $_POST['selectModel'];
$series           = $_POST['series'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($selectCompany) && !empty($selectModel) && !empty($series)) {
        $checkQuery = "SELECT * FROM `ces_series` WHERE `s_seriesname` = '$series'";
        $checkResult = mysqli_query($connect, $checkQuery);
        if (mysqli_num_rows($checkResult) > 0) {
            echo json_encode(array("status" => "error", "message" => "This Series is already exists."));
        } else {
            if ($updateId == "") {
                $sqlQuery = "INSERT INTO `ces_series` SET `s_company` = '$selectCompany' , `s_model` = '$selectModel' ,s_seriesname = '$series'";
                mysqli_query($connect, $sqlQuery);
                $id = mysqli_insert_id($connect);
                $key = md5($id . CHIPHER . time());
                $update = "UPDATE `ces_series` SET  `s_encryptkey`= '" . $key . "'WHERE `s_id`='" . $id . "'";
                $updateexe =  mysqli_query($connect, $update);
                echo json_encode(array("status" => "success", "message" => "Series added successfully."));
            } else {
                $sqlUpdate = "UPDATE `ces_series` SET `s_company` ='$selectCompany', `s_model` = '$selectModel', `s_seriesname` = '$series' WHERE `s_encryptkey` = '$updateId'";
                $getExe = mysqli_query($connect, $sqlUpdate);
                echo json_encode(array("status" => "success", "message" => "Series updated successfully."));
            }
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "Please fill all the blanks !!"));
    }
}
