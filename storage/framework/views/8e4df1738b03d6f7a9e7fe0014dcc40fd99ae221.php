<?php $__env->startSection('title', 'Materi'); ?>
<?php $__env->startSection('content'); ?>
<div class="video">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9">
            <div class="iframe" style="width:100%">                
                <iframe src="<?php echo e($materi->video_link); ?>" allowfullscreen></iframe>                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="ibox-content">
                    <h2>List Materi</h2>
            </div>                
            <div class="ibox-content" style="width: 100%; height: 350px;overflow: scroll">                                    
                <ul class="sortable-list connectList agile-list ui-sortable" id="todo">
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('materi2', [$item->slug])); ?>">
                        <li class="success-element ui-sortable-handle active" id="task2" style="color:#2C3E50;">
                               <h3><?php echo e($item->position); ?> <?php echo e($item->title); ?></h3>
                        </li>      
                    </a>              
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <b><?php echo e($materi->title); ?></b>
                    </h1>
                </div>
                <div>
                    <?php
                        $parsedown = new Parsedown();
                        $parsedown->setSafeMode(true);
                    ?>
                    <?php echo $parsedown->text($materi->content); ?>

                </div>
                <hr>            
            </div>
        </div>        
        
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts2.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>