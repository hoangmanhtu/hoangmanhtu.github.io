
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng ký | đăng nhập</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="Assets/backend/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="Assets/backend/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="Assets/backend/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="Assets/backend/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="Assets/backend/css/css.css">
    <link rel="stylesheet" href="Assets/backend/css/square/blue.css">
    <!-- Google Font -->
</head>
<style>
    .error
    {
        color: red;
        font-style: italic;
        font-size: 12px;
    }

</style>
<body class="hold-transition register-page">
<div class="register-box">
    <?php  if(isset($_SESSION['error'])): ?>
        <div class="alert alert-error">

            <?php echo $_SESSION["error"];
            unset($_SESSION["error"]); ?>
        </div>
    <?php endif;?>

    <?php  if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?php echo $_SESSION["success"];
            unset($_SESSION["success"]); ?>
        </div>
    <?php endif;?>
    <?php echo $this->content; ?>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="Assets/backend/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="Assets/backend/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="Assets/backend/js/jquery.validate.min.js"></script>
<script src="Assets/backend/js/additional-methods.min.js"></script>
<script src="Assets/backend/js/validate_form.js"></script>
<script src="Assets/backend/js/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
