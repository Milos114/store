<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="{{asset('admin/img/favicon.png')}}">

    <title>Admin Store</title>

    <!-- bootstrap theme -->
    <link href="{{asset('admin/css/bootstrap-theme.css')}}" rel="stylesheet">
    <!-- font icon -->
    <link href="{{asset('admin/css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet" />


    <!-- Custom styles -->
    <link href="{{asset('admin/css/widgets.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">

    <!-- DataTables styles -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>

    <!-- DropZone styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">

</head>

<body>
<!-- container section start -->
<section id="container" class="">

    <!--header start-->
    @include('partials.admin.header')
    <!--header end-->

    <!--sidebar start-->
    @include('partials.admin.sidebar')
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">

        <section class="wrapper">
            @include('partials.flash.errors')
            @include('partials.flash.status')

            @yield('content')
        </section>
    </section>
    <!--main content end-->
</section>

<!-- javascripts -->
<script src="{{asset('admin/js/jquery-1.8.3.min.js')}}"></script>
<!-- bootstrap -->
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<!-- nice scroll -->
<script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>

<!--custome script for all page-->
<script src="{{asset('admin/js/scripts.js')}}"></script>

</body>
</html>
