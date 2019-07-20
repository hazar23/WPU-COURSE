<div class="navbar-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">WPU - LEARNING</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php if(Request::path() == '/'): ?>
                    <li><a class="page-scroll" href="#page-top">Beranda</a></li>    
                    <?php else: ?>
                    <li><a class="page-scroll" href=<?php echo e(url('/')); ?>>Beranda</a></li>   
                    <?php endif; ?>                    

                    <li><a class="page-scroll" href=<?php echo e(url('/belajar')); ?>>Belajar</a></li>
                    <?php if(Session::has('email')): ?>
                    <?php
                        $value = App\Models\User::where('email', Session::get('email'))->first();                                
                    ?>
                    <li><a data-id="<?php echo e($value->id); ?>" id="btn-profile" data-toggle="modal" data-target="#profile">Profile</a></li>
                    <li><a href="<?php echo e(route('keluar')); ?>">Keluar</a></li>    
                    <?php else: ?>
                    <li><a class="page-scroll" href="#masuk" data-toggle="modal" data-target="#masuk">Masuk</a></li>
                    <li><a class="page-scroll" href="#daftar" data-toggle="modal" data-target="#daftar">Daftar</a></li>                        
                    <?php endif; ?>
                    
                </ul>
            </div>
        </div>
    </nav>
</div>