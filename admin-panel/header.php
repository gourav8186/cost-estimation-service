<header class="d-flex justify-content-between align-items-center bg-dark px-3">
    <div class="logoLeft d-flex align-items-center">
        <div class="sideHam dNone cursor" id="hamBurger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        <a href="<?= CONTROL_PANEL; ?>" class="headLogo">
            <img src="../assets/image/admin-images/common-images/admin-logo.png" alt="logo">
        </a>
    </div>
    <div class="rightMenu d-flex align-items-center">
        <div class="notify cursor me-5">
            <img src="../assets/image/admin-images/notification.svg" alt="bell Icon" id="notify">
            <span class="notiCount countText">0</span>
            <div class="notifyBar boxShadow">
                <h5 class="font16 mb-1">You have <span class="countText">0</span> Inquires</h5>
                <div class="msgBar px-3 mb-3">
                    <div class="msgItems d-flex align-items-center">
                        <div class="userDetails w-100 text-start notificationList">
                        </div>
                    </div>
                </div>
                <a href="<?= INQUIRY; ?>" class="font15 px-3 py-1">View All</a>
            </div>
        </div>
        <div class="hambar border-bottom cursor d-flex align-items-center justify-content-between py-2 px-2" id="menu">
            <img src="../assets/image/admin-images/avatar-1.jpg" alt="profile" />
            <?php
            $getUser = "SELECT * FROM `ces_users`";
            $getEx = mysqli_query($connect, $getUser);
            $loggedIn  = $_SESSION['ADMINUSER']['user_name'];
            ?>
            <h5 class="font16 mb-0 px-2"><?= $loggedIn; ?>&nbsp;<i class="fa-solid fa-caret-down"></i></h5>
            <ul class="menuBar boxShadow ps-0">
                <li><a href="<?= CHANGE_PASSWORD; ?>"><i class="fa-solid fa-unlock-keyhole"></i> Change Password</a></li>
                <li><a id="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</header>