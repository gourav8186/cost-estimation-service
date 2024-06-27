<?php

$updateId = $_GET['update'];

if (isset($updateId)) {
    $getData = "SELECT * FROM `ces_series` WHERE s_encryptkey = '$updateId'";
    $getExe = mysqli_query($connect, $getData);
    $fetch = mysqli_fetch_array($getExe);
    $seriesID = $fetch['s_encryptkey'];
    $seriesCompany = $fetch['s_company'];
    $seriesModel = $fetch['s_model'];
    $seriesName = $fetch['s_seriesname'];
}
if ($updateId) {
    $formBtnText = "Update Series";
} else {
    $formBtnText = "Add Series";
}
?>

<section class="boxShadow p-3">
    <div class="headLine border-bottom border-2 d-flex justify-content-between py-2">
        <h5 class="font18 boldText">Add Series</h5>
        <a href="<?= VIEW_SERIES; ?>" class="viewLink py-1">View Series List <i class="fa-solid fa-angle-right"></i></a>
    </div>
    <form method="post" id="seriesform">
        <div class="row">
            <input type="hidden" value="<?= $updateId; ?>" name="update">
            <div class="col-lg-4 py-2">
                <select name="selectCompany" id="companyData" class="form-select form-control">
                    <option value="">Select Mobile Company</option>
                    <?php
                    $getCompany = "SELECT `mbc_id` ,`mbc_name` FROM `ces_mobile_company` WHERE `mbc_status`= 1";
                    $getExe = mysqli_query($connect, $getCompany);
                    while ($fetch = mysqli_fetch_array($getExe)) {
                        $cId = $fetch['mbc_id'];
                        $cName = $fetch['mbc_name'];
                    ?>
                        <option value="<?= $cId; ?>" <?= $selected; ?>><?= $cName; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-4 py-2">
                <?php include './php_files/modelfetch-file.php'; ?>
            </div>
            <div class="col-lg-4 py-2">
                <input type="text" class="form-control" value="<?= $seriesName; ?>" id="series" name="series" placeholder="series" />
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn insertBtn subBtn py-1"><?= $formBtnText; ?></button>
        </div>
    </form>
</section>