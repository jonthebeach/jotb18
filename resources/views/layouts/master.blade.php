<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=" @yield('metaDescription')">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

    <!-- Facebook sharing -->
    <meta property="og:title" content="{{ config('app.name') }} - @yield('title')">
    <meta property="og:description" content="@yield('metaDescription')">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:locale" content="en-EN">
    <meta property="og:image" content="{{url('/')}}/images/share/share.jpg?{{ uniqid() }}">
    <meta property="og:type" content="website">

    <!-- Twitter sharing -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@JOTB2018">
    <meta name="twitter:creator" content="@JOTB2018">
    <meta name="twitter:title" content="{{ config('app.name') }} - @yield('title')">
    <meta name="twitter:description" content="@yield('metaDescription')">
    <meta name="twitter:url" content="{{ url('/') }}">
    <meta name="twitter:domain" content="{{ url('/') }}">
    <meta name="twitter:image" content="{{url('/')}}/images/share/share.jpg?{{ uniqid() }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js" type="application/javascript" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" defer></script>
    <script src="/js/app.js" defer></script>
    @if (env('APP_ENV') == 'real')
        <script type="text/javascript">
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-73182208-1', 'auto');
        ga('send', 'pageview');
        </script>
    @endif
</head>
<body>
    @include('layouts.nav')
    <div id="main-content">
        @yield('content')
    </div>
    @include('layouts.footer')
</body>

</html>