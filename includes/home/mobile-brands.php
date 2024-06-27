<?php
$getData = "SELECT * FROM `ces_mobile_company` WHERE `mbc_status` = '1'";
$getExe = mysqli_query($connect, $getData);
$row = mysqli_num_rows($getExe);
?>
<section class="container" id="mobiles">
    <div class="headingPart spHeading text-center my-5">
        <h2 class="fw-bold">Which One is yours ?</h2>
        <p>Connecting Hearts, Connecting Worlds</p>
    </div>
    <div class="row">
        <?php
        for($i = 1; $i<=$row;  $i++) {
            $fetch = mysqli_fetch_array($getExe);
            $companyId = $fetch['mbc_encryptkey'];
            $companyLogo = $fetch['mbc_image'];
            $updateLink = SPARE_PARTS . '?company=' . $companyId;
             ?>
            <div class="col-lg-3 col-sm-4 col-6 p-3">
                <a href="<?= $updateLink; ?>" class="mbIcon">
                    <img src="upload-images/<?= $companyLogo; ?>" alt="mobile-icon">
                </a>
            </div>
        <?php } ?>
    </div>
</section>