<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WPU_learning | <?php echo $__env->yieldContent('title'); ?> </title>

    <link rel="stylesheet" href="<?php echo asset('css/vendor.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/animate.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/style.css'); ?>" />    

    <!-- Plugin--> 
    <link rel="stylesheet" href="<?php echo asset('css/plugins/datatables.min.css'); ?>" />    
    <link rel="stylesheet" href="<?php echo asset('css/plugins/sweetalert.css'); ?>" />    
    <link rel="stylesheet" href="<?php echo asset('css/plugins/chosen.min.css'); ?>" />    
        
    <!-- CDN--> 
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    
    <?php echo $__env->yieldContent('heading'); ?>
</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            <?php echo $__env->make('layouts.topnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!-- Main view  -->
            <?php echo $__env->yieldContent('content'); ?>

            <!-- Footer -->
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

<script src="<?php echo asset('js/app.js'); ?>" type="text/javascript"></script>
<script src="<?php echo asset('js/jquery-3.1.1.min.js'); ?>"></script>
<script src="<?php echo asset('js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo asset('js/plugins/datatables.min.js'); ?>"></script>
<script src="<?php echo asset('js/plugins/jquery.metisMenu.js'); ?>"></script>
<script src="<?php echo asset('js/plugins/jquery.slimscroll.min.js'); ?>"></script>
<script src="<?php echo asset('js/plugins/sweetalert.min.js'); ?>"></script>
<script src="<?php echo asset('js/plugins/jquery.validate.min.js'); ?>"></script>


<!-- Custom and plugin javascript -->
<script src="<?php echo asset('js/inspinia.js'); ?>" ></script>
<script src="<?php echo asset('js/plugins/pace.min.js'); ?>"></script>
<script src="<?php echo asset('js/plugins/bootstrap3-typeahead.min.js'); ?>"></script>
<script src="<?php echo asset('js/plugins/chosen.jquery.min.js'); ?>"></script>

<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script>

$(function() {
      setNavigation()
    })

    function setNavigation() {
      var path = window.location.pathname;
      path = path[0] == '/' ? path.substr(1) : path; //it will remove the dash in the URL

      $("ul.metismenu .nav-second-level a").each(function() {
          var href = $(this).attr('href');
          var pathHref = href.split('/').slice(3).join('/')

          if (path === pathHref) {
            $(this).parent().parent().closest('li').addClass('active');
            $(this).closest('ul').addClass('in');
          }
      });
    }
</script>
<?php $__env->startSection('scripts'); ?>
<?php echo $__env->yieldSection(); ?>
<?php echo $__env->yieldContent('scriptss'); ?>

</body>
</html>
