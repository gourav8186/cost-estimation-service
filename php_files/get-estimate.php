<?php
include '../configuration/connection.php';
if (isset($_POST['parts'])) {
    $spValue =  $_POST['parts'];
    $placeholders = implode(',', array_map('intval', $spValue));

    $getData = "SELECT * 
                    FROM `ces_spareparts` 
                    LEFT JOIN `ces_mobile_company` ON ces_spareparts.spare_mcompany = ces_mobile_company.mbc_id 
                    LEFT JOIN `ces_model` ON ces_spareparts.spare_model = ces_model.m_id
                    LEFT JOIN `ces_series` ON ces_spareparts.spare_series = ces_series.s_id
                    LEFT JOIN `ces_charges` ON ces_spareparts.spare_mcompany = ces_charges.charges_company  WHERE `spare_id` IN ($placeholders)";
    $getExecute = mysqli_query($connect, $getData);


    $spareParts = array();
    while ($row = mysqli_fetch_assoc($getExecute)) {
        $spareParts[] = $row;
        $company = $row['mbc_name'];
        $model = $row['m_model'];
        $series = $row['s_seriesname'];
        $charges = $row['charges_price'];
    }
    $totalPrice = 0;
    foreach ($spareParts as $spare) {
        $totalPrice += $spare['spare_price'];
    }
    $repairCost = $totalPrice + $charges;
    $charges = number_format($charges, 2);
    $totalPrice = number_format($totalPrice, 2);
    $repairCost = number_format($repairCost, 2);
?>
    <div class="row my-3">
        <div class="col-lg-5 finalEstimate mx-auto">
            <p class="billHead fw-bold text-center py-2">Estimated Price</p>
            <div class="border-bottom border-2 my-2 pb-2">
                <div class="w-100 d-flex justify-content-between">
                    <div class="f_14 fw-bold">Company </div>
                    <div class="f_14 fw-bold"><?php echo $company; ?></div>
                </div>
                <div class="w-100 d-flex justify-content-between">
                    <div class="f_14 fw-bold">Model </div>
                    <div class="f_14 fw-bold"><?php echo $model; ?></div>
                </div>
                <div class="w-100 d-flex justify-content-between">
                    <div class="f_14 fw-bold">Series </div>
                    <div class="f_14 fw-bold"><?php echo $series; ?></div>
                </div>
            </div>
            <div class="d-flex justify-content-between border-2 border-bottom mb-1 pb-2">
                <span class="f_14 fw-bold">Parts&Accessories</span>
                <span class="f_14 fw-bold">Maximum Retail Price <br> (Inclusive of all taxes)</span>
            </div>
            <ul class="ps-0 border-bottom border-2 mb-0 py-1">
                <?php foreach ($spareParts as $spare) { ?>
                    <li class="d-flex justify-content-between pb-1">
                        <div class="partsName">
                            <h4 class="f_14 fw-bold"><?php echo $spare['spare_name']; ?></h4>
                        </div>
                        <div class="partsPrice">
                            <h4 class="f_14 fw-bold">₹<?php echo number_format($spare['spare_price'], 2); ?></h4>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <div class="w-100 d-flex justify-content-between">
                <p class="f_14 fw-bold text-end mb-0">Total Item Price</p>
                <p class="f_16 fw-bold mb-0"> ₹<?php echo $totalPrice; ?></p>
            </div>
            <div class="w-100 d-flex justify-content-between">
                <p class="f_14 fw-bold text-end mb-0">Service Cost</p>
                <p class="f_16 fw-bold mb-0"> ₹<?php echo $charges; ?></p>
            </div>
            <div class="w-100 d-flex justify-content-between">
                <p class="f_14 fw-bold text-end mb-0">Total Repair Cost</p>
                <p class="f_16 fw-bold mb-0"> ₹<?php echo $repairCost; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="spareFoot w-100 text-center mt-3">
                <button type="button" id="feedback" class="btn btn-secondary">Feedback</button>
                <a href="<?= SITE_URL; ?>" class="btn btn-primary">Reset</a>
            </div>
        </div>
    </div>
<?php } ?>