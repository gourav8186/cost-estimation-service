<?php
include '../../configuration/connection.php';

if (isset($_POST['statusKey'], $_POST['status'])) {
    $statusId = $_POST['statusKey'];
    $status = $_POST['status'];

    $tableColumns = [
        'ces_slider' => ['column' => 'slider_status', 'id' => 'slider_encryptkey'],
        'ces_mobile_company' => ['column' => 'mbc_status', 'id' => 'mbc_encryptkey'],
        'ces_model' => ['column' => 'm_status', 'id' => 'm_encryptkey'],
        'ces_series' => ['column' => 's_status', 'id' => 's_encryptkey'],
        'ces_spareparts' => ['column' => 'spare_status', 'id' => 'spare_encryptkey'],
        'ces_accessories' => ['column' => 'accessorie_status', 'id' => 'accessorie_encryptkey'],
        'ces_center' => ['column' => 'c_status', 'id' => 'c_encryptkey'],
        'ces_charges' => ['column' => 'charges_status', 'id' => 'charges_encryptkey'],
        'ces_users' => ['column' => 'user_status', 'id' => 'user_encryptkey'],
        'ces_assistant' => ['column' => 'a_status', 'id' => 'a_encryptkey'],
        'ces_feedback' => ['column' => 'f_status', 'id' => 'f_encryptkey']
    ];
    
    foreach ($tableColumns as $table => $columnInfo) {
        $column = $columnInfo['column'];
        $id = $columnInfo['id'];
        $sqlUpdate = "UPDATE `$table` SET `$column` = '$status' WHERE `$id` = '$statusId'";
        $getExe = mysqli_query($connect, $sqlUpdate);
    }
}
?>
