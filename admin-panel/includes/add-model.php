<?php

$updateId = $_GET['update'];

if (isset($updateId)) {
    $getData = "SELECT * FROM `ces_model` WHERE m_encryptkey = '$updateId'";
    $getExe = mysqli_query($connect, $getData);
    $fetch = mysqli_fetch_array($getExe);
    $modelID = $fetch['m_encryptkey'];
    $modelCompany = $fetch['m_company'];
    $modelName = $fetch['m_model'];
}
if ($updateId) {
    $formBtnText = "Update Model";
} else {
    $formBtnText = "Add Model";
}
?>

<section class="boxShadow p-3">
    <div class="headLine border-bottom border-2 d-flex justify-content-between py-2">
        <h5 class="font18 boldText">Add Models</h5>
        <a href="<?= VIEW_MODEL; ?>" class="viewLink py-1">View Models List <i class="fa-solid fa-angle-right"></i></a>
    </div>
    <form method="post" id="modelform">
        <div class="row">
            <div class="col-lg-6">
                <div class="row align-items-center my-3">
                    <input type="hidden" value="<?= $updateId; ?>" name="update">
                    <div class="col-lg-10 col-sm-10">
                        <select name="selectCompany" id="selectCompany" class="form-select form-control">
                            <option value="">Select Mobile Company</option>
                            <?php
                            $getCompany = "SELECT `mbc_id` ,`mbc_name` FROM `ces_mobile_company` WHERE `mbc_status` = '1'";
                            $getExe = mysqli_query($connect, $getCompany);
                            while ($fetch = mysqli_fetch_array($getExe)) {
                                $cId = $fetch['mbc_id'];
                                $cName = $fetch['mbc_name'];

                                if ($modelCompany == $cId) {
                                    $selected = "selected";
                                } else {
                                    $selected = "";
                                }

                            ?>
                                <option value="<?= $cId ?>" <?= $selected; ?>><?= $cName; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <div class="popBox">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <input type="text" class="form-control my-3" id="model" name="model" value="<?= $modelName ?>" placeholder="Model" />
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn insertBtn subBtn py-1"><?= $formBtnText; ?></button>
        </div>
    </form>
</section>

<div class="addonBox d-flex justify-content-center align-items-center">
    <div class="pBox">
        <i class="fa-solid fa-xmark hideLogin cursor"></i>
        <?php include('add-mobile-company.php'); ?>
    </div>
</div>