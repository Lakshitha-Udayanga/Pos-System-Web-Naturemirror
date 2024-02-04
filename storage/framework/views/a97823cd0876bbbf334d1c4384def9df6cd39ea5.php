<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale(), false); ?>">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">

    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('app.name', 'POS'), false); ?></title> 

    <?php echo $__env->make('layouts.partials.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<style>
    body {
        background-image: linear-gradient(343deg, rgba(34,193,195,1) 0%, rgba(51,45,253,1) 100%);
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: "Open Sans", 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
        color: #333333;
    }

    .box-form {
        margin: 0 auto;
        margin-top: 100px;
        width: 80%;
        background: #FFFFFF;
        border-radius: 10px;
        overflow: hidden;
        display: flex;
        flex: 1 1 100%;
        align-items: stretch;
        justify-content: space-between;
        box-shadow: 0 0 20px 6px #090b6f85;
    }

    @media (max-width: 980px) {
        .box-form {
            flex-flow: wrap;
            text-align: center;
            align-content: center;
            align-items: center;
        }
    }

    .box-form div {
        height: auto;
    }

    .box-form .left {
        color: #FFFFFF;
        background-size: cover;
        background-repeat: no-repeat;
        /* background-image: url("https://i.pinimg.com/736x/5d/73/ea/5d73eaabb25e3805de1f8cdea7df4a42--tumblr-backgrounds-iphone-phone-wallpapers-iphone-wallaper-tumblr.jpg"); */
        overflow: hidden;
    }

    .box-form .left .overlay {
        padding: 30px;
        width: 100%;
        height: 100%;
        background: #5961f9ad;
        overflow: hidden;
        box-sizing: border-box;
        opacity: 90%;
    }

    .box-form .left .overlay h1 {
        font-size: 5vmax;
        line-height: 1;
        font-weight: 900;
        margin-top: 40px;
        margin-bottom: 20px;
        color: white;
    }

    .box-form .left .overlay p {
        margin-top: 20px;
        font-weight: bold;
        font-size: 3vmax;
    }

    .box-form .left .overlay span a {
        background: #3b5998;
        color: #FFFFFF;
        margin-top: 10px;
        padding: 14px 50px;
        border-radius: 100px;
        display: inline-block;
        box-shadow: 0 3px 6px 1px #042d4657;
    }

    .box-form .left .overlay span a:last-child {
        background: #1dcaff;
        margin-left: 30px;
    }

    .box-form .right {
        padding: 40px;
        overflow: hidden;
        width: 40%;
    }

    @media (max-width: 980px) {
        .box-form .right {
            width: 100%;
        }
    }

    .box-form .right h5 {
        font-size: 6vmax;
        line-height: 0;
    }

    .box-form .right p {
        font-size: 14px;
        color: #B0B3B9;
    }

    .box-form .right .inputs {
        overflow: hidden;
    }

    .box-form .right input {
        width: 100%;
        padding: 10px;
        margin-top: 25px;
        font-size: 16px;
        border: none;
        outline: none;
        border-bottom: 2px solid #B0B3B9;
    }

    .box-form .right .help-block {
        color: red;
    }

    .box-form .right .remember-me--forget-password {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .box-form .right .remember-me--forget-password input {
        margin: 0;
        margin-right: 7px;
        width: auto;
    }

    .box-form .right button {
        float: right;
        color: #fff;
        font-size: 16px;
        padding: 12px 35px;
        display: inline-block;
        border: 0;
        outline: 0;
    }

    label {
        display: block;
        position: relative;
        margin-left: 30px;
    }

    label::before {
        content: ' \f00c';
        position: absolute;
        font-family: FontAwesome;
        background: transparent;
        border: 3px solid #70F570;
        border-radius: 4px;
        color: transparent;
        left: -30px;
        transition: all 0.2s linear;
    }

    label:hover::before {
        font-family: FontAwesome;
        content: ' \f00c';
        color: #fff;
        cursor: pointer;
        background: #70F570;
    }

    label:hover::before .text-checkbox {
        background: #70F570;
    }

    label span.text-checkbox {
        display: inline-block;
        height: auto;
        position: relative;
        cursor: pointer;
        transition: all 0.2s linear;
    }

    label input[type="checkbox"] {
        display: none;
    }
</style>

<body>
    <?php $request = app('Illuminate\Http\Request'); ?>
    <?php if(session('status')): ?>
        <input type="hidden" id="status_span" data-status="<?php echo e(session('status.success'), false); ?>" data-msg="<?php echo e(session('status.msg'), false); ?>">
    <?php endif; ?>
    
    <?php
        $business = App\Business::first();
    ?>

<div class="box-form">
    <div class="left login-image">
        <div class="overlay">
            <h1><?php echo e(config('app.name', 'ultimatePOS'), false); ?></h1>
            <p class="text-center"><?php echo e(config('constants.app_title'), false); ?></p>
        </div>
    </div>
    <div class="right">
        <h3>Login</h3>
        <form method="POST" action="<?php echo e(route('login'), false); ?>" id="login-form">
            <?php echo e(csrf_field(), false); ?>

            <?php
                $username = old('username');
                $password = null;
                if (config('app.env') == 'demo') {
                    $username = 'admin';
                    $password = '123456';
                
                    $demo_types = [
                        'all_in_one' => 'admin',
                        'super_market' => 'admin',
                        'pharmacy' => 'admin-pharmacy',
                        'electronics' => 'admin-electronics',
                        'services' => 'admin-services',
                        'restaurant' => 'admin-restaurant',
                        'superadmin' => 'superadmin',
                        'woocommerce' => 'woocommerce_user',
                        'essentials' => 'admin-essentials',
                        'manufacturing' => 'manufacturer-demo',
                    ];
                    if (!empty($_GET['demo_type']) && array_key_exists($_GET['demo_type'], $demo_types)) {
                        $username = $demo_types[$_GET['demo_type']];
                    }
                }
            ?>
            <div class="inputs">
                <input id="username" type="text" class="form-control" name="username"
                    value="<?php echo e($username, false); ?>" required autofocus placeholder="<?php echo app('translator')->getFromJson('lang_v1.username'); ?>">
                <?php if($errors->has('username')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('username'), false); ?></strong>
                    </span>
                <?php endif; ?>
                <br>
                <input id="password" type="password" class="form-control" name="password"
                    value="<?php echo e($password, false); ?>" required placeholder="<?php echo app('translator')->getFromJson('lang_v1.password'); ?>">
                <?php if($errors->has('password')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password'), false); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <br><br>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-flat btn-login"><?php echo app('translator')->getFromJson('lang_v1.login'); ?></button>
                <?php if(config('app.env') != 'demo'): ?>
                    <a href="<?php echo e(route('password.request'), false); ?>" class="pull-right">
                    </a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

    

    
    <?php echo $__env->make('layouts.partials.javascripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/login.js?v=' . $asset_v), false); ?>"></script>
    
    <?php echo $__env->yieldContent('javascript'); ?>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.select2_register').select2();

            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

</html><?php /**PATH F:\My Project\Thand\free-isses-item\New folder\resources\views/layouts/auth2.blade.php ENDPATH**/ ?>