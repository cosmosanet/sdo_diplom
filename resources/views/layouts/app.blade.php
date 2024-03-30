
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Scripts -->
    <script src="{{ asset('public/assets/js/bootstrap.bundle.min.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet">
   
    <title>@yield('title')</title>
</head>
<body>
        <main >
            @yield('content')
        </main>
    </div>
</body>
</html>
