<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--=== Favicon ===-->
    @include('admin.layouts.icon')
    <title>Rahat IT Solutions</title>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('all-assets/common/bootstrap-4.5/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('all-assets/common/fontawesom5.7/css/all.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('all-assets/user/login/assets/css/style.min.css') }}">

    <link rel="stylesheet" href="{{ asset('all-assets/common/ajax-req-animation/css/styles.css') }}" >

    {{-- Preloader --}}
    <style>
        .loader {position: fixed;z-index: 99;top: 0;left: 0;width: 100%;height: 100%;background: white;display: flex;justify-content: center;align-items: center;
        }.loader>img {width: 10%;}.loader.hidden {animation: fadeOut 1s;animation-fill-mode: forwards;}
        @keyframes fadeOut {100% {opacity: 0;visibility: hidden;}}
    </style>

    <script type="text/javascript">
        window.addEventListener("load", function() {const loader = document.querySelector(".loader");loader.className += " hidden";});
    </script>

</head>
<body class="svg-bg">
    {{-- Preloader --}}
    <div class="loader">
        <img src="{{ asset('all-assets/common/preloader/userDashboard.gif') }}" alt="Loading..." />
    </div>
    <div id="particles-js"> </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 my-auto">
                <div class="card gradient-bg">

                    <div class="card-header text-center">
                        <img src="{{ asset('all-assets/common/logo/logo/rahat-it.png') }}" class="logo">
                        <h4 class="text-light">Rahat IT Solutions Admin</h4>
                    </div>

                    <div class="card-body">

                        @if (Session::has('loginErrorMsg'))
                        <div class="alert alert-danger alert-dismissible text-center fade show" role="alert">
                            {{ Session::get('loginErrorMsg') }}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif


                        <form id="loginForm"  method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Put Your Email" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6" id="show_hide_password">
                                    <input id="password" type="password" placeholder="Put Your Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <a><i class="fa fa-eye-slash pass-icon" aria-hidden="true"></i></a>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button id="submit" type="submit" class="btn btn-primary">
                                        Login &nbsp&nbsp<i class="fa fa-random" aria-hidden="true"></i>

                                    </button>

                                </div>
                            </div>
                        </form>

                        <hr>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ajax-animation"><!-- Place at bottom of page --></div>


    <script type="text/javascript" src="{{ asset('all-assets/common/bootstrap-4.5/js/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('all-assets/common/bootstrap-4.5/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('all-assets/user/login/assets/particle-js/particles.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('all-assets/user/login/assets/particle-js/index.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('#loginForm').on('submit', function(){
                var $body = $("body");
                $body.addClass("loading");
                $('#submit').text('Loading.....');
                $(":submit").attr("disabled", true);
            });

            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                }
            });
        });
    </script>



</body>
</html>
