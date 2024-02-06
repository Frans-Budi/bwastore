<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>@yield('title')</title>

  @stack('prepand-style')
  @include('includes.style')
  @stack('addon-style')
</head>

<body>
  <div class="page-dashboard">
    <div class="d-flex" id="wrapper" data-aos="fade-right">
      <!-- Sidebar -->
      @include('includes.sidebar')

      <!-- Page Content -->
      <div id="page-content-wrapper">
        {{-- Navbar --}}
        @include('includes.navbar-dashboard')

        {{-- Content --}}
        @yield('content')
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  @stack('prepand-script')
  @include('includes.script-dashboard')
  @stack('addon-script')
</body>

</html>
