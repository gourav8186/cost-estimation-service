<?php
if (isset($_GET['company'])) {
    $company_id = $_GET['company'];
    $getCompany = "SELECT * FROM `ces_model`LEFT JOIN `ces_mobile_company` ON ces_model.m_company = ces_mobile_company.mbc_id WHERE `mbc_encryptkey` = '$company_id' AND `m_status` = 1";
    $getExe = mysqli_query($connect, $getCompany);

    if ($fetch = mysqli_fetch_array($getExe)) {
        $mCompanyImg = $fetch['mbc_image'];
?>
        <section class="container estimateBox py-2 my-4">
            <div class="modelSelector">
                <h2 class="text-center companyLogo"><img src="upload-images/<?= $mCompanyImg; ?>" alt=""></h2>
                <h2 class="text-center">Select Your Product Model</h2>
            </div>
            <form method="post" id="spareForm">
                <div class="searchService row justify-content-center align-items-center py-2">
                    <div class="col-lg-3 my-2">
                        <select name="sModel" id="sModel" class="form-select form-control borderRadius px-3 py-2">
                            <option value="">Select Model</option>
                            <?php
                            do {
                                $mId = $fetch['m_id'];
                                $mName = $fetch['m_model'];
                            ?>
                                <option value="<?= $mId; ?>"><?= $mName; ?></option>
                            <?php } while ($fetch = mysqli_fetch_array($getExe));   ?>

                        </select>
                    </div>
                    <div class="col-lg-3 my-2">
                        <?php include './php_files/seriesfetch-file.php'; ?>
                    </div>
                </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="spare_listBox mx-4" id="listItems">
                        <?php include './php_files/fetch-spareparts.php'; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div id="estimateCal">
                        <?php include './php_files/get-estimate.php'; ?>
                    </div>
                </div>
            </div>
        </section>
<?php }
} ?>