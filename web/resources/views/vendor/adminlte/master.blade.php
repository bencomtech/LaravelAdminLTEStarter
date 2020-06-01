<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title_prefix', config('adminlte.title_prefix', ''))
        @yield('title', config('adminlte.title', 'AdminLTE 2'))
        @yield('title_postfix', config('adminlte.title_postfix', ''))
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('vendor/icheck/skins/all.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}">
    <!-- jquery-loading -->
    <link rel="stylesheet" href="{{ asset('vendor/jquery-loading/dist/jquery.loading.css') }}">
    <!-- bootstrap3-dialog -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap3-dialog/dist/css/bootstrap-dialog.min.css') }}">
    <!-- bootstrap-datepicker-thai-thai -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker-thai-thai/css/datepicker.css') }}">

    @include('adminlte::plugins', ['type' => 'css'])

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">
    <!-- Custom theme style -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition @yield('body_class')">

    @yield('body')

    <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jQuery.serializeObject/dist/jquery.serializeObject.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-loading/dist/jquery.loading.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datepicker-thai-thai/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datepicker-thai-thai/js/bootstrap-datepicker-thai.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datepicker-thai-thai/js/locales/bootstrap-datepicker.th.js') }}"></script>
    <script src="{{ asset('vendor/moment/moment.js') }}"></script>
    <script src="{{ asset('vendor/moment/locale/th.js') }}"></script>
    <script src="{{ asset('vendor/teamdf/jquery-number/jquery.number.js') }}"></script>
    <script src="{{ asset('vendor/autosize/dist/autosize.min.js') }}"></script>
    <script src="{{ asset('vendor/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        const baseURL = "{{ url('/') }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        autosize($('textarea'));
    </script>

    @include('adminlte::plugins', ['type' => 'js'])

    @yield('adminlte_js')

</body>
</html>
