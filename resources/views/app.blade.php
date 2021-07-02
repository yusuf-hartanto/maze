<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Maze </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">

    <style>
        .swal2-icon-content {
            font-size: 2em !important;
        }
        .maze-page {
            align-items: center;
            background-color: #e9ecef;
            display: flex;
            flex-direction: column;
            height: 100vh;
            margin-top: 10px;
        }
    </style>
</head>

<body id="body" class="maze-page">
    <div id="app">
        <app></app>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @yield('scripts')
</body>

</html>
