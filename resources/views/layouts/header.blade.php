<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nticket')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
      .good-day{
        background-color: rgba(45, 185, 119, 0.5);
        font-weight: bold;
        font-size: 15px;
      }
    </style>
    @yield('extra_css')
</head>
<body>
    <div class="">
        <div class="header">
            <div class="container">
                <div class="Navigation_bar">
                    <div>
                        <img src="{{ asset('storage/images/logo1.png') }}" alt="" class="logo">
                    </div>
                    <div class="navbar-lg">
                        <ul class="nav">
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('tickets.home') }}">{{ __('message.navbar.main') }}</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('tickets.my_tickets') }}">{{ __('message.navbar.myTickets') }}</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('tickets.search_results') }}">{{ __('message.navbar.search') }}</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link " href="{{ route('tickets.chat_help') }}">{{ __('message.navbar.help') }}</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link " href="{{ route('tickets.profile') }}">{{ __('message.navbar.profile') }}</a>
                          </li>
                        </ul>
                    </div>
                    <div class="actions">
                    <ul class="navbar-nav ms-auto me-3">
                        <!-- Language Switcher -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Config::get('languages')[App::getLocale()] }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @foreach (config('languages') as $lang => $language)
                                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">{{ $language }}</a>
                                @endforeach
                            </div>
                        </li>
                    </ul>



                        <a href="{{ route('cart.page') }}" class="btn btn-info">
                          <i class="fas fa-shopping-cart"></i> {{ __('message.header.cart') }}
                        </a>
                        <form action="{{ route('logout') }}" method="post">
                          @csrf
                          <button class="btn btn-danger" style="margin-left: 10px;">
                            {{ __('message.header.exit') }}
                          </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="main-content">
        @yield('content')
        </div>
    </div>
    <div class="">
        @include('layouts.footer')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('extra_js')
</body>
</html>
