<!DOCTYPE html>
<html lang="id">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (optional if you already have it included) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@include('layout.header')

<body
  class="home page-template page-template-full_width page-template-full_width-php page page-id-4699  qode-theme-ver-3.6 elision wpb-js-composer js-comp-ver-5.2 vc_responsive">
  <div class="wrapper">
    <div class="wrapper_inner">
      @include('layout.navigation')
      
      <div class="full_width">
        <div class="image responsive" style="display:flex; justify-content:center;">
          <img src="{{ asset('assets/wp-content/uploads/foto/LPKS.png') }}" style="width: 100%; height: auto;" />
        </div>

        <a id='back_to_top' href='#'>
          <span class="fa-stack">
            <i class="fa fa-angle-up " style=""></i>
          </span>
        </a>

        <div class="content">
          <div class="content_inner  ">
            @yield('content')

          </div>
        </div>
        @include('layout.footer_dashboard')

        @include('layout.script')

</body>

</html>
