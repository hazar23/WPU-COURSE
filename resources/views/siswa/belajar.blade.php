@extends('layouts2.app')
@section('title', 'Belajar')
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
                </div>
                <div class="carousel-image2 wow fadeInUp">
                    <img src="images/home/belajar.png" width="70%" alt="laptop"/>
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
                    <h1>Matakuliah</h1>                    
                </div>
        </div>
        <div class="row">
                @foreach ($matakuliah as $mat)
                <div class="col-md-3">
                        <a href="{{ route('matkul', [$mat->slug]) }}">
                            <div class="ibox">
                                <div class="ibox-content product-box">                                        
                                    <div class="product-imitation">
                                        <img src="images/{{$mat->image}}" alt="" width="255px;" height="150px;">
                                    </div>                                
                                    <div class="product-desc">                                                                                                                                   
                                        <b><h3 class="product-name">{{$mat->title}}</h3></b>
                                        <div class="small m-t-xs">                                            
                                           <p style="color:black">{{str_limit($mat->description, $limit = 70, $end = '...')}}</p> 
                                        </div>                                   
                                        <span class="badge badge-primary" style="padding:5px; margin:7px 0px 7px 0px;">Laravel </span>
                                        <span class="badge badge-primary" style="padding:5px; margin:7px 0px 7px 0px;">Laravel </span>
                                        <span class="badge badge-primary" style="padding:5px; margin:7px 0px 7px 0px;">Laravel </span>                                 
                                            <div class="row">
                                                <div class="col-xs-6">
                                                        <span class="badge " style="padding:5px;"><i class="fas fa-book fa-md"></i> 7 list materi</span>
                                                </div>
                                                <div class="col-xs-6">
                                                        <span class="badge waktu" style="padding:5px; margin-left:-10px;"><i class="fas fa-clock"></i></i> {{\Carbon\Carbon::parse($mat->created_at)->diffForHumans()}}</span>
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
            <div class="col-xs-12 col-xs-offset-4 col-md-2 col-md-offset-5">
                    {{$matakuliah->links()}}
            </div>
        </div>        
    </div>        
</section>
<hr>
<section id="materi" class="container services">
    <div class="wrapper wrapper-content animated fadeInRight" style="margin-top:-100px;">
        <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>Jalur</h1>                    
                </div>
        </div>
        <div class="row">
            @foreach ($jalur as $jal)
            <div class="col-md-3">
                <a href="{{ route('path', [$jal->slug]) }}">
                    <div class="ibox">
                        <div class="ibox-content product-box">                                        
                            <div class="product-imitation">
                                <img src="images/{{$jal->image}}" alt="" width="255px;" height="150px;">
                            </div>                                
                            <div class="product-desc">                                                                                                                                   
                                <b><h3 class="product-name">{{$jal->title}}</h3></b>
                                <div class="small m-t-xs">                                            
                                    <p style="color:black">{{str_limit($jal->description, $limit = 70, $end = '...')}}</p> 
                                </div>                                   
                                <span class="badge badge-primary" style="padding:5px; margin:7px 0px 7px 0px;">Laravel </span>
                                <span class="badge badge-primary" style="padding:5px; margin:7px 0px 7px 0px;">Laravel </span>
                                <span class="badge badge-primary" style="padding:5px; margin:7px 0px 7px 0px;">Laravel </span>                                 
                                    <div class="row">
                                        <div class="col-xs-6">
                                                <span class="badge " style="padding:5px;"><i class="fas fa-book fa-md"></i> 7 list materi</span>
                                        </div>
                                        <div class="col-xs-6">
                                                <span class="badge waktu" style="padding:5px;"><i class="fas fa-clock"></i></i> {{\Carbon\Carbon::parse($jal->created_at)->diffForHumans()}}</span>
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
                <div class="col-xs-12 col-xs-offset-4 col-md-2 col-md-offset-5">
                        {{$jalur->links()}}        
                </div>
        </div>         
    </div>    
</section>
<hr>
<section id="materi" class="container services">
    <div class="wrapper wrapper-content animated fadeInRight" style="margin-top:-100px;">
        <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>Level</h1>                    
                </div>
        </div>
        <div class="row">
            @foreach ($level as $lev)
            <div class="col-md-3">
                <a href="{{ route('levels', [$lev->slug]) }}">
                    <div class="ibox">
                        <div class="ibox-content product-box">                                        
                            <div class="product-imitation">
                                <img src="images/{{$lev->image}}" alt="" width="255px;" height="150px;">
                            </div>                                
                            <div class="product-desc">                                                                                                                                   
                                <b><h3 class="product-name">{{$lev->title}}</h3></b>
                                <div class="small m-t-xs">                                            
                                    <p style="color:black">{{str_limit($lev->description, $limit = 70, $end = '...')}}</p> 
                                </div>                                   
                                <span class="badge badge-primary" style="padding:5px; margin:7px 0px 7px 0px;">Laravel </span>
                                <span class="badge badge-primary" style="padding:5px; margin:7px 0px 7px 0px;">Laravel </span>
                                <span class="badge badge-primary" style="padding:5px; margin:7px 0px 7px 0px;">Laravel </span>                                 
                                    <div class="row">
                                        <div class="col-xs-6">
                                                <span class="badge " style="padding:5px;"><i class="fas fa-book fa-md"></i> 7 list materi</span>
                                        </div>
                                        <div class="col-xs-6">
                                                <span class="badge waktu" style="padding:5px; margin-left:-10px;"><i class="fas fa-clock"></i></i> {{\Carbon\Carbon::parse($lev->created_at)->diffForHumans()}} </span>
                                        </div>
                                    </div>                                                                       
                            </div>
                        </div>
                    </div>    
                </a>                
            </div>    
            @endforeach                             
        </div>
    </div>    
</section>
@endsection