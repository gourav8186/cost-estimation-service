<?php
include '../../configuration/connection.php';
$updateId = $_POST['update'];
$company    = $_POST['selectCompany'];
$model      = $_POST['model'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($company) && !empty($model)) {
        $checkQuery = "SELECT * FROM `ces_model` WHERE `m_model` = '$model'";
        $checkResult = mysqli_query($connect, $checkQuery);
        if (mysqli_num_rows($checkResult) > 0) {
            echo json_encode(array("status" => "error", "message" => "This Model is already exists."));
        } else {
            if ($updateId == "") {
                $sqlQuery   = "INSERT INTO `ces_model` SET `m_company` = '$company' , m_model = '$model'";
                mysqli_query($connect, $sqlQuery);
                $id = mysqli_insert_id($connect);
                $key = md5($id . CHIPHER . time());
                $update = "UPDATE `ces_model` SET  `m_encryptkey`= '" . $key . "'WHERE `m_id`='" . $id . "'";
                $updateexe =  mysqli_query($connect, $update);
                echo json_encode(array("status" => "success", "message" => "Model added successfully."));
            } else {
                $sqlUpdate = "UPDATE `ces_model` SET m_company='$company', m_model = '$model' WHERE m_encryptkey = '$updateId'";
                $getExe = mysqli_query($connect, $sqlUpdate);
                echo json_encode(array("status" => "success", "message" => "Model updated successfully."));
            }
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "Please fill all the blanks !!"));
    }
}
