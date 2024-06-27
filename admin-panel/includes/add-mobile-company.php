<?php

$updateId = $_GET['update'];

if (isset($updateId)) {
    $getData = "SELECT * FROM `ces_mobile_company` WHERE mbc_encryptkey = '$updateId'";
    $getExe = mysqli_query($connect, $getData);
    $fetch = mysqli_fetch_array($getExe);
    $mbcID = $fetch['mbc_encryptkey'];
    $mbcImg = $fetch['mbc_image'];
    $mbcName = $fetch['mbc_name'];
}
if ($updateId) {
    $formBtnText = "Update Company";
} else {
    $formBtnText = "Add Company";
}
?>
<section class="boxShadow p-3 bgWhite">
    <div class="headLine border-bottom border-2 d-flex justify-content-between py-2">
        <h5 class="font18 boldText">Add Mobile Company</h5>
        <a href="<?= VIEW_MOBILE_COMPANY; ?>" class="viewLink py-1">View Companies List <i class="fa-solid fa-angle-right"></i></a>
    </div>
    <form method="post" id="companyform" enctype="multipart/form-data">
        <input type="hidden" value="<?= $updateId; ?>" name="update">
        <div class="row">
            <div class="col-lg-12">
                <label for="" class="py-2">Company Icon</label>
                <input type="file" id="companylogo" name="CompanyImage" value="<?= $mbcImg; ?>" class="dropify" />
            </div>
            <div class="col-lg-6">
                <input type="text" name="companyname" class="form-control my-3" value="<?= $mbcName; ?>" id="companyname" placeholder="Company Name" />
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn insertBtn subBtn py-1"><?= $formBtnText; ?></button>
        </div>
    </form>
</section>