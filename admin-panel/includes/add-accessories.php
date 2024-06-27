<?php

$updateId = $_GET['update'];

if (isset($updateId)) {
    $getData = "SELECT * FROM `ces_accessories` WHERE `accessorie_encryptkey` = '$updateId'";
    $getExe = mysqli_query($connect, $getData);
    $fetch = mysqli_fetch_array($getExe);
    $aId = $fetch['accessorie_encryptkey'];
    $aImage = $fetch['accessorie_image'];
    $aCompany = $fetch['accessorie_company'];
    $aName = $fetch['accessorie_name'];
    $aPrice = $fetch['accessorie_price'];
    $aWarranty = $fetch['accessorie_warranty'];
}
if ($updateId) {
    $formBtnText = "Update Accessories";
} else {
    $formBtnText = "Add Accessories";
}
?>
<section class="boxShadow p-3">
    <div class="headLine border-bottom border-2 d-flex justify-content-between py-2">
        <h5 class="font18 boldText">Add Accessories</h5>
        <a href="<?= VIEW_ACCESSORIES; ?>" class="viewLink py-1">View Accessories List <i class="fa-solid fa-angle-right"></i></a>
    </div>
    <form method="post" id="accessoriesForm" enctype="multipart/form-data">
        <div class="row">
            <input type="hidden" value="<?= $updateId; ?>" name="update">
            <div class="col-lg-12 py-2">
                <input type="file" name="sliderImage" value="<?= $aImage; ?>" id="aPhoto" class="dropify" />
            </div>
            <div class="col-lg-4 col-sm-6 py-2">
                <select name="selectCompany" id="selectCompany" class="form-select form-control">
                    <option value="">Select Mobile Company</option>
                    <?php
                    $getCompany = "SELECT `mbc_id` ,`mbc_name` FROM `ces_mobile_company` WHERE `mbc_status` = '1'";
                    $getExe = mysqli_query($connect, $getCompany);
                    while ($fetch = mysqli_fetch_array($getExe)) {
                        $cId = $fetch['mbc_id'];
                        $cName = $fetch['mbc_name'];

                        if ($aCompany == $cId) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        }

                    ?>
                        <option value="<?= $cId ?>" <?= $selected; ?>><?= $cName; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-4 col-sm-6 py-2">
                <input type="text" class="form-control" value="<?= $aName; ?>" id="aName" name="aName" placeholder="Accessories Name" />
            </div>
            <div class="col-lg-4 col-sm-6 py-2">
                <input type="text" class="form-control" value="<?= $aPrice; ?>" id="aPrice" name="aPrice" placeholder="Price" />
            </div>
            <div class="col-lg-4 col-sm-6 py-2">
                <input type="text" class="form-control" value="<?= $aWarranty; ?>" id="aWarranty" name="aWarranty" placeholder="Warranty" />
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn insertBtn subBtn py-1"><?= $formBtnText; ?></button>
        </div>
    </form>
</section>