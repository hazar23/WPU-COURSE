@extends('layouts.app')
@section('title', 'Lesson')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ $title }}</h2>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12 white-bg">
            <br>
            <div class="pull-right p-1">
                <button data-toggle="modal" data-target="#insert_lesson" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah lesson </button>                
            </div>            
            <div class="clearfix"></div><br>
            <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover dataTables-example dataTable" id="table_lesson">
                    <thead>
                    <tr>
                        <th width="10" style="text-align: center">No</th>
                        <th style="text-align: center">Course</th>
                        <th style="text-align: center">Judul</th>                                                
                        <th style="text-align: center">Posisi</th>                                                    
                        <th style="text-align: center">published</th>                            
                        <th width="260" style="text-align: center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- modal tambah lesson --}}
<div class="modal fade" id="insert_lesson" tabindex="-1" role="dialog" aria-labelledby="modallesson">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Tambah lesson</h4>
                </div>
                <form id="form_insert_lesson" method="POST" action="#">
                    <div class="modal-body">
                        <div class="form_insert">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ins_course">Course</label>
                                            <input type="text" placeholder="item..." class="course form-control" name="course_title" />
                                                <span class="text-danger">
                                                    <strong id="course-error"></strong>
                                                </span>
                                    </div>                                                                                                
                                    <div class="form-group">
                                        <label for="ins_title">Judul</label>
                                            <input type="text" placeholder="judul" class="form-control" id="ins_title" name="title"/>
                                                <span class="text-danger">
                                                    <strong id="title-error"></strong>
                                                </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="ins_video_link">Link Video</label>
                                            <input type="text" placeholder="link video" class="form-control" id="ins_video_link" name="video_link"/>
                                                <span class="text-danger">
                                                    <strong id="video_link-error"></strong>
                                                </span>
                                    </div>
                                    <div class="form-group">
                                            <label for="ins_file">File Materi</label>
                                                <input type="file" placeholder="" class="form-control" id="ins_file" name="file"/>
                                                    <span class="text-danger">
                                                        <strong id="file-error"></strong>
                                                    </span>
                                    </div>                                                                                                                                                                                                                                                                                                                       
                                    <label> <input type="checkbox" name="published" class="i-checks" id="ins_published" value="0"> Published </label>
                                    <input type="hidden" class="i-checks" name="checked" id="checked" value="0"></label> 
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="ins_content">Materi</label>
                                            <textarea id="content" name="editordata"></textarea>
                                    </div> 
                                </div>
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

    {{-- update lesson --}}
    <div class="modal fade" id="update_lesson" tabindex="-1" role="dialog" aria-labelledby="modalbarang">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title-update">Update lesson</h4>
                </div>
                <form id="form_update_lesson" method="POST" action="#">                    
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="upd_course">Course</label>
                                        <input type="text" placeholder="item..." id="course" class="course form-control" name="course_title" />
                                            <span class="text-danger">
                                                <strong id="course-error"></strong>
                                            </span>
                                </div>                                                                                                
                                <div class="form-group">
                                    <label for="upd_title">Judul</label>
                                        <input type="text" placeholder="judul" class="form-control" id="upd_title" name="title"/>
                                            <span class="text-danger">
                                                <strong id="title-error"></strong>
                                            </span>
                                </div>
                                <div class="form-group">
                                    <label for="upd_video_link">Link Video</label>
                                        <input type="text" placeholder="link video" class="form-control" id="upd_video_link" name="video_link"/>
                                            <span class="text-danger">
                                                <strong id="video_link-error"></strong>
                                            </span>
                                </div>
                                <div class="form-group">
                                    <label for="upd_position">Posisi</label>
                                        <input type="text" placeholder="position" class="form-control" id="upd_position" name="position"/>
                                            <span class="text-danger">
                                                <strong id="position-error"></strong>
                                            </span>
                                </div>
                                <div class="form-group">
                                    <label for="upd_file">File Materi</label>
                                        <input type="file" placeholder="" class="form-control" id="upd_file" name="file"/>
                                        <p id="file"></p>
                                            <span class="text-danger">
                                                <strong id="file-error"></strong>
                                            </span>
                                </div>
                                <div>
                                
                                </div>                                                                                                                                                                                                                                                                                                                       
                                <label> <input type="checkbox" name="published" class="i-checks" id="upd_published" value="0"/> Published </label>
                                <input type="text" class="i-checks" name="checked" id="upd_checked" value="0"/>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="upd_content">Materi</label>
                                        <textarea id="content" name="editordata"></textarea>
                                </div> 
                            </div>
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
                    return `<center>` + `<a href="#" data-toggle="modal" data-target="#update_lesson" class="btn btn-success btn-circle btn-edit" id="${data.id}"><i class="fa fa-pencil-alt"></i></a>
                            <a href="#" class="btn btn-danger btn-circle btn-delete" id="${data.id}"><i class="fa fa-trash"></i></a>
                            <a href="#" class="btn btn-primary btn-circle btn-delete" id="${data.id}"><i class="fa fa-eye"></i></a>` + `</center>`;
                },                
                checkbox: function(row, type, data){
                    if (data.published == 1) {
                        return '<center>'+ '<input type="checkbox" name="published" class="i-checks" id="upd_published"  disabled checked="checked">' +'</center>';    
                    }else{
                        return '<center>'+ '<input type="checkbox" name="published" class="i-checks" id="upd_published" disabled ' +'</center>';
                    }                    
                }                
            }; 

            $('#content').ckeditor();
            
            // form tambah
            $( "#form_insert_lesson" ).validate({
                rules: {
                    course_title: {
                    required: true                    
                    },
                    title: {
                    required: true
                    },
                    video_link: {
                    required: true
                    },
                    file: {                    
                    extension: "zip"
                    },
                    published: {
                    required: false
                    }
                }
            });

             // form tambah
             $( "#form_update_course" ).validate({
                rules: {
                    image: {
                    required: false,                    
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
                }
            });            

            //datatables
            table = $('#table_lesson').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                order: [[1, 'desc']],
                

                ajax: {
                    "url": '{{ URL('lesson/dataTable') }}',
                    "headers": {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },                    
                },

                columns: [
                    {data: 'DT_RowIndex'},
                    {data: 'course_id'},                    
                    {data: 'title'},                                        
                    {data: 'position'},
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
            $("#form_insert_lesson").submit(function (e) {                
                e.preventDefault();                
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    url: "{{ URL('lesson/insert') }}",
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
                            $("#update_course").modal('hide');
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
            
            //cekbox pada modal ubah
            $('#upd_published').change(function(){                
                if($('#upd_published:checked').val()){                    
                    $('#upd_checked').val(1);
                }else{                    
                    $('#upd_checked').val(0);
                }
            });

            //fungsi get data pada modal ubah
            table.on('click', '.btn-edit', function (e) {
                e.preventDefault();
                var id = $(this).attr("id");
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    url: "{{ URL('lesson/edit') }}",
                    type: "GET",
                    data: 'id=' + id,
                    dataType: "JSON",
                    success: function (data) {
                        $('#id').val(data.list.id);
                        $('#upd_title').val(data.list.title);
                        $('#course').val(data.list.course);
                        $('#upd_video_link').val(data.list.video_link);
                        $('#upd_position').val(data.list.position);
                        $('#file').html(data.list.file);                        
                        if (data.list.published > 0) {
                            $('#upd_published').attr('checked', true);                               
                        }else{
                            $('#upd_published').attr('checked', false);    
                        }                        
                        $('#upd_checked').val(data.list.published); 
                        $('#update_lesson').modal('show');
                    },
                    error: function (xhr, status, error) {
                        alert(status + " : " + error);
                    }
                });
            });

            //fungsi ubah data
            $("#form_update_lesson").submit(function (e) {
                e.preventDefault();                

                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    url: "{{ URL('lesson/update') }}",
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
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            url: '{{ URL('lesson/delete') }}',
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
            // typehead course
            $('.course').typeahead({
                source: [<?php echo $course; ?>]
            });

        });        

        
    </script>

@endsection