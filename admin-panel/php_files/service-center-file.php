<?php
include '../../configuration/connection.php';

$updateId = $_POST['update'];
$companyData        = $_POST['selectCompany'];
$selectState        = $_POST['selectState'];
$selectCity         = $_POST['cities'];
$centerName         = $_POST['centerName'];
$centerMobile       = $_POST['centerMobile'];
$directionLink       = $_POST['directionLink'];
$centerOpen         = $_POST['centerOpen'];
$centerClose        = $_POST['centerClose'];
$centerAddress      = $_POST['centerAddress'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($companyData) && !empty($selectState) && !empty($selectCity) && !empty($centerName) && !empty($centerMobile) && !empty($centerClose) && !empty($centerAddress)) {
        $checkQuery = "SELECT * FROM `ces_center` WHERE `c_name` = '$centerName'";
        $checkResult = mysqli_query($connect, $checkQuery);
        if (mysqli_num_rows($checkResult) > 0) {
            echo json_encode(array("status" => "error", "message" => "This Spare Part is already exists."));
        } else {
            if ($update == "") {
                $sqlQuery   = "INSERT INTO `ces_center` SET `c_company`  = '$companyData' ,
                                                  `c_state`         = '$selectState',
                                                  `c_city`          = '$selectCity',
                                                  `c_name`          = '$centerName',
                                                  `c_mobile`        = '$centerMobile',
                                                  `c_direction`     = '$directionLink',
                                                  `c_opentime`      = '$centerOpen',
                                                  `c_closetime`     = '$centerClose',
                                                  `c_address`       = '$centerAddress'";
                mysqli_query($connect, $sqlQuery);
                $id = mysqli_insert_id($connect);
                $key = md5($id . CHIPHER . time());
                $update = "UPDATE `ces_center` SET  `c_encryptkey`= '" . $key . "'WHERE `c_id`='" . $id . "'";
                $updateexe =  mysqli_query($connect, $update);
                echo json_encode(array("status" => "success", "message" => "Service center added successfully."));
            } else {
                $sqlUpdate = "UPDATE `ces_center` SET `c_company` = '$companyData',
                                                `c_state`         = '$selectState',
                                                `c_city`          = '$selectCity',
                                                `c_name`          = '$centerName',
                                                `c_mobile`        = '$centerMobile',
                                                `c_direction`     = '$directionLink',
                                                `c_opentime`      = '$centerOpen',
                                                `c_closetime`     = '$centerClose',
                                                `c_address`       = '$centerAddress' WHERE `c_encryptkey` = '$updateId'";
                $getExe = mysqli_query($connect, $sqlUpdate);
                echo json_encode(array("status" => "success", "message" => "Service center updated successfully."));
            }
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "Please fill all the blanks !!"));
    }
}
