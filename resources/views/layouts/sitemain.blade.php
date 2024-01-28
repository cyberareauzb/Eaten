<!DOCTYPE html>
<html lang="{{session('siteLang')}}">

<head>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EATEN.UZ</title>
    <style>
        
        /* width */
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
    </style>
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
        @include('layouts.siteheader')
        @yield('content')
        @include('layouts.sitefooter')
        @include('layouts.sitescripts')
    </div>
</body>

</html>
