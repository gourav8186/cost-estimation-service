<?php

$updateId = $_GET['update'];

if (isset($updateId)) {
    $getData = "SELECT * FROM `ces_charges` WHERE `charges_encryptkey` = '$updateId'";
    $getExe = mysqli_query($connect, $getData);
    $fetch = mysqli_fetch_array($getExe);
    $chargesId = $fetch['charges_encryptkey'];
    $chargesCompany = $fetch['charges_company'];
    $chargesPrice = $fetch['charges_price'];
}
if ($updateId) {
    $formBtnText = "Update Charges";
} else {
    $formBtnText = "Add Charges";
}
?>

<section class="boxShadow p-3">
    <div class="headLine border-bottom border-2 d-flex justify-content-between py-2">
        <h5 class="font18 boldText">Add Charges</h5>
        <a href="<?= VIEW_CHARGES; ?>" class="viewLink py-1">View Charges List <i class="fa-solid fa-angle-right"></i></a>
    </div>
    <form method="post" id="chargeFrom">
        <div class="row">
            <div class="col-lg-6 py-3">
                <select name="chargeCompany" id="chargeCompany" class="form-select form-control">
                    <option value="">Select Mobile Company</option>
                    <?php
                    $getCompany = "SELECT * FROM `ces_mobile_company` WHERE `mbc_status`= '1'";
                    $getExe = mysqli_query($connect, $getCompany);
                    while ($fetch = mysqli_fetch_array($getExe)) {
                        $cId = $fetch['mbc_id'];
                        $cName = $fetch['mbc_name'];

                        if ($chargesCompany == $cId) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        }

                    ?>
                        <option value="<?= $cId; ?>" <?= $selected; ?>><?= $cName; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-6 py-3">
                <input type="text" class="form-control" value="<?= $chargesPrice; ?>" id="chargePrice" name="chargePrice" placeholder="Service Charges" />
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn insertBtn subBtn py-1"><?= $formBtnText; ?></button>
        </div>
    </form>
</section>