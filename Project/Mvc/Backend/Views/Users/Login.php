
    <div class="register-box-body">
        <p class="login-box-msg"><b>ĐĂNG NHẬP</b></p>
        <form action="" method="post" id="login">

            <div class="form-group has-feedback">
                <span class="fa fa-envelope form-control-feedback"></span>
                <input type="email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : "";?>" class="form-control" placeholder="Email *">
            </div>

            <div class="form-group has-feedback">
                <span class="fa fa-lock form-control-feedback"></span>
                <input type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu *">
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input type="submit"  class="btn btn-success btn-block btn-flat form-control" value="Đăng Nhập" name="submit">
                </div>
            </div>
        </form>
        <br>
        <p>Bạn chưa có tài khoản , <span><a href="index.php?area=backend&controller=login&action=register" class="text-center">Đăng ký </a></span> ngay</p>
    </div>
