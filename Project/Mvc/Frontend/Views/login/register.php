<div class="container pt-40">
    <div class="row">
        <div style="width: 500px;margin: auto;">
            <div class=" dangnhap" >
                <p style="font-size: 24px;text-align: center;text-transform: uppercase;font-family: 'Times New Roman';font-weight: bold;">Đăng Ký Tài Khoản</p>
                <div style="margin: auto; " class="h5-line pt-10"></div>
            </div>
            <br>
            <form action="" method="POST" id="register_frontend">
                <div class="footer-support">
                    <input type="text" name="fullname"  placeholder="Nhập họ tên ... *">
                    <input type="text" name="email" id="login_email" placeholder="Nhập Email ... *">
                    <p id="emailerror"></p>
                    <input type="text" name="phone"  placeholder="Nhập số diện thoại ... *">
                    <input type="password" id="password" name="password"  placeholder="Mật khẩu từ 6-32 ký tự ... ">
                    <input type="password" name="confirm_password"  placeholder="Nhập lại mật khẩu ... *">
                    <input type="hidden" value="0" name="status" class="form-control"  />
                </div>
                <p style="text-align: right;font-style: italic;color: red">* Thông tin bắt buộc</p>
                <div class="form-group mt-20 mp-15" >
                    <input type="submit" value="Đăng ký" id="submit_register" name="submit" class="btn btn-success form-control"
                </div>
            </form>
            <p class="mt-15">Bạn đã có tài khoản, <a style="color: red;" href="dang-nhap">Đăng Nhập</a> ngay</p>
            <div>
            </div>
        </div>
    </div>
</div>
</div>
