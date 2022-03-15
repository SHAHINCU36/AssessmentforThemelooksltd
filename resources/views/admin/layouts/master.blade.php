<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- GLOBAL MAINLY STYLES-->

    @include('includes.head_script')
    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">


<div class="page-wrapper">
    @include('includes.header')
    @include('includes.left-sidebar')
    <div class="content-wrapper">
    @yield('content')
    </div>

</div>

    @include('includes.footer_script')
@yield('script')
</body>

</html>