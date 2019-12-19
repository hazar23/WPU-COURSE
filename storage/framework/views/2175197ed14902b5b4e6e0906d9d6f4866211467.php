<?php $__env->startSection('title', 'Course'); ?>
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
                <button data-toggle="modal" data-target="#insert_course" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Course </button>                
            </div>            
            <div class="clearfix"></div><br>
            <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover dataTables-example dataTable" id="table_course">
                    <thead>
                    <tr>
                        <th width="10" style="text-align: center">No</th>
                        <th style="text-align: center">Gambar</th>
                        <th style="text-align: center">Judul</th>                        
                        <th style="text-align: center">Deskripsi</th>                                                    
                        <th style="text-align: center">Diterbitkan</th>                            
                        <th width="260" style="text-align: center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="insert_course" tabindex="-1" role="dialog" aria-labelledby="modalcourse">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Tambah Course</h4>
                </div>
                <form id="form_insert_course" method="POST" action="#">
                    <div class="modal-body">
                        <div class="form_insert">
                            <div class="form-group">
                                <label for="ins_image">Gambar</label>
                                    <input type="file" class="form-control" id="ins_image" name="image"/>
                                        <span class="text-danger">
                                            <strong id="image-error"></strong>
                                        </span>
                            </div>                                                                                                
                            <div class="form-group">
                                <label for="ins_title">Judul</label>
                                    <input type="text" placeholder="name course" class="form-control" id="ins_title" name="title"/>
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
                            <div class="form-group">
                                <label for="ins_title">Kategori</label><br>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <select class="form-control m-b" name="subject">
                                                <option value="0" checked>--Pilih Matakuliah--</option>
                                                <?php $__empty_1 = true; $__currentLoopData = $subject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $su): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option value="<?php echo $su->id ?>"><?php echo $su->title;  ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <option value="" disabled>Tidak ada Matakuliah</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                                <select class="form-control m-b" name="path">
                                                     <option value="0" checked>--Pilih Jalur--</option>
                                                    <?php $__empty_1 = true; $__currentLoopData = $path; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <option value="<?php echo $pa->id ?>"><?php echo $pa->title;  ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <option value="" disabled>Tidak ada Jalur</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>                                        
                                        <div class="col-sm-4">
                                                <select class="form-control m-b" name="level">
                                                     <option value="0" checked>--Pilih Level--</option>
                                                    <?php $__empty_1 = true; $__currentLoopData = $level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $le): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <option value="<?php echo $le->id ?>"><?php echo $le->title;  ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <option value="" disabled>Tidak ada Level</option>
                                                    <?php endif; ?>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="ins_url" >Tag</label>                                    
                                        <select name="tag[]" id="tag" data-placeholder="Pilih tag..." multiple class="form-control">
                                            <?php $__empty_1 = true; $__currentLoopData = $tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <option value="<?php echo $tags->id; ?>"><?php echo $tags->title; ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <option value="" disabled>Tag Belum Dibuat</option>
                                            <?php endif; ?>                                      
                                          </select>
                                        <span class="text-danger">
                                            <strong id="url-error"></strong>
                                        </span>
                                </div>                                                                 
                            </div>        
                            <label> <input type="checkbox" name="published" class="i-checks" id="ins_published" value="0"> Diterbitkan </label>
                            <input type="hidden" class="i-checks" name="checked" id="checked" value="0"></label>                                                                                                                    
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

    
    <div class="modal fade" id="update_course" tabindex="-1" role="dialog" aria-labelledby="modalbarang">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title-update">Update Course</h4>
                </div>
                <form id="form_update_course" method="POST" action="#">                    
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
                        <div class="form-group">
                                <label for="ins_title">Kategori</label><br>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <select class="form-control m-b" id="upd_subject" name="subject">
                                                <option value="0" checked>--Pilih Matakuliah--</option>
                                                <?php $__empty_1 = true; $__currentLoopData = $subject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $su): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option value="<?php echo $su->id ?>"><?php echo $su->title;  ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <option value="" disabled>Tidak ada Matakuliah</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                                <select class="form-control m-b" id="upd_path" name="path">
                                                     <option value="0" checked>--Pilih Jalur--</option>
                                                    <?php $__empty_1 = true; $__currentLoopData = $path; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <option value="<?php echo $pa->id ?>"><?php echo $pa->title;  ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <option value="" disabled>Tidak ada Jalur</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>                                        
                                        <div class="col-sm-4">
                                                <select class="form-control m-b" id="upd_level" name="level">
                                                     <option value="0" checked>--Pilih Level--</option>
                                                    <?php $__empty_1 = true; $__currentLoopData = $level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $le): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <option value="<?php echo $le->id ?>"><?php echo $le->title;  ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <option value="" disabled>Tidak ada Level</option>
                                                    <?php endif; ?>
                                                </select>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="upd_url" >Tag</label>                                    
                                        <select name="tag[]" id="upd_tag" data-placeholder="Pilih tag..." multiple class="form-control">
                                            <?php $__empty_1 = true; $__currentLoopData = $tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <option value="<?php echo $tags->id; ?>"><?php echo $tags->title; ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <option value="" disabled>Tag Belum Dibuat</option>
                                            <?php endif; ?>                                      
                                          </select>
                                        <span class="text-danger">
                                            <strong id="url-error"></strong>
                                        </span>
                                </div>                                                                
                        </div>                         
                        <label> <input type="checkbox" name="published" class="i-checks" id="upd_published" value="0"> Diterbitkan </label>
                        <input type="text" class="i-checks" name="checked" id="upd_checked" value="0"></label>                                                                                                                                             
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
                    return `<center>` + `<a href="#" data-toggle="modal" data-target="#update_course" class="btn btn-success btn-circle btn-edit" id="${data.id}"><i class="fa fa-pencil-alt"></i></a>
                            <a href="#" class="btn btn-danger btn-circle btn-delete" id="${data.id}"><i class="fa fa-trash"></i></a>
                            <a href="#" class="btn btn-primary btn-circle btn-delete" id="${data.id}"><i class="fa fa-th-list"></i></a>` + `</center>`;
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
                checkbox: function(row, type, data){
                    if (data.published == 1) {
                        return '<center>'+ '<input type="checkbox" name="published" class="i-checks" id="upd_published"  disabled checked="checked">' +'</center>';    
                    }else{
                        return '<center>'+ '<input type="checkbox" name="published" class="i-checks" id="upd_published" disabled ' +'</center>';
                    }                    
                }                
            };        

            $('#tag').chosen({width: "100%"});
            $('#upd_tag').chosen({width: "100%"});
            // form tambah
            $( "#form_insert_course" ).validate({
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
                    },
                    published: {
                    required: false
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
             $( "#form_update_course" ).validate({
                rules: {
                    image: {                    
                    accept: "image/*"                    
                    },
                    title: {
                    required: true
                    },
                    description: {
                    required: true
                    },
                    published: {
                    required: false
                    }
                },
                messages: {
                    image: {                    
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



            //datatables
            table = $('#table_course').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                order: [[1, 'desc']],
                

                ajax: {
                    "url": '<?php echo e(URL('course/dataTable')); ?>',
                    "headers": {
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                    },                    
                },

                columns: [
                    {data: 'DT_RowIndex'},
                    {data: 'image', render:styles.image},                    
                    {data: 'title'},                                        
                    {data: 'description', render:styles.description},
                    {data: 'published', render:styles.checkbox},
                    {data: 'action', name: 'action', orderable: false, render: styles.button}                    
                ],
            });            
            
            //cekbox pada modal tambah
            $('#ins_published').change(function(){                
                if($('#ins_published:checked').val()){                    
                    $('#checked').val(1);
                }else{                    
                    $('#checked').val(0);
                }
            });            

            //fungsi tambah
            $("#form_insert_course").submit(function (e) {                
                e.preventDefault();                
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                    },
                    url: "<?php echo e(URL('course/insert')); ?>",
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
                            $("#insert_course").modal('hide');
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
                    url: "<?php echo e(URL('course/edit')); ?>",
                    type: "GET",
                    data: 'id=' + id,
                    dataType: "JSON",
                    success: function (data) {
                        $('#id').val(data.list.id);
                        $('#upd_title').val(data.list.title);                        
                        $('#upd_description').val(data.list.description);
                        $('#upd_subject').val(data.list.subject_id);
                        $('#upd_path').val(data.list.path_id);
                        $('#upd_level').val(data.list.level_id);
                        if (data.list.published > 0) {                            
                            $('input[name="published"]').prop('checked', true);    
                        }else{                            
                            $('input[name="published"]').prop('checked', false);    
                        }
                        $('#upd_checked').val(data.list.published);
                        
                        var tags = data.list.tags;                                                
                        var tagarr=[];
                        tags.forEach(tag => {
                            tagarr.push(tag.id);                            
                        });
                        
                        $("#upd_tag").val(tagarr).trigger("chosen:updated");                        

                        $('#update_course').modal('show');
                    },
                    error: function (xhr, status, error) {
                        alert(status + " : " + error);
                    }
                });
            });

            //cekbox pada modal ubah
            $('#upd_published').change(function(){                
                if($('input[name="published"]').attr('checked', false)){                    
                    alert('kosong');
                    $('#upd_checked').val(0);
                }else if($('input[name="published"]').attr('checked', true)){                    
                    alert('ada');
                    $('#upd_checked').val(1);
                }
            });

            //fungsi ubah data
            $("#form_update_course").submit(function (e) {
                e.preventDefault();                

                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                    },
                    url: "<?php echo e(URL('course/update')); ?>",
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
                            url: '<?php echo e(URL('course/delete')); ?>',
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