<?php $__env->startSection('title', 'Belajar'); ?>
<?php $__env->startSection('content'); ?>
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
                <?php $__currentLoopData = $matakuliah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                        <a href="<?php echo e(route('matkul', [$mat->slug])); ?>">
                            <div class="ibox">
                                <div class="ibox-content product-box">                                        
                                    <div class="product-imitation">
                                        <img src="images/<?php echo e($mat->image); ?>" alt="" width="255px;" height="150px;">
                                    </div>                                
                                    <div class="product-desc">                                                                                                                                   
                                        <b><h3 class="product-name"><?php echo e($mat->title); ?></h3></b>
                                        <div class="small m-t-xs">                                            
                                           <p style="color:black"><?php echo e(str_limit($mat->description, $limit = 70, $end = '...')); ?></p> 
                                        </div>                                                                           
                                            <div class="row">
                                                <div class="col-xs-6">
                                                        <span class="badge " style="padding:5px;"><i class="fas fa-book fa-md"></i> 7 list materi</span>
                                                </div>
                                                <div class="col-xs-6">
                                                        <span class="badge waktu" style="padding:5px; margin-left:-10px;"><i class="fas fa-clock"></i></i> <?php echo e(\Carbon\Carbon::parse($mat->created_at)->diffForHumans()); ?></span>
                                                </div>
                                            </div>                                                                       
                                    </div>
                                </div>
                            </div>    
                        </a>                
                    </div>    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
        </div>
        <div class="row">
            <div class="col-xs-12 col-xs-offset-4 col-md-2 col-md-offset-5">
                    <?php echo e($matakuliah->links()); ?>

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
            <?php $__currentLoopData = $jalur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
                <a href="<?php echo e(route('path', [$jal->slug])); ?>">
                    <div class="ibox">
                        <div class="ibox-content product-box">                                        
                            <div class="product-imitation">
                                <img src="images/<?php echo e($jal->image); ?>" alt="" width="255px;" height="150px;">
                            </div>                                
                            <div class="product-desc">                                                                                                                                   
                                <b><h3 class="product-name"><?php echo e($jal->title); ?></h3></b>
                                <div class="small m-t-xs">                                            
                                    <p style="color:black"><?php echo e(str_limit($jal->description, $limit = 70, $end = '...')); ?></p> 
                                </div>                                                                   
                                    <div class="row">
                                        <div class="col-xs-6">
                                                <span class="badge " style="padding:5px;"><i class="fas fa-book fa-md"></i> 7 list materi</span>
                                        </div>
                                        <div class="col-xs-6">
                                                <span class="badge waktu" style="padding:5px;"><i class="fas fa-clock"></i></i> <?php echo e(\Carbon\Carbon::parse($jal->created_at)->diffForHumans()); ?></span>
                                        </div>
                                    </div>                                                                       
                            </div>
                        </div>
                    </div>    
                </a>                
            </div>    
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
        </div>
        <div class="row">
                <div class="col-xs-12 col-xs-offset-4 col-md-2 col-md-offset-5">
                        <?php echo e($jalur->links()); ?>        
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
            <?php $__currentLoopData = $level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
                <a href="<?php echo e(route('levels', [$lev->slug])); ?>">
                    <div class="ibox">
                        <div class="ibox-content product-box">                                        
                            <div class="product-imitation">
                                <img src="images/<?php echo e($lev->image); ?>" alt="" width="255px;" height="150px;">
                            </div>                                
                            <div class="product-desc">                                                                                                                                   
                                <b><h3 class="product-name"><?php echo e($lev->title); ?></h3></b>
                                <div class="small m-t-xs">                                            
                                    <p style="color:black"><?php echo e(str_limit($lev->description, $limit = 70, $end = '...')); ?></p> 
                                </div>                                                                   
                                    <div class="row">
                                        <div class="col-xs-6">
                                                <span class="badge " style="padding:5px;"><i class="fas fa-book fa-md"></i> 7 list materi</span>
                                        </div>
                                        <div class="col-xs-6">
                                                <span class="badge waktu" style="padding:5px; margin-left:-10px;"><i class="fas fa-clock"></i></i> <?php echo e(\Carbon\Carbon::parse($lev->created_at)->diffForHumans()); ?> </span>
                                        </div>
                                    </div>                                                                       
                            </div>
                        </div>
                    </div>    
                </a>                
            </div>    
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                             
        </div>
    </div>    
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts2.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>