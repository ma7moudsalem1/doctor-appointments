<!DOCTYPE html>
<html>
</head>
@include('panel.layouts.partials.head')
@yield('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('panel.layouts.partials.header')
  @include('panel.layouts.partials.aside')
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   @yield('breadcrumb')

    <!-- Main content -->
    <section class="content">
     @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
@include('panel.layouts.partials.footer')

</div>
<!-- ./wrapper -->
@include('panel.layouts.partials.scripts')
@yield('js')
</body>
</html>
