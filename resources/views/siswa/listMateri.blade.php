@extends('layouts2.app')
@section('title', 'List Materi')
@section('content')
<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">    
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="carousel-caption wow fadeInLeft">
                    <h1>Belajar yang rajin di<br/>
                        Web Programming UNPAS<br/>
                        </h1>
                    <p>Web Programming tutorial.</p>
                    <p>
                        {{-- <a class="btn btn-lg btn-primary" href="#" role="button">READ MORE</a> --}}
                        {{-- <a class="caption-link" href="#" role="button">Inspinia Theme</a> --}}
                    </p>
                </div>
                <div class="carousel-image wow fadeInUp">
                    <img src="../images/home/laptop.png" width="65%" alt="laptop"/>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>
        </div>        
    </div>
</div>
<br><br>
<section id="materi" class="container services" >
    <div class="wrapper wrapper-content animated fadeInRight" style="margin-top:-100px;">
        <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                <h1>{{$title}}</h1>                    
                </div>
        </div>
        <div class="row">
                @foreach ($list as $lists)
                <div class="col-md-3">
                    <a class="list" data-id="{{$lists->id}}" href="#">
                            <div class="ibox">
                                <div class="ibox-content product-box">                                        
                                    <div class="product-imitation">
                                        <img src="../images/{{$lists->image}}" alt="" width="255px;" height="150px;">
                                    </div>                                
                                    <div class="product-desc">                                                                                                                                   
                                        <b><h3 class="product-name">{{$lists->title}}</h3></b>
                                        <div class="small m-t-xs">                                            
                                           <p style="color:black">{{str_limit($lists->description, $limit = 70, $end = '...')}}</p> 
                                        </div>                                   
                                            @foreach ($lists->tags as $item)
                                            <span class="badge badge-primary" style="padding:5px; margin:7px 0px 7px 0px;">{{$item->title}} </span>
                                            @endforeach                                                                                                           
                                            <div class="row">
                                                <div class="col-xs-6">
                                                        <span class="badge " style="padding:5px;"><i class="fas fa-book fa-md"></i> 7 list materi</span>
                                                </div>
                                                <div class="col-xs-6">
                                                        <span class="badge waktu" style="padding:5px; margin-left:-10px;"><i class="fas fa-clock"></i></i> {{$lists->created_at->diffForHumans()}}</span>
                                                </div>
                                            </div>                                                                       
                                    </div>
                                </div>
                            </div>    
                        </a>                
                    </div>    
                @endforeach                        
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-5">
                    {{$list->links()}}
            </div>
        </div>        
    </div>        
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>        
<script>
$(document).ready(function(){        
    $(".list").click(function (e) {                
                    e.preventDefault();                           
                    // var form = $('#form-masuk').serialize();                                        
                    var id = $(this).attr("data-id");                    
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        url: "{{ URL('/materi') }}",
                        type: "GET",
                        data: "id="+ id,
                        dataType: 'json',
                        success: function (data) {                        
                            if (data.status == 404) {                                                            
                                $('#masuk').modal('show');
                            }else{
                                document.location.assign("{{ URL('materi/view') }}"+id);     
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
@endsection