@extends('layouts2.app')
@section('title', 'Materi')
@section('content')
<div class="video">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9">
            <div class="iframe" style="width:100%">                
                <iframe src="{{$materi->video_link}}" allowfullscreen></iframe>                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="ibox-content">
                    <h2>List Materi</h2>
            </div>                
            <div class="ibox-content" style="width: 100%; height: 350px;overflow: scroll">                                    
                <ul class="sortable-list connectList agile-list ui-sortable" id="todo">
                    @foreach ($list as $item)
                    <a href="{{ route('materi2', [$item->slug]) }}">
                        <li class="success-element ui-sortable-handle active" id="task2" style="color:#2C3E50;">
                               <h3>{{$item->position}} {{$item->title}}</h3>
                        </li>      
                    </a>              
                    @endforeach
                </ul>
            </div>
            <div class="widget navy-bg p-lg" >
                <br>                    
                <h3 class="font-bold no-margins text-center">
                    Download
                </h3>
                <br>                                
                <a class="btn btn-danger btn-rounded btn-block" href="#"><i class="fas fa-file-code"></i> Materi</a>                
                <a class="btn btn-danger btn-rounded btn-block" href="#"><i class="fas fa-file-code"></i> Source Code</a>                
                    
             </div>
        </div>        
    </div>
</div>
<div class="jumbotron">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="ibox-content" style="font-size:20px;">            
                <div class="text-center article-title">                
                    <h1>
                        <b>{{$materi->title}}</b>
                    </h1>
                </div>
                <div>
                    @php
                        $parsedown = new Parsedown();
                        $parsedown->setSafeMode(true);
                    @endphp
                    {!! $parsedown->text($materi->content) !!}
                </div>
                <hr>            
            </div>
        </div>        
        
    </div>
</div>

@endsection