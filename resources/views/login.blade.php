@extends('layout')

@section('head')

<link type="text/css" rel="stylesheet" href="{{asset('css/login/fuse-icon-font/style.css')}}">

<link type="text/css" rel="stylesheet" href="{{asset('fuse-html/fuse-html.min.css')}}">

<link type="text/css" rel="stylesheet" href="{{asset('css/login/main.css')}}">

<link type="text/css" rel="stylesheet" href="{{asset('css/login/mystyle.css')}}">

<script type="text/javascript" src="{{asset('jquery/dist/jquery.min.js')}}"></script>

<script type="text/javascript" src="{{asset('fuse-html/fuse-html.min.js')}}"></script>

@endsection

@section('content')
<div id="wrapper">

    <div class="content-wrapper">

        <div id="login" class="p-8">

            <div class="form-wrapper md-elevation-8 p-8">

                <div class="title mt-4 mb-8 title_login">Sing In</div>

                <form id="form_login" name="loginForm" enctype = "multipart/form-data" action = "{{url('do_login')}}" method = "post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group mb-4">
                        <input type="text" name="username" class="form-control" id="loginFormInputEmail" aria-describedby="emailHelp"
                               placeholder=" "/>
                        <label for="loginFormInputEmail">Username</label>
                        <div class="emailErr"><small>*Please Input the Username</small></div>
                    </div>

                    <div class="form-group mb-4">
                        <input type="password" name="password" class="form-control" id="loginFormInputPassword" placeholder="Password"/>
                        <label for="loginFormInputPassword">Password</label>
                        <div class="passwordErr"><small>*Please Input the Password</small></div>
                    </div>

                    <div class="remember-forgot-password row no-gutters align-items-center justify-content-between pt-4">

                        <div class="form-check remember-me mb-4">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" aria-label="Remember Me"/>
                                <span class="checkbox-icon"></span>
                                <span class="form-check-description">Remember Me</span>
                            </label>
                        </div>

                        <a href="#" class="forgot-password text-secondary mb-4">Forgot Password?</a>
                    </div>

                    <button type="button" id="btn_login" class="submit-button btn btn-block btn-secondary my-4 mx-auto" aria-label="LOG IN">
                        LOG IN
                    </button>

                </form>

                <div class="register d-flex flex-column flex-sm-row align-items-center justify-content-center mt-8 mb-6 mx-auto">
                    <span class="text mr-sm-2">Don't have an account?</span>
                    <a class="link text-secondary" href="{{url('register')}}">Create an account</a>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script>

    $("#btn_login").on('click',function () {
        var email = $("#loginFormInputEmail").val();
        var password = $("#loginFormInputPassword").val();

        if(email.length == 0){
            $(".emailErr").css({'display':'inline'});
            return;
        }
        if(password.length == 0){
            $(".passwordErr").css({'display':'inline'});
            return;
        }

        $("#form_login").submit();
    });

</script>
@endsection