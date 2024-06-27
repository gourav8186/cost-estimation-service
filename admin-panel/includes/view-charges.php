<?php
$start = 0;
$limit = 10;

$selCount = "SELECT COUNT(*) AS total FROM `ces_charges`";
$exPro = mysqli_query($connect, $selCount);
$row = mysqli_fetch_assoc($exPro);
$total = $row['total'];
$totalItem = ceil($total / $limit);
if ($total > 5) {
    $adClass = "";
} else {
    $adClass = "paginationHide";
}
$next = $_GET['page'] + 1;
$current_page = isset($_GET['page']) ? $_GET['page'] : 0;
$pre = max(0, $current_page - 1);

if ($_GET['page'] == "") {
    $_GET['page'] = 0;
}
$start = $_GET['page'] * $limit;

$to = min($start + ($_GET['page'] + 1) * $limit, $total);
?>
<section class="boxShadow p-3">
    <div class="headLine border-bottom border-2 d-flex justify-content-between py-2">
        <h5 class="font18 boldText">Service Charges</h5>
        <a href="<?= ADD_CHARGES; ?>" class="btn subBtn py-1">Add New</a>
    </div>
    <form id="tableDataList">
        <div class="tableResponsive py-3">
            <table class="table table-bordered text-center align-middle">
                <thead>
                    <tr>
                        <th scope="col"><button type="button" class="btn delBtn px-2 py-1" id="selectDelete">Delete</button></th>
                        <th scope="col">S. No.</th>
                        <th scope="col">Company</th>
                        <th scope="col">Charges</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $getData = "SELECT * FROM `ces_charges` LEFT JOIN `ces_mobile_company` ON ces_charges.charges_company = ces_mobile_company.mbc_id LIMIT $start,$limit";
                    $getExe = mysqli_query($connect, $getData);
                    if (mysqli_num_rows($getExe) > 0) {
                        $i = $start;
                        while ($fetch = mysqli_fetch_array($getExe)) {
                            $chargesId = $fetch['charges_encryptkey'];
                            $chargesCompany = $fetch['mbc_name'];
                            $chargesPrice = $fetch['charges_price'];
                            $status = $fetch['charges_status'];
                            $updateLink = ADD_CHARGES . '?update=' . $chargesId;
                    ?>
                            <tr>
                                <th> <input type="checkbox" name="items[]" value="<?= $chargesId; ?>"></th>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $chargesCompany; ?></td>
                                <td>₹ <?= $chargesPrice; ?></td>
                                <td>
                                    <ul class="actionBox ps-0 mb-0">
                                        <li><a href="<?= $updateLink; ?>" class="cursor editBtn" title="Edit"><i class="fa-regular fa-pen-to-square"></i> Edit</a></li>
                                        <li><a title="Delete" class="deleteBtn cursor" data-element-id="<?= $chargesId; ?>"><i class="fa-solid fa-trash-can"></i> Delete</a></li>
                                        <li><select name="" id="" class="form-control py-1" onchange="chkStatus(this, '<?= $chargesId; ?>')">
                                                <option value="1" <?= $status == '1' ? 'selected' : ''; ?>>Enable</option>
                                                <option value="0" <?= $status == '0' ? 'selected' : ''; ?>>Disable</option>
                                            </select>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        <?php $i++;
                        }
                    } else { ?>
                        <td colspan="5">
                            No Data Available
                        </td>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </form>
    <div class="bottom d-flex justify-content-between align-items-center <?= $adClass; ?>">
        <p class="font16">Showing <?= $start; ?> to <?= $to; ?> of <?= $total; ?> entries</p>
        <nav aria-label="Page navigation example ms-auto">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="view-model?page=0">first</a></li>
                <li class="page-item"><a class="page-link" href="view-model?page=<?php echo $pre; ?>">Previous</a></li>
                <?php
                for ($i = 1; $i <= $totalItem; $i++) {
                    if ($_GET['page'] == $i - 1) {
                        $active = "active";
                    } else {
                        $active = "";
                    }
                ?>
                    <li class="page-item <?php echo $active; ?>"><a class="page-link" href="view-model?page=<?php echo $i - 1; ?>"><?php echo $i; ?></a></li>
                <?php
                }
                if ($_GET['page'] < $totalItem - 1) {
                ?>
                    <li class="page-item"><a class="page-link" href="view-model?page=<?php echo $next; ?>">Next</a></li>
                    <li class="page-item"><a class="page-link" href="view-model?page=<?php echo $totalItem - 1; ?>">Last</a></li>

                <?php } ?>
            </ul>
        </nav>
    </div>
</section>