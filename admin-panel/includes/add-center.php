<?php

$updateId = $_GET['update'];

if (isset($updateId)) {
    $getData = "SELECT * FROM `ces_center` WHERE c_encryptkey = '$updateId'";
    $getExe = mysqli_query($connect, $getData);
    $fetch = mysqli_fetch_array($getExe);
    $centerId = $fetch['c_encryptkey'];
    $centerCompany = $fetch['mbc_name'];
    $centerState = $fetch['state_name'];
    $centerCity = $fetch['city_name'];
    $centerName = $fetch['c_name'];
    $centerMobile = $fetch['c_mobile'];
    $directionLink = $fetch['c_direction'];
    $centerOpen = $fetch['c_opentime'];
    $centerClose = $fetch['c_closetime'];
    $centerAddress = $fetch['c_address'];
}
if ($updateId) {
    $formBtnText = "Update Center";
} else {
    $formBtnText = "Add Center";
}
?>
<section class="boxShadow p-3">
    <div class="headLine border-bottom border-2 d-flex justify-content-between py-2">
        <h5 class="font18 boldText">Add Service Center</h5>
        <a href="<?= VIEW_CENTER; ?>" class="viewLink py-1">View Centers List <i class="fa-solid fa-angle-right"></i></a>
    </div>
    <form method="post" id="centerForm">
        <div class="row">
            <div class="col-lg-4 py-2">
                <select name="selectCompany" id="sCompanyData" class="form-select form-control">
                    <option value="">Select Mobile Company</option>
                    <?php
                    $getCompany = "SELECT * FROM `ces_mobile_company` WHERE `mbc_status`= '1'";
                    $getExe = mysqli_query($connect, $getCompany);
                    while ($fetch = mysqli_fetch_array($getExe)) {
                        $cId = $fetch['mbc_id'];
                        $cName = $fetch['mbc_name'];

                    ?>
                        <option value="<?= $cId; ?>"><?= $cName; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-4 py-2">
                <select name="selectState" id="selectState" class="form-select form-control">
                    <option value="">Select State</option>
                    <?php
                    $getCompany = "SELECT * FROM `ces_state`";
                    $getExe = mysqli_query($connect, $getCompany);
                    while ($fetch = mysqli_fetch_array($getExe)) {
                        $sId = $fetch['state_id'];
                        $sName = $fetch['state_name'];

                    ?>
                        <option value="<?= $sId; ?>"><?= $sName; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-4 py-2">
                <?php include './php_files/cities-file.php'; ?>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col-lg-4 col-sm-6">
                <input type="text" name="centerName" id="centerName" value="<?= $centerName; ?>" placeholder="Service Center Name" class="form-control my-2">
            </div>
            <div class="col-lg-4 col-sm-6">
                <input type="text" name="centerMobile" maxlength="10" id="centerMobile" value="<?= $centerMobile; ?>" placeholder="Mobile Number" class="form-control my-2">
            </div>
            <div class="col-lg-4 col-sm-6">
                <input type="text" name="directionLink"  value="<?= $directionLink; ?>" placeholder="Direction Link" class="form-control my-2">
            </div>
            <div class="col-lg-6 col-sm-6">
                <h5 class="font14 boldText my-2">Open Timing</h5>
                <input type="time" name="centerOpen" id="centerOpen" value="<?= $centerOpen; ?>" class="form-control my-2">
            </div>
            <div class="col-lg-6 col-sm-6">
                <h5 class="font14 boldText my-2">Close Timing</h5>
                <input type="time" name="centerClose" id="centerClose" value="<?= $centerClose; ?>" class="form-control my-2">
            </div>
            <div class="col-lg-12">
                <textarea class="form-control my-2" name="centerAddress" id="centerAddress" placeholder="Address"><?= $centerAddress; ?></textarea>
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn insertBtn subBtn py-1 my-2">Add Center</button>
        </div>
    </form>
</section>