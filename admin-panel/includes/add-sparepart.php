<?php

$updateId = $_GET['update'];

if (isset($updateId)) {
    $getData = "SELECT * FROM `ces_spareparts` WHERE spare_encryptkey = '$updateId'";
    $getExe = mysqli_query($connect, $getData);
    $fetch = mysqli_fetch_array($getExe);
    $sparepartId = $fetch['spare_encryptkey'];
    $sparepartCompany = $fetch['spare_mcompany'];
    $sparepartModel = $fetch['spare_model'];
    $sparepartSeries = $fetch['spare_series'];
    $sparepartName = $fetch['spare_name'];
    $sparepartPrice = $fetch['spare_price'];
}
if ($updateId) {
    $formBtnText = "Update Spare Part";
} else {
    $formBtnText = "Add Spare Part";
}
?>
<section class="boxShadow p-3">
    <div class="headLine border-bottom border-2 d-flex justify-content-between py-2">
        <h5 class="font18 boldText">Add Spare Part</h5>
        <a href="<?= VIEW_SPAREPARTS; ?>" class="viewLink py-1">View Spareparts List <i class="fa-solid fa-angle-right"></i></a>
    </div>
    <form method="post" id="spFrom">
        <div class="row">
            <div class="col-lg-4 py-2">
                <input type="hidden" value="<?= $updateId; ?>" name="update">
                <select name="selectCompany" id="companyData" class="form-select form-control">
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
                <?php include './php_files/modelfetch-file.php'; ?>
            </div>
            <div class="col-lg-4 py-2">
                <?php include './php_files/seriesfetch-file.php'; ?>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col-lg-4 col-sm-6">
                <input type="text" placeholder="Spare Part Name" value="<?= $sparepartName; ?>" name="sp_name" id="sp_name" class="form-control my-2">
            </div>
            <div class="col-lg-4 col-sm-6">
                <input type="text" placeholder="Price" value="<?= $sparepartPrice; ?>" name="sp_price" id="sp_price" class="form-control my-2">
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn insertBtn subBtn py-1 my-2"><?= $formBtnText; ?></button>
        </div>
    </form>
</section>