<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <?php
                                $value = App\Models\User::where('email', Session::get('email'))->first();                                
                            ?>
                            <span>
                                <img alt="image" class="img-circle" src="images/<?php echo e($value->image); ?>" width="50%" />
                            </span>
                            <span class="block m-t-xs">
                                <strong class="font-bold"><?php echo e($value->name); ?></strong>                            
                        </span>
                    </a>                    
                </div>
                <div class="logo-element">
                    WPU
                </div>
            </li>
            <li class="<?php echo e(isActiveRoute('dashboard')); ?>">
                <a href="<?php echo e(url('/dashboard')); ?>"><i class="fas fa-tachometer-alt"></i></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <?php if(Session::has('email')): ?>                
                <?php $__empty_1 = true; $__currentLoopData = App\Models\User::with('roles.menus.subMenus')->where('email', Session::get('email'))->get()->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>                    
                    <?php $__currentLoopData = $tant->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                    
                        <?php $__currentLoopData = $item->menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>                            
                            <a href="#"><i class="<?php echo e($menu->icon); ?>"></i></i>
                                <span class="nav-label"><?php echo e($menu->title); ?></span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level collapse">
                            <?php $__currentLoopData = $menu->subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                        
                                <li class="<?php echo e(isActiveRoute($sub->url)); ?>" ><a href="<?php echo e(route($sub->url)); ?>"><i class="<?php echo e($sub->icon); ?>"></i><span class="nav-label mask-child-menu"><?php echo e($sub->title); ?></span> </a></li>                                                                                        
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>                      
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p>No users</p>
                <?php endif; ?>                        
            <?php endif; ?>                                     
        </ul>
    </div>
</nav>
