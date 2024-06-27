<!-- Register Account -->
<section class="bgDarkside">
    <div class="mainBox registerBox">
        <i class="fa-regular fa-circle-xmark close"></i>
        <h3 class="boldText f-24">Create Account</h3>
        <p class="f-14">When the admin allows your account, then you can access the master admin.</p>
        <form method="post" id="registerForm">
            <div class="container">
                <div class="inputgroup">
                    <input type="text" id="userName" name="uName" class="form-control" placeholder="Name" />
                </div>
                <div class="inputgroup">
                    <input type="email" id="userEmail" name="uEmail" class="form-control" placeholder="Email" />
                </div>
                <div class="inputgroup">
                    <input type="text" id="userContact" name="uContact" minlength="10" maxlength="10" class="form-control" placeholder="Contact" />
                </div>
                <div class="inputgroup">
                    <input type="password" id="userPassword" minlength="5" maxlength="10" name="uPass" class="form-control" placeholder="Password" />
                </div>

                <div class="inputgroup">
                    <input type="password" id="userConfPass" minlength="5" maxlength="10" name="uConfmpass" class="form-control" placeholder="Confirm Password" />
                </div>
                <div class="text-end">
                    <button type="submit" class="btn insertBtn subBtn py-1 mt-3">Register</button>
                </div>
            </div>
        </form>
    </div>
</section>