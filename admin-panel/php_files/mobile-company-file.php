<?php
include '../../configuration/connection.php';

$updateId = $_POST['update'];
$sldImg = $_FILES['CompanyImage'];
$imagename = $sldImg['name'];
$tmpname = $sldImg['tmp_name'];
$path = "../../upload-images/" . $imagename;
move_uploaded_file($tmpname, $path);
$companyname = $_POST['companyname'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($sldImg) && !empty($companyname)){
        $checkQuery = "SELECT * FROM `ces_mobile_company` WHERE `mbc_name` = '$companyname'";
        $checkResult = mysqli_query($connect, $checkQuery);
        if(mysqli_num_rows($checkResult) > 0) {
            echo json_encode(array("status" => "error", "message" => "Mobile Company already exists."));
        } else {
            if($updateId == ""){
                $sqlQuery = "INSERT INTO `ces_mobile_company` SET `mbc_image` = '$imagename', `mbc_name` = '$companyname'";
                mysqli_query($connect, $sqlQuery);
                $id = mysqli_insert_id($connect);
                $key = md5($id . CHIPHER . time());
                $update = "UPDATE `ces_mobile_company` SET  `mbc_encryptkey`= '" . $key . "'WHERE `mbc_id`='" . $id . "'";
                $updateexe =  mysqli_query($connect, $update);
                echo json_encode(array("status" => "success", "message" => "Mobile Company added successfully."));
            } else {
                $sqlUpdate = "UPDATE `ces_mobile_company` SET `mbc_image` ='$imagename', `mbc_name` = '$companyname' WHERE `mbc_encryptkey` = '$updateId'";
                $getExe = mysqli_query($connect, $sqlUpdate);
                echo json_encode(array("status" => "success", "message" => "Mobile Company updated successfully."));
            }
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "Please Select image and Enter Company Name"));
    }
}
?>
