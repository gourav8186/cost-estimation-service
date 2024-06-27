<?php
$start = 0;
$limit = 10;

$selCount = "SELECT COUNT(*) AS total FROM `ces_feedback`";
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
    <div class="row py-2 headLine border-bottom border-2">
        <div class="col-lg-4 col-sm-4">
            <h5 class="font18 boldText">Feedback</h5>
        </div>
    </div>
    <form id="tableDataList">
        <div class="tableResponsive my-3">
            <table class="table table-bordered text-center align-middle">
                <thead>
                    <tr>
                        <th scope="col"><button type="button" class="btn delBtn px-2 py-1" id="selectDelete">Delete</button></th>
                        <th scope="col">S. No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Heading</th>
                        <th scope="col">Feedback</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $getData = "SELECT * FROM `ces_feedback`";
                    $getExe = mysqli_query($connect, $getData);
                    if (mysqli_num_rows($getExe) > 0) {
                        $i = $start;
                        while ($fetch = mysqli_fetch_array($getExe)) {
                            $fId = $fetch['f_encryptkey'];
                            $fName    = $fetch['f_name'];
                            $fHeading    = $fetch['f_heading'];
                            $fMessage      = $fetch['f_message'];
                            $status        = $fetch['f_status'];
                    ?>
                            <tr>
                                <th> <input type="checkbox" name="items[]" value="<?= $fId; ?>"></th>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $fName; ?></td>
                                <td><?= $fHeading; ?></td>
                                <td><?= $fMessage; ?></td>
                                <td>
                                    <ul class="actionBox ps-0 mb-0">
                                        <li><a title="Delete" class="deleteBtn cursor" data-element-id="<?= $fId; ?>"><i class="fa-solid fa-trash-can"></i> Delete</a></li>
                                        <li><select name="" id="" class="form-control py-1 optionBox" onchange="chkStatus(this, '<?= $fId; ?>')">
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
                        <td colspan="6">
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