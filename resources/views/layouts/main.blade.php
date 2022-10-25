<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('dashboard-template/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard-template/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard-template/assets/css/jquery.toast.min.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- layouts styles -->
    <link rel="stylesheet" href="{{asset('dashboard-template/assets/css/style.css')}}">
    <!-- End layouts styles -->
    <link rel="shortcut icon" href="{{asset('dashboard-template/assets/images/favicon.ico')}}" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        td.action button{
            margin-right: 0.5rem;
        }
    </style>
  </head>
  <body>

    <div class="container-scroller">
        @include('layouts.navbar')

        <div class="container-fluid page-body-wrapper">
        @include('layouts.sidebar')


            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                @include('layouts.footer')

            </div>
        </div>
    </div>

    <script src="{{asset('dashboard-template/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('dashboard-template/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('dashboard-template/assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('dashboard-template/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('dashboard-template/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('dashboard-template/assets/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('dashboard-template/assets/js/jquery.toast.min.js')}}"></script>
    <script src="{{asset('dashboard-template/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('dashboard-template/assets/js/todolist.js')}}"></script>
    <script src="{{asset('dashboard-template/assets/js/file-upload.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script src="{{asset('dashboard-template/assets/js/functions-library.js')}}"></script>
    {{-- <script src="./resources/js/app.js"></script> --}}
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
    <script src="{{asset('dashboard-template/assets/js/main.js')}}"></script>
    <script src="{{asset('dashboard-template/assets/js/my-config.js')}}"></script>


    @yield('page-js')
    <!-- End custom js for this page -->
  </body>
</html>
