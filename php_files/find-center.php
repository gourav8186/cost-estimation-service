<?php
include '../configuration/connection.php';

if (isset($_POST['cities'])) {
    $selectedCity = $_POST['cities'];

    $getServiceCenters = "SELECT * FROM `ces_center` WHERE `c_city` = $selectedCity AND `c_status` = 1";
    $serviceCentersResult = mysqli_query($connect, $getServiceCenters);
    if (mysqli_num_rows($serviceCentersResult) > 0) {
        while ($center = mysqli_fetch_assoc($serviceCentersResult)) {
            $cName = $center['c_name'];
            $cMobile = $center['c_mobile'];
            $directionLink = $center['c_direction'];
            $cAddress = $center['c_address'];
            $cOpen = $center['c_opentime'];
            $cClose = $center['c_closetime'];
?> <h2 class="mb-0">Below are the service centers in your city.</h2>
            <p>Find a service center near you.</p>
            <div class="col-lg-6 my-2">
                <div class="centerAddress p-4 borderRadius">
                    <h5 class="fw-bold"><?= $cName; ?></h5>
                    <p><i class="fa-solid fa-location-dot pe-1"></i> <?= $cAddress; ?></p>
                    <p><i class="fa-regular fa-clock pe-1"></i> <?= $cOpen; ?> AM - <?= $cClose; ?> ( ALL DAY OPEN )</p>
                    <div class="d-flex">
                        <p class="px-2"><i class="fa-solid fa-phone pe-1"></i> <a href="tel:<?= $cMobile; ?>"><?= $cMobile; ?></a></p>
                        <p class="px-2"><i class="fa-solid fa-location-crosshairs"></i> <a href="<?= $directionLink; ?>" target="_blank" title="Location">Get Direction</a></p>
                    </div>
                </div>
            </div>
        <?php }
    } else { ?>
        <h2 class="mb-0 text-center">No service centers are available in your city.</h2>
<?php }
} ?>