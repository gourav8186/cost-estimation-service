<section class="boxShadow p-4">
    <div class="row px-4 py-3">
        <div class="col-lg-4 my-2">
            <div class="dashBox border-end p-3 text-center">
                <?php
                $selQuery = "SELECT COUNT(*) AS total FROM `ces_slider` WHERE `slider_Status` = '1'";
                $getExe = mysqli_query($connect, $selQuery);
                $fetch = mysqli_fetch_assoc($getExe);
                $total = $fetch['total'];
                ?>
                <a href="<?= VIEW_SLIDER; ?>" title="Total Slides">
                    <h4 class="font16"><?= $total; ?></h4>
                    <h5 class="font18">Active Slides</h5>
                </a>
            </div>
        </div>
        <div class="col-lg-4 my-2">
            <div class="dashBox border-end p-3 text-center">
                <?php
                $selQuery = "SELECT COUNT(*) AS total FROM `ces_mobile_company`";
                $getExe = mysqli_query($connect, $selQuery);
                $fetch = mysqli_fetch_assoc($getExe);
                $total = $fetch['total'];
                ?>
                <a href="<?= VIEW_MOBILE_COMPANY; ?>" title="Companies">
                    <h4 class="font16"><?= $total; ?></h4>
                    <h5 class="font18">Total Companies</h5>
                </a>
            </div>
        </div>
        <div class="col-lg-4 my-2">
            <div class="dashBox p-3 text-center">
                <?php
                $selQuery = "SELECT COUNT(*) AS total FROM `ces_model`";
                $getExe = mysqli_query($connect, $selQuery);
                $fetch = mysqli_fetch_assoc($getExe);
                $total = $fetch['total'];
                ?>
                <a href="<?= VIEW_MODEL; ?>" title="Models">
                    <h4 class="font16"><?= $total; ?></h4>
                    <h5 class="font18">Total Models</h5>
                </a>
            </div>
        </div>
        <p class="border-top mt-2"></p>
        <div class="col-lg-4 my-2">
            <div class="dashBox border-end p-3 text-center">
                <?php
                $selQuery = "SELECT COUNT(*) AS total FROM `ces_series`";
                $getExe = mysqli_query($connect, $selQuery);
                $fetch = mysqli_fetch_assoc($getExe);
                $total = $fetch['total'];
                ?>
                <a href="<?= VIEW_SERIES; ?>" title="Series">
                    <h4 class="font16"><?= $total; ?></h4>
                    <h5 class="font18">Total Series</h5>
                </a>
            </div>
        </div>
        <div class="col-lg-4 my-2">
            <div class="dashBox border-end p-3 text-center">
                <?php
                $selQuery = "SELECT COUNT(*) AS total FROM `ces_spareparts`";
                $getExe = mysqli_query($connect, $selQuery);
                $fetch = mysqli_fetch_assoc($getExe);
                $total = $fetch['total'];
                ?>
                <a href="<?= VIEW_SPAREPARTS; ?>" title="Spare Parts">
                    <h4 class="font16"><?= $total; ?></h4>
                    <h5 class="font18">Total Spare Parts</h5>
                </a>
            </div>
        </div>
        <div class="col-lg-4 my-2">
            <div class="dashBox p-3 text-center">
                <?php
                $selQuery = "SELECT COUNT(*) AS total FROM `ces_accessories`";
                $getExe = mysqli_query($connect, $selQuery);
                $fetch = mysqli_fetch_assoc($getExe);
                $total = $fetch['total'];
                ?>
                <a href="<?= VIEW_ACCESSORIES; ?>" title="Accessories">
                    <h4 class="font16"><?= $total; ?></h4>
                    <h5 class="font18">Accessories</h5>
                </a>
            </div>
        </div>
        <p class="border-top mt-2"></p>
        <div class="col-lg-4 my-2">
            <div class="dashBox p-3 border-end text-center">
                <?php
                $selQuery = "SELECT COUNT(*) AS total FROM `ces_center`";
                $getExe = mysqli_query($connect, $selQuery);
                $fetch = mysqli_fetch_assoc($getExe);
                $total = $fetch['total'];
                ?>
                <a href="<?= VIEW_CENTER; ?>" title="Service Centers">
                    <h4 class="font16"><?= $total; ?></h4>
                    <h5 class="font18">Total Service Centers</h5>
                </a>
            </div>
        </div>
        <div class="col-lg-4 my-2">
            <div class="dashBox p-3 border-end text-center">
                <?php
                $selQuery = "SELECT COUNT(*) AS total FROM `ces_feedback`";
                $getExe = mysqli_query($connect, $selQuery);
                $fetch = mysqli_fetch_assoc($getExe);
                $total = $fetch['total'];
                ?>
                <a href="<?= FEEDBACK; ?>" title="Feedbacks">
                    <h4 class="font16"><?= $total; ?></h4>
                    <h5 class="font18">Total Feedbacks</h5>
                </a>
            </div>
        </div>
        <div class="col-lg-4 my-2">
            <div class="dashBox p-3 text-center">
                <?php
                $selQuery = "SELECT COUNT(*) AS total FROM `ces_assistant`";
                $getExe = mysqli_query($connect, $selQuery);
                $fetch = mysqli_fetch_assoc($getExe);
                $total = $fetch['total'];
                ?>
                <a href="<?= INQUIRY; ?>" title="Inquires">
                    <h4 class="font16"><?= $total; ?></h4>
                    <h5 class="font18">Total Inquires</h5>
                </a>
            </div>
        </div>
    </div>
</section>