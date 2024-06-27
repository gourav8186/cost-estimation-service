<?php
require_once('../configuration/connection.php');
require_once('getData.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $metaTitle; ?></title>
    <base href="<?= CONTROL_PANEL; ?>">
    <?php include('link-head.php'); ?>
</head>

<body>
    <?php
    include('register-model.php');
    include($pagePath);
    include('link-foot.php');
    ?>
    <div id="toast-container"></div>
</body>

</html>