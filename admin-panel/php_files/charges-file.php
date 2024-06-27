<?php
include '../../configuration/connection.php';

$updateId = $_POST['update'];
$company    = $_POST['chargeCompany'];
$charges    = $_POST['chargePrice'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($company) && !empty($charges)) {
        $checkQuery = "SELECT * FROM `ces_charges` WHERE `charges_company` = '$company'";
        $checkResult = mysqli_query($connect, $checkQuery);
        if (mysqli_num_rows($checkResult) > 0) {
            echo json_encode(array("status" => "error", "message" => "This Company Charges already exists."));
        } else {
            if ($updateId == "") {
                $sqlQuery   = "INSERT INTO `ces_charges` SET `charges_company` = '$company' , `charges_price` = '$charges'";
                mysqli_query($connect, $sqlQuery);
                $id = mysqli_insert_id($connect);
                $key = md5($id . CHIPHER . time());
                $update = "UPDATE `ces_charges` SET  `charges_encryptkey`= '" . $key . "'WHERE `charges_id`='" . $id . "'";
                $updateexe =  mysqli_query($connect, $update);
                echo json_encode(array("status" => "success", "message" => "Service charges added successfully."));
            } else {
                $sqlUpdate = "UPDATE `ces_charges` SET `charges_company` = '$company', `charges_company` = '$charges' WHERE `charges_encryptkey` = '$updateId'";
                $getExe = mysqli_query($connect, $sqlUpdate);
                echo json_encode(array("status" => "success", "message" => "Service charges updated successfully."));
            }
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "Please fill all the blanks !!"));
    }
}
