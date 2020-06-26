<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Medium Clone</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    @stack('styles')
</head>
<body>
<div class="top-scroll-bar" style="width: 0;"></div>
@include('layouts.mobile-header')

<div id="wrapper">
    @include('layouts.header')
    <main id="content">
        @yield('content')
    </main>
    @include('layouts.footer')
    <script>
        var BASEURL = '{{url('/').'/'}}';
    </script>
    <script src="/js/app.js"></script>
    @stack('scripts')
</div>
</body>
</html>
