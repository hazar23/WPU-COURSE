<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/animate.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}" />    

    <!-- Plugin--> 
    {{-- <link rel="stylesheet" href="{!! asset('css/plugins/datatables.min.css') !!}" />     --}}
    <link rel="stylesheet" href="{!! asset('css/plugins/sweetalert.css') !!}" />    
    {{-- <link rel="stylesheet" href="{!! asset('css/plugins/chosen.min.css') !!}" />     --}}
        
    <!-- CDN--> 
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

</head>

<body class="dark-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">        
        <div class="widget white-bg p-lg text-center">
            <h2>LOGIN-WPU</h2>
            <div class="m-b-md">                                    
                <form class="m-t" id="form-masuk" method="POST">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="email" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b login">Login</button>                                    
                </form>                        
            </div>
            <p>Belum punya akun? <a href="#daftar" data-toggle="modal" data-target="#daftar">Daftar di sini</a></p>
        </div>                               
    </div>  

    <!-- Mainly scripts -->    
    <script src="{!! asset('js/jquery-3.1.1.min.js') !!}"></script>
    <script src="{!! asset('js/bootstrap.min.js') !!}"></script>

</body>

</html>


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>        
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
     $(document).ready(function(){   
                  
             // form tambah
             $( "#form-masuk" ).validate({
                rules: {                                        
                    email: {
                        required: true
                    },
                    password: {
                        required: true
                    }                    
                },
                messages: {                    
                    email: {
                    required: "Inputan tidak boleh kosong"                    
                    },
                    password: {
                    required: "Inputan tidak boleh kosong"                    
                    }
                }
            });
    
            //fungsi login
            $(".login").submit(function (e) {                
                    e.preventDefault();                           
                    var form = $('#form-masuk').serialize();   
                    alert("hello");                                    
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        url: "{{ URL('/cekLogin') }}",
                        type: "POST",
                        data: form,
                        dataType: 'json',
                        success: function (data) {                        
                            if (data.status == 202) {
                                swal({
                                title: "Berhasil!",
                                text: data.msg,
                                type: "success",
                                timer:2000,
                                });
                                // document.location.assign("{{ URL('/') }}");     
                                $("#masuk").modal('hide');
                                setTimeout(function () {
                                    location.reload();
                                }, 1000);
                            }else{
                                swal({
                                    title: "peringatan!",
                                    text: data.msg,
                                    type: "warning",
                                    timer:3000,
                                    showConfirmButton:false
                                });                                
                            }  
                            
                        },
                        error: function (resp) {
                            if (_.has(resp.responseJSON, 'errors')) {
                                _.map(resp.responseJSON.errors, function (val, key) {
                                    $('#' + key + '-error').html(val[0]).fadeIn(1000).fadeOut(5000);
                                })
                            }
                            alert(resp.responseJSON.message)
                        }
                    });
                });
        });
<script>