<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $_SERVER['SCRIPT_NAME']; ?>" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nội thất Hoàn Mỹ</title>
    <link rel="stylesheet" href="Assets/Frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/Frontend/css/style.css">
    <link rel="stylesheet" href="Assets/Frontend/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Assets/Frontend/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="Assets/Frontend/owlcarousel/owl.theme.default.min.css">
</head>

<body style="background-color: #fff">
<style>
    .error
    {
        color: red;
        font-style: italic;
    }
</style>
<!-- header-top -->
<?php require_once  "Mvc/Frontend/views/layouts/header.php"; ?>
<?php  if(isset($_SESSION['error'])): ?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-10">
                <div class="alert alert-danger" role="alert">
                    <?php echo "<i class='fa fa-times'></i> " .$_SESSION["error"];
                    unset($_SESSION["error"]); ?>
                </div>
        </div>
    </div>
</div>
<?php endif;?>

<?php  if(isset($_SESSION['success'])): ?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-10">
                <div class="alert alert-success" role="alert">
                    <?php echo "<i class='fa fa-check'></i> " . $_SESSION["success"];
                    unset($_SESSION["success"]); ?>
                </div>
        </div>
    </div>
</div>
<?php endif;?>
<?php if (!empty($this->error)): ?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-10">
            <div class="alert alert-danger" role="alert">
                <?php echo "<i class='fa fa-times'></i>" .$this->error; ?>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<!-- end header -->
<?php echo $this->content; ?>
<!-- end product -->
<?php require_once  "Mvc/Frontend/views/layouts/footer.php"; ?>

</html>
<script src="Assets/Frontend/js/bootstrap.min.js"></script>
<script src="Assets/Frontend/js/jquery-3.5.1.min.js"></script>
<script src="Assets/Frontend/js/index.js"></script>
<script src="Assets/Frontend/js/jquery.validate.min.js"></script>
<script src="Assets/Frontend/js/additional-methods.min.js"></script>
<script src="Assets/Frontend/js/owl.carousel.min.js"></script>
<script>
    function changeImage(id) {
        // lấy giá trị của thuộc tính src
        var srcImg = document.getElementById(id).getAttribute("src")
        //
        // tác động vào thuộc tính src của thẻ html co id=img-main
        document.getElementById("img-main").setAttribute("src", srcImg);
    }
    $(document).ready(function () {
        function loadTable(page) {
            $.ajax({
                url: "index.php?area=frontend&controller=product&action=search",
                type: "POST",
                data: {
                    page: page,
                },
                success: function (data) {
                    $("#show_all_product").html(data);
                    console.log(page);
                }
            });
        }
        $(document).on("click","#pagination li",function (e) {
            e.preventDefault();
            var page_id=$(this).attr("id");
            loadTable(page_id);
        });

        $("#search_product").keyup(function () {
            let name=$(this).val();
            let search = $.trim(name);
            if(search != '')
            {
                $("#result ").css("display","block");
                $("#result").css("height","300px");
                $("#result").css("padding-top","10px");
                $("#result").css("overflow","auto");
                $.ajax({
                    url :"index.php?area=frontend&controller=product&action=searchProduct",
                    method: "POST",
                    data : {
                        search : search
                    },
                    dataType: "text",
                    success:function (data) {
                       $("#result").html(data);
                    }
                });
            }
            else
            {
                $("#result").css("display","none");
            }
        });
        $(document).on("click","a",function(){
            $("#search_product").val($(this).text());
            $("#result").html("");
        });
        $("#login_frontend").validate({
            rules:  {
                email :{
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                },
            },
            messages :
                {
                    email :{
                        required: " *Email không được để trống",
                        email: " *Tên đăng nhâp phải đúng định dạng là Email"
                    },

                    password: {
                        required: " * Mật khẩu không được để trống",
                    },
                }
        });
        $("#register_frontend").validate({
            rules:  {
                fullname : "required",
                email :{
                    required: true,
                    email: true
                },
                phone :
                    {
                        required : true,
                        number: true,
                        maxlength:10,
                        minlength:10
                    },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                },

            },
            messages :
                {
                    fullname : " * Họ tên không được để trống",
                    email :{
                        required: " * Email không được để trống",
                        email: " * Phải đúng định dạng là Email"
                    },
                    phone :
                        {
                            required : " * Số điện thoại không được để trống",
                            number: "* Phải nhập số không được nhập chữ hay ký tự đăc biệt",
                            minlength: " * Số điện thoại phải có ít nhất 10 số",
                            maxlength :" * Số điện thoại không được quá 10 số",
                        },
                    password: {
                        required: " * Mật khẩu không được để trống",
                        minlength: " * Mật khẩu phải có ít nhất 5 ký tự",
                    },
                    confirm_password: {
                        required: " * Nhập lại mật khẩu không được để trống",
                        equalTo: " * Phải giống mật khẩu đã nhập phía trên",
                    },
                }
        });
        $("#login_email").keyup(function () {
            let email = $(this).val();
            $.post("index.php?area=frontend&controller=login&action=validateEmail",
                {email: email},
                function (data) {
                    if (data == "True") {
                        $("#emailerror").text(" * Tên Email đã tồn tại");
                        $("#emailerror").css("font-style","italic");
                        $("#emailerror").css("color","red");
                        $("#submit_register").css("display","none");
                    }
                    else {
                        $("#submit_register").css("display","inline-block");
                        $("#emailerror").text("");
                    }
                });
        });

        $("#shopping_pay").validate({

            rules:  {
                fullname : "required",
                email :{
                    required: true,
                    email: true
                },
                mobile :
                    {
                        required : true,
                        number: true,
                    },
                address: {
                    required: true,
                },
            },
            messages :
                {
                    fullname : " * Họ tên không được để trống",
                    email :{
                        required: " * Email không được để trống",
                        email: " * Phải đúng định dạng là Email"
                    },
                    mobile :
                        {
                            required: " * Số điện thoại không được để trống",
                            number: "* Phải nhập số không được nhập chữ hay ký tự đăc biệt",
                        },
                    address: {
                        required: " * Địa chỉ nhận hàng không được để trống",
                    },
                }
        });


    });

</script>
