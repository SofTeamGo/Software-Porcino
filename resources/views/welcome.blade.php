<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>Granja</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{{ asset('css/app.css') }}}" rel="stylesheet">
        <link href="{{{ asset('css/main.css') }}}" rel="stylesheet">
        <link href="{{{ asset('css/ionicons.css') }}}" rel="stylesheet">
    </head>
    <body class="theme-default">
      <div class="layout-container">
        <!-- top navbar-->
        @include('layouts.navbar')

        <!-- sidebar-->
        @include('layouts.sidebar')
        <div class="sidebar-layout-obfuscator"></div>

        <!-- Main section-->
        <div class="main-container" id="app">
          <section class="section-container">
            <div class="container-fluid">
              <div class="row">
                <div class="col-xl-12">
                  @yield('content')
                </div>
              </div>
            </div>
          </section>
          <!-- Page footer-->
          @include('layouts.footer')
        </div>
      </div>

      <!-- Search template-->
      @include('layouts.search')

      <script src="{{{ asset('js/app.js') }}}"></script>
      <script src="{{{ asset('js/main.js') }}}"></script>
    </body>
</html>
