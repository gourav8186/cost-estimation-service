<section class="boxShadow p-3">
    <div class="headLine border-bottom border-2 d-flex justify-content-between py-2">
        <h5 class="font18 boldText">Users</h5>
    </div>
    <div class="tableResponsive py-3">
        <table class="table table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th scope="col">S. No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $getData = "SELECT * FROM `ces_users`";
                $getExe = mysqli_query($connect, $getData);
                if (mysqli_num_rows($getExe) > 0) {
                    $i = 1;
                    while ($fetch = mysqli_fetch_array($getExe)) {
                        $userId = $fetch['user_encryptkey'];
                        $userName = $fetch['user_name'];
                        $userEmail = $fetch['user_email'];
                        $userMobile = $fetch['user_mobile'];
                        $status = $fetch['user_status'];
                        if ($userId != '652e779fc020ac9604a60b96b3b207a2') {
                ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $userName; ?></td>
                                <td><?= $userEmail; ?></td>
                                <td><?= $userMobile; ?></td>
                                <td>
                                    <ul class="actionBox ps-0 mb-0">
                                        <li><a title="Delete" class="deleteBtn cursor" data-element-id="<?= $userId; ?>"><i class="fa-solid fa-trash-can"></i> Delete</a></li>
                                        <li><select name="" id="" class="form-control optionBox text-center py-1" onchange="chkStatus(this, '<?= $userId; ?>')">
                                                <option value="1" <?= $status == '1' ? 'selected' : ''; ?>>Allowed</option>
                                                <option value="0" <?= $status == '0' ? 'selected' : ''; ?>>Not Allowed</option>
                                            </select>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                    <?php $i++;
                        }
                    }
                } else { ?>
                    <td colspan="9">
                        No Data Available
                    </td>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>