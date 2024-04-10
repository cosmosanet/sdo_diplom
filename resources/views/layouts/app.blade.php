
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
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">СДО</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Главная</a>
          </li>
        </ul>
          
            <li class="btn dropdown">
              <a class="nav-link dropdown-toggle link-dark " hWref="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if (session()->has('email'))
                  {{session()->get('name')}}
                @endif
                
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('logout')}}">Выход</a></li>     
              </ul>
            </li>
          
      </div>
    </div>
  </nav>
</header>
<body>
        <main >
            @yield('content')
        </main>
    </div>
</body>
</html>
