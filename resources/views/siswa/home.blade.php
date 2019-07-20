@extends('layouts2.app')
@section('title', 'Home')
@section('content')
<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">    
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="carousel-caption wow fadeInLeft">
                    <h1>Selamat Datang Di<br/>
                        Web Programming UNPAS<br/>
                        </h1>
                    <p>Web Programming tutorial.</p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="#" role="button">READ MORE</a>
                        {{-- <a class="caption-link" href="#" role="button">Inspinia Theme</a> --}}
                    </p>
                </div>
                <div class="carousel-image wow fadeInUp">
                    <img src="images/home/laptop.png" width="65%" alt="laptop"/>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>
        </div>        
    </div>
</div>

<section id="features" class="container services">
    <div class="row m-b-lg" style="margin-top:-80px;">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Belajar Bersama WPU</h1>
                <h4>Tingkatkan kemampuan codingmu sekarang juga! </h4>                
            </div>
    </div>
    <div class="row" style="margin-top:-30px;">
        <div class="col-sm-2">            
        </div>
        <div class="col-sm-4">
            <h2 class="text-center">Online Course</h2>
            <p class="text-center"><img src="images/home/course.png" alt="" width="30%"></p>
            <p>Belajar coding online dengan menggunakan beragam media belajar berupa video, teks, gambar dan source code yang dapat di download disusun secara terstruktur berdasarkan profesi dan keahlian.</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
        <div class="col-sm-4">                
            <h2 class="text-center">forum Diskusi</h2>
            <p class="text-center"><img src="images/home/forum.png" alt="" width="30%"></p>
            <p>Forum untuk diskusi permasalahan atau pengetahuan dengan instruktur dan teman-teman lainnya.</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
        <div class="col-sm-2">            
        </div>
    </div>
    <hr>
</section>
<section id="materi" class="container services">
    <div class="wrapper wrapper-content animated fadeInRight" style="margin-top:-100px;">
        <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>Materi Terbaru</h1>                    
                </div>
        </div>
        <div class="row">            
            @foreach ($terbaru as $ter)
            <div class="col-md-3">
                    <a href="">
                        <div class="ibox">
                            <div class="ibox-content product-box">                                        
                                <div class="product-imitation">
                                    <img src="images/{{$ter->image}}" alt="" width="255px;" height="150px;">
                                </div>                                
                                <div class="product-desc">                                                                                                                                   
                                <b><h3 class="product-name">{{$ter->title}}</h3></b>
                                    <div class="small m-t-xs">                                            
                                       <p style="color:black">{{str_limit($ter->description, $limit = 70, $end = '...')}}</p> 
                                    </div>                                   
                                    <span class="badge badge-primary" style="padding:5px; margin:7px 0px 7px 0px;">Laravel </span>
                                    <span class="badge badge-primary" style="padding:5px; margin:7px 0px 7px 0px;">Laravel </span>
                                    <span class="badge badge-primary" style="padding:5px; margin:7px 0px 7px 0px;">Laravel </span>                                 
                                        <div class="row">
                                            <div class="col-xs-6">
                                                    <span class="badge " style="padding:5px;"><i class="fas fa-book fa-md"></i> 7 list materi</span>
                                            </div>
                                            <div class="col-xs-6">
                                                    <span class="badge waktu" style="padding:5px; margin-left:-10px;"><i class="fas fa-clock"></i></i> {{\Carbon\Carbon::parse($ter->created_at)->diffForHumans()}} </span>
                                            </div>
                                        </div>                                                                       
                                </div>
                            </div>
                        </div>    
                    </a>                
                </div>    
            @endforeach                        
        </div>
        <p>
            <a class="btn btn-lg btn-primary" href="#" role="button">Lihat Selengkapnya</a>   
        </p>
    </div>    
</section>

<section id="team" class="gray-section team">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Instruktur</h1>                
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 wow fadeInLeft">               
            </div>
            <div class="col-sm-4">
                <div class="team-member wow zoomIn">
                    <img src="images/home/SGA.jpg" width="200px" class="img-responsive img-circle" alt="">
                    <h4><span class="navy">R Sandhika</span> Galih Amalga, ST., MT</h4>
                    <p>Hi, my name is Dhika, I'm your lecturer for this course. In this course you will learn about Introduction to Static Web Programming using such languages as HTML, HTML5, CSS, CSS3, Javascript and JQuery. We will produce not only an aestethic, usable and user friendly but also a valid web page. It's going to be fun.. ^_^.</p>
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
            <div class="col-sm-4 wow fadeInRight">                
            </div>
        </div>
        <br><br>        
    </div>
</section>
<section id="testimonials" class="navy-section testimonials" style="margin-top: 0">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center wow zoomIn">
                <i class="fa fa-comment big-icon"></i>
                <h1>
                    Quote
                </h1>
                <br>
                <div class="testimonials-text">
                    <i><h3>"Bila kau tak tahan lelah nya belajar, maka kau harus tahan perihnya kebodohan"</h3></i>
                </div>
                <small>
                    <strong>imam syafi'i</strong>
                </small>
            </div>            
        </div>
    </div>

</section>

<section class="comments gray-section" style="margin-top: 0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Testimoni</h1>                
            </div>
        </div>
        <div class="row features-block">
            <div class="col-lg-4">
                <div class="bubble">
                    "Belajar di Web Programming UNPAS sangat asik,materinya begitu mudah di pahami"
                </div>
                <div class="comments-avatar">
                    <a href="" class="pull-left">
                        <img alt="image" src="images/titikkoma.png">
                    </a>
                    <div class="media-body">
                        <div class="commens-name">
                            Hazar Hamzah
                        </div>
                        <small class="text-muted">Web Developer</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bubble">
                    "Web Programming UNPAS Keren materinya sangat lengkap lengkap dan asik"
                </div>
                <div class="comments-avatar">
                    <a href="" class="pull-left">
                        <img alt="image" src="images/titikkoma.png">
                    </a>
                    <div class="media-body">
                        <div class="commens-name">
                            Muhammad Dwika
                        </div>
                        <small class="text-muted">Web Developer </small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bubble">
                    "Belajar Pemogramman berbahasa indonesia terkeren"
                </div>
                <div class="comments-avatar">
                    <a href="" class="pull-left">
                        <img alt="image" src="images/titikkoma.png">
                    </a>
                    <div class="media-body">
                        <div class="commens-name">
                            Ade Pranaya
                        </div>
                        <small class="text-muted">Mobile Developer</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection