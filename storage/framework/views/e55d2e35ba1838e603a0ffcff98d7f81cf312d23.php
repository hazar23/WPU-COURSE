<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WPU_learning | <?php echo $__env->yieldContent('title'); ?> </title>

    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/animate.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/style.css'); ?>" />        
    <link rel="stylesheet" href="<?php echo asset('css/plugins/sweetalert.css'); ?>" />    

    <!-- CDN--> 
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <style>
        @media (max-width: 768px){
        .video{
            background-color: #2C3E50;
            padding-top: 80px;
        }
        .video .iframe iframe{
            width: 100%;
            height: 400px;
        }
        }
    </style>
</head>
<body id="page-top" class="landing-page no-skin-config">

            <!-- Page wrapper -->
            <?php echo $__env->make('layouts2.topnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!-- Main view  -->
            <?php echo $__env->yieldContent('content'); ?>

            <!-- Footer -->
            <?php echo $__env->make('layouts2.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<script src="<?php echo asset('js/app.js'); ?>" type="text/javascript"></script>


<script src="<?php echo asset('js/plugins/jquery.metisMenu.js'); ?>"></script>
<script src="<?php echo asset('js/plugins/jquery.slimscroll.min.js'); ?>"></script>
<script src="<?php echo asset('js/plugins/sweetalert.min.js'); ?>"></script>
<script src="<?php echo asset('js/plugins/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo asset('js/plugins/responsible-video.js'); ?>"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo asset('js/inspinia.js'); ?>" ></script>
<script src="<?php echo asset('js/plugins/pace.min.js'); ?>"></script>
<script src="<?php echo asset('js/plugins/wow.min.js'); ?>"></script>
<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->yieldSection(); ?>

</body>
</html>
