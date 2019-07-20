<section id="contact" class="gray-section contact" style="margin-top:0px; background:#2C3E50">
    <div class="container">        
        <div class="row" style="margin-top:30px">
            <div class="col-lg-12 text-center">                                
                <ul class="list-inline social-icon">
                    <li><a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <p><strong>&copy; 2019-WPU</strong><br/> web programming tutorial berbahasa indonesia. "jangan lupa titik koma"</p>
            </div>
        </div>
    </div>
</section>


<div class="modal fade " id="masuk" tabindex="-1" role="dialog" aria-labelledby="modalmasuk">
        <div class="modal-dialogs" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>                    
                </div>
                <div class="middle-box2 text-center loginscreen animated fadeInDown">        
                        <div class="widget white-bg p-lg text-center">
                            <h2>MASUK-WPU</h2>
                            <div class="m-b-md">                                    
                                <form class="m-t" id="form-masuk" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="email" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                        </div>
                                        <button type="button" class="btn btn-primary block full-width m-b login">Login</button>                                    
                                </form>                        
                            </div>
                            <p>Belum punya akun? <a href="#daftar" data-toggle="modal" data-target="#daftar">Daftar di sini</a></p>
                        </div>                               
                    </div>                    
            </div>            
        </div>        
    </div>

    
    <div class="modal fade " id="daftar" tabindex="-1" role="dialog" aria-labelledby="modaldaftar">
            <div class="modal-dialogs" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>                    
                    </div>
                    <div class="middle-box2 text-center loginscreen animated fadeInDown">        
                            <div class="widget white-bg p-lg text-center">
                                <h2>DAFTAR-WPU</h2>
                                <div class="m-b-md">
                                    <form class="m-t" id="form-daftar" method="POST">
                                            <div class="form-group">
                                                <input type="text" name="username" class="form-control" placeholder="username" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="email" required="">
                                            </div>
                                            <div class="form-group">
                                                <input id="password" type="password" name="password" class="form-control" placeholder="Password" required="">
                                            </div>
                                            <div class="form-group">
                                                    <input type="password" name="re_password" class="form-control" placeholder="Ulangi Password" required="">
                                            </div>
                                            <button type="button" class="btn btn-primary block full-width m-b daftar">Daftar</button>                                    
                                    </form>                        
                                </div>
                            </div>
                                    
                        </div>
                </div>
            </div>
        </div>
    
    
    <div class="modal fade " id="profile" tabindex="-1" role="dialog" aria-labelledby="modalProfile">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>                    
                </div>
                <div class="middle-box2 loginscreen animated fadeInDown">        
                        <div class="text-center">
                                <h2>PROFILE-WPU</h2>
                                <img id="image" alt="image" class="img-circle" src="" width="200px">                                                                            
                        </div>                            
                        <div style="margin-left:200px; margin-top:-20px; margin-buttom:20px;">
                            <a href=""><i class="fas fa-edit">edit</i></a>
                        </div>
                        <div class="widget2 white-bg ">                            
                            <div class="m-b-md">                                                                    
                                <form class="m-t" id="form-profile" method="POST">                                                                                
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="hidden" id="upd_id" name="id" class="form-control" placeholder="" required="">
                                            <input type="text" id="upd_name" name="name" class="form-control" placeholder="username" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" id="upd_email" name="email" class="form-control" placeholder="email" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" id="upd_location" name="location" class="form-control" placeholder="alamat" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <br />
                                            <input id="upd_gender1" type="radio" value="1" name="gender"/> Laki-laki &nbsp;
                                            <input id="upd_gender2" type="radio" value="0" name="gender"  /> Perempuan 
                                        </div>
                                        <div class="form-group">
                                            <label>Kontak WhatsApp</label>
                                            <input type="text" id="upd_contact"  name="contac" class="form-control" placeholder="081*******" required="">
                                            </div>
                                        <button type="button" class="btn btn-primary block full-width m-b" id="ubah-profile">Ubah</button>                                    
                                </form>                        
                            </div>
                        </div>
                                
                    </div>
            </div>
        </div>
    </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>        
        <script>
        $(document).ready(function(){   
                  
             // form tambah
             $( "#form-daftar" ).validate({
                rules: {                                        
                    email: {
                        required: true
                    },
                    password: {
                        required: true
                    },                    
                    re_password: {
                        equalTo: "#password"
                    }                    
                },
                messages: {                    
                    email: {
                    required: "Inputan tidak boleh kosong"                    
                    },
                    password: {
                    required: "Inputan tidak boleh kosong"                    
                    },
                    re_password: {
                    equalTo: "Silakan masukkan nilai yang sama lagi"                    
                    }
                }
            });
    
            //fungsi login
            $(".login").click(function (e) {                
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
                                document.location.assign("<?php echo e(URL('/')); ?>");     
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

                //fungsi daftar
            $(".daftar").click(function (e) {                
                    e.preventDefault();                           
                    var form = $('#form-daftar').serialize();                                        
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                        },
                        url: "<?php echo e(URL('/daftar')); ?>",
                        type: "POST",
                        data: form,
                        dataType: 'json',
                        success: function (data) {                        
                            if (data.status == 202) {
                                document.location.assign("<?php echo e(URL('/')); ?>");     
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

                $("#btn-profile").click(function (e) {                
                    e.preventDefault();
                    var id = $(this).attr("data-id");
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                        },
                        url: "<?php echo e(URL('/profileEdit')); ?>",
                        type: "GET",
                        data: 'id=' + id,
                        dataType: "JSON",
                        success: function (data) {
                            $('#upd_id').val(data.list.id);
                            $('#upd_name').val(data.list.name);
                            $("#image").attr("src","../images/"+ data.list.image);
                            // $('#image').val(data.list.image);                            
                            $('#upd_email').val(data.list.email);                        
                            $('#upd_location').val(data.list.location);                                                                                   
                            
                            if(data.list.gender == 1){                                    
                                $("input[value=1]").prop("checked", true);
                            }else{                                    
                                $("input[value=0]").prop("checked", true);
                            }                    

                            $('#upd_contact').val(data.list.contact);
                            $('#profile').modal('show');
                        },
                        error: function (xhr, status, error) {
                            alert(status + " : " + error);
                        }
                    });
                });
            
                $("#ubah-profile").click(function (e) {                
                    e.preventDefault();                                                                                       
                    var gender = $('input[name=gender]:checked').val(),
                        name = $('#upd_name').val(),
                        email = $('#upd_email').val(),
                        location = $('#upd_location').val(),
                        contact = $('#upd_contact').val(),
                        id = $('#upd_id').val(),                        
                        sendata ='id=' + id + '&name='+ name + '&email='+ email + '&location='+ location + '&gender='+ gender + '&contact='+ contact;                                               
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                        },
                        url: "<?php echo e(URL('/update')); ?>",
                        type: "POST",
                        data: sendata,
                        dataType: 'json',
                        success: function (data) {                        
                            if (data.status == 202) {
                            swal({
                                title: "Berhasil!",
                                text: data.msg,
                                type: "success"
                            }); 
                            $("#profile").modal('hide');
                            
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
                                    $('#' + key + '-error').html(val[0]).fadeIn(1000).fadeOut(5000);
                                })
                            }
                            alert(resp.responseJSON.message)
                        }
                    });
                });
        });
</script>