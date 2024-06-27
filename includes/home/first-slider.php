<?php
$getData = "SELECT * FROM `ces_slider` WHERE `slider_location` = '1' AND `slider_status` = '1'";
$getExe = mysqli_query($connect, $getData);
$row = mysqli_num_rows($getExe);

?>
<section class="firstSlider" id="top">
    <div id="carouselExampleFade" class="carousel slide carousel-slide" data-bs-interval="3000" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            for ($i = 1; $i <= $row; $i++) {
                $fetch = mysqli_fetch_array($getExe);
                $sliderId = $fetch['slider_encryptkey'];
                $sliderImg = $fetch['slider_image']; ?>
                <?php if ($i == 1) { ?>
                    <div class="carousel-item active">
                        <img src="upload-images/<?= $sliderImg; ?>" class="d-block w-100" alt="slider-image">
                    </div>
                <?php } else { ?>
                    <div class="carousel-item">
                        <img src="upload-images/<?= $sliderImg; ?>" class="d-block w-100" alt="slider-image">
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>