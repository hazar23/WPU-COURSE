<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WPU_learning | Login </title>

    <link rel="stylesheet" href="<?php echo asset('css/vendor.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/animate.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/style.css'); ?>" />    

</head>
<body>  
    <div class="middle-box text-center loginscreen animated fadeInDown">        
        <div class="widget white-bg p-lg text-center">
            <h2>LOGIN-WPU</h2>
            <div class="m-b-md">
                <form class="m-t" id="form-login" method="POST">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="email" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="">
                        </div>
                        <button type="button" class="btn btn-primary block full-width m-b login">Login</button>                                    
                </form>                        
            </div>
        </div>
                
    </div>  
    <!-- Mainly scripts -->    
    <script src="<?php echo asset('js/jquery-3.1.1.min.js'); ?>"></script>
    <script src="<?php echo asset('js/bootstrap.min.js'); ?>"></script>

    <script>
        $(document).ready(function(){
            $(".login").click(function (e) {            
                var form = $('#form-login').serialize();
                e.preventDefault();                                
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                    },
                    url: "<?php echo e(URL('/cekLogin')); ?>",
                    type: "POST",
                    data: form,
                    dataType:"json",
                    success: function (data) {
                        if (data.status == 202) {
                            document.location.assign("<?php echo e(URL('/dashboard')); ?>");     
                        }else{
                            swal({
                                title: "peringatan!",
                                text: data.msg,
                                type: "warning",
                                timer:5000,
                                showConfirmButton:false
                            });  
                        }
                        
                    },
                    error: function (resp) {
                        if (_.has(resp.responseJSON, 'errors')) {
                            _.map(resp.responseJSON.errors, function (val, key) {
                                $('.' + key + '-error').html(val[0]).fadeIn(1000).fadeOut(5000);
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
