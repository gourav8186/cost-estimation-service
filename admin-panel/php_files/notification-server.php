<?php
include '../../configuration/connection.php';
function getNotificationCount($connect)
{
     $selQuery = "SELECT COUNT(*) AS total FROM `ces_assistant` WHERE `a_status` = 1";
     $getExe = mysqli_query($connect, $selQuery);
     if ($getExe) {
          $fetch = mysqli_fetch_assoc($getExe);
          return $fetch['total'];
     } else {
          return 0;
     }
}

function getNotificationData($connect)
{
    $getQuery = "SELECT * FROM `ces_assistant` WHERE `a_status` = 1";
    $exe = mysqli_query($connect, $getQuery);
    $notifications = array(); // Initialize an array to store notifications
    if ($exe && mysqli_num_rows($exe) > 0) {
        while ($fetch = mysqli_fetch_array($exe)) {
            // Store each notification in the array
            $notification = array(
                'aName' => $fetch['a_name'],
                'aIssue' => $fetch['a_issue'],
                'aTime' => $fetch['a_createdon']
            );
            $notifications[] = $notification;
        }
    }
    return $notifications;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
     $notificationCount = getNotificationCount($connect);
     $notificationData = getNotificationData($connect);
     header('Content-Type: application/json');
     echo json_encode(array('total' => $notificationCount, 'notifications' => $notificationData));
} else {
     http_response_code(405);
}
