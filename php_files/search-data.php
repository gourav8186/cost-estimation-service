<div class="row">
    <?php
    include '../configuration/connection.php';
    $srch_value = $_POST["search"];
    $slct = "SELECT * FROM   `ces_accessories` WHERE `accessorie_name` LIKE '%{$srch_value}%' AND `accessorie_status` = 1";
    $result = mysqli_query($connect, $slct);
    while ($fetch = mysqli_fetch_array($result)) {
        $aImage = $fetch['accessorie_image'];
        $aName = $fetch['accessorie_name'];
        $aPrice = $fetch['accessorie_price'];
        $aWarranty = $fetch['accessorie_warranty']; ?>

        <div class="col-lg-3 col-sm-6 py-3">
            <div class="product p-2">
                <div class="product_img">
                    <img src="upload-images/<?= $aImage; ?>" class="w-100" alt="Accesories-Image">
                </div>
                <div class="product_details p-2">
                    <div class="aName">
                        <p class="nameText"><?= $aName; ?></p>
                    </div>
                    <div class="aPrice d-flex justify-content-between align-items-center">
                        <p class="mb-0">₹<?= $aPrice; ?></p>
                        <p class="wTag mb-0"><?= $aWarranty; ?> Warranty</p>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
</div>