<?php
include '../../configuration/connection.php';

$updateId       = $_POST['update'];
$companyData    = $_POST['selectCompany'];
$selectModel    = $_POST['selectModel'];
$sp_series      = $_POST['sp_series'];
$sp_name        = $_POST['sp_name'];
$sp_price       = $_POST['sp_price'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($companyData) && !empty($selectModel) && !empty($sp_series) && !empty($sp_name) && !empty($sp_price)) {
        $checkQuery = "SELECT * FROM `ces_spareparts` WHERE `spare_name` = '$sp_name' AND `spare_series` = '$selectModel'";
        $checkResult = mysqli_query($connect, $checkQuery);
        if (mysqli_num_rows($checkResult) > 0) {
            echo json_encode(array("status" => "error", "message" => "This Spare Part is already exists."));
        } else {
            if ($updateId == "") {
                $sqlQuery   = "INSERT INTO `ces_spareparts` SET `spare_mcompany`   = '$companyData' ,
                                                            `spare_model`     = '$selectModel',
                                                            `spare_series`    = '$sp_series',
                                                            `spare_name`      = '$sp_name',
                                                            `spare_price`     = '$sp_price'";
                mysqli_query($connect, $sqlQuery);
                $id = mysqli_insert_id($connect);
                $key = md5($id . CHIPHER . time());
                $update = "UPDATE `ces_spareparts` SET  `spare_encryptkey`= '" . $key . "'WHERE `spare_id` ='" . $id . "'";
                $updateexe =  mysqli_query($connect, $update);
                echo json_encode(array("status" => "success", "message" => "Spare Part added successfully."));
            } else {
                $sqlUpdate = "UPDATE `ces_spareparts` SET `spare_mcompany`   = '$companyData',
                                                    `spare_model`     = '$selectModel',
                                                    `spare_series`    = '$sp_series',
                                                    `spare_name`      = '$sp_name',
                                                    `spare_price`     = '$sp_price' WHERE spare_encryptkey = '$updateId'";
                $getExe = mysqli_query($connect, $sqlUpdate);
                echo json_encode(array("status" => "success", "message" => "Spare Part updated successfully."));
            }
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "Please fill all the blanks !!"));
    }
}
