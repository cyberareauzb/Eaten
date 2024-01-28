<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>:: U-Listing Directory - Listing HTML Template ::</title>
    <title>EATEN </title>
    @include('layouts.sitestyle')
</head>

<body>
<!-- Preloader Start -->
<div class="preloader">
    <div class="utf-preloader">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- Preloader End -->
<div id="main_wrapper">
    @include('layouts.dashheader')
    <div id="dashboard">
        @include('layouts.dashside')
        @yield('content')
        @include('layouts.dashfoot')
    </div>
</div>
@include('layouts.sitescripts')
</body>

</html>
