<?php $__env->startSection('title', 'Jalur'); ?>
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
                <button data-toggle="modal" data-target="#insert_path" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Jalur </button>                
            </div>            
            <div class="clearfix"></div><br>
            <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover dataTables-example dataTable" id="table_path">
                    <thead>
                    <tr>
                        <th width="10" style="text-align: center">No</th>
                        <th style="text-align: center">Gambar</th>
                        <th style="text-align: center">Nama</th>  
                        <th style="text-align: center">Deskripsi</th>                      
                        <th width="260" style="text-align: center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="insert_path" tabindex="-1" role="dialog" aria-labelledby="modalpath">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Tambah Jalur</h4>
                </div>
                <form id="form_insert_path" method="POST" action="#">
                    <div class="modal-body">
                        <div class="form_insert">                                                                                                                            
                            <div class="form-group">
                                <label for="ins_image">gambar</label>
                                    <input type="file" class="form-control" id="ins_image" name="image"/>
                                        <span class="text-danger">
                                            <strong id="image-error"></strong>
                                        </span>
                            </div>
                            <div class="form-group">
                                    <label for="ins_title" >Nama</label>
                                        <input type="text" placeholder="nama path" class="form-control" id="ins_title" name="title"/>
                                            <span class="text-danger">
                                                <strong id="title-error"></strong>
                                            </span>
                            </div>
                            <div class="form-group">
                                    <label for="ins_description">Deskripsi </label><br>                                    
                                        <textarea name="description" id="ins_description" cols="70" rows="10"></textarea>
                                            <span class="text-danger">
                                                <strong id="description-error"></strong>
                                            </span>
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

    
    <div class="modal fade" id="update_path" tabindex="-1" role="dialog" aria-labelledby="modalpath">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title-update">Update Jalur</h4>
                </div>
                <form id="form_update_path" method="POST" action="#">                    
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">                                                                                                                        
                        <div class="form-group">
                                <label for="upd_image">Gambar</label>
                                    <input type="file" class="form-control" id="upd_image" name="image"/>
                                        <span class="text-danger">
                                            <strong id="image-error"></strong>
                                        </span>
                            </div>                                                                                                
                            <div class="form-group">
                                <label for="upd_titile">Judul</label>
                                    <input type="text" placeholder="name course" class="form-control" id="upd_title" name="title"/>
                                        <span class="text-danger">
                                            <strong id="title-error"></strong>
                                        </span>
                            </div>                                                                                             
                            <div class="form-group">
                                <label for="ins_description">Deskripsi </label><br>                                    
                                    <textarea name="description" id="upd_description" cols="70" rows="10"></textarea>
                                        <span class="text-danger">
                                            <strong id="description-error"></strong>
                                        </span>
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
                    return `<center>` + `<a href="#" data-toggle="modal" data-target="#update_path" class="btn btn-success btn-circle btn-edit" id="${data.id}"><i class="fa fa-pencil-alt"></i></a>
                            <a href="#" class="btn btn-danger btn-circle btn-delete" id="${data.id}"><i class="fa fa-trash"></i></a>` + `</center>`;
                },
                image: function (row, type, data){
                    return '<center>'+ '<img src="images/'+ data.image +'" width="100px">' + '</center>';
                },
                description: function(row, type, data){
                    var temp = data.description;
                    var jumlah = temp.length;
                    if (jumlah > 100) {
                        return '<center>'+ '<p>'+ temp.substr(0 , 100) +'...</p>' +'</center>';    
                    }else{
                        return '<center>'+ '<p>'+ temp +'</p>' +'</center>';
                    }                    
                },                         
            };           

            // form tambah
            $( "#form_insert_path" ).validate({
                rules: {                    
                    image: {
                    required: true,
                    accept: "image/*"                    
                    },                    
                    title: {
                    required: true
                    },
                    description: {
                    required: true
                    }                    
                },
                messages: {
                    image: {
                    required: "inputan tidak boleh kosong",
                    accept: "file harus bertipe image"                    
                    },
                    title: {
                    required: "inputan tidak boleh kosong"                    
                    },
                    description: {
                    required: "inputan tidak boleh kosong"                    
                    }
                }
            });

             // form update
             $( "#form_update_path" ).validate({
                rules: {                    
                    title: {
                    required: true
                    }                    
                },
                messages: {                    
                    title: {
                    required: "inputan tidak boleh kosong"                    
                    }                    
                }
            });

            //datatables
            table = $('#table_path').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                order: [[1, 'desc']],
                

                ajax: {
                    "url": '<?php echo e(URL('jalur/dataTable')); ?>',
                    "headers": {
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                    },                    
                },

                columns: [
                    {data: 'DT_RowIndex'},                    
                    {data: 'image', render:styles.image},                    
                    {data: 'title'},
                    {data: 'description', render:styles.description},                                                           
                    {data: 'action', name: 'action', orderable: false, render: styles.button}                    
                ],
            });                                      

            //fungsi tambah
            $("#form_insert_path").submit(function (e) {                
                e.preventDefault();                           
                                   
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                    },
                    url: "<?php echo e(URL('jalur/insert')); ?>",
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
                            $("#insert_path").modal('hide');
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
                    url: "<?php echo e(URL('jalur/edit')); ?>",
                    type: "GET",
                    data: 'id=' + id,
                    dataType: "JSON",
                    success: function (data) {
                        $('#id').val(data.list.id);
                        $('#upd_title').val(data.list.title);
                        $('#upd_description').val(data.list.description);
                        if (data.list.published > 0) {
                            $('#upd_published').attr('checked', true);    
                        }else{
                            $('#upd_published').attr('checked', false);    
                        }
                        $('#upd_checked').val(data.list.published);
                        $('#update_path').modal('show');
                    },
                    error: function (xhr, status, error) {
                        alert(status + " : " + error);
                    }
                });
            });

            //fungsi ubah data
            $("#form_update_path").submit(function (e) {
                e.preventDefault();                

                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                    },
                    url: "<?php echo e(URL('jalur/update')); ?>",
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
                            url: '<?php echo e(URL('jalur/delete')); ?>',
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