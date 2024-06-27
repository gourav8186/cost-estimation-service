<?php

$updateId = $_GET['update'];

if (isset($updateId)) {
    $getData = "SELECT * FROM `ces_slider` WHERE `slider_encryptkey` = '$updateId'";
    $getExe = mysqli_query($connect, $getData);
    $fetch = mysqli_fetch_array($getExe);
    $slID = $fetch['slider_encryptkey'];
    $sliderImg = $fetch['slider_image'];
    $sldLocation = $fetch['slider_location'];
}
if ($updateId) {
    $formBtnText = "Update Slider";
} else {
    $formBtnText = "Add Slider";
}
?>
<section class="boxShadow p-3">
    <div class="headLine border-bottom border-2 d-flex justify-content-between py-2">
        <h5 class="font18 boldText">Add Slider</h5>
        <a href="<?= VIEW_SLIDER; ?>" class="viewLink py-1">View Slider List <i class="fa-solid fa-angle-right"></i></a>
    </div>
    <form method="post" id="sliderInsert" enctype="multipart/form-data">
        <input type="hidden" value="<?= $updateId; ?>" name="update">
        <div class="row mt-3">
            <div class="col-lg-12">
                <input type="file" id="selectImage" value="<?= $sliderImg; ?>" name="sliderImage" class="dropify" />
            </div>
            <div class="col-lg-6">
                <select name="wheretoshow" id="selectLocation" class="form-select my-3 form-control">
                    <option value="">Where to show</option>
                    <option value="1" <?= $sldLocation == 1 ? "selected" : ""; ?>>Main Banner</option>
                    <option value="2" <?= $sldLocation == 2 ? "selected" : ""; ?>>Offer Banner</option>
                </select>
            </div>
        </div>
        <div class="text-end mt-2">
            <button type="submit" id="insertBtn" name="addSlider" class="btn insertBtn subBtn py-1"><?= $formBtnText; ?></button>
        </div>
    </form>
</section>