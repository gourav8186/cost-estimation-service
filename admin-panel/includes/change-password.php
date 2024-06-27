<section class="boxShadow p-3">
    <div class="headLine border-bottom border-2">
        <h5 class="font18 boldText">Change Password</h5>
    </div>
    <form method="post" id="passwordForm">
        <div class="row py-2">
            <div class="col-lg-4">
                <div class="changeGroup">
                    <input type="password" maxlength="10" minlength="5" placeholder="Current Password" id="crntPass" name="crntPass" class="form-control my-2" />
                </div>
            </div>
            <div class="col-lg-4">
                <div class="changeGroup">
                    <input type="password" maxlength="10" minlength="5" placeholder="New Password" id="newPass" name="newPass" class="form-control my-2" />
                </div>
            </div>
            <div class="col-lg-4">
                <div class="changeGroup">
                    <input type="password" maxlength="10" minlength="5" placeholder="Confirm Password" id="confmPass" name="confmPass" class="form-control my-2" />
                </div>
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn insertBtn subBtn bg-dark py-1 mt-2">Change Password</button>
        </div>
    </form>
</section>