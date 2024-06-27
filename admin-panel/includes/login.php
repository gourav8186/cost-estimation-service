<section class="d-flex">
    <div class="leftPart d-flex flex-column align-items-center justify-content-center">
        <div class="logoHead">
            <a href="<?= CONTROL_PANEL; ?>">
                <img src="../assets/image/logo.png" alt="logo">
            </a>
        </div>
        <div class="hTitle text-center mt-5">
            <h3 class="font24 mb-0">Welcome!</h3>
            <p class="font12">Sign in to continue to Master Admin</p>
        </div>
        <div class="logForm">
            <form id="loginForm" class="d-flex flex-column" method="POST">
                <input type="email" placeholder="Enter Email" id="username" name="uName" class="form-control" />
                <div class="inpGroup">
                    <input type="password" minlength="5" placeholder="Enter Password" id="password" name="uPassword" class="form-control" />
                </div>
               
                <div class="text-center">
                    <button type="submit" name="login" class="insertBtn btn w-100 subBtn bg-dark py-1 mt-3">Log In</button>
                </div>
                <a href="javascript:void(0)" style="width: 80px;" class="ms-auto register viewLink font16">Register ?</a>
            </form>
        </div>
    </div>
    <div class="rightPart">
        <div class="overlay"></div>
    </div>
</section>