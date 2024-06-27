<?php
include '../../configuration/connection.php';
?>
<select name="selectModel" id="selectModel" class="form-select form-control">
<option value="">Select Model</option>
<?php
if (isset($_POST['mbc_id']) ) {
    $mbc_id = $_POST['mbc_id'];
    $getCompany = "SELECT * FROM `ces_model` WHERE `m_company` = '$mbc_id'";
    $getExe = mysqli_query($connect, $getCompany);
    while ($fetch = mysqli_fetch_array($getExe)) {
        $mId = $fetch['m_id'];
        $mName = $fetch['m_model'];
?>
    <option value="<?= $mId; ?>"><?= $mName; ?></option>
    <?php }}?>
</select>