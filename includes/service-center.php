
<section class="container-fluid px-0">
    <div class="bgImage"></div>
    <div class="container py-5">
        <div class="locationBox py-4">
            <h2 class="text-center">Service Center</h2>
            <p class="text-center">Find a service center near you.</p>
            <form method="post" id="centerForm"> 
                <div class="searchService row px-4 py-3">
                    <div class="col-lg-3 my-2">
                        <select class="form-select form-control borderRadius px-3 py-2" id="mCompany" aria-label="Default select example">
                            <option value="">Select Mobile Company</option>
                            <?php
                            $getCompany = "SELECT * FROM `ces_mobile_company` WHERE `mbc_status` = '1'";
                            $getStmnt = mysqli_query($connect, $getCompany);
                            while ($fetch = mysqli_fetch_array($getStmnt)) {
                                $cId = $fetch['mbc_id'];
                                $name = $fetch['mbc_name'];
                            ?>
                                <option value="<?= $cId; ?>"><?= $name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-3 my-2">
                        <select name="selectState" id="selectState" class="form-select form-control borderRadius px-3 py-2">
                            <option value="">Select State</option>
                            <?php
                            $getCompany = "SELECT * FROM `ces_state`";
                            $getExe = mysqli_query($connect, $getCompany);
                            while ($fetch = mysqli_fetch_array($getExe)) {
                                $sId = $fetch['state_id'];
                                $sName = $fetch['state_name'];

                            ?>
                                <option value="<?= $sId; ?>"><?= $sName; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-3 my-2">
                        <?php include './php_files/cities-file.php'; ?>
                    </div>
                    <div class="col-lg-3 my-2">
                        <button type="submit" class="btn btn-outline-primary borderRadius px-3 py-2">Find in your city</button>
                    </div>
                </div>
            </form>
            <div class="row px-5 py-3">
                <div id="serviceCenters"></div>
            </div>
        </div>
    </div>
</section>