<?php
include '../../configuration/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['items']) && !empty($_POST['items'])) {
        
        $items = array_map('intval', $_POST['items']);

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

        $item_ids = implode(',', $items);
        foreach ($tableIds as $table => $id) {
            $sqlDelete = "DELETE FROM `$table` WHERE `$id` IN ($item_ids)";
            $getExe = mysqli_query($connect, $sqlDelete);
        }
        echo json_encode(array("status" => "success", "message" => "Selected rows are Deleted Successfully."));
    } else {
        echo json_encode(array("status" => "error", "message" => "Please Select at least one row to delete."));
    }
}
