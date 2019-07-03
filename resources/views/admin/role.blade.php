@extends('layouts.app')
@section('title', 'Role')
@section('content')
{{-- @php dd($role); @endphp --}}

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
                <button data-toggle="modal" data-target="#insert_role" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Role </button>                
            </div>            
            <div class="clearfix"></div><br>
            <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover dataTables-example dataTable" id="table_role">
                    <thead>
                    <tr>
                        <th width="10" style="text-align: center">No</th>
                        <th style="text-align: center">Nama</th>                                              
                        <th style="text-align: center">Menu</th>
                        <th width="260" style="text-align: center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- modal tambah course --}}
<div class="modal fade" id="insert_role" tabindex="-1" role="dialog" aria-labelledby="modalrole">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Tambah Role</h4>
                </div>
                <form id="form_insert_role" method="POST" action="#">
                    <div class="modal-body">
                        <div class="form_insert">                                                                                                                                                                                   
                            <div class="form-group">
                                    <label for="ins_title" >Nama</label>
                                        <input type="text" placeholder="nama role" class="form-control" id="ins_title" name="title"/>
                                            <span class="text-danger">
                                                <strong id="title-error"></strong>
                                            </span>
                            </div>                                        
                            <div class="form-group">
                                <label for="ins_url" >Pilih Menu</label>                                    
                                <select name="menu_id[]" id="menu_id" data-placeholder="Pilih menu..." multiple class="form-control">
                                    @forelse($menu as $me)
                                    <option value="{!! $me->id !!}">{!! $me->title !!}</option>
                                    @empty
                                    <option value="" disabled>Menu Belum Dibuat</option>
                                    @endforelse                                      
                                  </select>
                                <span class="text-danger">
                                    <strong id="url-error"></strong>
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

    {{-- update course --}}
    <div class="modal fade" id="update_role" tabindex="-1" role="dialog" aria-labelledby="modalbarang">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title-update">Update Role</h4>
                </div>
                <form id="form_update_role" method="POST" action="#">                    
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">                                                                                                                                                
                        <div class="form-group">
                                <label for="upd_title" >Nama</label>
                                    <input type="text" placeholder="nama role" class="form-control" id="upd_title" name="title"/>
                                        <span class="text-danger">
                                            <strong id="title-error"></strong>
                                        </span>
                        </div>                        
                        <div class="form-group">
                            <label for="upd_url" >Pilih Menu</label>                                    
                            <select name="menu_id[]" id="upd_menu_id" data-placeholder="Pilih menu..." multiple class="form-control">
                                @forelse($menu as $me)
                                <option value="{!! $me->id !!}">{!! $me->title !!}</option>
                                @empty
                                <option value="" disabled>Menu Belum Dibuat</option>
                                @endforelse                                      
                              </select>
                            <span class="text-danger">
                                <strong id="url-error"></strong>
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
                    return `<center>` + `<a href="#" data-toggle="modal" data-target="#update_role" class="btn btn-success btn-circle btn-edit" id="${data.id}"><i class="fa fa-pencil-alt"></i></a>
                            <a href="#" class="btn btn-danger btn-circle btn-delete" id="${data.id}"><i class="fa fa-trash"></i></a>` + `</center>`;
                },
                menu: function (row, type, data) {                    
                    var menus = data.menus;                                            
                    var temp=[];
                    for (var i= 0; i < menus.length; i++) {                        
                        temp.push('<span class="label label-primary">'+ menus[i].title+'</span>')
                    }                                                  
                    return '<p>'+temp.join(' ')+'</p>'
                }                                         
            };                        

            // form tambah
            $( "#form_insert_role" ).validate({
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

             // form update
             $( "#form_update_role" ).validate({
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


            $('#menu_id').chosen({width: "100%"}); 
            $('#upd_menu_id').chosen({width: "100%"});  

            //datatables
            table = $('#table_role').DataTable({                
                processing: true,
                serverSide: true,
                responsive: true,
                order: [[1, 'desc']],
                

                ajax: {
                    "url": '{{ URL('role/dataTable') }}',
                    "headers": {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },                    
                },

                columns: [
                    {data: 'DT_RowIndex'},                                        
                    {data: 'title'},
                    {data: 'menus',render: styles.menu},
                    {data: 'action', name: 'action', orderable: false, render: styles.button}                    
                ],
            });                                      

            //fungsi tambah
            $("#form_insert_role").submit(function (e) {                
                e.preventDefault();                           
                                   
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    url: "{{ URL('role/insert') }}",
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
                            $("#insert_role").modal('hide');
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
                console.log(id);
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    url: "{{ URL('role/edit') }}",
                    type: "GET",
                    data: 'id=' + id,
                    dataType: "JSON",
                    success: function (data) {
                        $('#id').val(data.list.id);
                        $('#upd_title').val(data.list.title);
                        var menus = data.list.menus;                        
                        var menuarr=[];
                        menus.forEach(menu => {
                            menuarr.push(menu.id);                            
                        });
                        
                        $("#upd_menu_id").val(menuarr).trigger("chosen:updated");                        
                        $('#update_role').modal('show');
                    },
                    error: function (xhr, status, error) {
                        alert(status + " : " + error);
                    }
                });
            });

            //fungsi ubah data
            $("#form_update_role").submit(function (e) {
                e.preventDefault();                

                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    url: "{{ URL('role/update') }}",
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
                            url: '{{ URL('role/delete') }}',
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

@endsection