<?php
require_once('configuration/connection.php');
require_once('getData.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_TITLE ?> | <?= $titleName; ?></title>
    <base href="<?= SITE_URL; ?>">
    <?php include('link-head.php'); ?>
</head>

<body id="top">
    <!-- Popup start -->
    <?php include('popup.php'); ?>
    <?php include('feedback.php'); ?>
    <!-- Popup end  -->
    <?php include('header.php'); ?>
    <main>
        <?php include($filename); ?>
    </main>
    <?php include('footer.php'); ?>
    <?php include('link-foot.php'); ?>
    <div id="toast-container"></div>
</body>

</html>