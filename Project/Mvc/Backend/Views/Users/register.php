<div class="register-box-body">
    <p class="login-box-msg"><b>ĐĂNG KÝ TÀI KHOẢN</b></p>
    <form action="" method="post" id="register">
        <div class="form-group has-feedback">
            <span class="fa fa-user form-control-feedback"></span>
            <input type="text" name="fullname" class="form-control" placeholder="Họ và tên  *" value="<?php echo isset($_POST["fullname"]) ? $_POST["fullname"] : "";?>">


        </div>
        <div class="form-group has-feedback">
            <span class="fa fa-envelope form-control-feedback"></span>
            <input type="email" name="email" id="email_regester" class="form-control" placeholder="Email *" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : "";?>">
            <span id="usernameerror"></span>
        </div>
        <div class="form-group has-feedback">
            <span class="fa fa-phone form-control-feedback"></span>
            <input type="text" name="phone" class="form-control" placeholder="Số điện thoại *" value="<?php echo isset($_POST["phone"]) ? $_POST["phone"] : "";?>">

        </div>
        <div class="form-group has-feedback">
            <span class="fa fa-lock form-control-feedback"></span>
            <input type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu *" >
        </div>
        <div class="form-group has-feedback">
            <span class="fa fa-sign-in form-control-feedback"></span>
            <input type="password"  id="confirm_password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu *">
        </div>
        <input type="hidden" value="1" name="status" class="form-control"  />
        <div class="row">
            <div class="col-xs-4">
                <input type="submit" id="submit_regester" class="btn btn-success btn-block btn-flat" value="Đăng ký" name="submit">
            </div>
            <div class="col-xs-8">
                <div class="checkbox icheck" style="text-align: right !important;color: red;font-style: italic;font-size: 11px !important;">
                    * Thông tin bắt buộc
                </div>
            </div>
        </div>

    </form>
    <br>
    <p>Bạn đã có tài khoản , <span><a href="index.php?area=backend&controller=login" class="text-center">Đăng nhập </a></span> ngay</p>
</div>