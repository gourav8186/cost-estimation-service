<?php
include '../../configuration/connection.php';

$updateId = $_POST['update'];
$sldImg = $_FILES['sliderImage'];
$imagename = $sldImg['name'];
$tmpname = $sldImg['tmp_name'];
$path = "../../upload-images/" . $imagename;
move_uploaded_file($tmpname, $path);
$aName = $_POST['aName'];
$aCompany = $_POST['selectCompany'];
$aPrice = $_POST['aPrice'];
$aWarranty = $_POST['aWarranty'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($sldImg) && !empty($aName) && !empty($aCompany) && !empty($aPrice) && !empty($aWarranty)) {
        $checkQuery = "SELECT * FROM `ces_accessories` WHERE `accessorie_name` = '$aName'";
        $checkResult = mysqli_query($connect, $checkQuery);
        if (mysqli_num_rows($checkResult) > 0) {
            echo json_encode(array("status" => "error", "message" => "This Accessories is already exists."));
        } else {
            if ($updateId == "") {
                $sqlQuery = "INSERT INTO `ces_accessories` SET `accessorie_image`    ='$imagename',
                                                 `accessorie_name`     = '$aName',
                                                 `accessorie_company`     = '$aCompany',
                                                 `accessorie_price`    = '$aPrice',
                                                 `accessorie_warranty` = '$aWarranty'";
                mysqli_query($connect, $sqlQuery);
                $id = mysqli_insert_id($connect);
                $key = md5($id . CHIPHER . time());
                $update = "UPDATE `ces_accessories` SET  `accessorie_encryptkey`= '" . $key . "'WHERE `accessorie_id`='" . $id . "'";
                $updateexe =  mysqli_query($connect, $update);
                echo json_encode(array("status" => "success", "message" => "Accessories added successfully."));
            } else {
                $sqlUpdate = "UPDATE `ces_accessories` SET `accessorie_image`    ='$imagename',
                                                        `accessorie_name`     = '$aName',
                                                        `accessorie_company`     = '$aCompany',
                                                        `accessorie_price`    = '$aPrice',
                                                        `accessorie_warranty` = '$aWarranty' WHERE `accessorie_encryptkey` = '$updateId'";
                $getExe = mysqli_query($connect, $sqlUpdate);
                echo json_encode(array("status" => "success", "message" => "Accessories updated successfully."));
            }
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "Please fill all the blanks !!"));
    }
}
