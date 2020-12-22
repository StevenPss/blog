<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/page.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
    <livewire:styles />
  </head>

  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand font-weight-bold text-muted" href="{{ url('/') }}">Blog</a>
        </div>

        <section class="navbar-mobile">
          <span class="navbar-divider d-mobile-none"></span>

          <ul class="nav nav-navbar">
            <li class="nav-item">
              <a class="nav-link" href="#">Categories <span class="arrow"></span></a>
              <ul class="nav">
                  @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ $category->name }}</a>
                    </li>
                  @endforeach
              </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Tags <span class="arrow"></span></a>
                <ul class="nav">
                    @foreach ($tags as $tag)
                      <li class="nav-item">
                          <a class="nav-link" href="#">{{ $tag->name }}</a>
                      </li>
                    @endforeach
                </ul>
              </li>

          </ul>
        </section>

        @if (auth()->user())
            <a class="btn btn-xs btn-round btn-success" href="{{ route('home') }}">Dashboard</a>
        @else
            <a class="btn btn-xs btn-round btn-success" href="{{ route('login') }}">Login</a>
            <a class="btn btn-xs btn-round btn-secondary font-weight-bold ml-3" href="{{ route('register') }}">Register</a>
        @endif
      </div>
    </nav><!-- /.navbar -->

    @yield('header')

    @yield('content')

    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row gap-y align-items-center">

          <div class="col-sm-12 text-center order-lg-last">
            <div class="social">
              <a class="social-twitter" href="https://twitter.com/stevenpss_"><i class="fa fa-twitter"></i></a>
              <a class="social-github" href="https://github.com/StevenPss"><i class="fa fa-github"></i></a>
              <a class="social-instagram" href="https://www.instagram.com/stevenpss_/"><i class="fa fa-instagram"></i></a>
            </div>
          </div>

        </div>
      </div>
    </footer><!-- /.footer -->

    <!-- Scripts -->
    <script src="{{ asset('js/page.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5fe237bc2e015bda"></script>
    <livewire:scripts />

  </body>
</html>
