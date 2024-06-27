<?php
include '../configuration/connection.php';
if (isset($_POST['series_id'])) {
    $sid = $_POST['series_id'];
    $getData = "SELECT * FROM `ces_spareparts` WHERE `spare_series` = '$sid' AND `spare_status` = '1'";
    $getRes = mysqli_query($connect, $getData);
    if (mysqli_num_rows($getRes) > 0) {
?>
        <form id="estimate">
            <div class="spareHead py-4 px-4 d-flex justify-content-between">
                <div class="leftText">
                    <h4 class="f_18 fw-bold">Parts&Accessories</h4>
                </div>
                <div class="rightText">
                    <h4 class="f_18 fw-bold">Retail Price <br> (Inclusive taxes)</h4>
                </div>
            </div>
            <ul class="spareList ps-0 mb-0">
                <?php
                while ($fetch = mysqli_fetch_array($getRes)) {
                    $spareID = $fetch['spare_id'];
                    $spareValue = $fetch['spare_encryptkey'];
                    $spartName = $fetch['spare_name'];
                    $sparePrice = $fetch['spare_price']; ?>
                    <li class="list-items my-2 pe-2">
                        <label for="inputId<?= $spareID; ?>" class="d-flex justify-content-between border-bottom py-4">
                            <div class="partsName d-flex">
                                <input type="checkbox" value="<?= $spareID; ?>" name="parts[]" class="mb-1 form-check-input" id="inputId<?= $spareID; ?>"> &nbsp;&nbsp;&nbsp; <h4 class="f_18 fw-bold"><?= $spartName; ?></h4>
                            </div>
                            <div class="partsPrice">
                                <h4 class="f_18 fw-bold">₹<?= $sparePrice; ?></h4>
                            </div>
                        </label>
                    </li>
                <?php
                }
                ?>
            </ul>
            <!-- <div class="spareFoot w-100 text-end py-3">
                <button type="submit" id="getEstimate" class="btn btn-secondary">Get Estimate</button>
            </div> -->
        </form><?php } else { ?> <div class="queryLabel py-2 text-center d-flex flex-column align-items-center">
            <img src="assets/image/icons/maintenance.png" alt="">
            <p>Sorry, soon we will upload the spare parts details of this series.</p>
        </div>

    <?php
            }
        } else { ?>
    <div class="queryLabel py-2 text-center d-flex flex-column align-items-center">
        <img src="assets/image/icons/support-parts-none_c803d84.png" alt="">
        <p>Query of spare parts price and further understand about the spare parts price</p>
    </div> <?php
        } ?>