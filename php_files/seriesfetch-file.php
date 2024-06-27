<?php
include '../configuration/connection.php';
?>
<select name="sp_series" id="sp_series" class="form-select form-control borderRadius px-3 py-2">
    <option value="">Select Series</option>
    <?php
    if (isset($_POST['s_id'])) {
        $s_id = $_POST['s_id'];
        $getCompany = "SELECT * FROM `ces_series` WHERE `s_model` = '$s_id' AND `s_status` = '1'";
        $getExe = mysqli_query($connect, $getCompany);
        while ($fetch = mysqli_fetch_array($getExe)) {
            $sId = $fetch['s_id'];
            $sName = $fetch['s_seriesname'];
    ?>
            <option value="<?= $sId; ?>"><?= $sName; ?></option>
    <?php }
    } ?>
</select>