<?php
include '../../configuration/connection.php';

if (isset($_POST['eleId'])) {
    $eleId = $_POST['eleId'];

    $tableIds = [
        'ces_slider' => 'slider_encryptkey',
        'ces_mobile_company' => 'mbc_encryptkey',
        'ces_model' => 'm_encryptkey',
        'ces_series' => 's_encryptkey', 
        'ces_spareparts' => 'spare_encryptkey',
        'ces_accessories' => 'accessorie_encryptkey',
        'ces_center' => 'c_encryptkey',
        'ces_charges' => 'charges_encryptkey',
        'ces_users' => 'user_encryptkey',
        'ces_assistant' => 'a_encryptkey',
        'ces_feedback' => 'f_encryptkey'
    ];
    
    foreach ($tableIds as $table => $id) {
        $sqlDelete = "DELETE FROM `$table` WHERE `$id` = '$eleId'";
        $getExe = mysqli_query($connect, $sqlDelete);
    }
}
?>