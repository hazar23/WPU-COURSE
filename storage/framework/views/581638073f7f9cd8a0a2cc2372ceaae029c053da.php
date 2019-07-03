<?php $__env->startSection('title', 'User'); ?>
<?php $__env->startSection('content'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo e($title); ?></h2>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12 white-bg">
            <br>
            <div class="pull-right p-1">
                <button data-toggle="modal" data-target="#insert_user" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah User </button>                
            </div>            
            <div class="clearfix"></div><br>
            <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover dataTables-example dataTable" id="table_user">
                    <thead>
                    <tr>
                        <th width="10" style="text-align: center">No</th>
                        <th style="text-align: center">Foto</th>
                        <th style="text-align: center">Nama</th>
                        <th style="text-align: center">email</th>                                                  
                        <th width="260" style="text-align: center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="insert_user" tabindex="-1" role="dialog" aria-labelledby="modaluser">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Tambah User</h4>
                </div>
                <form id="form_insert_user" method="POST" action="#">
                    <div class="modal-body">
                        <div class="form_insert">
                            <div class="form-group">
                                <label for="ins_name" >Nama</label>
                                    <input type="text" placeholder="nama" class="form-control" id="ins_name" name="name"/>
                                        <span class="text-danger">
                                            <strong id="name-error"></strong>
                                        </span>
                            </div>
                            <div class="form-group">
                                    <label for="ins_email" >Email</label>
                                        <input type="email" placeholder="test@gmail.com" class="form-control" id="ins_email" name="email"/>
                                            <span class="text-danger">
                                                <strong id="email-error"></strong>
                                            </span>
                            </div>                                                                                                                                                         
                            <div class="form-group">
                                    <label for="ins_menu_id" >Role</label>
                                    <select name="role[]" id="role" data-placeholder="Pilih Role..." multiple class="form-control">
                                            <option value="0" checked>--Pilih Role--</option>
                                            <?php $__empty_1 = true; $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <option value="<?php echo $ro->id ?>"><?php echo $ro->title;  ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <option value="" disabled>Role Belum Dibuat</option>
                                            <?php endif; ?>
                                    </select>
                            </div>                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn_insert_data">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="update_user" tabindex="-1" role="dialog" aria-labelledby="modalbarang">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title-update">Update User</h4>
                </div>
                <form id="form_update_user" method="POST" action="#">                    
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">                                                                                                                        
                        <div class="form-group">
                                <label for="upd_name" >Nama</label>
                                    <input type="text" placeholder="nama" class="form-control" id="upd_name" name="name"/>
                                        <span class="text-danger">
                                            <strong id="name-error"></strong>
                                        </span>
                            </div>
                            <div class="form-group">
                                    <label for="upd_email" >Email</label>
                                        <input type="email" placeholder="test@gmail.com" class="form-control" id="upd_email" name="email"/>
                                            <span class="text-danger">
                                                <strong id="email-error"></strong>
                                            </span>
                            </div> 
                        <div class="form-group">
                            <label for="upd_role" >Role</label>
                            <select name="role[]" id="upd_role" data-placeholder="Pilih Role..." multiple class="form-control">
                                    <option value="0" checked>--Pilih Role--</option>
                                    <?php $__empty_1 = true; $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo $ro->id ?>"><?php echo $ro->title;  ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <option value="" disabled>Role Belum Dibuat</option>
                                    <?php endif; ?>
                            </select>
                        </div>                                                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn_update_data">Submit</button>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            var styles = {
                button: function (row, type, data) {
                    return `<center>` + `<a href="#" data-toggle="modal" data-target="#update_user" class="btn btn-success btn-circle btn-edit" id="${data.id}"><i class="fa fa-pencil-alt"></i></a>
                            <a href="#" class="btn btn-danger btn-circle btn-delete" id="${data.id}"><i class="fa fa-trash"></i></a>` + `</center>`;
                },
                image: function (row, type, data){
                    return '<center>'+ '<img class="img-circle" src="images/'+ data.image +'" width="100px">' + '</center>';
                }                
            }; 

            $('#role').chosen({width: "100%"}); 
            $('#upd_role').chosen({width: "100%"});            
                      

            // form tambah
            $( "#form_insert_user" ).validate({
                rules: {                    
                    name: {
                    required: true,                                        
                    },                    
                    email: {
                    required: true
                    },
                    role: {
                    required: true
                    }                    
                },
                messages: {
                    name: {
                    required: "inputan tidak boleh kosong"                                        
                    },
                    email: {
                    required: "inputan tidak boleh kosong"                    
                    },
                    role: {
                    required: "inputan tidak boleh kosong"                    
                    }
                }
            });

             // form update
             $( "#form_update_user" ).validate({
                rules: {                    
                    name: {
                    required: true,                                        
                    },                    
                    email: {
                    required: true
                    },
                    role: {
                    required: true
                    }                    
                },
                messages: {
                    name: {
                    required: "inputan tidak boleh kosong"                                        
                    },
                    email: {
                    required: "inputan tidak boleh kosong"                    
                    },
                    role: {
                    required: "inputan tidak boleh kosong"                    
                    }
                }
            });

            //datatables
            table = $('#table_user').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                order: [[1, 'desc']],
                

                ajax: {
                    "url": '<?php echo e(URL('user/dataTable')); ?>',
                    "headers": {
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                    },                    
                },

                columns: [
                    {data: 'DT_RowIndex'},                                        
                    {data: 'image', render: styles.image},
                    {data: 'name'},
                    {data: 'email'},                                                          
                    {data: 'action', name: 'action', orderable: false, render: styles.button}                    
                ],
            });                                      

            //fungsi tambah
            $("#form_insert_user").submit(function (e) {                
                e.preventDefault();                           
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                    },
                    url: "<?php echo e(URL('user/insert')); ?>",
                    type: "POST",
                    data: new FormData(this),
                    processData:false,
                    contentType:false,
                    cache:false,                    
                    dataType: 'json',
                    success: function (data) {                        
                        if (data.status == 400) {
                            swal({
                                title: "peringatan!",
                                text: data.msg,
                                type: "warning",
                                timer:5000,
                                showConfirmButton:false
                            });    
                        }else{
                            swal({
                                title: "Berhasil!",
                                text: data.msg,
                                type: "success"
                            });
                            $("#insert_user").modal('hide');
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
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
                       
            //fungsi get data pada modal ubah
            table.on('click', '.btn-edit', function (e) {
                e.preventDefault();
                var id = $(this).attr("id");
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                    },
                    url: "<?php echo e(URL('user/edit')); ?>",
                    type: "GET",
                    data: 'id=' + id,
                    dataType: "JSON",
                    success: function (data) {
                        $('#id').val(data.list.id);
                        $('#upd_name').val(data.list.name);                    
                        $('#upd_email').val(data.list.email);                    
                        var roles = data.list.roles;                        
                        var rolearr=[];
                        roles.forEach(role => {
                            rolearr.push(role.id);                            
                        });
                        
                        $("#upd_role").val(rolearr).trigger("chosen:updated");                        
                        $('#update_user').modal('show');
                    },
                    error: function (xhr, status, error) {
                        alert(status + " : " + error);
                    }
                });
            });

            //fungsi ubah data
            $("#form_update_user").submit(function (e) {
                e.preventDefault();                                
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                    },
                    url: "<?php echo e(URL('user/update')); ?>",
                    type: "POST",
                    data: new FormData(this),
                    processData:false,
                    contentType:false,
                    cache:false,  
                    success: function (data) {
                        if (data.status == 400) {
                            swal({
                                title: "peringatan!",
                                text: data.msg,
                                type: "warning",
                                timer:5000,
                                showConfirmButton:false
                            });    
                        }else{
                            swal({
                                title: "Berhasil!",
                                text: data.msg,
                                type: "success"
                            });
                            $("#update_course").modal('hide');
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
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

           // fungsi hapus 
        table.on('click', '.btn-delete', function (e) {
                e.preventDefault();
                var id = $(this).attr('id');
                swal({
                        title: "Apa anda yakin?",
                        text: "Data akan dihapus!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Iya",
                        cancelButtonText: "Tidak",
                        closeOnConfirm: false,
                        closeOnCancel: false },
                    function (isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                            },
                            url: '<?php echo e(URL('user/delete')); ?>',
                            type: 'DELETE',
                            data: "id=" + id,
                            dataType: 'json',
                            success: function (resp) {
                                swal("Berhasil!", resp.msg, "success");
                                setTimeout(function () {
                                    location.reload();
                                }, 1000);
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
                        } else {
                            swal({
                                title: "Proses penghapusan data dibatalkan.",
                                type: "success"
                            })
                        }
                    });                
            });

        });        

        
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>