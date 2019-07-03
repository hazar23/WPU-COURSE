<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WPU_learning | @yield('title') </title>

    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/animate.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}" />    

    <!-- Plugin--> 
    <link rel="stylesheet" href="{!! asset('css/plugins/datatables.min.css') !!}" />    
    <link rel="stylesheet" href="{!! asset('css/plugins/sweetalert.css') !!}" />    
    <link rel="stylesheet" href="{!! asset('css/plugins/chosen.min.css') !!}" />    
        
    <!-- CDN--> 
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">  --}}

</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            @include('layouts.topnavbar')

            <!-- Main view  -->
            @yield('content')

            <!-- Footer -->
            @include('layouts.footer')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/jquery-3.1.1.min.js') !!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('js/plugins/datatables.min.js') !!}"></script>
<script src="{!! asset('js/plugins/jquery.metisMenu.js') !!}"></script>
<script src="{!! asset('js/plugins/jquery.slimscroll.min.js') !!}"></script>
<script src="{!! asset('js/plugins/sweetalert.min.js') !!}"></script>
<script src="{!! asset('js/plugins/jquery.validate.min.js') !!}"></script>


<!-- Custom and plugin javascript -->
<script src="{!! asset('js/inspinia.js') !!}" ></script>
<script src="{!! asset('js/plugins/pace.min.js') !!}"></script>
<script src="{!! asset('js/plugins/bootstrap3-typeahead.min.js') !!}"></script>
<script src="{!! asset('js/plugins/chosen.jquery.min.js') !!}"></script>

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
@section('scripts')
@show

</body>
</html>
