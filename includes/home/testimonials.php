<?php
$getData = "SELECT * FROM `ces_feedback` WHERE `f_status` = '1'";
$getExe = mysqli_query($connect, $getData);
$row = mysqli_num_rows($getExe);
?>
<section class="container py-4">
    <div class="headingPart spHeading text-center my-5">
        <h2 class="fw-bold">Testimonials</h2>
        <p>Our Satisfied Visitors.</p>
    </div>
    <div class="testimonial owl-carousel owl-theme">
        <?php for ($i = 1; $i <= $row; $i++) {
            $fetch = mysqli_fetch_array($getExe);
            $feedId = $fetch['f_encryptkey'];
            $feedName = $fetch['f_name'];
            $feedHeading = $fetch['f_heading'];
            $feedDescription = $fetch['f_message'];
            $feedDate = $fetch['f_createdon'];
        ?>
            <div class="item t-Main border p-4">
                <div class="t-head d-flex justify-content-between pb-4">
                    <div class="leftPart">
                        <span class="profileText"></span>
                        <span class="profileName fw-bold ps-2" id="fullNameDiv">
                            <?= $feedName; ?>
                        </span>
                    </div>
                    <div class="rightPart">
                        <span class="reviewDate f_14">
                        <?= $feedDate; ?>
                        </span>
                    </div>
                </div>
                <div class="Comment">
                    <h4 class="f_18 fw-bolder"><?= $feedHeading; ?></h4>
                    <p><?= $feedDescription; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</section>