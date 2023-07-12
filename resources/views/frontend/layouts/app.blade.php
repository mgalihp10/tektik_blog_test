<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from www.bootstrapdash.com/demo/corona/jquery/template/modern-vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2019 10:41:13 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tektik Blog Test</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public_assets/vendors/css/headers.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, 0);
        border: solid rgba(0, 0, 0, 0);
        border-width: 0;
/*        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);*/
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      /*
       * Footer
       */
      .blog-footer {
        padding: 2.5rem 0;
        color: #727272;
        text-align: center;
        background-color: #f9f9f9;
        border-top: .05rem solid #e5e5e5;
      }
      .blog-footer p:last-child {
        margin-bottom: 0;
      }
    </style>
    <!-- endinject -->
    <!-- Layout styles -->
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('admin_assets/images/favicon.png') }}" />
  </head>
  <body>
    @include('frontend.layouts.navbar')
    <div class="b-example-divider"></div>
    <div class="container-fluid">
      @yield('contents')
    </div>
    <footer class="blog-footer">
      <p>Blog template used for <a href="https://getbootstrap.com/">Test</a> by <a href="https://twitter.com/mdo">Muhammad Galih Praditya</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('public_assets/vendors/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public_assets/vendors/js/color-mode.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('admin_assets/others/others.js') }}"></script>
    <!-- End custom js for this page -->
  </body>
</html>