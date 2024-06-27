<?php
$getData = "SELECT * FROM `ces_slider` WHERE `slider_location` = '2' AND `slider_status` = '1'";
$getExe = mysqli_query($connect, $getData);
$row = mysqli_num_rows($getExe);

?>
<section class="py-3">
    <div class="headingPart spHeading text-center my-5">
        <h2 class="fw-bold">Exclusive Mobile Service Offers!</h2>
        <p>Connecting Hearts, Connecting Worlds</p>
    </div>
    <div class="offerSlider owl-carousel owl-theme">
        <?php for ($i = 1; $i <= $row; $i++) {
            $fetch = mysqli_fetch_array($getExe);
            $sliderId = $fetch['slider_encryptkey'];
            $sliderImg = $fetch['slider_image']; ?>
            <div class="item">
                <img src="upload-images/<?= $sliderImg; ?>" alt="Offer Images">
            </div>
        <?php } ?>
    </div>
</section>