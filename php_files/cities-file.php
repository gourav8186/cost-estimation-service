<?php
include '../configuration/connection.php';
?>
<select name="cities" id="cities" class="form-select form-control borderRadius px-3 py-2">
<option value="">Select City</option>
<?php
if (isset($_POST['city_id'])) {
    $city_id = $_POST['city_id'];
    $getCompany = "SELECT * FROM `ces_cities` WHERE `city_state_id` = '$city_id'";
    $getExe = mysqli_query($connect, $getCompany);
    while ($fetch = mysqli_fetch_array($getExe)) {
        $cityId = $fetch['city_id'];
        $cityName = $fetch['city_name'];
?>
    <option value="<?= $cityId; ?>"><?= $cityName; ?></option>
    <?php }}?>
</select>