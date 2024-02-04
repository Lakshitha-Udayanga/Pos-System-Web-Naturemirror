<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'POS') }}</title> 

    @include('layouts.partials.css')

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
    @inject('request', 'Illuminate\Http\Request')
    @if (session('status'))
        <input type="hidden" id="status_span" data-status="{{ session('status.success') }}" data-msg="{{ session('status.msg') }}">
    @endif
    
    @php
        $business = App\Business::first();
    @endphp

<div class="box-form">
    <div class="left login-image">
        <div class="overlay">
            <h1>{{ config('app.name', 'ultimatePOS') }}</h1>
            <p class="text-center">{{config('constants.app_title')}}</p>
        </div>
    </div>
    <div class="right">
        <h3>Login</h3>
        <form method="POST" action="{{ route('login') }}" id="login-form">
            {{ csrf_field() }}
            @php
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
            @endphp
            <div class="inputs">
                <input id="username" type="text" class="form-control" name="username"
                    value="{{ $username }}" required autofocus placeholder="@lang('lang_v1.username')">
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
                <br>
                <input id="password" type="password" class="form-control" name="password"
                    value="{{ $password }}" required placeholder="@lang('lang_v1.password')">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <br><br>
            {{-- <div class="remember-me--forget-password">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> @lang('lang_v1.remember_me')
                </label>
            </div>
            <br> --}}
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-flat btn-login">@lang('lang_v1.login')</button>
                @if (config('app.env') != 'demo')
                    <a href="{{ route('password.request') }}" class="pull-right">
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>

    {{-- <div class="container-fluid">
        <div class="row eq-height-row">
            <div class="col-md-6 col-sm-5 hidden-xs left-col eq-height-col">
                <div class="left-col-content login-header"> 
                    <div style="margin-top: 50%;">
                    <a href="/">
                    @if(file_exists(public_path('uploads/logo.png')))
                        <img src="/uploads/logo.png" class="img-rounded" alt="Logo" width="150">
                    @else
                       {{ config('app.name', 'ultimatePOS') }}
                    @endif 
                    </a>
                    <br/>
                    @if(!empty(config('constants.app_title')))
                        <small>{{config('constants.app_title')}}</small>
                    @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-7 col-xs-12 right-col eq-height-col">
                <div class="row">
                <div class="col-md-3 col-xs-4" style="text-align: left;">
                    <select class="form-control input-sm" id="change_lang" style="margin: 10px;">
                    @foreach(config('constants.langs') as $key => $val)
                        <option value="{{$key}}" 
                            @if( (empty(request()->lang) && config('app.locale') == $key) 
                            || request()->lang == $key) 
                                selected 
                            @endif
                        >
                            {{$val['full_name']}}
                        </option>
                    @endforeach
                    </select>
                </div>
                <div class="col-md-9 col-xs-8" style="text-align: right;padding-top: 10px;">
                    @if(!($request->segment(1) == 'business' && $request->segment(2) == 'register'))
                        <!-- Register Url -->
                        @if(config('constants.allow_registration'))
                            <a href="{{ route('business.getRegister') }}@if(!empty(request()->lang)){{'?lang=' . request()->lang}} @endif" class="btn bg-maroon btn-flat" ><b>{{ __('business.not_yet_registered')}}</b> {{ __('business.register_now') }}</a>
                            <!-- pricing url -->
                            @if(Route::has('pricing') && config('app.env') != 'demo' && $request->segment(1) != 'pricing')
                                &nbsp; <a href="{{ action('\Modules\Superadmin\Http\Controllers\PricingController@index') }}">@lang('superadmin::lang.pricing')</a>
                            @endif
                        @endif
                    @endif
                    @if($request->segment(1) != 'login')
                        &nbsp; &nbsp;<span class="text-white">{{ __('business.already_registered')}} </span><a href="{{ action('Auth\LoginController@login') }}@if(!empty(request()->lang)){{'?lang=' . request()->lang}} @endif">{{ __('business.sign_in') }}</a>
                    @endif
                </div>
                
                @yield('content')
                </div>
            </div>
        </div>
    </div> --}}

    
    @include('layouts.partials.javascripts')
    
    <!-- Scripts -->
    <script src="{{ asset('js/login.js?v=' . $asset_v) }}"></script>
    
    @yield('javascript')

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

</html>