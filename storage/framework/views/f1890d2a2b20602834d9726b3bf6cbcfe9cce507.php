<?php $__env->startSection('title', 'List Materi'); ?>
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
                    <p>
                        
                        
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
                <h1><?php echo e($title); ?></h1>                    
                </div>
        </div>
        <div class="row">
                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lists): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                    <a class="list" data-id="<?php echo e($lists->id); ?>" href="#">
                            <div class="ibox">
                                <div class="ibox-content product-box">                                        
                                    <div class="product-imitation">
                                        <img src="../images/<?php echo e($lists->image); ?>" alt="" width="255px;" height="150px;">
                                    </div>                                
                                    <div class="product-desc">                                                                                                                                   
                                        <b><h3 class="product-name"><?php echo e($lists->title); ?></h3></b>
                                        <div class="small m-t-xs">                                            
                                           <p style="color:black"><?php echo e(str_limit($lists->description, $limit = 70, $end = '...')); ?></p> 
                                        </div>                                   
                                            <?php $__currentLoopData = $lists->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="badge badge-primary" style="padding:5px; margin:7px 0px 7px 0px;"><?php echo e($item->title); ?> </span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                                                                           
                                            <div class="row">
                                                <div class="col-xs-6">
                                                        <span class="badge " style="padding:5px;"><i class="fas fa-book fa-md"></i> 7 list materi</span>
                                                </div>
                                                <div class="col-xs-6">
                                                        <span class="badge waktu" style="padding:5px; margin-left:-10px;"><i class="fas fa-clock"></i></i> <?php echo e($lists->created_at->diffForHumans()); ?></span>
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
            <div class="col-md-2 col-md-offset-5">
                    <?php echo e($list->links()); ?>

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
                            "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                        },
                        url: "<?php echo e(URL('/materi')); ?>",
                        type: "GET",
                        data: "id="+ id,
                        dataType: 'json',
                        success: function (data) {                        
                            if (data.status == 404) {                                                            
                                $('#masuk').modal('show');
                            }else{
                                document.location.assign("<?php echo e(URL('materi/view')); ?>"+id);     
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts2.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>