<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Cuba admin is super flexible, powerful, clean & modern responsive bootstrap 5 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <link rel="icon" href="/assets/images/logo1.png" type="image/x-icon">
  <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo1.png') }}" type="image/x-icon">
  <title> @yield('title') - Rkive</title>

  <!-- Google font-->
  <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&display=swap" rel="stylesheet">
  <script src="//unpkg.com/alpinejs" defer></script>
  
  @include('layouts.css')
  @yield('style')

</head>

<body @if(Route::current()->getName() == 'index') onload="startTime()" @endif>
  
  <!-- loader starts-->
  <div class="loader-wrapper">
    <div class="loader-index"><span></span></div>
    <svg>
      <filter id="goo">
        <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
        <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
      </filter>
    </svg>
  </div>
  <!-- loader ends-->
  <!-- tap on top starts-->
  <div class="tap-top"><i data-feather="chevrons-up"></i></div>
  <!-- tap on tap ends-->

  <!-- page-wrapper Start-->
  <div class="page-wrapper compact-wrapper " id="pageWrapper">

    <!-- Page Header Start-->
    @include('layouts.header')
    <!-- Page Header Ends -->

    <div class="page-body-wrapper">

      <!-- Page Sidebar Start-->
      @include('layouts.sidebar')
      <!-- Page Sidebar Ends-->

      <div class="page-body">
        <div class="container-fluid">
          <div class="page-title">
            <div class="row">
              <div class="col-6">

                @yield('breadcrumb-title')

              </div>
              <div class="col-6">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('/') }}"> <i data-feather="home"></i></a></li>

                  @yield('breadcrumb-items')

                </ol>
              </div>
            </div>
          </div>
        </div>

        @yield('content')




        @include('layouts.script')

        <script type="text/javascript">
          if ($(".page-wrapper").hasClass("horizontal-wrapper")) {
            $(".according-menu.other").css("display", "none");
            $(".sidebar-submenu").css("display", "block");
          }
        </script>

</body>

</html>