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

<div class="content-wrapper">

    <div class="content">
        <div id="register" class="p-8" style="background: none">

            <div class="form-wrapper md-elevation-8 p-8">

                <div class="title mt-4 mb-8 title_login">Sign Up</div>

                <form id="form_register" name="registerForm" action = "{{url('do_register')}}" method = "post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group mb-4">
                        <input type="text" name = "username" class="form-control" id="registerFormInputUserName" aria-describedby="nameHelp">
                        <label for="registerFormInputName">UserName</label>
                        <div class="usernameErr"><small>*Please Input the UserName</small></div>
                    </div>
                    <div class="form-group mb-4">
                        <input type="text" name = "firstname" class="form-control" id="registerFormInputFirstName" aria-describedby="nameHelp">
                        <label for="registerFormInputName">FirstName</label>
                        <div class="firstnameErr"><small>*Please Input the FirstName</small></div>
                    </div>

                    <div class="form-group mb-4">
                        <input type="text" name="lastname" class="form-control" id="registerFormInputLastName" aria-describedby="nameHelp">
                        <label for="registerFormInputName">LastName</label>
                        <div class="lastnameErr"><small>*Please Input the LastName</small></div>
                    </div>

                    <div class="form-group mb-4">
                        <input type="email" name="email" class="form-control" id="registerFormInputEmail" aria-describedby="emailHelp">
                        <label for="registerFormInputEmail">Email address</label>
                        <div class="emailErr"><small>*Please Input the Email</small></div>
                    </div>

                    <div class="form-group mb-4">
                        <input type="password" name="password" class="form-control" id="registerFormInputPassword">
                        <label for="registerFormInputPassword">Password</label>
                        <div class="passwordErr"><small>*Please Input the Password</small></div>
                    </div>

                    <div class="form-group mb-4">
                        <input type="password" class="form-control" id="registerFormInputPasswordConfirm">
                        <label for="registerFormInputPasswordConfirm">Password (Confirm)</label>
                        <div class="repassErr"><small>*Please Input the Confirm-Password</small></div>
                    </div>

                    <div class="terms-conditions row align-items-center justify-content-center pt-4 mb-8">
                        <div class="form-check mr-1 mb-1">

                        </div>
                    </div>

                    <button type="button" id="btn_register" class="submit-button btn btn-block btn-secondary my-4 mx-auto fuse-ripple-ready" aria-label="LOG IN">
                        CREATE MY ACCOUNT
                    </button>
                </form>

                <div class="login d-flex flex-column flex-sm-row align-items-center justify-content-center mt-8 mb-6 mx-auto">
                    <span class="text mr-sm-2">Already have an account?</span>
                    <a class="link text-secondary" href="{{url('index')}}">Log in</a>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script src="{{url('js/jquery.min.js')}}"></script>
<script>

    $("#btn_register").on('click',function () {
        var username = $("#registerFormInputUserName").val();
        var firstname = $("#registerFormInputFirstName").val();
        var lastname = $("#registerFormInputLastName").val();
        var email = $("#registerFormInputEmail").val();
        var password = $("#registerFormInputPassword").val();
        var repassword = $("#registerFormInputPasswordConfirm").val();

        if(username.length == 0){
            $(".usernameErr").css({'display':'inline'});
            return
        }
        if(firstname.length == 0){
            $(".firstnameErr").css({'display':'inline'});
            return
        }
        if(lastname.length == 0){
            $(".lastnameErr").css({'display':'inline'});
            return;
        }
        if(email.length == 0){
            $(".emailErr").css({'display':'inline'});
            return;
        }
        if(password.length == 0){
            $(".passwordErr").css({'display':'inline'});
            return;
        }
        if(repassword.length == 0){
            $(".repassErr").css({'display':'inline'});
            return;
        }
        if(repassword != password){
            $(".repassErr").css({'display':'inline'});
            $(".repassErr small").html('*Please Input the Confirm Password Correctly');
            return;
        }
        $("#form_register").submit();
    });

</script>
@endsection