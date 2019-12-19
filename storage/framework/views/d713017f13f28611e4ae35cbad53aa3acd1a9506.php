<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link rel="stylesheet" href="<?php echo asset('css/vendor.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/animate.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/style.css'); ?>" />    

    <!-- Plugin--> 
    
    <link rel="stylesheet" href="<?php echo asset('css/plugins/sweetalert.css'); ?>" />    
    
        
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
                        <button type="button" class="btn btn-primary block full-width m-b btn-login">Login</button>                                    
                </form>                        
            </div>
            <p>Belum punya akun? <a href="#daftar" data-toggle="modal" data-target="#daftar">Daftar di sini</a></p>
        </div>                               
    </div>  

    <!-- Mainly scripts -->    
    <script src="<?php echo asset('js/jquery-3.1.1.min.js'); ?>"></script>
    <script src="<?php echo asset('js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo asset('js/plugins/sweetalert.min.js'); ?>"></script>

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
            $(".btn-login").click(function (e) {                
                    e.preventDefault();                           
                    var form = $('#form-masuk').serialize();                                                    
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                        },
                        url: "<?php echo e(URL('/cekLogin')); ?>",
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
                                document.location.assign("<?php echo e(URL('/dashboard')); ?>");     
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
    </script>
</body>

</html>
