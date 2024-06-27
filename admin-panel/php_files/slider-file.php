<?php
include '../../configuration/connection.php';
$updateId = $_POST['update'];
$sldImg = $_FILES['sliderImage'];
$imagename = $sldImg['name'];
$tmpname = $sldImg['tmp_name'];
$path = "../../upload-images/" . $imagename;
move_uploaded_file($tmpname, $path);
$action = $_POST['wheretoshow'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($imagename) && !empty($action)) {
        if ($updateId == "") {
            $sqlQuery = "INSERT INTO `ces_slider` SET `slider_image`='$imagename',`slider_location` = '$action'";
            mysqli_query($connect, $sqlQuery);
            $id = mysqli_insert_id($connect);
            $key = md5($id . CHIPHER . time());
            $update = "UPDATE `ces_slider` SET  `slider_encryptkey`= '" . $key . "'WHERE `slider_id`='" . $id . "'";
            $updateexe =  mysqli_query($connect, $update);
            echo json_encode(array("status" => "success", "message" => "Slider added successfully."));
        } else {
            $sqlUpdate = "UPDATE `ces_slider` SET `slider_image`='$imagename',`slider_location` = '$action' WHERE `slider_encryptkey` = '$updateId'";
            $getExe = mysqli_query($connect, $sqlUpdate);
            echo json_encode(array("status" => "success", "message" => "Slider updated successfully."));
        }
    }else{
        echo json_encode(array("status" => "error", "message" => "Please Select image and location for where to show your banner"));   
    }
}
